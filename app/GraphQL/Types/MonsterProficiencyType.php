<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MonsterProficiencyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MonsterProficiency',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return array_merge((new ProficiencyType())->fields(), [
            'value'         => ['type' => Type::int()],
        ]);
    }
}
