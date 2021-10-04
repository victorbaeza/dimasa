<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchasePaymentForm extends BaseModel
{
    use SoftDeletes;

    protected $table = 'purchases_payment_forms';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function Purchases()
    {
        return $this->hasMany(Purchase::class, 'payment_form_id');
    }

}
