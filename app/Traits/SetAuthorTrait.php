<?php

namespace App\Traits;

trait SetAuthorTrait
{
    public static function bootSetAuthorTrait()
    {
        static::creating(function ($model) {
            if (auth()->check()) {
                $model->user_id = auth()->id();
            }
        });
    }
}
