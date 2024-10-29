<?php
return [
    'available_permissions' => [
        [
            'name' => 'user.viewAny',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'user.view',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'user.create',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'user.update',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'user.delete',
            'roles' => ['super-admin'],
        ],

        // criteria
        [
            'name' => 'criteria.viewAny',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'criteria.view',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'criteria.create',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'criteria.update',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'criteria.delete',
            'roles' => ['super-admin'],
        ],

        // status
        [
            'name' => 'status.viewAny',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'status.view',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'status.create',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'status.update',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'status.delete',
            'roles' => ['super-admin'],
        ],

        // loan
        [
            'name' => 'loan.viewAny',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loan.view',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loan.create',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loan.update',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loan.delete',
            'roles' => ['super-admin', 'admin'],
        ],

        // loanweight
        [
            'name' => 'loanweight.viewAny',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loanweight.view',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loanweight.create',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loanweight.update',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loanweight.delete',
            'roles' => ['super-admin', 'admin'],
        ],

        // customer
        [
            'name' => 'customer.viewAny',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'customer.view',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'customer.create',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'customer.update',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'customer.delete',
            'roles' => ['super-admin'],
        ],
    ],
    'max_login_attempt' => 3,
];
