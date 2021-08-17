<?php

use Illuminate\Database\Eloquent\Builder;

/**
 * BlogCategoryTranslation
 *
 * @property int $id
 * @property int $blog_category_id
 * @property string $locale
 * @property string $name
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @method static Builder|\BlogCategoryTranslation newModelQuery()
 * @method static Builder|\BlogCategoryTranslation newQuery()
 * @method static Builder|\BlogCategoryTranslation query()
 * @method static Builder|\BlogCategoryTranslation whereBlogCategoryId($value)
 * @method static Builder|\BlogCategoryTranslation whereCreatedBy($value)
 * @method static Builder|\BlogCategoryTranslation whereId($value)
 * @method static Builder|\BlogCategoryTranslation whereLocale($value)
 * @method static Builder|\BlogCategoryTranslation whereName($value)
 * @method static Builder|\BlogCategoryTranslation whereSlug($value)
 * @method static Builder|\BlogCategoryTranslation whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property string|null $keywords
 * @property string|null $title_seo
 * @property string|null $description_seo
 * @method static Builder|\BlogCategoryTranslation whereDescriptionSeo($value)
 * @method static Builder|\BlogCategoryTranslation whereKeywords($value)
 * @method static Builder|\BlogCategoryTranslation whereTitleSeo($value)
 */
class BlogCategoryTranslation extends BaseModel
{
    protected $table = 'blogs_categories_translations';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'slug','title_seo', 'description_seo', 'keywords'];
}
