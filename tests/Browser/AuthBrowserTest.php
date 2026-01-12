<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthBrowserTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_login_page_shows_welcome()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitForText('Welcome back!')
                    ->assertSee('Welcome back!')
                    ->assertTitleContains('Welcome Back - Login');
        });
    }

    public function test_register_page_shows_register_link()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register');
        });
    }
}
