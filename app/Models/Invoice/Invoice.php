<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order\Order
 *
 * @property int $id
 * @property string $description
 * @property int $active
 * @property float $VAT
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $cif
 * @property int|null $country_id
 * @property int|null $shipping_country_id
 * @property-read Collection|OrderLine[] $Lines
 * @property-read int|null $lines_count
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereActive($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereCreatedBy($value)
 * @method static Builder|Order whereDescription($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereParentId($value)
 * @method static Builder|Order whereSlug($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUpdatedBy($value)
 * @mixin Eloquent
 * @property int|null $client_id
 * @property int $status
 * @property string $name
 * @property string $dni
 * @property string $date
 * @property string $number
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property string $postal_code
 * @property string $province
 * @property string $country
 * @property string $shipping_address
 * @property string $shipping_city
 * @property string $shipping_postal_code
 * @property string $shipping_province
 * @property string $shipping_country
 * @property float $shipping_cost
 * @property float $total
 * @property string|null $observations
 * @method static Builder|Order whereAddress($value)
 * @method static Builder|Order whereCity($value)
 * @method static Builder|Order whereClientId($value)
 * @method static Builder|Order whereCountry($value)
 * @method static Builder|Order whereDate($value)
 * @method static Builder|Order whereDni($value)
 * @method static Builder|Order whereEmail($value)
 * @method static Builder|Order whereName($value)
 * @method static Builder|Order whereNumber($value)
 * @method static Builder|Order whereObservations($value)
 * @method static Builder|Order wherePhone($value)
 * @method static Builder|Order wherePostalCode($value)
 * @method static Builder|Order whereProvince($value)
 * @method static Builder|Order whereShippingAddress($value)
 * @method static Builder|Order whereShippingCity($value)
 * @method static Builder|Order whereShippingCost($value)
 * @method static Builder|Order whereShippingCountry($value)
 * @method static Builder|Order whereShippingPostalCode($value)
 * @method static Builder|Order whereShippingProvince($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereTotal($value)
 * @method static Builder|Order whereShippingMethodId($value)
 * @method static Builder|Order whereVAT($value)
 * @property int|null $deleted_by
 * @property Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Order onlyTrashed()
 * @method static Builder|Order whereDeletedAt($value)
 * @method static Builder|Order whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Order withoutTrashed()
 * @method static Builder|Order whereCif($value)
 * @method static Builder|Order whereCountryId($value)
 * @method static Builder|Order whereShippingCountryId($value)
 * @property float|null $coupon_discount
 * @property int|null $coupon_type
 * @method static Builder|\Order whereCouponDiscount($value)
 * @method static Builder|\Order whereCouponType($value)
 */
class Invoice extends BaseModel
{

    protected $table = 'invoices';
    public $timestamps = true;
    protected $primaryKey = 'id';

    private const RECORD_NUMERATION_ID = 2;

    public function Lines()
    {
        return $this->hasMany(InvoiceLine::class, 'invoice_id');
    }

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function generateNumber()
    {
        $record_numeration = RecordNumeration::find(self::RECORD_NUMERATION_ID);
        if ($record_numeration)
        {
            $last_number = $record_numeration->value;
            $record_numeration->value++;
            $record_numeration->save();

            return $record_numeration->prefix.$last_number;
        }
        else
        {
            $last_number = 'X90900001';
            return $last_number;
        }
    }

}
