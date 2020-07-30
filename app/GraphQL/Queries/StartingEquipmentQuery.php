<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\StartingEquipment;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class StartingEquipmentQuery extends Query
{
    protected $attributes = [
        'name' => 'StartingEquipment',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('StartingEquipment');
    }

    public function args(): array
    {
        return [
            'index' => ['type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return StartingEquipment::query()
            ->where('index', '=', $args['index'])
            ->first();
    }
}
