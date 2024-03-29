<?php

/**
 * -----------------------------------------------------------------------------
 * Generated 2020-11-02T15:18:30+08:00
 *
 * DO NOT EDIT THIS FILE DIRECTLY
 *
 * @item      files.allowed_types
 * @group     conversations
 * @namespace null
 * -----------------------------------------------------------------------------
 */
return [
    'attachments_enabled' => false,
    'subscription_enabled' => false,
    'files' => [
        'allowed_types' => '*.jpg;*.gif;*.jpeg;*.png;*.doc;*.docx;*.zip',
        'guest' => [
            'max_size' => 1,
            'max' => 3,
        ],
        'registered' => [
            'max_size' => 10,
            'max' => 5,
        ],
    ],
];
