<?php

use App\Traits\DeletedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
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
class Order extends BaseModel
{
    use SoftDeletes, DeletedBy;

    protected $table = 'orders';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public const VAT = 0.21;
    private const RECORD_NUMERATION_ID = 1;
    public const DOCUMENT_PATH = '/public/orders'; // Ruta donde se guardan los documentos (desde /storage)
    const DOCUMENT_URL = '/storage/orders/'; // Ruta para acceder o visualizar las imágenes

    public function Status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function PaymentForm()
    {
         return $this->belongsTo(PaymentForm::class, 'payment_form_id');
    }

    public function Client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function Lines()
    {
        return $this->hasMany(OrderLine::class, 'order_id');
    }

    public function Coupons()
    {
        return $this->hasMany(CouponOrder::class, 'order_id');
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
            $last_number = 'X99';
            return $last_number;
        }
    }

    public function getFullAddress()
    {
        $text = $this->address.', '.$this->city."\n";
        $text .= $this->province.', '.$this->postal_code;

        return $text;
    }

    public function getFullShippingAddress()
    {
        $text = $this->shipping_address.', '.$this->shipping_city."\n";
        $text .= $this->shipping_province.', '.$this->shipping_postal_code;

        return $text;
    }


    // Mailing

    public function sendClientMailConfirmation()
    {
        $data['order'] = $this;

        // Envio de email de confirmacion de compra al cliente
        Mail::send('emails.site.confirmacion-pedido', array('data' => $data), function( $message ) use ($data){
          $message->to($data['order']->email)->subject('Confirmación de Compra | ' . config('app.company_name'));
        });
    }

    public function sendAdminMailConfirmation()
    {
        $data['admin_email'] = config('app.notifications_email');
        $data['order'] = $this;

        // Envio de email de confirmacion de compra al ADMIN
        Mail::send('emails.admin.confirmacion_pedido', array('data' => $data), function( $message ) use ($data){
          $message->to($data['admin_email'])->subject('Nuevo pedido realizado #'.$data['order']->number.' | ' . config('app.company_name'));
        });
    }
    // End Mailing


}
