<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\AbilityScore;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AbilityBonusChoicesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AbilityBonusChoices',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'choose' => ['type' => Type::int()],
            'type' => ['type' => Type::string()],
            'from' => [
                'type' => Type::listOf(GraphQL::type('Language')),
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
        ];
    }
}
