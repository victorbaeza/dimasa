<?php

use Illuminate\Database\Eloquent\Model;

class CouponOrder extends Model
{
    protected $table = 'coupons_orders';
    protected $primaryKey = 'id';

    public function Order(){
        return $this->belongsTo(Order::class);
    }

    public function Coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public static function getCouponsAppliedToOrder($orderId){
        return CouponOrder::whereOrderId($orderId)->get();
    }
}
