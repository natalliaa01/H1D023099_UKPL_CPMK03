<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DebugLoginTest extends DuskTestCase
{
    public function test_debug_login_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->pause(2000)
                    ->screenshot('login-debug');
        });
    }
}
