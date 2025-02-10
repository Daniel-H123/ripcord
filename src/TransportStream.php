<?php

namespace Danielh\Ripcord;

use Danielh\Ripcord\Contracts\Transport;
use Danielh\Ripcord\Exceptions\TransportException;

/**
 * This class implements the Ripcord_Transport interface using PHP streams.
 */
class TransportStream implements Transport
{
    /**
     * A list of stream context options.
     */
    private $options = [];

    /**
     * Contains the headers sent by the server.
     */
    public $responseHeaders = null;

    /**
     * This is the constructor for the Ripcord_Transport_Stream class.
     *
     * @param array $contextOptions Optional. An array with stream context options.
     */
    public function __construct($contextOptions = null)
    {
        if (isset($contextOptions)) {
            $this->options = $contextOptions;
        }
    }

    /**
     * This method posts the request to the given url.
     *
     * @param string $url The url to post to.
     * @param string $request The request to post.
     * @return string The server response
     *
     * @throws TransportException (ripcord::cannotAccessURL) when the given URL cannot be accessed for any reason.
     */
    public function post($url, $request)
    {
        $options = array_merge(
            $this->options,
            [
                'http' => [
                    'method' => 'POST',
                    'header' => 'Content-Type: text/xml',
                    'content' => $request,
                ],
            ]
        );
        $context = stream_context_create($options);
        $result = @file_get_contents($url, false, $context);
        $this->responseHeaders = $http_response_header;
        if (!$result) {
            throw new TransportException('Could not access ' . $url,
                ripcord::cannotAccessURL);
        }

        return $result;
    }
}
