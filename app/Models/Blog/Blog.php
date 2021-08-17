<?php

use App\Models\Enums\OperationType;
use App\Traits\DeletedBy;
use Astrotomic\Translatable\Translatable;
use \Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Blog\Blog
 *
 * @property string title
 * @property string|null $image
 * @property int $active
 * @property int $featured
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read Collection|BlogCategoryDetail[] $details
 * @property-read int|null $details_count
 * @method static Builder|Blog newModelQuery()
 * @method static Builder|Blog newQuery()
 * @method static Builder|Blog query()
 * @method static Builder|Blog whereActive($value)
 * @method static Builder|Blog whereCreatedAt($value)
 * @method static Builder|Blog whereCreatedBy($value)
 * @method static Builder|Blog whereFeatured($value)
 * @method static Builder|Blog whereId($value)
 * @method static Builder|Blog whereImage($value)
 * @method static Builder|Blog whereUpdatedAt($value)
 * @method static Builder|Blog whereUpdatedBy($value)
 * @mixin Eloquent
 * @property-read BlogTranslation|null $translation
 * @property-read Collection|BlogTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static Builder|\Blog listsTranslations($translationField)
 * @method static Builder|\Blog notTranslatedIn($locale = null)
 * @method static Builder|\Blog orWhereTranslation($translationField, $value, $locale = null)
 * @method static Builder|\Blog orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static Builder|\Blog orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static Builder|\Blog translated()
 * @method static Builder|\Blog translatedIn($locale = null)
 * @method static Builder|\Blog whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static Builder|\Blog whereTranslationLike($translationField, $value, $locale = null)
 * @method static Builder|\Blog withTranslation()
 * @property int $id
 * @property int|null $deleted_by
 * @property Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Blog onlyTrashed()
 * @method static Builder|\Blog whereDeletedAt($value)
 * @method static Builder|\Blog whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Blog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Blog withoutTrashed()
 */
class Blog extends BaseModel implements TranslatableContract
{
    use Translatable, SoftDeletes, DeletedBy;
    public $translatedAttributes = ['title', 'description', 'content', 'slug','title_seo', 'description_seo', 'keywords'];

    protected $table = 'blogs';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['active', 'featured'];

    const ROUTE_PATH = 'routes.blog'; // Ruta para acceder a la ficha del blog desde el front
    const IMAGE_PATH = '/public/blogs'; // Ruta donde se guardan las imágenes (desde /storage)
    const IMAGE_URL = '/storage/blogs/'; // Ruta para acceder o visualizar las imágenes
    const SITEMAP_PRIORITY = 0.4; // Prioridad por defecto para las entradas de blogs

    //region Relationships
    public function details()
    {
        return $this->hasMany(BlogCategoryDetail::class, 'blog_id');
    }
    public function hasCategory($id): bool
    {
        return null != BlogCategoryDetail::where('blog_id', '=', $this->id)->where('category_id', '=', $id)->first();
    }
    //endregion Relationships

    public static function assignSlug(string $title,int $id = 0) : string
    {
        $slug = Str::slug($title);
        $separator = '_';
        $existsSlug = BlogTranslation::whereSlug($slug)->where('blog_id', '!=', $id)->exists(); // Si ya existe el mismo slug, genera otro con un número random 0-99
        if ($existsSlug) {
            //contamos los slugs con el nombre del slug + numero
            $assignedNum = BlogTranslation::where('slug', 'LIKE', $slug  .  $separator .'%')->where('blog_id', '!=', $id)->count();
            $assignedNum++;
            return $slug . '_' . $assignedNum;
        }
        return $slug;
    }

// Función para subir imagen del blog
    public function uploadImage($image)
    {
        $filename = $this->id . '_' . $image->getClientOriginalName();
        $image->storeAs($this::IMAGE_PATH, $filename);
        $this->image = $filename;
        $this->save();
    }

// Función para obtener la URL de la imagen
    public function Image()
    {
        if(Storage::exists($this::IMAGE_URL.$this->image))
            return Storage::get($this::IMAGE_URL.$this->image);

        return $this::IMAGE_URL . $this->image;
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

    //region Validation
    public static function rulesByLanguage($language){
        return [
            $language.'_title' => 'required',
            $language.'_description' => ['nullable','max:255'],
            $language.'_content'=> 'required'
        ];
    }

    public static function rulesMessagesByLanguage($language){
        return [
            $language.'_title.required' => 'El título del lenguage ['.$language.'] es requerido',
            $language.'_description.max' => 'El tamaño máximo de la descripción del lenguage ['.$language.'] es 255 carácteres',
            $language.'_content.required' => 'El contenido del lenguaje ['.$language.'] es requerido'
        ];
    }

    public static $rules = ['picture' => ['nullable','image', 'max:10240']];

    public static $rulesMessages = [
        'picture.max' => 'El tamaño máximo de la imagen es 10MB',
        'picture.image' => 'La imagen adjuntada no es de un formato aceptado'
    ];

    //endregion Validation
}
