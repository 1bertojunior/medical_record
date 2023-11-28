<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'healthcare_professional_id',
        'image_path',
        'chief_complaint',
        'history_of_present_illness',
        'past_medical_history',
        'family_history',
        'physical_examination',
        'diagnosis',
        'treatment_plan',
        'medications',
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
