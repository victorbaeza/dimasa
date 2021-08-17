<?php


/**
 * ShippingMethodTranslation
 *
 * @property int $id
 * @property int $shipping_method_id
 * @property string $locale
 * @property string $description
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation whereShippingMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethodTranslation whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class ShippingMethodTranslation extends BaseModel
{
    protected $table = 'shipping_methods_translations';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['description'];
}
