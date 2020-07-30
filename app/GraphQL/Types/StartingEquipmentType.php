<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\CharClass;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class StartingEquipmentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'StartingEquipment',
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
            'starting_equipment'        => [
                'type'          => Type::listOf(GraphQL::type('EquipmentQuantity')),
                'resolve' => function($root) {
                    return $root->starting_equipment;
                }
            ],
            'choices_to_make'         => ['type' => Type::int()],
            'choice_1'        => [
                'type'          => Type::listOf(GraphQL::type('StartingEquipmentChoices')),
                'resolve' => function($root) { return $root->choice_1;}
            ],
            'choice_2'        => [
                'type'          => Type::listOf(GraphQL::type('StartingEquipmentChoices')),
                'resolve' => function($root) { return $root->choice_2;}
            ],
            'choice_3'        => [
                'type'          => Type::listOf(GraphQL::type('StartingEquipmentChoices')),
                'resolve' => function($root) { return $root->choice_3;}
            ],
            'choice_4'        => [
                'type'          => Type::listOf(GraphQL::type('StartingEquipmentChoices')),
                'resolve' => function($root) { return $root->choice_4;}
            ],
            'choice_5'        => [
                'type'          => Type::listOf(GraphQL::type('StartingEquipmentChoices')),
                'resolve' => function($root) { return $root->choice_5;}
            ],
        ];
    }
}
