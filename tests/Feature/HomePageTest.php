<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_homepage_loads_successfully()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
