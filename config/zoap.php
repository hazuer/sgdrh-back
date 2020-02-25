<?php

return [
    
    // Service configurations.

    'services'          => [
        
        'Expedientes' => [
            'name'              => 'Expedientes',
            'class'             => 'App\Http\Controllers\ExpedientesController',
            'exceptions'        => [
            'Exception'
            ],
            'types'             => [
            'responseSoap' => 'App\Types\ResponseSOAP'
            ],
            'strategy'          => 'ArrayOfTypeComplex',
            'headers'           => [
            'Cache-Control'     => 'no-cache, no-store'
            ],
            'options'           => []
        ],

        'Documentos' => [
            'name'              => 'Documentos',
            'class'             => 'App\Http\Controllers\DocumentosController',
            'exceptions'        => [
            'Exception'
            ],
            'types'             => [
            'responseSoap' => 'App\Types\ResponseSOAP'
            ],
            'strategy'          => 'ArrayOfTypeComplex',
            'headers'           => [
            'Cache-Control'     => 'no-cache, no-store'
            ],
            'options'           => []
        ],

        'Catalogos' => [
            'name'              => 'Catalogos',
            'class'             => 'App\Http\Controllers\CatalogosController',
            'exceptions'        => [
            'Exception'
            ],
            'types'             => [
            'responseSoap' => 'App\Types\ResponseSOAP'
            ],
            'strategy'          => 'ArrayOfTypeComplex',
            'headers'           => [
            'Cache-Control'     => 'no-cache, no-store'
            ],
            'options'           => []
        ],

        'Capturistas' => [
            'name'              => 'Capturistas',
            'class'             => 'App\Http\Controllers\CapturistasController',
            'exceptions'        => [
            'Exception'
            ],
            'types'             => [
            'responseSoap' => 'App\Types\ResponseSOAP'
            ],
            'strategy'          => 'ArrayOfTypeComplex',
            'headers'           => [
            'Cache-Control'     => 'no-cache, no-store'
            ],
            'options'           => []
        ]
    ],

    
    // Log exception trace stack?

    'logging'       => true,

    
    // Mock credentials for demo.

    'mock'          => [
        'user'              => 'test@test.com',
        'password'          => 'tester',
        'token'             => 'tGSGYv8al1Ce6Rui8oa4Kjo8ADhYvR9x8KFZOeEGWgU1iscF7N2tUnI3t9bX'
    ],

    
];
