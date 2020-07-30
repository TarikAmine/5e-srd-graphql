<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\EquipmentCategory;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class EquipmentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Equipment',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'             => ['type' => Type::nonNull(Type::string())],
            'name'              => ['type' => Type::string()],
            'equipment_category' => [
                'type' => GraphQL::type('EquipmentCategory'),
                'resolve' => function($root) {
                    return EquipmentCategory::where('url', $root->equipment_category['url'])->first();
                }
            ],
            'weapon_category'   => ['type' => Type::string()],
            'weapon_range'      => ['type' => Type::string()],
            'category_range'    => ['type' => Type::string()],
            'cost'              => [
                'type' => GraphQL::type('Cost'),
                'resolve' => function($root) {
                    return $root->cost;
                },
            ],
            'damage'              => [
                'type' => GraphQL::type('Damage'),
                'resolve' => function($root) {
                    return $root->damage;
                },
            ],
        ];
    }
}
