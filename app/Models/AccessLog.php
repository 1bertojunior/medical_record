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
        'ip_origin',
        'user_id',
        'timestamp',
        'details',
        'result',
    ];

    public function affectedModel()
    {
        return $this->model::find($this->model_id);
    }

}
