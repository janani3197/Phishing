<?php

namespace Tests\Feature;

use App\Models\Mailing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class MailingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    public function test_create_page_ok(): void
    {
        $user = User::first();
        $this->actingAs($user)->get(route('mailings.create'))->assertOk();
    }

    public function test_form_validation(): void
    {
        $user = User::first();
        $response = $this->actingAs($user)->post(route('mailings.store'), [
            'name' => 'test',
            'email' => 'fdsa@hs.com',
            'message' => 'hsj',
        ]);

        $response->assertInvalid();


        $response = $this->actingAs($user)->post(route('mailings.store'), [
            'name' => 'test',
            'email' => Str::random() . '@hs.com',
            'message' => 'hsj',
        ]);

        $response->assertOk();

    }
    public function test_emails_created(): void
    {
        $num = Mailing::count();
        $user = User::first();
        $response = $this->actingAs($user)->post(route('mailings.store'), [
            'name' => 'test',
            'email' => Str::random() . '@hs.com',
            'message' => 'hsj',
        ]);

        $numAfter = Mailing::count();

        $this->assertEquals($num + 1, $numAfter);
    }

    public function test_only_authorized_users_may_access_mailable()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $mailing = $user1->mailings()->create(['message' => 'test']);

        $this->actingAs($user1)->get(route('mailings.show', $mailing))->assertOk();
        $this->actingAs($user2)->get(route('mailings.show', $mailing))->assertForbidden();
    }
}
