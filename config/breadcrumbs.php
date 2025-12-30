<?php

return [

    'sessions' => [
        'index' => [
            ['label' => 'Dashboard', 'route' => 'home'],
            ['label' => 'Sessions'],
        ],

        'create' => [
            ['label' => 'Dashboard', 'route' => 'home'],
            ['label' => 'Sessions', 'route' => 'sessions.index'],
            ['label' => 'Add Session'],
        ],

        'edit' => [
            ['label' => 'Dashboard', 'route' => 'home'],
            ['label' => 'Sessions', 'route' => 'sessions.index'],
            ['label' => 'Edit Session'],
        ],
    ],

];
