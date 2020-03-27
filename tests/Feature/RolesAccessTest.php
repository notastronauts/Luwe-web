<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolesAccessTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;
    /** @test */
    public function user_must_login_to_access_to_admin_dashboard()
    {
        $this->get(route('admin.dashboard'))
            ->assertRedirect('login');
    }

    //** @test */
    public function admin_can_access_to_admin_dashboard()
    {
        // Having User
        Role::create(['name' => 'admin']);
        $adminUser = factory(User::class)->create();
        $adminUser->assignRole('admin');
        $this->actingAs($adminUser);

        // When
        $response = $this->get(route('admin.dashboard'));

        // Then
        $response->assertOk();
    }

    /** @test */
    public function user_cannot_access_to_admin_dashboard()
    {
        Role::create(['name' => 'user']);
        // Having
        $user = factory(User::class)->create();

        $user->assignRole('user');

        $this->actingAs($user);

        // When
        $response = $this->get(route('admin.dashboard'));

        // Then
        $response->assertForbidden();
    }

    /** @test */
    public function admin_can_access_to_home()
    {
        Role::create(['name' => 'admin']);
        // Having
        $adminUser = factory(User::class)->create();

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        // When
        $response = $this->get(route('home'));

        // Then
        $response->assertOk();
    }
    
    /** @test */
    public function user_can_access_to_home()
    {
        Role::create(['name' => 'user']);
        // Having
        $user = factory(User::class)->create();

        $user->assignRole('user');

        $this->actingAs($user);

        // When
        $response = $this->get(route('home'));

        // Then
        $response->assertOk();
    }
}
