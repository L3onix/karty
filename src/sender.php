<?php
require_once __DIR__.'/../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

// Configurações da conexão AMQP
$host = 'localhost';
$port = 5672;
$user = 'guest';
$pass = 'guest';
$exchange = 'amqp.direct';
$routingKey = 'test';

// Cria uma conexão AMQP
$connection = new AMQPStreamConnection($host, $port, $user, $pass);

// Cria um canal AMQP
$channel = $connection->channel();

// Declara um exchange para enviar a mensagem
$channel->exchange_declare($exchange, 'direct', false, false, false);

// Cria uma mensagem
$messageBody = 'Minha mensagem';
$message = new AMQPMessage($messageBody);

// Publica a mensagem no exchange com a routing key especificada
$channel->basic_publish($message, $exchange, $routingKey);

echo "Mensagem enviada: $messageBody\n";

// Fecha o canal e a conexão
$channel->close();
$connection->close();