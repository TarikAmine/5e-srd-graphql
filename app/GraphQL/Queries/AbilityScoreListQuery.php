<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\AbilityScore;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class AbilityScoreListQuery extends Query
{
    protected $attributes = [
        'name' => 'AbilityScoreList',
        'description' => 'A query',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('AbilityScore'));
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return AbilityScore::query()
            ->get();
    }
}
