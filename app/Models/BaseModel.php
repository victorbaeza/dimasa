<?php

/**
 * App\Models\BaseModel
 *
 * @method save()
 * @method static Builder|BaseModel newModelQuery()
 * @method static Builder|BaseModel newQuery()
 * @method static Builder|BaseModel query()
 * @mixin Eloquent
 */
class BaseModel extends Eloquent{

	public static function boot()
	{
		parent::boot();

		static::creating(function($model)
		{
			$user = Auth::user();
			if (!$user)
			{
				$user = User::find(1);
			}
			$model->created_by = $user->id;
			$model->updated_by = $user->id;
		});

		static::updating(function($model)
		{
			$user = Auth::user();
			if (!$user)
			{
				$user = User::find(1);
			}
			$model->updated_by= $user->id;
		});

		static::deleting(function($model)
		{
				if (!(\App::runningInConsole())) {
						$user = Auth::user();

						$deleted = new Deleted;
						$deleted->old_id = $model->id;
						$deleted->table = $model->getTable();
						$deleted->content = $model->toJson(JSON_PRETTY_PRINT);
						$deleted->deleted_by = $user->id;
						$deleted->save();
				}
		});

	}

}
