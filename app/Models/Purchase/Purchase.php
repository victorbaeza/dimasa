<?php

use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends BaseModel{

	protected $table = 'purchases';
	public $timestamps = true;
	protected $primaryKey = 'id';
	protected $dates = ['deleted_at'];

	use SoftDeletes;

	public const FILE_PATH = '/public/compras/';
	public const FILE_URL = '/storage/compras/';

  public function Lines()
  {
      return $this->hasMany('PurchaseLine', 'purchase_id');
  }

	public function Status()
	{
			return $this->belongsTo('PurchaseStatus', 'status_id');
	}

	public function Vendor()
	{
			return $this->belongsTo('Vendor', 'vendor_id');
	}

  public function PaymentForm()
  {
      return $this->hasOne('PaymentForm', 'payment_form_id');
  }


	public function uploadFile($file)
	{
			$filename = Helper::generateFileName($file->getClientOriginalName());
			$file->storeAs(Purchase::FILE_PATH . $this->id, $filename);

			$this->invoice_file = $filename;
			$this->save();
	}

	public function getFile()
	{
			$path = Purchase::FILE_URL . $this->id . '/' . $this->invoice_file;

			return $path;
	}

}


?>
