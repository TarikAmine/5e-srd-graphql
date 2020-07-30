<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\AbilityScore;
use App\Models\CharClass;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SpellcastingType extends GraphQLType
{
    protected $attributes = [
        'name' => 'SpellCasting',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'class' => [
                'type' => GraphQL::type('Class'),
                'resolve' => function($root) {
                    return CharClass::where('url', $root->class['url'])->first();
                }
            ],
            'level'         => ['type' => Type::int()],
            'spellcasting_ability' => [
                'type' => GraphQL::type('AbilityScore'),
                'resolve' => function($root) {
                    return AbilityScore::where('url', $root->spellcasting_ability['url'])->first();
                }
            ],
            'info'      => [
                'type'          => Type::listOf(GraphQL::type('Info')),
                'resolve' => function($root) { return $root->info;}
            ],
            'url'         => ['type' => Type::string()],
        ];
    }
}
