<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlackboxTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateServiceWithMiddleware()
    {
            $data = [
                'title' => 'Youtube',
                'description' => 'Youtube ist ein Video-Streaming-Dienst',
                'url' => 'https://www.youtube.com',
                'slug' => 'youtube',
                'icon' => 'http://icons.iconarchive.com/icons/dakirby309/simply-styled/64/YouTube-icon.png',
                'category' => 'Socialmedia'
            ];

        $response = $this->json('POST', '/service/create', $data);
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Unauthenticated.']);

    }
}
