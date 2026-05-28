<?php

return [
    'show_warnings' => false,
    'orientation' => 'portrait',
    'defines' => [],
    'options' => [
        'isRemoteEnabled' => false,
        'isHtml5ParserEnabled' => true,
        'isFontSubsettingEnabled' => true,
        'defaultFont' => 'sans-serif',
        'fontDir' => storage_path('fonts/'),
        'fontCache' => storage_path('fonts/'),
        'tempDir' => sys_get_temp_dir(),
        'chroot' => realpath(base_path()),
    ],
];