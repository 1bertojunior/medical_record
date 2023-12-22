<?php

namespace App\Traits;

use App\Models\AccessLog;
use Exception;

trait LogsAccess
{
    protected static function booted()
    {
        static::created(function ($model) {
            static::createAccessLog('create', $model);
        });

        static::updated(function ($model) {
            static::createAccessLog('update', $model);
        });

        static::deleted(function ($model) {
            static::createAccessLog('delete', $model);
        });
    }

    protected static function createAccessLog($action, $model)
    {
        AccessLog::create([
            'action' => $action,
            'model' => get_class($model),
            'model_id' => $model->id,
            'ip_address' => request()->ip(),
            'user_id' => auth()->id() ?? 1,
            'details' => json_encode(request()->all()),
            'result' => 'success',
        ]);
    }
}
