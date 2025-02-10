<?php

namespace App\Ripcord\Exceptions;

use App\Ripcord\Contracts\RipcordException;
use RuntimeException;

/**
 * This class is used whenever something goes wrong in sending / receiving data. Possible exceptions thrown are:
 * - ripcord::cannotAccessURL (-4) Could not access {url} - Thrown by the transport object when unable to access the given url.
 */
class TransportException extends RuntimeException implements RipcordException {}
