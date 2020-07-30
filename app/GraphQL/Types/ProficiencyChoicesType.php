<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Proficiency;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProficiencyChoicesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProficiencyChoices',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'choose' => ['type' => Type::int()],
            'type' => ['type' => Type::string()],
            'from' => [
                'type' => Type::listOf(GraphQL::type('Proficiency')),
                'resolve' => function($root) {
                    return Proficiency::whereIn('url', array_pluck($root['from'], 'url'))->get();
                }
            ],
        ];
    }
}
