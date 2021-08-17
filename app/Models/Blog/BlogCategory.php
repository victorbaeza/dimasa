<?php

use App\Models\Enums\OperationType;
use App\Traits\DeletedBy;
use Astrotomic\Translatable\Translatable;
use \Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * BlogCategory
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read Collection|\BlogCategoryDetail[] $details
 * @property-read int|null $details_count
 * @property-read \BlogCategoryTranslation|null $translation
 * @property-read Collection|\BlogCategoryTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static Builder|\BlogCategory listsTranslations($translationField)
 * @method static Builder|\BlogCategory newModelQuery()
 * @method static Builder|\BlogCategory newQuery()
 * @method static Builder|\BlogCategory notTranslatedIn($locale = null)
 * @method static Builder|\BlogCategory orWhereTranslation($translationField, $value, $locale = null)
 * @method static Builder|\BlogCategory orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static Builder|\BlogCategory orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static Builder|\BlogCategory query()
 * @method static Builder|\BlogCategory translated()
 * @method static Builder|\BlogCategory translatedIn($locale = null)
 * @method static Builder|\BlogCategory whereCreatedAt($value)
 * @method static Builder|\BlogCategory whereCreatedBy($value)
 * @method static Builder|\BlogCategory whereId($value)
 * @method static Builder|\BlogCategory whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static Builder|\BlogCategory whereTranslationLike($translationField, $value, $locale = null)
 * @method static Builder|\BlogCategory whereUpdatedAt($value)
 * @method static Builder|\BlogCategory whereUpdatedBy($value)
 * @method static Builder|\BlogCategory withTranslation()
 * @mixin \Eloquent
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\BlogCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\BlogCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BlogCategory whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\BlogCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\BlogCategory withoutTrashed()
 */
class BlogCategory extends BaseModel implements TranslatableContract{
    use Translatable, SoftDeletes, DeletedBy;

    public $translatedAttributes = ['name', 'slug','title_seo', 'description_seo', 'keywords'];

	protected $table='blogs_categories';
	public $timestamps = true;
	protected $primaryKey = 'id';

	const ROUTE_PATH = 'routes.blog_categories';
	const SITEMAP_PRIORITY = 0.4;

	public function details(){
		return $this->hasMany('BlogCategoryDetail','category_id');
	}

    public static function assignSlug(string $name,int $id = 0) : string
    {
        $slug = Str::slug($name);
        $separator = '_';
        $existsSlug = BlogCategoryTranslation::whereSlug($slug)->where('blog_category_id', '!=', $id)->exists(); // Si ya existe el mismo slug, genera otro con un número random 0-99
        if ($existsSlug) {
            //contamos los slugs con el nombre del slug + numero
            $assignedNum = BlogCategoryTranslation::where('slug', 'LIKE', $slug  .  $separator .'%')->where('blog_category_id', '!=', $id)->count();
            $assignedNum++;
            return $slug . '_' . $assignedNum;
        }
        return $slug;
    }

    //region SEO
    public function generateSitemap($type, string $oldSlug = null, string $newSlug = null, $lang){
        switch($type){
            case OperationType::CREATE():
                Sitemap::addURL(self::getProductFullUrl($newSlug, $lang), self::SITEMAP_PRIORITY, $this->updated_at);
                break;
            case OperationType::UPDATE():
                Sitemap::updateURL(self::getProductFullUrl($oldSlug, $lang), self::getProductFullUrl($newSlug, $lang), self::SITEMAP_PRIORITY, $this->updated_at);
                break;
            case OperationType::DELETE():
                Sitemap::deleteURL(self::getProductFullUrl($oldSlug, $lang));
                break;
        }
    }

    private static function getProductFullUrl(string $slug, $lang) : string{
        return $lang.'/'.Lang::get(self::ROUTE_PATH, [], $lang) . '/' . $slug;
    }
    //endregion SEO

}
