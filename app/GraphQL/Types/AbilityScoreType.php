<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Skill;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AbilityScoreType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AbilityScore',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'name'          => ['type' => Type::string()],
            'full_name'     => ['type' => Type::string()],
            'desc'          => ['type' => Type::listOf(Type::string())],
            'skills'        => [
                'type'          => Type::listOf(GraphQL::type('Skill')),
                'resolve' => function($root) {
                    return Skill::whereIn('url', array_pluck($root->skills, 'url'))->get();
                }
            ],
            'url'           => ['type' => Type::string()],
        ];
    }
}
