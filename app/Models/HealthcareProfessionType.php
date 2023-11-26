<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareProfessionType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'council_type'];

    public function professionals()
    {
        return $this->hasMany(HealthcareProfessional::class);
    }
}
