<?php

namespace Wvandeweyer\Flash\Tests;

use BadMethodCallException;
use Illuminate\Support\Facades\Config;
use Livewire\Livewire;
use Wvandeweyer\Flash\Livewire\FlashMessage;

class LivewireFlashTest extends LivewireTestCase
{
    /**
     * @test
     *
     * @dataProvider notificationTypes
     */
    public function it_can_set_the_level_to_the_correct_type($type)
    {
        flash()->$type('test');

        Livewire::test(FlashMessage::class)
        ->assertSet('level', $type);
    }

    /**
     * @test
     *
     * @dataProvider notificationTypes
     */
    public function it_can_diplay_a_message_stored_in_the_session($type)
    {
        flash()->$type('test');

        Livewire::test(FlashMessage::class)
            ->assertSet('content', 'test')
            ->assertSee('test');
    }

    /**
     * @test
     *
     * @dataProvider notificationTypes
     */
    public function it_can_be_dismissed($type)
    {
        flash()->$type('test')->dismissable();

        Livewire::test(FlashMessage::class)
            ->assertSet('dismissable', true)
            ->assertSee('Dismiss');
    }

    /**
     * @test
     *
     * @dataProvider notificationTypes
     */
    public function it_cannot_be_dismissed($type)
    {
        flash()->$type('test')->dismissable(false);

        Livewire::test(FlashMessage::class)
            ->assertSet('dismissable', false)
            ->assertDontSee('Dismiss');
    }

    /**
     * @test
     */
    public function an_unknown_level_triggers_an_exception()
    {
        $this->expectException(BadMethodCallException::class);
        flash()->unkown('test');
    }

    /**
     * @test
     */
    public function it_is_dismissable_by_default()
    {
        flash()->success('test');

        Livewire::test(FlashMessage::class)
            ->assertSet('dismissable', true)
            ->assertSee('Dismiss');
    }

    /**
     * @test
     */
    public function it_can_change_the_default_dismissability_via_the_config()
    {
        Config::set('flash.defaults.dismissable', false);

        flash()->success('test');

        Livewire::test(FlashMessage::class)
            ->assertSet('dismissable', false)
            ->assertDontSee('Dismiss');
    }
}
