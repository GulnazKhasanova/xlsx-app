<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Zakaz extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'zakaz';

    protected $fillable = [
        'id','id_zakaz', 'created_at', 'status', 'comment'
    ];

    public static  $availableFields = [
        'id','id_zakaz',  'created_at', 'status', 'comment'
    ];

    public $timestamps =false;
}
