<?php

/**
 * App\Models\Web\WebData
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $address
 * @property string|null $city
 * @property string|null $CP
 * @property string|null $province
 * @property string|null $CIF
 * @property string|null $phone
 * @property string|null $twitter
 * @property string|null $facebook
 * @property string|null $linkedin
 * @property string|null $instagram
 * @property string|null $whatsapp
 * @method static Builder|WebData newModelQuery()
 * @method static Builder|WebData newQuery()
 * @method static Builder|WebData query()
 * @method static Builder|WebData whereAddress($value)
 * @method static Builder|WebData whereCIF($value)
 * @method static Builder|WebData whereCP($value)
 * @method static Builder|WebData whereCity($value)
 * @method static Builder|WebData whereEmail($value)
 * @method static Builder|WebData whereFacebook($value)
 * @method static Builder|WebData whereId($value)
 * @method static Builder|WebData whereInstagram($value)
 * @method static Builder|WebData whereLinkedin($value)
 * @method static Builder|WebData wherePhone($value)
 * @method static Builder|WebData whereProvince($value)
 * @method static Builder|WebData whereTwitter($value)
 * @method static Builder|WebData whereWhatsapp($value)
 * @mixin Eloquent
 */
class WebData extends Eloquent{
	protected $table='web_data';
	public $timestamps = false;
	protected $primaryKey = 'id';

}
