<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    public $primaryKey = "user_id";
    protected $table = "users";
    protected $fillable = [
        'user_email',
        'user_first_name',
        'user_last_name',
        'user_phoneno',
        'password',
        'user_type',
    ];
}
