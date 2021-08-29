<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class NewsTest extends TestCase
{

    public function test_a_basic_request()
    {
        $response = $this->get('/api/news');

        $response->assertStatus(200);
    }

    public function test_no_admin_access()
    {
        $response = $this->get('/api/admin/news');
        $response->assertStatus(403);
    }

}
