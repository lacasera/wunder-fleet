<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_save_data()
    {
        $this->withExceptionHandling();

        $userData = factory(User::class)->raw();
        $postData = array_merge($userData, [
            'iban' => (string) random_int(100, 9999)
        ]);

        $response = $this->post('/api/store', $postData);

        $response->assertStatus(201);
        $this->assertEquals('success', $response->json('status'));
        $this->assertArrayHasKey('paymentDataId', $response->json('data'));
    }

    /** @test */
    public function should_fail_if_zip_code_is_missing()
    {
        $userData = factory(User::class)->raw(['zip_code' => '']);

        $postData = array_merge($userData, [
            'iban' => (string) random_int(100, 9999)
        ]);

        $response = $this->post('/api/store', $postData);

        $expected = [
            "status" => "error",
            "data" => [
                "zip_code" => ["The zip code field is required."]
            ]
        ];

        $response->assertStatus(400);
        $this->assertEquals($response->json(), $expected);
    }

    /** @test */
    public function should_fail_if_first_name_is_missing()
    {
        $userData = factory(User::class)->raw(['first_name' => '']);

        $postData = array_merge($userData, [
            'iban' => (string) random_int(100, 9999)
        ]);

        $response = $this->post('/api/store', $postData);

        $expected = [
            "status" => "error",
            "data" => [
                "first_name" => ["The first name field is required."]
            ]
        ];

        $response->assertStatus(400);
        $this->assertEquals($response->json(), $expected);
    }

    /** @test */
    public function should_fail_if_last_name_is_missing()
    {
        $userData = factory(User::class)->raw(['last_name' => '']);

        $postData = array_merge($userData, [
            'iban' => (string) random_int(100, 9999)
        ]);

        $response = $this->post('/api/store', $postData);

        $expected = [
            "status" => "error",
            "data" => [
                "last_name" => ["The last name field is required."]
            ]
        ];

        $response->assertStatus(400);
        $this->assertEquals($response->json(), $expected);
    }

    /** @test */
    public function should_fail_if_phone_number_is_missing()
    {
        $userData = factory(User::class)->raw(['phone_number' => '']);

        $postData = array_merge($userData, [
            'iban' => (string) random_int(100, 9999)
        ]);

        $response = $this->post('/api/store', $postData);

        $expected = [
            "status" => "error",
            "data" => [
                "phone_number" => ["The phone number field is required."]
            ]
        ];

        $response->assertStatus(400);
        $this->assertEquals($response->json(), $expected);
    }

    /** @test */
    public function should_fail_if_street_is_missing()
    {
        $userData = factory(User::class)->raw(['street' => '']);

        $postData = array_merge($userData, [
            'iban' => (string) random_int(100, 9999)
        ]);

        $response = $this->post('/api/store', $postData);

        $expected = [
            "status" => "error",
            "data" => [
                "street" => ["The street field is required."]
            ]
        ];

        $response->assertStatus(400);
        $this->assertEquals($response->json(), $expected);
    }

    /** @test */
    public function should_fail_if_house_number_is_missing()
    {
        $userData = factory(User::class)->raw(['house_number' => '']);

        $postData = array_merge($userData, [
            'iban' => (string) random_int(100, 9999)
        ]);

        $response = $this->post('/api/store', $postData);

        $expected = [
            "status" => "error",
            "data" => [
                "house_number" => ["The house number field is required."]
            ]
        ];

        $response->assertStatus(400);
        $this->assertEquals($response->json(), $expected);
    }

    /** @test */
    public function should_fail_if_city_is_missing()
    {
        $userData = factory(User::class)->raw(['city' => '']);

        $postData = array_merge($userData, [
            'iban' => (string) random_int(100, 9999)
        ]);

        $response = $this->post('/api/store', $postData);

        $expected = [
            "status" => "error",
            "data" => [
                "city" => ["The city field is required."]
            ]
        ];

        $response->assertStatus(400);
        $this->assertEquals($response->json(), $expected);
    }

    /** @test */
    public function should_fail_if_iban_is_missing()
    {
        $postData = factory(User::class)->raw();


        $response = $this->post('/api/store', $postData);

        $expected = [
            "status" => "error",
            "data" => [
                "iban" => ["The iban field is required."]
            ]
        ];

        $response->assertStatus(400);
        $this->assertEquals($response->json(), $expected);
    }
}
