<?php


namespace App\GraphQL\Types;

use App\Models\AbilityScore;
use App\Models\Level;
use App\Models\Proficiency;
use App\Models\StartingEquipment;
use App\Models\SubClass;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ClassType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Class',
        'description'   => 'A char class',
    ];

    public function fields(): array
    {
        return [
            'index'                 => ['type' => Type::nonNull(Type::string())],
            'name'                  => ['type' => Type::string()],
            'hit_die'               => ['type' => Type::int()],
            'proficiency_choices'   => [
                'type' => Type::listOf(GraphQL::type('ProficiencyChoices')),
                'resolve' => function($root) {
                    return $root->proficiency_choices;
                }
            ],
            'proficiencies' => [
                'type' => Type::listOf(GraphQL::type('Proficiency')),
                'resolve' => function($root) {
                    return Proficiency::whereIn('url', array_pluck($root->proficiencies, 'url'))->get();
                }
            ],
            'saving_throws' => [
                'type' => Type::listOf(GraphQL::type('AbilityScore')),
                'resolve' => function($root) {
                    return AbilityScore::whereIn('url', array_pluck($root->saving_throws, 'url'))->get();
                }
            ],
            'starting_equipment' => [
                'type' => GraphQL::type('StartingEquipment'),
                'resolve' => function($root) {
                    return StartingEquipment::where('url', $root->starting_equipment['url'])->first();
                }
            ],
            'class_levels' => [
                'type' => Type::listOf(GraphQL::type('Level')),
                'resolve' => function($root) {
                    return SubClass::where('url', 'like', $root->class_levels['url'] . '%')->get();
                }
            ],
            'subclasses' => [
                'type' => Type::listOf(GraphQL::type('AbilityScore')),
                'resolve' => function($root) {
                    return SubClass::whereIn('url', array_pluck($root->subclasses, 'url'))->get();
                }
            ],
            'spellcasting' => [
                'type' => GraphQL::type('Spellcasting'),
                'resolve' => function($root) {
                    return Level::where('url', $root->spellcasting['url'])->first();
                }
            ],
            'url'                   => ['type' => Type::string()],
        ];
    }
}
