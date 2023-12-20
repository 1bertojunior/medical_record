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

    public function getFormattedBirthDateAttribute()
    {
        return date('d/m/Y', strtotime($this->birth_date));
    }

    public function getFormattedCpfAttribute()
    {
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $this->cpf);
    }

    public function getFormattedPhoneAttribute()
    {
        return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $this->phone);
    }

    public function getFormattedSusCardAttribute()
    {
        return preg_replace('/(\d{3})(\d{4})(\d{4})(\d{4})/', '$1 $2 $3 $4', $this->sus_card);
    }

}
