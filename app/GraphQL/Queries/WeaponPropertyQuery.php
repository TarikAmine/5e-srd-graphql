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

class WeaponPropertyQuery extends Query
{
    protected $attributes = [
        'name' => 'WeaponProperty',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('WeaponProperty');
    }

    public function args(): array
    {
        return [
            'index' => ['type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return WeaponProperty::query()
            ->where('index', '=', $args['index'])
            ->first();
    }
}
