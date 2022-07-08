<?php

class VerifyTest extends PHPUnit_Framework_TestCase
{
    public function testValidateSignature()
    {
        $client = new GenieBusinessConnect\Client('foo' , 'bar');
        $this->assertEquals((new \GenieBusinessConnect\Crypt\Verify())->validateSignature(
            $client,
            '458776b3f175e2ae56f65acab1f685c7a1350d79',
            123,
            'EUR'), true);
    }
}
