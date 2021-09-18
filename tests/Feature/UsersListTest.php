<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UsersListTest extends TestCase
{

    /** @test */
    public function getUsersList()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/users');
        $users = User::all();
        $response->assertOk();
        $response->assertViewIs('users');
        $response->assertViewHas('users', $users);
    }
}
