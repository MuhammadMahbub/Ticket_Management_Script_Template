<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_reply extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_user_name_from_ticket(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function get_all_reply(){
        return $this->hasOne(Ticket::class, 'id', 'ticket_id');
    }
}
