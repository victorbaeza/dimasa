<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends BaseModel
{
		use SoftDeletes;

		protected $table = 'vendors';
		public $timestamps = true;
		protected $primaryKey = 'id';
		protected $dates = ['deleted_at'];

		public function PaymentForm()
		{
				return $this->belongsTo('PurchasePaymentForm', 'payment_form_id');
		}


}


?>
