<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Race;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class RaceQuery extends Query
{
    protected $attributes = [
        'name' => 'Race',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('Race');
    }

    public function args(): array
    {
        return [
            'index' => ['type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Race::query()
            ->where('index', '=', $args['index'])
            ->first();
    }
}
