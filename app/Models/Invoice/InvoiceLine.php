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
class InvoiceLine extends BaseModel
{

    protected $table = 'invoices_lines';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function Invoice()
    {
        return $this->hasOne(Invoice::class, 'invoice_id');
    }


}
