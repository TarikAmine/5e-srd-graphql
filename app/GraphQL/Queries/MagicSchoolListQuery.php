<?php

namespace App\GraphQL\Queries;

use App\Models\MagicSchool;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class MagicSchoolListQuery extends Query
{
    protected $attributes = [
        'name' => 'MagicSchoolList',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('MagicSchool'));
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return MagicSchool::query()
            ->get();
    }
}
