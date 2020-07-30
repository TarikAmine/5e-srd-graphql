<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\AbilityScore;
use App\Models\CharClass;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class RaceType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Race',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'name'          => ['type' => Type::string()],
            'speed'          => ['type' => Type::int()],
            'ability_bonuses' => [
                'type' => GraphQL::type('abilityScore'),
                'resolve' => function($root) {
                    return AbilityScore::where('url', $root->ability_bonuses['url'])->first();
                }
            ],
            'class' => [
                'type' => GraphQL::type('class'),
                'resolve' => function($root) {
                    return CharClass::where('url', $root->class['url'])->first();
                }
            ],
            'level'         => ['type' => Type::int()],
            'info'      => [
                'type'          => Type::listOf(GraphQL::type('info')),
                'resolve' => function($root) { return $root->info;}
            ],
            'url'         => ['type' => Type::string()],
        ];
    }
}
