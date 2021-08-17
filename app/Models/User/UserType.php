<?php

class UserType extends Eloquent
{
  	protected $table='users_types';
    public $timestamps = true;
  	protected $primaryKey = 'id';

    public const ID_ADMIN = 1;
}
