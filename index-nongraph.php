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

use Siler\Route;
use Siler\Swoole;
use Siler\Twig;
use Siler\Http\Request;
use Siler\Monolog as SilerLoger;

$basedir = __DIR__;
require_once "$basedir/vendor/autoload.php";

$handler = function ($req, $res) {
    
    
    
    Route\get('/', function(){
        SilerLoger\debug( "message", $context = ['acontex', 'test']);
        return Swoole\emit("HELLO SIR");
    });

    Route\route(['post', 'get'], '/todos',function(){
        $body = Request\headers();
        return Swoole\emit(json_encode($body, JSON_PRETTY_PRINT));
    });

    // None of the above short-circuited the response with Swoole\emit().
    Swoole\emit(json_encode(["error"=>"not found"]), 404);
};

Swoole\http($handler, 9502)->start();