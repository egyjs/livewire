<?php

namespace Tests\Browser\DetectMultipleRootElements;

use Livewire\Livewire;
use Tests\Browser\TestCase;

class Test extends TestCase
{
    /** @test */
    public function it_throws_a_console_error_when_multiple_root_elements_are_found()
    {
        $this->browse(function ($browser) {
            Livewire::visit($browser, ComponentWithMultipleRootElements::class)
                ->assertConsoleLogHasWarning('Multiple root elements detected')
                ;
        });
    }

    /** @test */
    public function it_does_not_throw_a_console_error_when_there_is_a_html_comment_and_then_a_single_element()
    {
        $this->browse(function ($browser) {
            Livewire::visit($browser, ComponentWithCommentAsFirstElement::class)
                ->assertConsoleLogMissingWarning('Multiple root elements detected')
                ;
        });
    }
}
