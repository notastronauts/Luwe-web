<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class LoginRegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function login_test_api()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $unitCode = 1234;

        $this->json('POST', 'api/login' .$unitCode);
        
    }
}
