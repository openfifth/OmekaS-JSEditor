<?php

return [
    'view_manager' => [
        'template_path_stack' => [
            OMEKA_PATH . '/modules/JSEditor/view',
        ],
    ],
    'controllers' => [
        'invokables' => [
            'JSEditor\Controller\Admin\Index' => 'JSEditor\Controller\Admin\IndexController',
            'JSEditor\Controller\Site\Index' => 'JSEditor\Controller\Site\IndexController',
        ],
    ],
    'navigation' => [
        'site' => [
            [
                'label' => 'JS Editor', // @translate
                'route' => 'admin/site/slug/js-editor/default',
                'privilege' => 'js-editor-modify',
                'action' => 'index',
                'useRouteMatch' => true,
                'pages' => [
                    [
                        'route' => 'admin/site/slug/js-editor/default',
                        'visible' => false,
                    ],
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'site' => [
                        'child_routes' => [
                            'slug' => [
                                'child_routes' => [
                                    'js-editor' => [
                                        'type' => 'Literal',
                                        'options' => [
                                            'route' => '/js-editor',
                                            'defaults' => [
                                                '__NAMESPACE__' => 'JSEditor\Controller\Admin',
                                                'controller' => 'index',
                                                'action' => 'index',
                                            ],
                                        ],
                                        'may_terminate' => true,
                                        'child_routes' => [
                                            'default' => [
                                                'type' => 'Segment',
                                                'options' => [
                                                    'route' => '/:action',
                                                    'constraints' => [
                                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'site' => [
                'child_routes' => [
                    'js-editor' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/js-editor',
                            'defaults' => [
                                '__NAMESPACE__' => 'JSEditor\Controller\Site',
                                'controller' => 'index',
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
