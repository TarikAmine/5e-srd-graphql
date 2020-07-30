<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\RacialTrait;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TraitChoicesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'TraitChoices',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'choose' => ['type' => Type::int()],
            'type' => ['type' => Type::string()],
            'from' => [
                'type' => Type::listOf(GraphQL::type('Race')),
                'resolve' => function($root) {
                    return RacialTrait::whereIn('url', array_pluck($root['from'], 'url'))->get();
                }
            ],
        ];
    }
}
