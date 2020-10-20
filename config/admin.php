<?php
return [
    'menu' => [
        [
            'name' => 'Painel de Controle',
            'url' => '/admin/dashboard',
            'icon' => 'fas fa-tachometer-alt'
        ],
        [
            'name' => 'Páginas',
            'url' => '/admin/page',
            'icon' => 'fas fa-file'
        ],
        [
            'name' => 'Imóveis',
            'url' => '#',
            'icon' => 'fas fa-building',
            'submenu' => [
                [
                    'name' => 'Imóveis',
                    'url' => '/admin/property',
                ],
                [
                    'name' => 'Tipo de Ofertas',
                    'url' => '/admin/offer-type',
                ],
                [
                    'name' => 'Tipo de Imóveis',
                    'url' => '/admin/property-type',
                ],
                [
                    'name' => 'Características',
                    'url' => '/admin/feature',
                ],
            ]
        ],
        [
            'name' => 'Categorias',
            'url' => '/admin/category',
            'icon' => 'fas fa-list'
        ],
        [
            'name' => 'Empreendimentos',
            'url' => '/admin/enterprise',
            'icon' => 'far fa-building'
        ],        
        [
            'name' => 'Blog',
            'url' => '/admin/post',
            'icon' => 'fas fa-tags'
        ],
        [
            'name' => 'Corretores',
            'url' => '/admin/broker',
            'icon' => 'fas fa-users'
        ],
        [
            'name' => 'Banners',
            'url' => '/admin/banner',
            'icon' => 'fas fa-th-large'
        ],
        [
            'name' => 'Formulários',
            'url' => '#',
            'icon' => 'fas fa-envelope',
            'submenu' => [
                [
                    'name' => 'Imóveis',
                    'url' => '/admin/property-contact',
                ],
                [
                    'name' => 'Contato',
                    'url' => '/admin/contact',
                ],
            ]
        ],
        [
            'name' => 'Usuários',
            'url' => '/admin/user',
            'icon' => 'fas fa-user'
        ],
        [
            'name' => 'Configurações',
            'url' => '#',
            'icon' => 'fas fa-cog',
            'submenu' => [
                [
                    'name' => 'Configurações',
                    'url' => '/admin/setting',
                ],
                [
                    'name' => 'Tipo de Banners',
                    'url' => '/admin/banner-type',
                ],
            ]
        ],
        [
            'name' => 'Sair',
            'url' => '/admin/logout',
            'icon' => 'fas fa-sign-out-alt'
        ]
    ]
];