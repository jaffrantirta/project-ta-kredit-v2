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
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'criteria.view',
            'roles' => ['super-admin'],
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
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'status.view',
            'roles' => ['super-admin'],
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
            'roles' => ['super-admin', 'admin', 'customer'],
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

        // customer
        [
            'name' => 'customer.viewAny',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'customer.view',
            'roles' => ['super-admin', 'admin', 'customer'],
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

        // subcriteria
        [
            'name' => 'subcriteria.viewAny',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'subcriteria.view',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'subcriteria.create',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'subcriteria.update',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'subcriteria.delete',
            'roles' => ['super-admin'],
        ],

        // subcriteriaoption
        [
            'name' => 'subcriteriaoption.viewAny',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'subcriteriaoption.view',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'subcriteriaoption.create',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'subcriteriaoption.update',
            'roles' => ['super-admin'],
        ],
        [
            'name' => 'subcriteriaoption.delete',
            'roles' => ['super-admin'],
        ],

        // loanapplicationscore
        [
            'name' => 'loanapplicationscore.viewAny',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loanapplicationscore.view',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loanapplicationscore.create',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loanapplicationscore.update',
            'roles' => ['super-admin', 'admin'],
        ],
        [
            'name' => 'loanapplicationscore.delete',
            'roles' => ['super-admin'],
        ],
    ],
    'max_login_attempt' => 3,
];
