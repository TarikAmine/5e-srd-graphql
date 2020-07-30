<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SpeedType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Speed',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'walk'         => ['type' => Type::string()],
            'swim'         => ['type' => Type::string()],
        ];
    }
}
