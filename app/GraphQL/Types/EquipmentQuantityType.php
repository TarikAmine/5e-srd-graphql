<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Equipment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class EquipmentQuantityType extends GraphQLType
{
    protected $attributes = [
        'name' => 'EquipmentQuantity',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'item' => [
                'type' => GraphQL::type('Equipment'),
                'resolve' => function($root) {
                    return Equipment::where('url', $root['item']['url'])->first();
                }
            ],
            'quantity'         => ['type' => Type::int()],
        ];
    }
}
