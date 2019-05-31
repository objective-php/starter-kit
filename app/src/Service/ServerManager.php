<?php


namespace Project\Service;


use Project\Gateway\ServerGateway;

class ServerManager
{

    /** @var ServerGateway */
    protected $serverGateway;

    /**
     * ServerManager constructor.
     * @param ServerGateway $serverGateway
     */
    public function __construct(ServerGateway $serverGateway)
    {
        $this->serverGateway = $serverGateway;
    }


    public function getServerInfo()
    {
        $info = $this->serverGateway->getServerInfo();

        unset($info['PHP_SELF']);

        return $info;
    }

}