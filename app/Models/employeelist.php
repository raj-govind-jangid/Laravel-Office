<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeelist extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_first_name',
        'employee_last_name',
        'employee_email',
        'employee_gender',
        'employee_phoneno',
        'employee_department_id',
        'employee_home_address',
        'employee_post_id',
        'employee_joining_date',
        'employee_status',
    ];
}
