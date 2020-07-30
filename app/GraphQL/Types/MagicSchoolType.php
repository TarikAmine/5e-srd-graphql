<?php


namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MagicSchoolType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'MagicSchool',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'index'         => ['type' => Type::nonNull(Type::string())],
            'name'          => ['type' => Type::string()],
            'desc'          => ['type' => Type::string()],
            'url'           => ['type' => Type::string()],
        ];
    }
}
