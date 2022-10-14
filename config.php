<?php

return [
    'production' => false,
    'baseUrl' => 'https://artisanstatic.netlify.app',
    'site' => [
        'title' => 'Jhon Céspedes - Blog',
        'description' => 'Personal blog of John Doe.',
        'image' => 'default-share.png',
    ],
    'owner' => [
        'name' => 'Jhon Céspedes',
    ],
    'links' => [
        'linkedin' => 'https://twitter.com/johndoe',
        'github' => 'https://github.com/johndoe',
    ],
    'services' => [
        'cmsVersion' => '~2.10',
        'analytics' => '337400133',
        'disqus' => 'artisanstatic',
        'formcarry' => 'ZpZwhXXqr',
        'cloudinary' => [
            'cloudName' => 'dzgazernc',
            'apiKey' => '749399482711273',
        ],
    ],
    'collections' => [
        'posts' => [
            'path' => 'posts/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
            'hasTag' => function ($page, $tag) {
                return collect($page->tags)->contains($tag);
            },
            'prettyDate' => function ($page, $format = 'M j, Y') {
                return date($format, $page->date);
            },
        ],
        'tags' => [
            'path' => 'tags/{filename}',
            'extends' => '_layouts.tag',
            'section' => '',
            'name' => function ($page) {
                return $page->getFilename();
            },
        ],
    ],
];
