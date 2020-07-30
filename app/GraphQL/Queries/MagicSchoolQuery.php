<?php

namespace App\GraphQL\Queries;

use App\Models\MagicSchool;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class MagicSchoolQuery extends Query
{
    protected $attributes = [
        'name' => 'MagicSchool',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('MagicSchool');
    }

    public function args(): array
    {
        return [
            'index' => ['type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return MagicSchool::query()
            ->where('index', '=', $args['index'])
            ->first();
    }
}
