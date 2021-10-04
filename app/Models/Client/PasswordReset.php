<?php

/**
 * App\Models\PasswordReset
 *
 * @property int $id
 * @property int $user_id
 * @property string $email
 * @property string $token
 * @property string|null $created_at
 * @property string|null $changed_at
 * @method static Builder|PasswordReset newModelQuery()
 * @method static Builder|PasswordReset newQuery()
 * @method static Builder|PasswordReset query()
 * @method static Builder|PasswordReset whereChangedAt($value)
 * @method static Builder|PasswordReset whereCreatedAt($value)
 * @method static Builder|PasswordReset whereEmail($value)
 * @method static Builder|PasswordReset whereId($value)
 * @method static Builder|PasswordReset whereToken($value)
 * @method static Builder|PasswordReset whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $client_id
 * @method static \Illuminate\Database\Eloquent\Builder|\PasswordReset whereClientId($value)
 */
class PasswordReset extends Eloquent{
	protected $table='password_resets';
	public $timestamps = false;
	protected $primaryKey = 'id';

}
