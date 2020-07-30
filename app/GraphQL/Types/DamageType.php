<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class DamageType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Damage',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'damage_dice'         => ['type' => Type::string()],
            'damage_type' => [
                'type' => GraphQL::type('Equipment'),
                'resolve' => function($root) {
                    return \App\Models\DamageType::where('url', $root['damage_type']['url'])->first();
                }
            ],
        ];
    }
}
