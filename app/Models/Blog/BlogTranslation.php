<?php

use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Blog\BlogTranslation
 *
 * @method static Builder|BlogTranslation newModelQuery()
 * @method static Builder|BlogTranslation newQuery()
 * @method static Builder|BlogTranslation query()
 * @mixin Eloquent
 * @property int $id
 * @property int $blog_id
 * @property string $locale
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @method static Builder|\BlogTranslation whereBlogId($value)
 * @method static Builder|\BlogTranslation whereContent($value)
 * @method static Builder|\BlogTranslation whereCreatedBy($value)
 * @method static Builder|\BlogTranslation whereDescription($value)
 * @method static Builder|\BlogTranslation whereId($value)
 * @method static Builder|\BlogTranslation whereLocale($value)
 * @method static Builder|\BlogTranslation whereSlug($value)
 * @method static Builder|\BlogTranslation whereTitle($value)
 * @method static Builder|\BlogTranslation whereUpdatedBy($value)
 * @property string $keywords
 * @property string $title_seo
 * @property string $description_seo
 * @method static Builder|\BlogTranslation whereDescriptionSeo($value)
 * @method static Builder|\BlogTranslation whereKeywords($value)
 * @method static Builder|\BlogTranslation whereTitleSeo($value)
 */
class BlogTranslation extends BaseModel
{
    protected $table = 'blog_translations';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'description', 'content', 'slug', 'title_seo', 'description_seo', 'keywords'];
}
