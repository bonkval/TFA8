<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResourceAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_every_resource_endpoint_redirects_guests_without_mutating_records(): void
    {
        $user = User::factory()->create();
        $customer = Customer::create(['full_name' => 'Customer', 'email' => 'customer@example.com']);
        foreach (['customers' => $customer->id, 'users' => $user->id] as $resource => $id) {
            foreach ([['get', "/$resource"], ['get', "/$resource/create"], ['post', "/$resource"], ['get', "/$resource/$id/edit"], ['put', "/$resource/$id"], ['patch', "/$resource/$id"]] as [$method, $url]) {
                $this->$method($url)->assertRedirect(route('login'));
            }
        }
        $this->assertDatabaseCount('customers', 1);
        $this->assertDatabaseCount('users', 1);
    }

    public function test_login_returns_to_intended_resource_and_logout_protects_it_again(): void
    {
        $user = User::factory()->create();
        $this->get('/customers')->assertRedirect(route('login'));
        $this->post('/login', ['email' => $user->email, 'password' => 'password'])
            ->assertRedirect('/customers');
        $this->assertAuthenticatedAs($user);
        foreach (['/customers', '/users', '/customers/create', '/users/create', "/users/{$user->id}/edit"] as $url) {
            $this->get($url)->assertOk();
        }
        $this->post('/logout')->assertRedirect('/');
        $this->assertGuest();
        $this->get('/users')->assertRedirect(route('login'));
    }
}
