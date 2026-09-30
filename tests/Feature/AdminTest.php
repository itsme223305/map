<?php

namespace Tests\Feature;

use App\Mail\ProblemStatusChangedMail;
use App\Models\Problem;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /** @test */
    public function admin_can_login()
    {
        $this->post('/admin/login',[
            'email' => 'admin@test.com',
            'password' => 'test',
        ])->assertRedirect('/admin/dashboard');
    }

    /** @test */
    public function it_redirects_you_to_dashboard_if_logged_in()
    {
        $admin = User::first();

        $this->actingAs($admin)->get('/admin/login')->assertRedirect('/admin/dashboard');
    }

    /** @test */
    public function sets_problem_status()
    {
        $admin = User::first();

        $problem = Problem::factory()->create([
            'address' => 'address 1',
            'email' => 'test@test.com',
            'type' => 'waste',
            'status' => 'in-review',
            'verified_at' => now()->subWeek()
        ]);

        Mail::fake();

        $this->actingAs($admin)->post('/admin/setProblemStatus', [
            'status' => 'accepted',
            'problems' => [$problem->id]
        ])->assertStatus(302);

        Mail::assertSent(ProblemStatusChangedMail::class, function($mail) {
            $mail->build();

            return true;
        });
    }

    /** @test */
    public function can_delete_problem()
    {
        $admin = User::first();

        $problem = Problem::factory()->create([
            'address' => 'address 1',
            'email' => 'test@test.com',
            'type' => 'waste',
            'status' => 'in-review',
            'verified_at' => now()->subWeek()
        ]);

        Mail::fake();

        $this->actingAs($admin)->delete('/admin/deleteProblems', [
            'problems' => [$problem->id]
        ])->assertStatus(302);

        Mail::assertNothingSent();

        $problemFresh = Problem::find($problem->id);

        $this->assertNull($problemFresh);
    }
}
