<?php

use App\Models\Enums\OperationType;
use App\Traits\DeletedBy;

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

 * @mixin \Eloquent
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\BlogCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\BlogCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BlogCategory whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\BlogCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\BlogCategory withoutTrashed()
 */
class BlogCategory extends BaseModel
{
    use SoftDeletes, DeletedBy;

  	protected $table='blogs_categories';
  	public $timestamps = true;
  	protected $primaryKey = 'id';

  	const ROUTE_PATH = 'routes.blog_categories';
  	const SITEMAP_PRIORITY = 0.4;

  	public function Details()
    {
  		return $this->hasMany('BlogCategoryDetail', 'category_id');
  	}

    public static function assignSlug(string $name,int $id = 0) : string
    {
        $slug = Str::slug($name);
        $separator = '_';
        $existsSlug = BlogCategory::whereSlug($slug)->where('id', '!=', $id)->exists(); // Si ya existe el mismo slug, genera otro con un número random 0-99
        if ($existsSlug) {
            //contamos los slugs con el nombre del slug + numero
            $assignedNum = BlogCategory::where('slug', 'LIKE', $slug  .  $separator .'%')->where('id', '!=', $id)->count();
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
