<?php

class PageErrorTest extends PHPUnit_Framework_TestCase {

    /**
     * Test the basic functionality of the PageError Class
     */
    public function testPageError() {
        $this->assertClassHasAttribute('codes', 'PageError');
        $this->assertClassHasAttribute('messages', 'PageError');
        $this->assertClassHasStaticAttribute('codes', 'PageError');
        $this->assertClassHasStaticAttribute('messages', 'PageError');
        
    }

    /**
     * Test PageError::show() for 400 errors
     */
    public function testShow400() {
        PageError::show(400, '/');
        $this->expectOutputString('Error code 400 (Bad Request) for url: /');
    }

    /**
     * Test PageError::show() for 401 errors
     */
    public function testShow401() {
        PageError::show(401, '/');
        $this->expectOutputString('Error code 401 (Unauthorized) for url: /');
    }

    /**
     * Test PageError::show() for 402 errors
     */
    public function testShow402() {
        PageError::show(402, '/');
        $this->expectOutputString('Error code 402 (Payment Required) for url: /');
    }

    /**
     * Test PageError::show() for 403 errors
     */
    public function testShow403() {
        PageError::show(403, '/');
        $this->expectOutputString('Error code 403 (Forbidden) for url: /');
    }

    /**
     * Test PageError::show() for 404 errors
     */
    public function testShow404() {
        PageError::show(404, '/');
        $this->expectOutputString('Error code 404 (Not Found) for url: /');
    }

    /**
     * Test PageError::show() for 405 errors
     */
    public function testShow405() {
        PageError::show(405, '/');
        $this->expectOutputString('Error code 405 (Method Not Allowed) for url: /');
    }

    /**
     * Test PageError::show() for 401 errors
     */
    public function testShow406() {
        PageError::show(406, '/');
        $this->expectOutputString('Error code 406 (Not Acceptable) for url: /');
    }

    /**
     * Test PageError::show() for 410 errors
     */
    public function testShow410() {
        PageError::show(410, '/');
        $this->expectOutputString('Error code 410 (Gone) for url: /');
    }

    /**
     * Test PageError::show() for 500 errors
     */
    public function testShow500() {
        PageError::show(500, '/');
        $this->expectOutputString('Error code 500 (Internal Server Error) for url: /');
    }

    /**
     * Test PageError::show() for 501 errors
     */
    public function testShow501() {
        PageError::show(501, '/');
        $this->expectOutputString('Error code 501 (Not Implemented) for url: /');
    }

    /**
     * Test PageError::show() for 502 errors
     */
    public function testShow502() {
        PageError::show(502, '/');
        $this->expectOutputString('Error code 502 (Bad Gateway) for url: /');
    }

    /**
     * Test PageError::show() for 503 errors
     */
    public function testShow503() {
        PageError::show(503, '/');
        $this->expectOutputString('Error code 503 (Service Unavailable) for url: /');
    }

    /**
     * Test PageError::show() for 509 errors
     */
    public function testShow509() {
        PageError::show(509, '/');
        $this->expectOutputString('Error code 509 (Bandwidth Limit Exceeded) for url: /');
    }

