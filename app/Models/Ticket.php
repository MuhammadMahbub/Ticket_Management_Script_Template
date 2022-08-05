<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function get_customer(){
        return $this->hasOne(User::class, 'id', 'customer');
    }

    public function get_department(){
        return $this->hasOne(Department::class, 'id', 'department');
    }

    public function get_priority(){
        return $this->hasOne(Priority::class, 'id', 'priority');
    }

    public function get_status(){
        return $this->hasOne(Status::class, 'id', 'status');
    }


}
