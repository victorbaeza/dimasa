<?php


namespace App\Traits;


use Auth;
use User;

trait DeletedBy
{
    public static function bootDeletedBy(){
        static::deleting(function($model){
            $user = Auth::user();
            if (!$user)
            {
                $user = User::find(1);
            }
            $model->deleted_by = $user->id;
            $model->save();
        });
    }
}
