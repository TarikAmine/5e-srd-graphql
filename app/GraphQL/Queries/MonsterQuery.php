<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Monster;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class MonsterQuery extends Query
{
    protected $attributes = [
        'name' => 'Monster',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('Monster');
    }

    public function args(): array
    {
        return [
            'index' => ['type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Monster::query()
            ->where('index', '=', $args['index'])
            ->first();
    }
}
