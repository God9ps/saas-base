<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
        'create_new_user' => 'Create New User',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'title'                 => 'Title',
            'title_helper'          => '',
            'stripe_plan_id'        => 'Stripe Plan ID',
            'stripe_plan_id_helper' => '',
            'price'                 => 'Price',
            'price_helper'          => '',
            'permissions'           => 'Permissions',
            'permissions_helper'    => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'phone_number'             => 'Phone Number',
            'phone_number_helper'      => 'The phone number must have the country calling code in the beggining (Eg: +34 961 267 478)',
            'email'                    => 'Email',
            'email_helper'             => '',
            'address'                  => 'Address 1',
            'address_helper'           => '',
            'address2'                 => 'Address 2',
            'address_helper2'          => '',
            'postcode'                 => 'Postal Code',
            'postcode_helper'          => '',
            'city'                     => 'City',
            'city_helper'              => '',
            'country'                  => 'Country',
            'country_helper'           => '',
            'select_country'           => 'Select Country',
            'select_country_helper'    => '',
            'is_admin'                 => 'Turn Admin',
            'is_admin_helper'          => 'Admins will have managment permission in this app.',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'choose_avatar'            => 'Choose Avatar',
            'choose_avatar_helper'     => '',
            'change_avatar'            => 'Change Avatar',
            'change_avatar_helper'     => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'updated_success'          => 'User updated with success',
        ],
    ],
    'country'        => [
        'title'          => 'Countries',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'short_code'        => 'Short Code',
            'short_code_helper' => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'project'        => [
        'title'          => 'Projects',
        'title_singular' => 'Project',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'subdomain'         => 'Subdomain',
            'name_helper'       => '',
            'subdomain_helper'  => 'Your subdomain must have max of 10 characters, no spaces, signs or caps',
            ],
        'database' => [
            'created_error' => 'Error creating database'
        ]
    ],
];
