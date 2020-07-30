<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\AbilityScore;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SkillType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Skill',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'name'          => ['type' => Type::string()],
            'desc'          => ['type' => Type::listOf(Type::string())],
            'ability_score' => [
                'type' => GraphQL::type('abilityScore'),
                'resolve' => function($root) {
                    return AbilityScore::where('url', $root->ability_score['url'])->first();
                }
            ],
            'url  '         => ['type' => Type::string()],
        ];
    }
}
