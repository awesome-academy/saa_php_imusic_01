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
        'default_image' => 'song.png',
    ],
    'album' => [
        'commentable_type' => 'App\Models\Album',
        'default_image' => 'album.png'
    ],
    'artist' => [
        'default_image' => 'v55.jpg'
    ],
    'storage' => [
        'song' => 'web/media',
        'image' => 'web/images',
    ]
];
