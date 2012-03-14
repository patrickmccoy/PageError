<?php
/**
 * PageError Class
 * Custom PHP error pages
 */

class PageError {

    /**
     * List of all known HTTP response codes - used to
     * translate numeric codes to messages.
     *
     * @var array
     */
    protected static $messages = array(
        // Informational 1xx
        100 => 'Continue',
        101 => 'Switching Protocols',

        // Success 2xx
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',

        // Redirection 3xx
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',  // 1.1
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        // 306 is deprecated but reserved
        307 => 'Temporary Redirect',

        // Client Error 4xx
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',

        // Server Error 5xx
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        509 => 'Bandwidth Limit Exceeded'
    );

    /**
     * List of all acceptable HTTP response codes - used to
     * check the passed error code is handled by the class
     *
     * @var array
     */
    public static $codes = array(
          400
        , 401
        , 402
        , 403
        , 404
        , 405
        , 406
        , 410
        , 500
        , 501
        , 502
        , 503
        , 509
    );

    /**
     * Send a text error code
     *
     * @param $code - the error code to send
     * @param $uri - the uri which generated the error code
     * @param $message - the message to send with the response, @default false
     */
    public static function show($code, $uri) {
        if (in_array($code, self::$codes)) {
            echo 'Error code '. $code .' ('. self::$messages[$code] .') for url: '. $uri;
        } else {
            echo 'No error!';
        }
    }

    /**
     * Send a JSON object error code
     *
     * @param $code - the error code to send
     * @param $uri - the uri which generated the error code
     * @param $details - the detailed message to send with the response, @default false
     * @return string - the error code packaged into a json object
     */
    public static function returnJSON($code, $uri, $details = false) {
        return json_encode(self::returnArray($code, $uri, $details));
    }

    /**
     * Return an array with error code
     *
     * @param $code - the error code to send
     * @param $uri - the uri which generated the error code
     * @param $details - the detailed message to send with the response, @default false
     * @return array - the error code packaged into a array
     */
    public static function returnArray($code, $uri, $details = false) {
        $response = array();
        if (in_array($code, self::$codes)) {
            $response['code'] = $code;
            $response['msg'] = self::$messages[$code];
            $response['uri'] = $uri;
            $response['details'] = ($details && is_string($details)) ? $details : $details;
        }

        return $response;
    }
}