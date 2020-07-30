<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\EquipmentCategory;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class EquipmentCategoryListQuery extends Query
{
    protected $attributes = [
        'name' => 'EquipmentCategoryList',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('EquipmentCategory'));
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return EquipmentCategory::query()
            ->get();
    }
}
