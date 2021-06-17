<?php

namespace Wvandeweyer\Flash\Tests;

use BadMethodCallException;
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
    public function it_can_diplay_the_correct_message_level($type)
    {
        $styles = config('flash.styles.' . $type);
        flash()->$type('test');

        Livewire::test(FlashMessage::class)
            ->assertSet('level', $type)
            ->assertSee($styles['bg-color'])
            ->assertSee($styles['text-color']);
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
            ->assertSet('level', $type)
            ->assertSee('Dismiss');
    }

    /**
     * @test
     *
     * @dataProvider notificationTypes
     */
    public function it_cannot_be_dismissed($type)
    {
        flash()->$type('test');

        Livewire::test(FlashMessage::class)
            ->assertSet('level', $type)
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
}
