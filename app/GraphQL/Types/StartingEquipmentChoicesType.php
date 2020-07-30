<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class StartingEquipmentChoicesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'StartingEquipmentChoices',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [

            'choose' => ['type' => Type::int()],
            'type' => ['type' => Type::string()],
            'from' => [
                'type' => Type::listOf(GraphQL::type('equipmentItem')),
                'resolve' => function($root) {return $root['from'];}
            ],
        ];
    }
}
