<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ZakazUnity extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Таблица бд
     * @var string
     */

    protected $table = 'zakazunity';
    public static  $availableFields = ['id',
        'num',
        'created_at',
        'status'];
    protected $fillable = [
        'id',
        'num',
        'created_at',
        'status'
    ];

    public $timestamps = false;

    protected $dates = [
        'created_at',
    ];
}
