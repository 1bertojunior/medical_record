<?php

namespace App\Models;

use App\Traits\LogsAccess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareProfessionType extends Model
{
    use HasFactory, LogsAccess;

    protected $fillable = ['name', 'council_type'];

    public function professionals()
    {
        return $this->hasMany(HealthcareProfessional::class);
    }
}
