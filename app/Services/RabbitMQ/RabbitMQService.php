<?php

namespace App\Services\RabbitMQ;

use Exception;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;

    /**
     * RabbitMQService constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->initializeConnection();
    }

    /**
     * Initialize the RabbitMQ connection.
     *
     * @throws Exception
     */
    private function initializeConnection()
    {
        $host = config("rabbitmq.default.host");
        $port = config("rabbitmq.default.port");
        $user = config("rabbitmq.default.user");
        $pass = config("rabbitmq.default.pass");
        $vhost = config("rabbitmq.default.vhost");

        $this->connection = new AMQPStreamConnection($host, $port, $user, $pass, $vhost);
        $this->channel = $this->connection->channel();

        $this->declareExchangeAndQueue();
    }

    /**
     * Declare the exchange and queue.
     */
    private function declareExchangeAndQueue()
    {
        $exchangeName = 'exchange';
        $queueName = 'queue';
        $routingKey = 'key';

        $this->channel->exchange_declare($exchangeName, 'direct', false, false, false);
        $this->channel->queue_declare($queueName, false, false, false, false);
        $this->channel->queue_bind($queueName, $exchangeName, $routingKey);
    }

    /**
     * Close the connection when the object is destroyed.
     */
    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }

    /**
     * Publish a message to RabbitMQ.
     *
     * @param string $message
     * @param string $exchange
     * @param string $routingKey
     */
    public function publish(string $message, string $exchange = 'exchange', string $routingKey = 'key'): void
    {
        $msg = new AMQPMessage($message);
        $this->channel->basic_publish($msg, $exchange, $routingKey);
        echo " [x] Sent $message to $exchange / $routingKey.\n";
    }

    /**
     * Consume messages from RabbitMQ.
     *
     * @param string $exchange
     * @param string $routingKey
     */
    public function consume(string $exchange = 'exchange', string $routingKey = 'key'): void
    {
        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };

        $this->channel->basic_consume('queue', '', false, true, false, false, $callback);
        echo "Waiting for new message on $exchange / $routingKey \n";

        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }
    }
}
