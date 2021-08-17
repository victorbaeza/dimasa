<?php

use App\Traits\DeletedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

/**
 * Coupon
 *
 * @property int $id
 * @property string $code
 * @property float $discount
 * @property int $discount_type
 * @property string $start_date
 * @property string $end_date
 * @property float|null $minimum_price
 * @property int|null $use_limit
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Coupon newModelQuery()
 * @method static Builder|Coupon newQuery()
 * @method static Builder|Coupon query()
 * @method static Builder|Coupon whereCode($value)
 * @method static Builder|Coupon whereCreatedAt($value)
 * @method static Builder|Coupon whereDiscount($value)
 * @method static Builder|Coupon whereDiscountType($value)
 * @method static Builder|Coupon whereEndDate($value)
 * @method static Builder|Coupon whereId($value)
 * @method static Builder|Coupon whereMinimumPrice($value)
 * @method static Builder|Coupon whereStartDate($value)
 * @method static Builder|Coupon whereUpdatedAt($value)
 * @method static Builder|Coupon whereUseLimit($value)
 * @mixin Eloquent
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Coupon onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Coupon whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Coupon whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Coupon whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Coupon whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Coupon withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Coupon withoutTrashed()
 */
class Coupon extends BaseModel
{
    use SoftDeletes, DeletedBy;

    protected $table = 'coupons';
    protected $fillable = ['code','start_date', 'end_date', 'discount', 'discount_type', 'minimum_price', 'use_limit'];

    //region Validation
    public static function rules(int $id){
         return [
            'code' => ['required', Rule::unique('coupons','code')->ignore($id)],
            'start_date' =>  ['date', 'required', 'after_or_equal:today'],
            'end_date' => ['date', 'required', 'after_or_equal:start_date'],
            'discount' => ['required', 'numeric'],
            'discount_type' => ['required'],
             'minimum_price' => ['nullable', 'numeric'],
             'use_limit' => ['nullable','numeric']
        ];
    }

    public static $rulesMessages = [
        'code.required' => 'El código es obligatorio',
        'code.unique' => 'El cupón ya está siendo utilizado',
        'start_date.required' => 'La fecha de inicio es obligatoria',
        'start_date.date' => 'La fecha de inicio tiene un formato erróneo',
        'start_date.after_or_equal' => 'La fecha de inicio debe empezar el día de hoy o después',
        'end_date.required' => 'La fecha de finalización es obligatoria',
        'end_date.date' => 'La fecha de finalización tiene un formato erróneo',
        'end_date.after_or_equal' => 'La fecha de finalización tiene que ser después de la fecha de inicio',
        'discount.required' => 'El descuento es obligatorio',
        'discount.numeric' => 'El descuento debe ser númerico',
        'discount_type.required' => 'El tipo de descuento es obligatorio',
        'minimum_price' => 'El precio mínimo debe ser un número',
        'use_limit.numeric' => 'El limite de usos debe ser un número'
    ];
    //endregion Validation

    public static function getValidCoupon($code){
        $code = Coupon::whereCode($code)->first();

        if(!$code || $code->start_date > Carbon::now() || $code->end_date < Carbon::now() || ($code->use_limit != null && $code->use_limit <= 0))
            return null;

        return $code;
    }

    public function getIsValid(){
        if($this->start_date > Carbon::now() || $this->end_date < Carbon::now()  || ($this->use_limit != null && $this->use_limit <= 0))
            return false;

        return true;
    }

    public function getDiscount($value){
        if($this->discount_type == DiscountType::ABSOLUTE){
            return round($value - $this->discount,2);
        }else{
            $discountPercentage = (100 - $this->discount) / 100;
            return round($value * $discountPercentage , 2);
        }
    }

    public function getDiscountValue($value){
        if($this->discount_type == DiscountType::ABSOLUTE){
            return round($this->discount, 2);
        }else{
            $discountPercentage = ($this->discount) / 100;
            return round($value * $discountPercentage , 2);
        }
    }
}
