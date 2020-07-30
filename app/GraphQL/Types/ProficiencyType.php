<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\CharClass;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProficiencyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Proficiency',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'        => ['type' => Type::nonNull(Type::string())],
            'type'         => ['type' => Type::string()],
            'name'         => ['type' => Type::string()],
            'classes'      => [
                'type' => Type::listOf(GraphQL::type('Class')),
                'resolve' => function($root) {
                    return CharClass::whereIn('url', array_pluck($root->classes ?? [], 'url'))->get();
                }
            ],
            'races'      => [
                'type' => Type::listOf(GraphQL::type('Race')),
                'resolve' => function($root) {
                    return CharClass::whereIn('url', array_pluck($root->races ?? [], 'url'))->get();
                }
            ],
            'url'          => ['type' => Type::string()],
        ];
    }
}
