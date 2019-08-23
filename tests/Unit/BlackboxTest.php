<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Toolchain\User;


class BlackboxTest extends TestCase
{

    public function testCreateServiceWithMiddleware() {
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

    protected function setProperty($obj, $prop, $value): void
    {
        $reflection = new \ReflectionClass($obj);
        $property   = $reflection->getProperty($prop);
        $property->setAccessible(true);
        $property->setValue($obj, $value);
    }

    public function testCreateService() {
        $data = [
            'title' => 'Youtube',
            'description' => 'Youtube ist ein Video-Streaming-Dienst',
            'url' => 'https://www.youtube.com',
            'slug' => 'youtube',
            'icon' => 'http://icons.iconarchive.com/icons/dakirby309/simply-styled/64/YouTube-icon.png',
            'category' => 'Socialmedia'
        ];

        $userData = [
            'name' => 'Nicole Konopelski III',
            'email' => 'hlittle@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => 'wdYs0QH2RR',
        ];

        $user = new User();
        $this->setProperty($user, 'original', $userData);


        $response = $this->actingAs($user)->json('POST', '/service/create', $data);
        $response->assertStatus(200);
    }

}
