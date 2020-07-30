<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Spellcasting;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class SpellcastingQuery extends Query
{
    protected $attributes = [
        'name' => 'Spellcasting',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('Spellcasting');
    }

    public function args(): array
    {
        return [
            'index' => ['type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Spellcasting::query()
            ->where('index', '=', $args['index'])
            ->first();
    }
}
