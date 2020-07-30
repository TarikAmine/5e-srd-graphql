<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\WeaponProperty;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class WeaponPropertyListQuery extends Query
{
    protected $attributes = [
        'name' => 'WeaponPropertyList',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('WeaponProperty'));
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return WeaponProperty::query()
            ->get();
    }
}
