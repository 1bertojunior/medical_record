<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'model',
        'model_id',
        'ip_address',
        'user_id',
        'details',
        'result',
    ];

    public function getModelName()
    {
        $parts = explode('\\', $this->model);
        return end($parts);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function affectedModel()
    {
        return $this->belongsTo($this->model, 'model_id');
    }

}
