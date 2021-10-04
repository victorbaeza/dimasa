<?php
class Deleted extends Eloquent{
	protected $table='deleted';
	protected $connection = 'mysql_delete';
	public $timestamps = true;
}
