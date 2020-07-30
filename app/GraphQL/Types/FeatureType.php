<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\CharClass;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class FeatureType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Feature',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'name'          => ['type' => Type::string()],
            'level'         => ['type' => Type::int()],
            'desc'          => ['type' => Type::listOf(Type::string())],
            'url'           => ['type' => Type::string()],
            'class' => [
                'type'      => GraphQL::type('Class'),
                'resolve'   => function($root) {
                    return CharClass::where('url', $root->class['url'])->first();
                }
            ],
            'subclass' => [
                'type'      => GraphQL::type('Subclass'),
                'resolve'   => function($root) {
                    return CharClass::where('url', $root->subclass['url'])->first();
                }
            ],
        ];
    }
}
