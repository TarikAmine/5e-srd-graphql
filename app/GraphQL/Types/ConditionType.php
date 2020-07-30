<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ConditionType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Condition',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'name'          => ['type' => Type::string()],
            'desc'          => ['type' => Type::listOf(Type::string())],
            'url'           => ['type' => Type::string()],
        ];
    }
}
