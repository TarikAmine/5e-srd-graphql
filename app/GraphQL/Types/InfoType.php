<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class InfoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Info',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'name'         => ['type' => Type::nonNull(Type::string())],
            'desc'         => ['type' => Type::listOf(Type::string())],
        ];
    }
}
