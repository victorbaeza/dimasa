<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Rule;
use Gloudemans\Shoppingcart\Contracts\InstanceIdentifier;

/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $dni
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property string $country
 * @property string|null $shipping_address
 * @property string|null $shipping_city
 * @property string|null $shipping_province
 * @property string|null $shipping_postal_code
 * @property string|null $shipping_country
 * @property string|null $phone
 * @property string|null $observations
 * @property string $password
 * @property string|null $remember_token
 * @property int $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|Client newModelQuery()
 * @method static Builder|Client newQuery()
 * @method static Builder|Client query()
 * @method static Builder|Client whereActive($value)
 * @method static Builder|Client whereAddress($value)
 * @method static Builder|Client whereCity($value)
 * @method static Builder|Client whereCountry($value)
 * @method static Builder|Client whereCreatedAt($value)
 * @method static Builder|Client whereCreatedBy($value)
 * @method static Builder|Client whereDni($value)
 * @method static Builder|Client whereEmail($value)
 * @method static Builder|Client whereId($value)
 * @method static Builder|Client whereName($value)
 * @method static Builder|Client whereObservations($value)
 * @method static Builder|Client wherePassword($value)
 * @method static Builder|Client wherePhone($value)
 * @method static Builder|Client wherePostalCode($value)
 * @method static Builder|Client whereProvince($value)
 * @method static Builder|Client whereRememberToken($value)
 * @method static Builder|Client whereSurname($value)
 * @method static Builder|Client whereUpdatedAt($value)
 * @method static Builder|Client whereUpdatedBy($value)
 * @mixin Eloquent
 * @method static Builder|\Client whereShippingAddress($value)
 * @method static Builder|\Client whereShippingCity($value)
 * @method static Builder|\Client whereShippingCountry($value)
 * @method static Builder|\Client whereShippingPostalCode($value)
 * @method static Builder|\Client whereShippingProvince($value)
 * @property int|null $country_id
 * @property int $professional Campo para determinar si es un cliente profesional
 * @method static Builder|\Client whereCountryId($value)
 * @method static Builder|\Client whereProfessional($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Chat[] $chats
 * @property int|null $shipping_country_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Client whereShippingCountryId($value)
 */

class Client extends Authenticatable implements InstanceIdentifier
{
    use Notifiable;

    protected $fillable = [
        'name','surname', 'email', 'dni' , 'city','province', 'postal_code', 'phone','address','active','professional','country_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table='clients';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function getInstanceIdentifier($options = null)
    {
        return $this->email;
    }

    public function getInstanceGlobalDiscount($options = null)
    {
        return 0;
    }

    public function getFullName(){
        return $this->name . ' ' . $this->surname;
    }


    // Emails Region
    public function sendRegistrationMail()
    {
        $data['email'] = $this->email;
        $data['client'] = $this;

        // Envio de email al admin
        Mail::send('emails.site.confirmacion-registro', array('data' => $data), function( $message ) use ($data){
          $message->to($data['email'])->subject('¡Bienvenido/a a '.config('app.company_name').'!');
        });
    }


    // End Emails Region

    //region Validation
    public static function rules(int $id = 0){
        return [
            'email' => ['required','email', Rule::unique('clients', 'email')->ignore($id)],
            'dni' => ['nullable','max:50', Rule::unique('clients', 'dni')->ignore($id)],
            'name' => 'required',
            'surname' => 'required',
            'phone' => ['nullable', 'digits_between:1,50', 'numeric'],
            'city' => ['nullable', 'max:50'],
            'province' => ['nullable', 'max:100'],
            'postal_code' => ['nullable', 'digits_between:1,25', 'numeric'],
            'country' => ['nullable', 'max:50']
        ];
    }

    public static $rulesMessages = [
        'email.required' => 'El email es obligatorio',
        'email.unique' => 'El email introducido ya existe, por favor utilice otro',
        'email.email' => 'El email no tiene un formato adecuado',
        'dni.unique' => 'El DNI ya está siendo utilizado por otra cuenta',
        'name.required' => 'El nombre es obligatorio',
        'surname.required' => 'El apellido es obligatorio',
        'phone.digits_between' => 'El teléfono no puede ocupar más de 50 carácteres',
        'phone.numeric' => 'El teléfono solo admite números',
        'city.max' => 'La ciudad no puede ocupar más de 50 carácteres',
        'province.max' => 'La provincia no puede ocupar más de 100 carácteres',
        'postal_code.digits_between' => 'El código postal no puede ocupar más de 25 carácteres',
        'postal_code.numeric' => 'El código postal solo admite números',
        'country.max' => 'El país no puede ocupar más de 50 carácteres'
    ];
    //endregion Validation

}
