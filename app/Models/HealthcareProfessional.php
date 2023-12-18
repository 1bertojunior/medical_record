<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsAccess;

class HealthcareProfessional extends Model
{
    use HasFactory, LogsAccess;

    protected $fillable = ['name', 'document_number', 'profession_type_id'];

    public function professionType()
    {
        return $this->belongsTo(HealthcareProfessionType::class, 'profession_type_id');
    }
    
}
