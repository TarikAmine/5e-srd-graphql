<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Equipment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class EquipmentCategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'EquipmentCategory',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'name'          => ['type' => Type::string()],
            'equipment'     => [
                'type' => Type::listOf(GraphQL::type('equipment')),
                'resolve' => function($root) {
                    return Equipment::whereIn('url', $root->equipment['url'])->get();
                }
            ],
        ];
    }
}
