<?php

namespace App\Ripcord\Contracts;

/**
 * This interface defines the minimum methods any documentor needs to implement.
 */
interface IDocumentor
{
    public function setMethodData($methods);

    public function handle($rpcServer);

    public function getIntrospectionXML();
}
