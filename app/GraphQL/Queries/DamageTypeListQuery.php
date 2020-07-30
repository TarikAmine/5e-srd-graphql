<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\DamageType;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class DamageTypeListQuery extends Query
{
    protected $attributes = [
        'name' => 'DamageTypeList',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('DamageType'));
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return DamageType::query()
            ->get();
    }
}
