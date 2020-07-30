<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SenseType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Sense',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'darkvision'          => ['type' => Type::string()],
            'passive_perception'  => ['type' => Type::int()],
            'blindsight'          => ['type' => Type::string()],
        ];
    }
}
