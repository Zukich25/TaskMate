<?php

// Vercel Serverless entry point for Laravel
// Prepare writable directories in /tmp
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache',
    '/tmp/storage/logs',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Ensure database is available and writable in /tmp
$tmpDb = '/tmp/database.sqlite';
if (!file_exists($tmpDb)) {
    $srcDb = __DIR__ . '/../database/database.sqlite';
    if (file_exists($srcDb)) {
        copy($srcDb, $tmpDb);
    } else {
        touch($tmpDb);
    }
}

// Set runtime environment variables for Vercel Serverless
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('SESSION_DRIVER=cookie');
putenv('CACHE_STORE=array');
putenv('LOG_CHANNEL=stderr');
putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE=/tmp/database.sqlite');
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');

if (!getenv('APP_KEY')) {
    putenv('APP_KEY=base64:f/HvyAMGUPy/TsFFamQgG/vEJxcVDi78ybOog6xGwhQ=');
}

// Forward request to Laravel's public entrypoint
require __DIR__ . '/../public/index.php';
