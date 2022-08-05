<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket_reply;
use Carbon\Carbon;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Ticket_reply::create([
            'ticket_id'           => 1,
            'user_id'             => 3,
            'reply'               => "Laravel bug fixing problem please fix it!",
            'created_at'          => Carbon::Now(),
        ]);

        Ticket_reply::create([
            'ticket_id'           => 1,
            'user_id'        => 1,
            'reply'       => "it's ok! Your problem is very important to us! Will be transferred to an agent very soon. Thanks!",
            'created_at'    => Carbon::Now(),
        ]);

        Ticket_reply::create([
            'ticket_id'           => 1,
            'user_id'        => 2,
            'reply'       => "Your problem is solved! ticket is closed...",
            'created_at'    => Carbon::Now(),
        ]);

    }
}
