<?php

declare(strict_types=1);

return [

    // The prefix for routes
    'prefix' => 'graphql',

    // The routes to make GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Route
    //
    // Example:
    //
    // Same route for both query and mutation
    //
    // 'routes' => 'path/to/query/{graphql_schema?}',
    //
    // or define each route
    //
    // 'routes' => [
    //     'query' => 'query/{graphql_schema?}',
    //     'mutation' => 'mutation/{graphql_schema?}',
    // ]
    //
    'routes' => '{graphql_schema?}',

    // The controller to use in GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Controller and method
    //
    // Example:
    //
    // 'controllers' => [
    //     'query' => '\Rebing\GraphQL\GraphQLController@query',
    //     'mutation' => '\Rebing\GraphQL\GraphQLController@mutation'
    // ]
    //
    'controllers' => \Rebing\GraphQL\GraphQLController::class . '@query',

    // Any middleware for the graphql route group
    'middleware' => [],

    // Additional route group attributes
    //
    // Example:
    //
    // 'route_group_attributes' => ['guard' => 'api']
    //
    'route_group_attributes' => [],

    // The name of the default schema used when no argument is provided
    // to GraphQL::schema() or when the route is used without the graphql_schema
    // parameter.
    'default_schema' => 'default',

    // The schemas for query and/or mutation. It expects an array of schemas to provide
    // both the 'query' fields and the 'mutation' fields.
    //
    // You can also provide a middleware that will only apply to the given schema
    //
    // Example:
    //
    //  'schema' => 'default',
    //
    //  'schemas' => [
    //      'default' => [
    //          'query' => [
    //              'users' => 'App\GraphQL\Query\UsersQuery'
    //          ],
    //          'mutation' => [
    //
    //          ]
    //      ],
    //      'user' => [
    //          'query' => [
    //              'profile' => 'App\GraphQL\Query\ProfileQuery'
    //          ],
    //          'mutation' => [
    //
    //          ],
    //          'middleware' => ['auth'],
    //      ],
    //      'user/me' => [
    //          'query' => [
    //              'profile' => 'App\GraphQL\Query\MyProfileQuery'
    //          ],
    //          'mutation' => [
    //
    //          ],
    //          'middleware' => ['auth'],
    //      ],
    //  ]
    //
    'schemas' => [
        'default' => [
            'query' => [
                'AbilityScore' => \App\GraphQL\Queries\AbilityScoreQuery::class,
                'AbilityScoreList' => \App\GraphQL\Queries\AbilityScoreListQuery::class,
                'Class' => \App\GraphQL\Queries\ClassQuery::class,
                'ClassList' => \App\GraphQL\Queries\ClassListQuery::class,
                'Condition' => \App\GraphQL\Queries\ConditionQuery::class,
                'ConditionList' => \App\GraphQL\Queries\ConditionListQuery::class,
                'DamageType' => \App\GraphQL\Queries\DamageTypeQuery::class,
                'DamageTypeList' => \App\GraphQL\Queries\DamageTypeListQuery::class,
                'EquipmentCategory' => \App\GraphQL\Queries\EquipmentCategoryQuery::class,
                'EquipmentCategoryList' => \App\GraphQL\Queries\EquipmentCategoryListQuery::class,
                'Equipment' => \App\GraphQL\Queries\EquipmentQuery::class,
                'EquipmentList' => \App\GraphQL\Queries\EquipmentListQuery::class,
                'Feature' => \App\GraphQL\Queries\FeatureQuery::class,
                'FeatureList' => \App\GraphQL\Queries\FeatureListQuery::class,
                'Language' => \App\GraphQL\Queries\LanguageQuery::class,
                'LanguageList' => \App\GraphQL\Queries\LanguageListQuery::class,
                'Level' => \App\GraphQL\Queries\LevelQuery::class,
                'LevelList' => \App\GraphQL\Queries\LevelListQuery::class,
                'MagicSchool' => \App\GraphQL\Queries\MagicSchoolQuery::class,
                'MagicSchoolList' => \App\GraphQL\Queries\MagicSchoolListQuery::class,
                'Monster' => \App\GraphQL\Queries\MonsterQuery::class,
                'MonsterList' => \App\GraphQL\Queries\MonsterListQuery::class,
                'Proficiency' => \App\GraphQL\Queries\ProficiencyQuery::class,
                'ProficiencyList' => \App\GraphQL\Queries\ProficiencyListQuery::class,
                'Race' => \App\GraphQL\Queries\RaceQuery::class,
                'RaceList' => \App\GraphQL\Queries\RaceListQuery::class,
                'Skill' => \App\GraphQL\Queries\SkillQuery::class,
                'SkillList' => \App\GraphQL\Queries\SkillListQuery::class,
                'Spellcasting' => \App\GraphQL\Queries\SpellcastingQuery::class,
                'SpellcastingList' => \App\GraphQL\Queries\SpellcastingListQuery::class,
                'Spell' => \App\GraphQL\Queries\SpellQuery::class,
                'SpellList' => \App\GraphQL\Queries\SpellListQuery::class,
                'StartingEquipment' => \App\GraphQL\Queries\StartingEquipmentQuery::class,
                'StartingEquipmentList' => \App\GraphQL\Queries\StartingEquipmentListQuery::class,
                'SubClass' => \App\GraphQL\Queries\SubclassQuery::class,
                'SubClassList' => \App\GraphQL\Queries\SubclassListQuery::class,
                'SubRace' => \App\GraphQL\Queries\SubraceQuery::class,
                'SubRaceList' => \App\GraphQL\Queries\SubraceListQuery::class,
                'Trait' => \App\GraphQL\Queries\TraitQuery::class,
                'TraitList' => \App\GraphQL\Queries\TraitListQuery::class,
                'WeaponProperty' => \App\GraphQL\Queries\WeaponPropertyQuery::class,
                'WeaponPropertyList' => \App\GraphQL\Queries\WeaponPropertyListQuery::class,
            ],
            'mutation' => [
                // 'example_mutation'  => ExampleMutation::class,
            ],
            'middleware' => [],
            'method' => ['get', 'post'],
        ],
    ],

    // The types available in the application. You can then access it from the
    // facade like this: GraphQL::type('user')
    //
    // Example:
    //
    // 'types' => [
    //     'user' => 'App\GraphQL\Type\UserType'
    // ]
    //
    'types' => [
        'AbilityBonusChoices' => \App\GraphQL\Types\AbilityBonusChoicesType::class,
        'AbilityBonus' => \App\GraphQL\Types\AbilityBonusType::class,
        'AbilityScore' => \App\GraphQL\Types\AbilityScoreType::class,
        'Class' => \App\GraphQL\Types\ClassType::class,
        'Condition' => \App\GraphQL\Types\ConditionType::class,
        'Cost' => \App\GraphQL\Types\CostType::class,
        'Damage' => \App\GraphQL\Types\DamageType::class,
        'DamageType' => \App\GraphQL\Types\DamageTypeType::class,
        'EquipmentCategory' => \App\GraphQL\Types\EquipmentCategoryType::class,
        'EquipmentQuantity' => \App\GraphQL\Types\EquipmentQuantityType::class,
        'Equipment' => \App\GraphQL\Types\EquipmentType::class,
        'Feature' => \App\GraphQL\Types\FeatureType::class,
        'Info' => \App\GraphQL\Types\InfoType::class,
        'LanguageChoices' => \App\GraphQL\Types\LanguageChoicesType::class,
        'Language' => \App\GraphQL\Types\LanguageType::class,
        'Level' => \App\GraphQL\Types\LevelType::class,
        'MagicSchool' => \App\GraphQL\Types\MagicSchoolType::class,
        'MonsterAction' => \App\GraphQL\Types\MonsterActionType::class,
        'MonsterSpecialAbility' => \App\GraphQL\Types\MonsterSpecialAbilityType::class,
        'MonsterProficiency' => \App\GraphQL\Types\MonsterProficiencyType::class,
        'Monster' => \App\GraphQL\Types\MonsterType::class,
        'ProficiencyChoices' => \App\GraphQL\Types\ProficiencyChoicesType::class,
        'Proficiency' => \App\GraphQL\Types\ProficiencyType::class,
        'Race' => \App\GraphQL\Types\RaceType::class,
        'Sense' => \App\GraphQL\Types\SenseType::class,
        'Skill' => \App\GraphQL\Types\SkillType::class,
        'Spellcasting' => \App\GraphQL\Types\SpellcastingType::class,
        'Speed' => \App\GraphQL\Types\SpeedType::class,
        'Spell' => \App\GraphQL\Types\SpellType::class,
        'StartingEquipmentChoices' => \App\GraphQL\Types\StartingEquipmentChoicesType::class,
        'StartingEquipment' => \App\GraphQL\Types\StartingEquipmentType::class,
        'Subclass' => \App\GraphQL\Types\SubclassType::class,
        'Subrace' => \App\GraphQL\Types\SubraceType::class,
        'TraitChoices' => \App\GraphQL\Types\TraitChoicesType::class,
        'Trait' => \App\GraphQL\Types\TraitType::class,
        'WeaponProperty' => \App\GraphQL\Types\WeaponPropertyType::class,
    ],

    // The types will be loaded on demand. Default is to load all types on each request
    // Can increase performance on schemes with many types
    // Presupposes the config type key to match the type class name property
    'lazyload_types' => false,

    // This callable will be passed the Error object for each errors GraphQL catch.
    // The method should return an array representing the error.
    // Typically:
    // [
    //     'message' => '',
    //     'locations' => []
    // ]
    'error_formatter' => ['\Rebing\GraphQL\GraphQL', 'formatError'],

    /*
     * Custom Error Handling
     *
     * Expected handler signature is: function (array $errors, callable $formatter): array
     *
     * The default handler will pass exceptions to laravel Error Handling mechanism
     */
    'errors_handler' => ['\Rebing\GraphQL\GraphQL', 'handleErrors'],

    // You can set the key, which will be used to retrieve the dynamic variables
    'params_key' => 'variables',

    /*
     * Options to limit the query complexity and depth. See the doc
     * @ https://webonyx.github.io/graphql-php/security
     * for details. Disabled by default.
     */
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false,
    ],

    /*
     * You can define your own pagination type.
     * Reference \Rebing\GraphQL\Support\PaginationType::class
     */
    'pagination_type' => \Rebing\GraphQL\Support\PaginationType::class,

    /*
     * Config for GraphiQL (see (https://github.com/graphql/graphiql).
     */
    'graphiql' => [
        'prefix' => '/graphiql',
        'controller' => \Rebing\GraphQL\GraphQLController::class . '@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'display' => env('ENABLE_GRAPHIQL', true),
    ],

    /*
     * Overrides the default field resolver
     * See http://webonyx.github.io/graphql-php/data-fetching/#default-field-resolver
     *
     * Example:
     *
     * ```php
     * 'defaultFieldResolver' => function ($root, $args, $context, $info) {
     * },
     * ```
     * or
     * ```php
     * 'defaultFieldResolver' => [SomeKlass::class, 'someMethod'],
     * ```
     */
    'defaultFieldResolver' => null,

    /*
     * Any headers that will be added to the response returned by the default controller
     */
    'headers' => [],

    /*
     * Any JSON encoding options when returning a response from the default controller
     * See http://php.net/manual/function.json-encode.php for the full list of options
     */
    'json_encoding_options' => 0,
];
