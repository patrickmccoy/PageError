<?php
/**
 * PageError Class
 * Custom PHP error pages
 */

class PageError {
    private $codes = array(
          400
        , 404
        , 500
    )
    
    public static function show($code, $uri) {
        if (in_array($code, self::$codes)) {
            echo 'Error code '. $code .' for url: '. $uri;
        } else {
            echo 'No error!';
        }
    }
}