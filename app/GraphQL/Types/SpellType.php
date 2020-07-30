<?php


namespace App\GraphQL\Types;

use App\Models\CharClass;
use App\Models\CharClass;
use App\Models\MagicSchool;
use App\Models\SubClass;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SpellType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Spell',
        'description'   => 'A spell',
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'name'          => ['type' => Type::string()],
            'desc'          => ['type' => Type::listOf(Type::string())],
            'higher_level'  => ['type' => Type::listOf(Type::string())],
            'range'         => ['type' => Type::string()],
            'components'    => ['type' => Type::listOf(Type::string())],
            'material'      => ['type' => Type::string()],
            'ritual'        => ['type' => Type::boolean()],
            'duration'      => ['type' => Type::string()],
            'concentration' => ['type' => Type::boolean()],
            'casting_time'  => ['type' => Type::string()],
            'level'         => ['type' => Type::int()],
            'school' => [
                'type'          => GraphQL::type('magicSchool'),
                'resolve'       => function($root) {
                    return MagicSchool::where('url', $root->school['url'])->first();
                }
            ],
            'classes'      => [
                'type' => Type::listOf(GraphQL::type('class')),
                'resolve' => function($root) {
                    return CharClass::whereIn('url', array_pluck($root->classes ?? [], 'url'))->get();
                }
            ],
            'subclasses' => [
                'type' => Type::listOf(GraphQL::type('abilityScore')),
                'resolve' => function($root) {
                    return SubClass::whereIn('url', array_pluck($root->subclasses, 'url'))->get();
                }
            ],
            'url'           => ['type' => Type::string()],
        ];
    }
}
