<?php

namespace Wvandeweyer\Flash\Tests;

use Wvandeweyer\Flash\Tests\TestCase;

class FlashTest extends TestCase
{
    /**
     * @test
     *
     * @dataProvider notificationTypes
     */
    public function it_can_set_the_level_to_the_correct_type($type)
    {
        flash()->$type('test')->echo();

        $this->assertEquals($type, flash()->level);
    }

    /**
     * @test
     *
     * @dataProvider notificationTypes
     */
    public function the_type_can_hold_a_message($type)
    {
        flash()->$type('hello world')->echo();

        $this->assertEquals('hello world', flash()->content);
    }
}
