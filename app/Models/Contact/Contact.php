<?php

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contact\Contact
 *
 * @property int $id
 * @property int $type
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string $subject
 * @property string $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Contact newModelQuery()
 * @method static Builder|Contact newQuery()
 * @method static Builder|Contact query()
 * @method static Builder|Contact whereCreatedAt($value)
 * @method static Builder|Contact whereEmail($value)
 * @method static Builder|Contact whereId($value)
 * @method static Builder|Contact whereMessage($value)
 * @method static Builder|Contact whereName($value)
 * @method static Builder|Contact wherePhone($value)
 * @method static Builder|Contact whereSubject($value)
 * @method static Builder|Contact whereType($value)
 * @method static Builder|Contact whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Contact extends Model{
	protected $table='contacts';
	public $timestamps = true;
	protected $primaryKey = 'id';

	public function Type()
	{
			return $this->belongsTo(ContactType::class, 'type_id');
	}


	public function sendAdminMailNotification()
	{
		$data['admin_email'] = config('app.notifications_email');
		$data['contacto'] = $this;

		// Envio de email al admin
		Mail::send('emails.admin.confirmacion_contacto', array('data' => $data), function( $message ) use ($data){
			$message->to($data['admin_email'])->subject('Nueva solicitud de contacto | ' . config('app.company_name'));
		});
	}

	public function sendClientMailNotification()
	{
		$data['contacto'] = $this;

		// Envio de email al cliente
		Mail::send('emails.site.contact-confirmation', array('data' => $data), function( $message ) use ($data){
			$message->to($data['contacto']->email)->subject('Solicitud de contacto recibida | ' . config('app.company_name'));
		});
	}


}
