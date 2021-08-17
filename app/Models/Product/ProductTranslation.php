<?php


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Product\ProductTranslation
 *
 * @property int $id
 * @property int $product_id
 * @property int $language
 * @property string $name
 * @property string $description
 * @property string|null $long_description
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @method static Builder|ProductTranslation newModelQuery()
 * @method static Builder|ProductTranslation newQuery()
 * @method static Builder|ProductTranslation query()
 * @method static Builder|ProductTranslation whereCreatedAt($value)
 * @method static Builder|ProductTranslation whereCreatedBy($value)
 * @method static Builder|ProductTranslation whereDescription($value)
 * @method static Builder|ProductTranslation whereId($value)
 * @method static Builder|ProductTranslation whereLanguage($value)
 * @method static Builder|ProductTranslation whereLongDescription($value)
 * @method static Builder|ProductTranslation whereName($value)
 * @method static Builder|ProductTranslation whereProductId($value)
 * @method static Builder|ProductTranslation whereSlug($value)
 * @method static Builder|ProductTranslation whereUpdatedAt($value)
 * @method static Builder|ProductTranslation whereUpdatedBy($value)
 * @mixin Eloquent
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductTranslation whereLocale($value)
 * @property string $keywords
 * @property string $title_seo
 * @property string $description_seo
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductTranslation whereDescriptionSeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductTranslation whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductTranslation whereTitleSeo($value)
 */
class ProductTranslation extends BaseModel
{
    protected $table = 'products_translations';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description', 'unit_name', 'long_description', 'data_sheet_text', 'tests_text', 'certification_text', 'slug', 'title_seo', 'description_seo', 'keywords'];
}
