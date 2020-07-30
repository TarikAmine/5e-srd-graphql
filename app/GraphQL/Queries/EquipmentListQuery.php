<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Equipment;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class EquipmentListQuery extends Query
{
    protected $attributes = [
        'name' => 'EquipmentListQ',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Equipment'));
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Equipment::query()
            ->get();
    }
}