    /**
     * Test the PageError::returnJSON() method
     */
    public function testreturnJSON() {
        // test the makeup of the response
        $this->assertNotEmpty(json_decode(PageError::returnJSON(400, '/', 'Test Case'), true));
        $this->assertArrayHasKey('code', json_decode(PageError::returnJSON(400, '/', 'Test Case'), true));
        $this->assertArrayHasKey('uri', json_decode(PageError::returnJSON(400, '/', 'Test Case'), true));
        $this->assertArrayHasKey('msg', json_decode(PageError::returnJSON(400, '/', 'Test Case'), true));
        $this->assertArrayHasKey('details', json_decode(PageError::returnJSON(400, '/', 'Test Case'), true));
        $this->assertCount(4, json_decode(PageError::returnJSON(400, '/', 'Test Case'), true));

        // test the actual response codes
        // 400
        $this->assertEquals(400, json_decode(PageError::returnJSON(400, '/', 'Test Case'))->code);
        $this->assertEquals(401, json_decode(PageError::returnJSON(401, '/', 'Test Case'))->code);
        $this->assertEquals(402, json_decode(PageError::returnJSON(402, '/', 'Test Case'))->code);
        $this->assertEquals(403, json_decode(PageError::returnJSON(403, '/', 'Test Case'))->code);
        $this->assertEquals(404, json_decode(PageError::returnJSON(404, '/', 'Test Case'))->code);
        $this->assertEquals(405, json_decode(PageError::returnJSON(405, '/', 'Test Case'))->code);
        $this->assertEquals(406, json_decode(PageError::returnJSON(406, '/', 'Test Case'))->code);
        $this->assertEquals(410, json_decode(PageError::returnJSON(410, '/', 'Test Case'))->code);
        // 500
        $this->assertEquals(500, json_decode(PageError::returnJSON(500, '/', 'Test Case'))->code);
        $this->assertEquals(501, json_decode(PageError::returnJSON(501, '/', 'Test Case'))->code);
        $this->assertEquals(502, json_decode(PageError::returnJSON(502, '/', 'Test Case'))->code);
        $this->assertEquals(503, json_decode(PageError::returnJSON(503, '/', 'Test Case'))->code);
        $this->assertEquals(509, json_decode(PageError::returnJSON(509, '/', 'Test Case'))->code);

        // test the actual response code messages
        // 400
        $this->assertEquals('Bad Request', json_decode(PageError::returnJSON(400, '/', 'Test Case'))->msg);
        $this->assertEquals('Unauthorized', json_decode(PageError::returnJSON(401, '/', 'Test Case'))->msg);
        $this->assertEquals('Payment Required', json_decode(PageError::returnJSON(402, '/', 'Test Case'))->msg);
        $this->assertEquals('Forbidden', json_decode(PageError::returnJSON(403, '/', 'Test Case'))->msg);
        $this->assertEquals('Not Found', json_decode(PageError::returnJSON(404, '/', 'Test Case'))->msg);
        $this->assertEquals('Method Not Allowed', json_decode(PageError::returnJSON(405, '/', 'Test Case'))->msg);
        $this->assertEquals('Not Acceptable', json_decode(PageError::returnJSON(406, '/', 'Test Case'))->msg);
        $this->assertEquals('Gone', json_decode(PageError::returnJSON(410, '/', 'Test Case'))->msg);
        // 500
        $this->assertEquals('Internal Server Error', json_decode(PageError::returnJSON(500, '/', 'Test Case'))->msg);
        $this->assertEquals('Not Implemented', json_decode(PageError::returnJSON(501, '/', 'Test Case'))->msg);
        $this->assertEquals('Bad Gateway', json_decode(PageError::returnJSON(502, '/', 'Test Case'))->msg);
        $this->assertEquals('Service Unavailable', json_decode(PageError::returnJSON(503, '/', 'Test Case'))->msg);
        $this->assertEquals('Bandwidth Limit Exceeded', json_decode(PageError::returnJSON(509, '/', 'Test Case'))->msg);

        // test the response uris
        $this->assertEquals('/', json_decode(PageError::returnJSON(400, '/', 'Test Case'))->uri);
        $this->assertEquals('/test', json_decode(PageError::returnJSON(400, '/test', 'Test Case'))->uri);
        $this->assertEquals('/test/234', json_decode(PageError::returnJSON(400, '/test/234', 'Test Case'))->uri);
        $this->assertEquals('/test?id=1', json_decode(PageError::returnJSON(400, '/test?id=1', 'Test Case'))->uri);

        // test the response details
        $this->assertEquals('Test Case', json_decode(PageError::returnJSON(400, '/', 'Test Case'))->details);
        $this->assertEquals('Test Case1', json_decode(PageError::returnJSON(400, '/', 'Test Case1'))->details);
        $this->assertEquals('Hello', json_decode(PageError::returnJSON(400, '/', 'Hello'))->details);
        $this->assertEquals('', json_decode(PageError::returnJSON(400, '/'))->details);
    }

    /**
     * Test the PageError::returnArray() method
     */
    public function testreturnArray() {
        // test the makeup of the response
        $this->assertNotEmpty(PageError::returnArray(400, '/', 'Test Case'));
        $this->assertArrayHasKey('code', PageError::returnArray(400, '/', 'Test Case'));
        $this->assertArrayHasKey('uri', PageError::returnArray(400, '/', 'Test Case'));
        $this->assertArrayHasKey('msg', PageError::returnArray(400, '/', 'Test Case'));
        $this->assertArrayHasKey('details', PageError::returnArray(400, '/', 'Test Case'));
        $this->assertCount(4, PageError::returnArray(400, '/', 'Test Case'));

        // test the actual response codes
        $codes = array(
              400 => 'Bad Request'
            , 401 => 'Unauthorized'
            , 402 => 'Payment Required'
            , 403 => 'Forbidden'
            , 404 => 'Not Found'
            , 405 => 'Method Not Allowed'
            , 406 => 'Not Acceptable'
            , 410 => 'Gone'
            , 500 => 'Internal Server Error'
            , 501 => 'Not Implemented'
            , 502 => 'Bad Gateway'
            , 503 => 'Service Unavailable'
            , 509 => 'Bandwidth Limit Exceeded'
        );
        foreach ($codes as $code => $msg) {
            $tmp = PageError::returnArray($code, '/', 'Test Case');
            $this->assertEquals($code, $tmp['code']);
        }

        // test the actual response code messages
        foreach ($codes as $code => $msg) {
            $tmp = PageError::returnArray($code, '/', 'Test Case');
            $this->assertEquals($msg, $tmp['msg']);
        }

        $uris = array(
              '/'
            , '/test'
            , '/test/234'
            , '/test?id=1'
        );
        foreach ($uris as $uri) {
            $tmp = PageError::returnArray(400, $uri, 'Test Case');
            $this->assertEquals($uri, $tmp['uri']);
        }

        // test the response details
        $details = array(
              'Test Case'
            , 'Test Case1'
            , 'Hello'
            , ''
        );
        foreach ($details as $detail) {
            $tmp = PageError::returnArray(400, '/', $detail);
            $this->assertEquals($detail, $tmp['details']);
        }

    }
}
