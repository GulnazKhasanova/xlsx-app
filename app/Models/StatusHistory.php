<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class StatusHistory extends Model
{
    use HasFactory;

    protected $table = 'status_history';

    protected $fillable = ['id',
        'zakaz_id', 'date_changed', 'before', 'current'
    ];


    public static  $availableFields = [
        'zakaz_id', 'date_changed', 'before', 'current'
    ];

    public $timestamps = false;
}
