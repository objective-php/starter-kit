<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 04/09/2017
 * Time: 15:00
 */

namespace Project\WebSocket;


use Hoa\Event\Bucket;
use Hoa\Websocket\Server;

class WsListener
{
    public function onChat($params, Bucket $bucket, Server $server)
    {
        $bucket->getSource()->send($params['message']);
    }
}