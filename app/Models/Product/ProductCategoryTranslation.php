<?php

use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Product\ProductCategoryTranslation
 *
 * @method static Builder|ProductCategoryTranslation newModelQuery()
 * @method static Builder|ProductCategoryTranslation newQuery()
 * @method static Builder|ProductCategoryTranslation query()
 * @mixin Eloquent
 * @property int $id
 * @property int $product_category_id
 * @property string $locale
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @method static Builder|\ProductCategoryTranslation whereCreatedAt($value)
 * @method static Builder|\ProductCategoryTranslation whereCreatedBy($value)
 * @method static Builder|\ProductCategoryTranslation whereDescription($value)
 * @method static Builder|\ProductCategoryTranslation whereId($value)
 * @method static Builder|\ProductCategoryTranslation whereLocale($value)
 * @method static Builder|\ProductCategoryTranslation whereName($value)
 * @method static Builder|\ProductCategoryTranslation whereProductCategoryId($value)
 * @method static Builder|\ProductCategoryTranslation whereSlug($value)
 * @method static Builder|\ProductCategoryTranslation whereUpdatedAt($value)
 * @method static Builder|\ProductCategoryTranslation whereUpdatedBy($value)
 * @property string $keywords
 * @property string $title_seo
 * @property string $description_seo
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductCategoryTranslation whereDescriptionSeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductCategoryTranslation whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductCategoryTranslation whereTitleSeo($value)
 */
class ProductCategoryTranslation extends BaseModel
{
    protected $table = 'products_categories_translations';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description','slug', 'title_seo', 'description_seo', 'keywords'];
}
