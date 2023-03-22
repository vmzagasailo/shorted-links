<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ShortLinkTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_link_generate(): void
    {
        $response = $this->get('/links');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_send_form_link_generate()
    {
        $url = "https://google.com";
        $response = $this->post('/links', ['url' => $url]);

        $response->assertStatus(Response::HTTP_CREATED);
    }
}
