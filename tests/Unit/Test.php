<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use PHPUnit\Framework\AttributesTest;
use PHPUnit\Framework\Attributes\Test;


class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected UserController $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new UserController();
    }

    #[Test]
    public function it_stores_a_user_successfully()
    {
        $request = Request::create('/api/users', 'POST', [
            'name'  => 'Jane Doe',
            'email' => 'jane@example.com',
            'age'   => 28,
        ]);

        $response = $this->controller->store($request);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(201, $response->status());
        $this->assertDatabaseHas('users', ['email' => 'jane@example.com']);
    }

    #[Test]
    public function it_shows_user_successfully()
    {
        $user = User::factory()->create();

        $request = Request::create("/api/users/{$user->id}", 'GET');

        $response = $this->controller->show($request, $user->id);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $data = $response->getData();

        $this->assertEquals($user->id, $data->id);
        $this->assertEquals($user->email, $data->email);
    }

    #[Test]
    public function it_updates_user_successfully()
    {
        $user = User::factory()->create();

        $request = Request::create("/api/users/{$user->id}", 'PUT', [
            'name' => 'Updated Name',
        ]);

        $response = $this->controller->update($request, $user->id);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('Updated Name', $user->fresh()->name);
    }

    #[Test]
    public function it_deletes_user_successfully()
    {
        $user = User::factory()->create();

        $request = Request::create("/api/users/{$user->id}", 'DELETE');

        $response = $this->controller->destroy($user->id);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
