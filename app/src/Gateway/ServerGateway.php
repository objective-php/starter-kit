<?php


namespace Project\Gateway;


class ServerGateway
{

    public function getServerInfo()
    {
        return $_SERVER;
    }
}