<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\AbilityScore;
use App\Models\Language;
use App\Models\Proficiency;
use App\Models\Race;
use App\Models\RacialTrait;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SubraceType extends GraphQLType
{
    protected $attributes = [
        'name' => 'SubRace',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'             => ['type' => Type::nonNull(Type::string())],
            'name'              => ['type' => Type::string()],
            'race' => [
                'type'          => GraphQL::type('race'),
                'resolve'       => function($root) {
                    return Race::where('url', $root->race['url'])->first();
                }
            ],
            'desc'              => ['type' => Type::listOf(Type::string())],
            'ability_bonuses'   => [
                'type' => Type::listOf(GraphQL::type('abilityBonus')),
                'resolve' => function($root) {
                    $bonuses = array_pluck($root->ability_bonuses, 'bonus', 'url');
                    return AbilityScore::query()
                        ->whereIn('url', array_pluck($root->ability_bonuses, 'url'))
                        ->get()
                        ->map(function($abilityScore) use($bonuses) {
                            $abilityScore->bonus = $bonuses[$abilityScore->url];
                            return $abilityScore;
                        });
                }
            ],
            'starting_proficiencies'    => [
                'type' => Type::listOf(GraphQL::type('proficiency')),
                'resolve' => function($root) {
                    return Proficiency::whereIn('url', array_pluck($root->starting_proficiencies ?? [], 'url'))->get();
                }
            ],
            'languages'                 => [
                'type' => Type::listOf(GraphQL::type('language')),
                'resolve' => function($root) {
                    return Language::whereIn('url', array_pluck($root->languages ?? [], 'url'))->get();
                }
            ],
            'language_options'          => [
                'type' => GraphQL::type('languageChoices'),
                'resolve' => function($root) {
                    return $root->special_abilities;
                },
            ],
            'racial_traits'    => [
                'type' => Type::listOf(GraphQL::type('trait')),
                'resolve' => function($root) {
                    return RacialTrait::whereIn('url', array_pluck($root->racial_traits ?? [], 'url'))->get();
                }
            ],
            'racial_trait_options'          => [
                'type' => GraphQL::type('traitChoices'),
                'resolve' => function($root) {
                    return $root->racial_trait_options;
                },
            ],
            'url'               => ['type' => Type::string()],
        ];
    }
}
