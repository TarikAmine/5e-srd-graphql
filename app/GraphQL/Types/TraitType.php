<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Race;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TraitType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Trait',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'name'          => ['type' => Type::string()],
            'races'         => [
                'type' => Type::listOf(GraphQL::type('Race')),
                'resolve' => function($root) {
                    return Race::whereIn('url', array_pluck($root->races, 'url'))->get();
                }
            ],
            'subraces'       => [
                'type' => Type::listOf(GraphQL::type('Subrace')),
                'resolve' => function($root) {
                    return Race::whereIn('url', array_pluck($root->subraces, 'url'))->get();
                }
            ],
            'desc'          => ['type' => Type::listOf(Type::string())],
            'url'           => ['type' => Type::string()],
        ];
    }
}
