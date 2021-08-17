<?php

use App\Traits\DeletedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * ProductOffer
 *
 * @property int $id
 * @property float $discount
 * @property int $discount_type
 * @property string $start_date
 * @property string $end_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\ProductOfferDetail[] $productsDetails
 * @property-read int|null $products_details_count
 * @method static Builder|\ProductOffer newModelQuery()
 * @method static Builder|\ProductOffer newQuery()
 * @method static Builder|\ProductOffer query()
 * @method static Builder|\ProductOffer whereCreatedAt($value)
 * @method static Builder|\ProductOffer whereDiscount($value)
 * @method static Builder|\ProductOffer whereDiscountType($value)
 * @method static Builder|\ProductOffer whereEndDate($value)
 * @method static Builder|\ProductOffer whereId($value)
 * @method static Builder|\ProductOffer whereStartDate($value)
 * @method static Builder|\ProductOffer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\ProductOffer onlyTrashed()
 * @method static Builder|\ProductOffer whereCreatedBy($value)
 * @method static Builder|\ProductOffer whereDeletedAt($value)
 * @method static Builder|\ProductOffer whereDeletedBy($value)
 * @method static Builder|\ProductOffer whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\ProductOffer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\ProductOffer withoutTrashed()
 */
class ProductOffer extends BaseModel
{
    use SoftDeletes, DeletedBy;

    protected $table = 'products_offers';
    protected $fillable = ['start_date', 'end_date', 'discount', 'discount_type'];

    public function productsDetails(){
        return $this->belongsToMany(ProductOfferDetail::class);
    }

    //region Validation
    public static $rules = [
        'start_date' =>  ['date', 'required','after_or_equal:today'],
        'end_date' => ['date', 'required', 'after_or_equal:start_date'],
        'discount' => ['required', 'numeric'],
        'discount_type' => ['required']
    ];

    public static $rulesMessages = [
        'start_date.required' => 'La fecha de inicio es obligatoria',
        'start_date.date' => 'La fecha de inicio tiene un formato erróneo',
        'start_date.after_or_equal' => 'La fecha de inicio debe empezar el día de hoy o después',
        'end_date.required' => 'La fecha de finalización es obligatoria',
        'end_date.date' => 'La fecha de finalización tiene un formato erróneo',
        'end_date.after_or_equal' => 'La fecha de finalización tiene que ser después de la fecha de inicio',
        'discount.required' => 'El descuento es obligatorio',
        'discount.numeric' => 'El descuento debe ser númerico',
        'discount_type.required' => 'El tipo de descuento es obligatorio'
    ];
    //endregion Validation

    public function getDiscount($value){
        if($this->discount_type == DiscountType::ABSOLUTE){
            return round($value - $this->discount,2);
        }else{
            $discountPercentage = (100 - $this->discount) / 100;
            return round($value * $discountPercentage , 2);
        }
    }
}
