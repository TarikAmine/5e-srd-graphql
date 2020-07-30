<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\CharClass;
use App\Models\Feature;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SubclassType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Subclass',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'class' => [
                'type' => GraphQL::type('Class'),
                'resolve' => function($root) {
                    return CharClass::where('url', $root->class['url'])->first();
                }
            ],
            'name'          => ['type' => Type::string()],
            'subclass_flavor'          => ['type' => Type::string()],
            'desc'          => ['type' => Type::listOf(Type::string())],
            'features' => [
                'type'      => Type::listOf(GraphQL::type('Feature')),
                'resolve'   => function($root) {
                    return Feature::whereIn('url', array_pluck($root->features, 'url'))->get();
                }
            ],
            'url'           => ['type' => Type::string()],
        ];
    }
}
