<?php

class PaymentForm extends BaseModel
{

    protected $table = 'payment_forms';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public const REDSYS = 1;
    public const PAYPAL = 2;
    public const STRIPE = 3;
    public const BANK_TRANSFER = 4;

    public function Orders()
    {
        return $this->hasMany(Order::class, 'payment_form_id');
    }

}
