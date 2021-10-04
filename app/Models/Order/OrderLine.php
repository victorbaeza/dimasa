<?php

use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Order\OrderLine
 *
 * @property int $id
 * @property string $description
 * @property int $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read Order $Order
 * @method static Builder|OrderLine newModelQuery()
 * @method static Builder|OrderLine newQuery()
 * @method static Builder|OrderLine query()
 * @method static Builder|OrderLine whereActive($value)
 * @method static Builder|OrderLine whereCreatedAt($value)
 * @method static Builder|OrderLine whereCreatedBy($value)
 * @method static Builder|OrderLine whereDescription($value)
 * @method static Builder|OrderLine whereId($value)
 * @method static Builder|OrderLine whereParentId($value)
 * @method static Builder|OrderLine whereSlug($value)
 * @method static Builder|OrderLine whereUpdatedAt($value)
 * @method static Builder|OrderLine whereUpdatedBy($value)
 * @mixin Eloquent
 * @property int $order_id
 * @property int|null $product_id
 * @property string $product_name
 * @property int $quantity
 * @property float $price_unit
 * @method static Builder|\OrderLine whereOrderId($value)
 * @method static Builder|\OrderLine wherePriceUnit($value)
 * @method static Builder|\OrderLine whereProductId($value)
 * @method static Builder|\OrderLine whereProductName($value)
 * @method static Builder|\OrderLine whereQuantity($value)
 */
class OrderLine extends BaseModel
{
    protected $table = 'orders_lines';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function Order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function Product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getPriceWithVAT()
    {
        $price_unit = $this->price_unit;
        $vat = ($this->quantity*$price_unit)*$this->VAT;

        $total = $price_unit+$vat;
        return $total;
    }

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $total = $model->quantity*($model->price_unit*(1+$model->VAT));
            $model->total = $total;
            $model->save();
        });
    }
}
