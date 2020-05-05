<?php
return [
    'service_manager' => [
        'factories' => [
            \Allugator\V1\Rest\Produtos\ProdutosResource::class => \Allugator\V1\Rest\Produtos\ProdutosResourceFactory::class,
            \Allugator\V1\Rest\Authentication\AuthenticationResource::class => \Allugator\V1\Rest\Authentication\AuthenticationResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'allugator.rest.produtos' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/produtos[/:produtos_id]',
                    'defaults' => [
                        'controller' => 'Allugator\\V1\\Rest\\Produtos\\Controller',
                    ],
                ],
            ],
            'allugator.rest.authentication' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/authentication',
                    'defaults' => [
                        'controller' => 'Allugator\\V1\\Rest\\Authentication\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'allugator.rest.produtos',
            1 => 'allugator.rest.authentication',
        ],
    ],
    'zf-rest' => [
        'Allugator\\V1\\Rest\\Produtos\\Controller' => [
            'listener' => \Allugator\V1\Rest\Produtos\ProdutosResource::class,
            'route_name' => 'allugator.rest.produtos',
            'route_identifier_name' => 'produtos_id',
            'collection_name' => 'produtos',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Allugator\V1\Rest\Produtos\ProdutosEntity::class,
            'collection_class' => \Allugator\V1\Rest\Produtos\ProdutosCollection::class,
            'service_name' => 'Produtos',
        ],
        'Allugator\\V1\\Rest\\Authentication\\Controller' => [
            'listener' => \Allugator\V1\Rest\Authentication\AuthenticationResource::class,
            'route_name' => 'allugator.rest.authentication',
            'route_identifier_name' => 'authentication',
            'collection_name' => 'authentication',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Allugator\V1\Rest\Authentication\AuthenticationEntity::class,
            'collection_class' => \Allugator\V1\Rest\Authentication\AuthenticationCollection::class,
            'service_name' => 'Authentication',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Allugator\\V1\\Rest\\Produtos\\Controller' => 'HalJson',
            'Allugator\\V1\\Rest\\Authentication\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Allugator\\V1\\Rest\\Produtos\\Controller' => [
                0 => 'application/vnd.allugator.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Allugator\\V1\\Rest\\Authentication\\Controller' => [
                0 => 'application/vnd.allugator.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Allugator\\V1\\Rest\\Produtos\\Controller' => [
                0 => 'application/vnd.allugator.v1+json',
                1 => 'application/json',
            ],
            'Allugator\\V1\\Rest\\Authentication\\Controller' => [
                0 => 'application/vnd.allugator.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Allugator\V1\Rest\Produtos\ProdutosEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'allugator.rest.produtos',
                'route_identifier_name' => 'produtos_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Allugator\V1\Rest\Produtos\ProdutosCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'allugator.rest.produtos',
                'route_identifier_name' => 'produtos_id',
                'is_collection' => true,
            ],
            \Allugator\V1\Rest\Authentication\AuthenticationEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'allugator.rest.authentication',
                'route_identifier_name' => 'authentication',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Allugator\V1\Rest\Authentication\AuthenticationCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'allugator.rest.authentication',
                'route_identifier_name' => 'authentication',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Allugator\\V1\\Rest\\Produtos\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => true,
                    'PUT' => true,
                    'PATCH' => false,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
    'zf-content-validation' => [
        'Allugator\\V1\\Rest\\Produtos\\Controller' => [
            'input_filter' => 'Allugator\\V1\\Rest\\Produtos\\Validator',
        ],
        'Allugator\\V1\\Rest\\Authentication\\Controller' => [
            'input_filter' => 'Allugator\\V1\\Rest\\Authentication\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Allugator\\V1\\Rest\\Produtos\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'nome',
                'description' => 'nome',
                'field_type' => 'varchar',
                'error_message' => 'Nome inválido.',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'preco',
                'description' => 'Preço do produto',
                'field_type' => 'decimal',
                'error_message' => 'Preço inválido.',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'foto',
                'description' => 'foto do produto',
                'field_type' => 'varchar',
                'error_message' => 'Foto inválida.',
            ],
            3 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'owner',
                'description' => 'Dono do produto',
                'field_type' => 'integer',
                'error_message' => 'Id inválido para o owner.',
            ],
        ],
        'Allugator\\V1\\Rest\\Authentication\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'login',
                'description' => 'login',
                'field_type' => 'varchar',
                'error_message' => 'Login inválido.',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'senha',
                'description' => 'senha',
                'field_type' => 'varchar',
                'error_message' => 'Senha inválida.',
            ],
        ],
    ],
];
