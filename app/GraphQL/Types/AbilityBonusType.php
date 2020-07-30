<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AbilityBonusType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AbilityBonus',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return array_merge((new AbilityScoreType())->fields(), [
            'bonus'         => ['type' => Type::int()],
        ]);
    }
}
