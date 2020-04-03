<?php
/**
 * ScandiPWA_EmailFix
 *
 * @category    Scandiweb
 * @package     ScandiPWA_EmailFix
 * @author      Vadims Petrovs <info@scandiweb.com>
 * @copyright   Copyright (c) 2020 Scandiweb, Ltd (https://scandiweb.com)
 */

namespace ScandiPWA\EmailFix\Mail\Test\Unit;

/**
 * test \ScandiPWA\EmailFix\Mail\Message
 */
class MessageTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \ScandiPWA\EmailFix\Mail\Message
     */
    protected $message;

    protected function setUp()
    {
        $this->message = new \ScandiPWA\EmailFix\Mail\Message();
    }

    public function testSetBodyHtml()
    {
        $this->message->setBodyHtml('body');

        $part = $this->message->getBody()->getParts()[0];
        $this->assertEquals('text/html', $part->getType());
        $this->assertEquals('quoted-printable', $part->getEncoding());
        $this->assertEquals('utf-8', $part->getCharset());
        $this->assertEquals('body', $part->getContent());
    }

    public function testSetBodyText()
    {
        $this->message->setBodyText('body');

        $part = $this->message->getBody()->getParts()[0];
        $this->assertEquals('text/plain', $part->getType());
        $this->assertEquals('quoted-printable', $part->getEncoding());
        $this->assertEquals('utf-8', $part->getCharset());
        $this->assertEquals('body', $part->getContent());
    }
}
