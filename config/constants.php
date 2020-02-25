<?php 

return [
    'method' => [
        'create' => 1,
        'update' => 2,
        'delete' => 0,
    ],
    'song' => [
        'commentable_type' => 'App\Models\Song',
        'rateable_type' => 'App\Models\Rate',
    ],
    'album' => [
        'commentable_type' => 'App\Models\Album',
    ],
];
