<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsAccess;

class Patient extends Model
{
    use HasFactory, LogsAccess;

    protected $fillable = [
        'name',
        'birth_date',
        'cpf',
        'phone',
        'sus_card',
        'notes',
    ];
}
