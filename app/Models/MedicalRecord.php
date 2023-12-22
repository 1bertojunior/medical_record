<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsAccess;

class MedicalRecord extends Model
{
    use HasFactory, LogsAccess;

    protected $fillable = [
        'patient_id',
        'healthcare_professional_id',
        'file_path',
        'complaints',
        'disease_history',
        'allergies',
        'diagnosis',
        'follow_up_instructions',
    ];    

    // Relacionamento com o modelo Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    // Relacionamento com o modelo HealthcareProfessional
    public function healthcareProfessional()
    {
        return $this->belongsTo(HealthcareProfessional::class, 'healthcare_professional_id');
    }
}
