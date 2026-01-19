<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebRoutesTest extends TestCase
{
    public function test_home_page_returns_ok()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_apply_requires_auth_redirects()
    {
        $response = $this->get('/apply');
        $response->assertRedirect('/login');
    }

    public function test_add_requires_auth_redirects()
    {
        $response = $this->get('/add');
        $response->assertRedirect('/login');
    }

    public function test_token_login_page_returns_ok()
    {
        $response = $this->get('/token/login');
        $response->assertStatus(200);
    }

    public function test_token_index_requires_auth_redirects()
    {
        $response = $this->get('/token');
        $response->assertRedirect('/token/login');
    }
}
