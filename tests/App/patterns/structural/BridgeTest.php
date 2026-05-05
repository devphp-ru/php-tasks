<?php

declare(strict_types=1);

namespace App\patterns\structural;

use App\patterns\structural\Bridge\V1\HelloWorldService;
use App\patterns\structural\Bridge\V1\HtmlFormatter;
use App\patterns\structural\Bridge\V1\PlainTextFormatter;
use PHPUnit\Framework\TestCase;

class BridgeTest extends TestCase
{

    public function test_can_print_using_the_plain_text_formatter(): void
    {
        $service = new HelloWorldService(new PlainTextFormatter());

        $this->assertSame('Hello world', $service->get());
    }

    public function test_can_print_using_the_html_formatter(): void
    {
        $service = new HelloWorldService(new HtmlFormatter());

        $this->assertSame('<p>Hello world</p>', $service->get());
    }

}
