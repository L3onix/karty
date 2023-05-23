<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Carrega as dependências

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

// Configurações da conexão AMQP
$host = 'localhost';
$port = 5672;
$user = 'guest';
$pass = 'guest';
$queue = 'test';

// Cria uma conexão AMQP
$connection = new AMQPStreamConnection($host, $port, $user, $pass);

// Cria um canal AMQP
$channel = $connection->channel();

// Declara a fila para receber as mensagens
$channel->queue_declare($queue, false, true, false, false);

echo "Aguardando mensagens. Pressione CTRL+C para sair.\n";

// Callback para tratar as mensagens recebidas
$callback = function (AMQPMessage $message) {
    echo 'Mensagem recebida: ' . $message->body . "\n";
};

// Inicia o consumo da fila
$channel->basic_consume($queue, '', false, true, false, false, $callback);

// Aguarda a chegada de mensagens
while ($channel->is_consuming()) {
    $channel->wait();
}

// Fecha o canal e a conexão
$channel->close();
$connection->close();