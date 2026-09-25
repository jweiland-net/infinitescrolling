<?php

/*
 * This file is part of the package jweiland/infinitescrolling.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'Infinite Scrolling',
    'description' => 'With this extension you can read nearly every paginator and realize infinite scrolling',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'author_company' => 'jweiland.net',
    'state' => 'stable',
    'version' => '5.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '14.3.0-14.3.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
