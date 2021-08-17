<?php

class OrderStatus extends Eloquent
{

    protected $table = 'orders_status';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public const PENDING = 1;
    public const PAID = 2;
    public const DELIVERED = 3;
    public const COMPLETED = 4;
    public const CANCELED = 5;
    public const NOT_DELETEABLE_STATUS = [2, 3, 4];

    public function Orders()
    {
        return $this->hasMany(Order::class, 'status_id');
    }

}
