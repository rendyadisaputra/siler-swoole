<?php

/** @codingStandardsIgnoreStart */

declare(strict_types=1);

namespace App;

use App\Todo\InMemoryTodos;
use function Siler\Encoder\Json\decode;
use function Siler\Env\env_int;
use function Siler\GraphQL\execute;
use function Siler\GraphQL\schema;
use function Siler\Http\Request\raw;
use function Siler\Swoole\http;
use function Siler\Swoole\json;

use Siler\Functional as AppSiler; // Just to be cool, don't use non-ASCII identifiers ;)
use Siler\Route;

$basedir = __DIR__;
require_once "$basedir/vendor/autoload.php";

 
Route\get('/',  AppSiler\puts("HELLO SIR sd"));
