<?php

use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseLine extends BaseModel{

	protected $table = 'purchases_lines';
	public $timestamps = true;
	protected $primaryKey = 'id';
	protected $dates = ['deleted_at'];

	use SoftDeletes;

  public function Purchase()
  {
      return $this->belongsTo('Purchase', 'purchase_id');
  }

	public function Product()
	{
			return $this->belongsTo('Product', 'product_id');
	}


}


?>
