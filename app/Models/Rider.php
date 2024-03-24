<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    use HasFactory;
    protected $table = 'riders';
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_confirmation',
        'reenterpassword',
        'start_date',
        'end_date',
        'phone_no'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dateFormat = 'U';
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'email'=>'integer',
        //'password'=>'date',
        'reenterpassword' => 'boolean',
        'name' => 'integer'
    ];
    public $timestamps = false;
}
