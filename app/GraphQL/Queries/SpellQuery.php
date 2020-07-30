<?php

namespace App\GraphQL\Queries;

use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Models\Spell;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class SpellQuery extends Query
{
    protected $attributes = [
        'name' => 'Spell',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('Spell');
    }

    public function args(): array
    {
        return [
            'index' => ['type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Spell::query()
            ->where('index', '=', $args['index'])
            ->first();
    }
}
