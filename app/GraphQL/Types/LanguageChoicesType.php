<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Language;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LanguageChoicesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'LanguageChoices',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'choose' => ['type' => Type::int()],
            'type' => ['type' => Type::string()],
            'from' => [
                'type' => Type::listOf(GraphQL::type('language')),
                'resolve' => function($root) {
                    return Language::whereIn('url', array_pluck($root['from'], 'url'))->get();
                }
            ],
        ];
    }
}
