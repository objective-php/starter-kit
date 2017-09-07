<?php
/**
 * Created by PhpStorm.
 * User: gde
 * Date: 04/09/2017
 * Time: 15:00
 */

namespace Project\WebSocket;


use ObjectivePHP\Package\WebSocketServer\WsServerWrapper;

class WsListener
{

    public function onSendMessage($data, WsServerWrapper $wsServer)
    {
        $wsServer->reply('feedback', ['message' => 'You said: ' . $data['message']]);
        $wsServer->broadcastOthers('feedback', ['message' => $wsServer->getCurrentClient()->getIdentifier() . ' said: "' . $data['message'] .'"']);
    }

    public function onSendMessageTo($data, WsServerWrapper $wsServer)
    {
        $wsServer->reply('feedback', ['message' => 'You said "' . $data['message'] . '" to <i>' . $data['recipient'] . '</i>']);
        $wsServer->sendTo($data['recipient'], 'feedback', ['message' => $wsServer->getCurrentClient()->getIdentifier() . ' said : "' . $data['message'] . '" to you.']);
    }

}