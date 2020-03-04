<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public  function a_book_can_be_added()
    {
        $this->withOutExceptionHandling();
        $response = $this->post(
            '/books',
            [
                'title' => 'Cool book title',
                'author' => "Victor"
            ]
        );
        $response->assertOk();
        $this->assertCount(1, User::all());
    }
}
