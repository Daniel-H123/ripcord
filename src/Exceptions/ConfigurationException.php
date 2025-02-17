<?php

namespace Danielh\Ripcord\Exceptions;

use Danielh\Ripcord\Contracts\RipcordException;
use Exception;

/**
 * This class is used whenever prerequisite requirements are not met.
 * - ripcord::xmlrpcNotInstalled (-5) PHP XMLRPC library is not installed - Thrown by the ripcord server and client when the xmlrpc library is not installed.
 */
class ConfigurationException extends Exception implements RipcordException {}
