<?php

use OpenSwoole\Http\Server;
use OpenSwoole\Http\Request;
use OpenSwoole\Http\Response;

$server = new Server("0.0.0.0", 9501);
$server->on("start", function (Server $server) {
  echo "Open Swoole: servidor inicializado em 0.0.0.0:9501\n";
});

$server->on("request", function (Request $request, Response $response) {
  $response->header("Content-Type", "text/plain");
  $response->end("Hello World!");
});

$server->start();
