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
use ObjectivePHP\Package\WebSocketServer\WsServerWrapper;
use ObjectivePHP\ServicesFactory\Specs\InjectionAnnotationProvider;

class WsListener
{

    /**
     * @Inject(service="dep")
     */
    protected $dep;


    public function onSendMessage($params, WsServerWrapper $wsServer)
    {
        $wsServer->reply('feedback', ['message' => 'You said: ' . $params['message']]);
    }

}