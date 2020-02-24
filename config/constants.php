<?php 

return [
    'method' => [
        'create' => 1,
        'update' => 2,
        'delete' => 0,
    ],
    'song' => [
        'commentable_type' => 'App\Models\Song',
    ],
    'album' => [
        'commentable_type' => 'App\Models\Album',
    ],
];
