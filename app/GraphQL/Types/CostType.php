<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Cost',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'quantity'  => ['type' => Type::int()],
            'unit'      => ['type' => Type::string()],
        ];
    }
}
