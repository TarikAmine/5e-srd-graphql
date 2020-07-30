<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\CharClass;
use App\Models\Feature;
use App\Models\SubClass;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LevelType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Level',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'level'                 => ['type' => Type::nonNull(Type::int())],
            'ability_score_bonuses' => ['type' => Type::int()],
            'prof_bonus'            => ['type' => Type::int()],
            'features' => [
                'type'      => Type::listOf(GraphQL::type('feature')),
                'resolve'   => function($root) {
                    return Feature::whereIn('url', array_pluck($root->features, 'url'))->get();
                }
            ],
            'class_specific' => [
                'type'      => Type::string(),
                'resolve'   => function($root) {
                    return json_encode($root->class_specific);
                }
            ],
            'class' => [
                'type'      => GraphQL::type('class'),
                'resolve'   => function($root) {
                    return CharClass::where('url', $root->class['url'])->first();
                }
            ],
            'subclass' => [
                'type'      => GraphQL::type('subclass'),
                'resolve'   => function($root) {
                    return SubClass::where('url', $root->subclass['url'])->first();
                }
            ],
            'url'                   => ['type' => Type::string()],
        ];
    }
}
