<?php
return [
    'available_permissions' => [
        [
            'name' => 'user.viewAny',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'user.view',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'user.create',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'user.update',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'user.delete',
            'roles' => ['kabagkredit'],
        ],
        // criteria
        [
            'name' => 'criteria.viewAny',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'criteria.view',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'criteria.create',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'criteria.update',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'criteria.delete',
            'roles' => ['kabagkredit'],
        ],
        // status
        [
            'name' => 'status.viewAny',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'status.view',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'status.create',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'status.update',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'status.delete',
            'roles' => ['kabagkredit'],
        ],
        // loan
        [
            'name' => 'loan.viewAny',
            'roles' => ['kabagkredit', 'admin'],
        ],
        [
            'name' => 'loan.view',
            'roles' => ['kabagkredit', 'admin', 'customer'],
        ],
        [
            'name' => 'loan.create',
            'roles' => ['kabagkredit', 'admin'],
        ],
        [
            'name' => 'loan.update',
            'roles' => ['kabagkredit', 'admin'],
        ],
        [
            'name' => 'loan.delete',
            'roles' => ['kabagkredit', 'admin'],
        ],
        // customer
        [
            'name' => 'customer.viewAny',
            'roles' => ['kabagkredit', 'admin', 'customer'],
        ],
        [
            'name' => 'customer.view',
            'roles' => ['kabagkredit', 'admin', 'customer'],
        ],
        [
            'name' => 'customer.create',
            'roles' => ['kabagkredit', 'admin', 'customer'],
        ],
        [
            'name' => 'customer.update',
            'roles' => ['kabagkredit', 'admin', 'customer'],
        ],
        [
            'name' => 'customer.delete',
            'roles' => ['kabagkredit'],
        ],
        // subcriteria
        [
            'name' => 'subcriteria.viewAny',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'subcriteria.view',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'subcriteria.create',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'subcriteria.update',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'subcriteria.delete',
            'roles' => ['kabagkredit'],
        ],
        // subcriteriaoption
        [
            'name' => 'subcriteriaoption.viewAny',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'subcriteriaoption.view',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'subcriteriaoption.create',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'subcriteriaoption.update',
            'roles' => ['kabagkredit'],
        ],
        [
            'name' => 'subcriteriaoption.delete',
            'roles' => ['kabagkredit'],
        ],
        // loanapplicationscore
        [
            'name' => 'loanapplicationscore.viewAny',
            'roles' => ['kabagkredit', 'admin'],
        ],
        [
            'name' => 'loanapplicationscore.view',
            'roles' => ['kabagkredit', 'admin'],
        ],
        [
            'name' => 'loanapplicationscore.create',
            'roles' => ['kabagkredit', 'admin'],
        ],
        [
            'name' => 'loanapplicationscore.update',
            'roles' => ['kabagkredit', 'admin'],
        ],
        [
            'name' => 'loanapplicationscore.delete',
            'roles' => ['kabagkredit'],
        ],
    ],
    'max_login_attempt' => 3,
];
