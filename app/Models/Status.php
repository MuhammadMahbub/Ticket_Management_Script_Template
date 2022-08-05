<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Status extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded   = ['id'];
    protected $translatable = ['name'];

}
