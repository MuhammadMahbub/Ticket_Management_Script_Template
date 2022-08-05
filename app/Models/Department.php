<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_role(){
        return $this->hasOne(UserRole::class, 'id', 'role_id');
    }

    public function get_agent(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
