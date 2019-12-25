<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_should_save_data()
    {
        $userData = factory(User::class)->raw();
        $postData = array_merge($userData, [
            'iban' => random_int(100, 9999),
            'account_owner' => 'John Doe'
        ]);

        $response = $this->post('/api/store', $postData);

        $response->assertStatus(201);
        $this->assertEquals('success', $response->json('status'));
        $this->assertArrayHasKey('paymentDataId', $response->json('data'));
    }
}
