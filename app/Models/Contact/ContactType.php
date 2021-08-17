<?php

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model{
	protected $table='contacts_types';
	public $timestamps = true;
	protected $primaryKey = 'id';

  public function Contacts()
  {
      return $this->hasMany(Contact::class, 'type_id');
  }


}
