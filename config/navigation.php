<?php

return [
    [
        'title' => 'Bảng thông tin',
        'icon' => 'fa fa-fw fa-home',
        'name' => 'admin.index',
        'url' => '/admin',
        'permission' => '*'
    ],
    [
        'title' => 'Tài khoản',
        'icon' => 'fa fa-fw fa-users',
        'name' => 'admin.users',
        'permission' => 'users',
        'children' => [
            [
                'title' => 'Tài khoản',
                'url' => '/admin/users',
                'permission' => 'users.index'
            ],
            [
                'title' => 'Nhóm tài khoản',
                'url' => '/admin/users/groups',
                'permission' => 'users.groups.index'
            ],
        ]
    ]
];
