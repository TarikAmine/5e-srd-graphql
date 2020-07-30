<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Condition;
use App\Models\Proficiency;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MonsterType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Monster',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'                     => ['type' => Type::nonNull(Type::string())],
            'name'                      => ['type' => Type::string()],
            'size'                      => ['type' => Type::string()],
            'type'                      => ['type' => Type::string()],
            'subtype'                   => ['type' => Type::string()],
            'alignment'                 => ['type' => Type::string()],
            'armor_class'               => ['type' => Type::int()],
            'hit_points'                => ['type' => Type::int()],
            'hit_dice'                  => ['type' => Type::string()],
            'speed'                    => [
                'type' => Type::listOf(GraphQL::type('Speed')),
                'resolve' => function($root) {
                    return $root->speed;
                },
            ],
            'strength'                  => ['type' => Type::int()],
            'dexterity'                 => ['type' => Type::int()],
            'constitution'              => ['type' => Type::int()],
            'intelligence'              => ['type' => Type::int()],
            'wisdom'                    => ['type' => Type::int()],
            'charisma'                  => ['type' => Type::int()],
            'proficiencies'   => [
                'type' => Type::listOf(GraphQL::type('MonsterProficiency')),
                'resolve' => function($root) {
                    $values = array_pluck($root->proficiencies, 'value', 'url');
                    return Proficiency::query()
                        ->whereIn('url', array_pluck($root->proficiencies, 'url'))
                        ->get()
                        ->map(function($proficiency) use($values) {
                            $proficiency->value = $values[$proficiency->url];
                            return $proficiency;
                        });
                }
            ],
            'damage_vulnerabilities'    => ['type' => Type::listOf(Type::string())],
            'damage_resistances'        => ['type' => Type::listOf(Type::string())],
            'damage_immunities'         => ['type' => Type::listOf(Type::string())],
            'condition_immunities'      => [
                'type' => Type::listOf(GraphQL::type('Condition')),
                'resolve' => function($root) {
                    return Condition::whereIn('url', array_pluck($root->condition_immunities, 'url'))->get();
                }
            ],
            'senses'                    => [
                'type' => Type::listOf(GraphQL::type('Sense')),
                'resolve' => function($root) {
                    return $root->senses;
                },
            ],
            'languages'                 => ['type' => Type::string()],
            'challenge_rating'          => ['type' => Type::int()],
            'special_abilities'                    => [
                'type' => Type::listOf(GraphQL::type('MonsterSpecialAbility')),
                'resolve' => function($root) {
                    return $root->special_abilities;
                },
            ],
            'actions'                    => [
                'type' => Type::listOf(GraphQL::type('MonsterAction')),
                'resolve' => function($root) {
                    return $root->actions;
                },
            ],
        ];
    }
}
