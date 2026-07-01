<?php

use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

if (getenv('VERCEL') && getenv('DB_CONNECTION') === 'sqlite') {
    $database = getenv('DB_DATABASE') ?: '/tmp/database.sqlite';
    $seeded = $database.'.seeded';

    if (! is_dir(dirname($database))) {
        mkdir(dirname($database), 0755, true);
    }

    if (! is_dir('/tmp/views')) {
        mkdir('/tmp/views', 0755, true);
    }

    if (! file_exists($database)) {
        touch($database);

        $kernel = $app->make(ConsoleKernel::class);
        $kernel->call('migrate', ['--force' => true]);
    }

    if (! file_exists($seeded)) {
        $kernel ??= $app->make(ConsoleKernel::class);
        $kernel->call('db:seed', ['--force' => true]);
        touch($seeded);
    }
}

$app->handleRequest(Request::capture());
