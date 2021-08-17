<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;


/**
 * App\Models\User
 *
 * @method static find($get)
 * @property int $id
 * @property string|null $phone
 * @property int $active
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereActive($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User wherePicture($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUser($value)
 * @mixin Eloquent
 * @property string $user
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $picture
 * @property int $role
 * @method static Builder|\User whereRole($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Chat[] $chats
 * @property-read int|null $chats_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Client[] $clients
 * @property-read int|null $clients_count
 */
class User extends Authenticatable
{
	use Notifiable;

	protected $guard = 'admin';

	protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

	protected $table='users';
	public $timestamps = true;
	protected $primaryKey = 'id';

	public function Type()
	{
		return $this->belongsTo(UserType::class, 'type_id');
	}


  public function showPicture()
	{
			if($this->picture){
				$path = '/storage/users/';
				return $path.$this->picture;
			} else { // Imagen por defecto
				return '/vendor/img/admin-user.png';
			}
	}

    public static function rules(int $id){
        $rules = [
            'user' => ['required', Rule::unique('users', 'user')->ignore($id)],
            'name' => 'required',
            'email' => ['required','email', Rule::unique('users', 'email')->ignore($id)],
            'phone' => ['nullable', 'digits_between:1,30', 'numeric'],
            'picture' => ['nullable', 'max:10240'] // Tamaño máximo del fichero en KB
        ];

        if($id === 0){
            $rules['pwd'] = 'required';
            $rules['pwd2'] = 'required';
        }

        return $rules;
    }

    public static $rulesMessages = [
        'email.required' => 'El email es obligatorio',
        'email.unique' => 'El email introducido ya existe, por favor utilice otro',
        'email.email' => 'El email no tiene un formato adecuado',
        'user.unique' => 'El usuario ya existe, por favor utilice otro',
        'user.required' => 'El usuario es obligatorio',
        'name.required' => 'El nombre es obligatorio',
        'phone.digits_between' => 'El teléfono no puede ocupar más de 30 carácteres',
        'phone.numeric' => 'El teléfono solo admite números',
        'picture.max' => 'El tamaño máximo de la foto es 10MB',
        'pwd.required' => 'La contraseña es obligatoria',
        'pwd2.required' => 'Confirmar contraseña es obligatorio',
        'type.required' => 'El tipo de usuario es obligatorio'
    ];

}
