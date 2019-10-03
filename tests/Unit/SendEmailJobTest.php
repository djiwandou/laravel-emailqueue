<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendEmailJob;

class SendEmailJobTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSendEmail()
    {
        Queue::fake();
        Queue::assertNothingPushed();        

        SendEmailJob::dispatch()->onQueue('emails');

        Queue::assertPushed(SendEmailJob::class);

        Queue::assertPushedOn('emails', SendEmailJob::class);
    }
}
