<?php

/** @codingStandardsIgnoreStart */

declare(strict_types=1);

namespace App;

use Siler\Swoole;
use function Siler\Functional\puts;



$basedir = __DIR__;
require_once "$basedir/vendor/autoload.php";

$echo = function ($frame) {
    Swoole\push("ini data ".($frame->data), $frame->fd);
};

Swoole\websocket_hooks([
    'open' => puts("New connection\n"),
    'close' => puts("Someone leaves\n")
]);

Swoole\websocket($echo, $port=9503)->start();
