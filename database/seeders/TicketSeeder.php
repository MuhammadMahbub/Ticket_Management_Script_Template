<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use Carbon\Carbon;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
            'customer' => 3,
            'subject' => 'seeder problem',
            'ticket_body' => 'seeder not working! fixed this issue as soon as possible mahabub vai!',
            'creator' => 2,
            'created_at' => Carbon::now(),
        ]);

        Ticket::create([
            'customer' => 3,
            'subject' => 'design issue',
            'ticket_body' => 'solve this issue',
            'creator' => 2,
            'created_at' => Carbon::now(),
        ]);
    }
}
