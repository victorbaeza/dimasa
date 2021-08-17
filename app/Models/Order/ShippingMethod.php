<?php

use \Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;


/**
 * ShippingMethod
 *
 * @property int $id
 * @property float $cost
 * @property float|null $minimum_free
 * @property int $default
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read \ShippingMethodTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\ShippingMethodTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static Builder|\ShippingMethod listsTranslations($translationField)
 * @method static Builder|\ShippingMethod newModelQuery()
 * @method static Builder|\ShippingMethod newQuery()
 * @method static Builder|\ShippingMethod notTranslatedIn($locale = null)
 * @method static Builder|\ShippingMethod orWhereTranslation($translationField, $value, $locale = null)
 * @method static Builder|\ShippingMethod orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static Builder|\ShippingMethod orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static Builder|\ShippingMethod query()
 * @method static Builder|\ShippingMethod translated()
 * @method static Builder|\ShippingMethod translatedIn($locale = null)
 * @method static Builder|\ShippingMethod whereActive($value)
 * @method static Builder|\ShippingMethod whereCost($value)
 * @method static Builder|\ShippingMethod whereCreatedAt($value)
 * @method static Builder|\ShippingMethod whereCreatedBy($value)
 * @method static Builder|\ShippingMethod whereDefault($value)
 * @method static Builder|\ShippingMethod whereId($value)
 * @method static Builder|\ShippingMethod whereMinimumFree($value)
 * @method static Builder|\ShippingMethod whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static Builder|\ShippingMethod whereTranslationLike($translationField, $value, $locale = null)
 * @method static Builder|\ShippingMethod whereUpdatedAt($value)
 * @method static Builder|\ShippingMethod whereUpdatedBy($value)
 * @method static Builder|\ShippingMethod withTranslation()
 * @mixin \Eloquent
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ShippingMethod whereDeletedBy($value)
 */
class ShippingMethod extends BaseModel implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['description'];

    protected $table = 'shipping_methods';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['active', 'cost', 'minimum_free', 'default'];

    public const ID_RECOGIDA = 2;


    public static function deletePreviousDefault(){
        $previousDefault = ShippingMethod::whereDefault(1)->first();
        if($previousDefault){
            $previousDefault->default = 0;
            $previousDefault->save();
        }
    }

    public function getRemainingForFree($order_total)
    {
        if ($order_total<$this->minimum_free)
        {
            $remaining = $this->minimum_free-$order_total;
            return round($remaining, 2);
        }
        else
        {
            return 0;
        }
    }

    //region Validation
    public static $rules = [
        'cost' => ['required', 'numeric'],
        'minimum_free' => ['nullable', 'numeric'],
    ];

    public static $rulesMessages = [
        'cost.required' => 'El coste es requerido',
        'cost.numeric' => 'El coste debe ser númerico',
        'minimum_free.numeric' => 'El precio mínimo de envío gratuito debe ser númerico'
    ];

    public static function rulesByLanguage($language) : array {
        return [
            $language.'_description' => ['required', 'max:255']
        ];
    }

    public static function rulesByLanguagesMessages($language) : array{
        return [
            $language.'_description.required' => 'La descripción es obligatoria',
            $language.'_description.max' => 'La descripción no debe exceder los 255 carácteres'
        ];
    }
    //endregion Validation
}
