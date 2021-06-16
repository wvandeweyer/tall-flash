<?php

namespace Wvandeweyer\Flash\Tests;

use NunoMaduro\LaravelMojito\InteractsWithViews;

class BladeComponentTest extends TestCase
{
    use InteractsWithViews;

    /**
     * @test
     *
     * @dataProvider notificationTypes
     */
    public function it_displays_the_message_content($type)
    {
        $content = 'Hello World';

        flash()->$type($content);
        $this->assertView('flash::flash-message')->contains($content);
    }

    /** @test */
    public function it_displays_the_dismiss_icon_if_dismissible()
    {
        $content = 'Hello World';

        flash()->success($content)->dismissable();
        $this->assertView('flash::flash-message')->contains('Dismiss');
    }
}
