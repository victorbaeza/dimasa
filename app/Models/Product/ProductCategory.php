<?php

use App\Models\Enums\OperationType;
use App\Traits\DeletedBy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Product\ProductCategory
 *
 * @property int $id
 * @property string $description
 * @property int $active
 * @property string $slug
 * @property int|null $parent_id
 * @property string $photo_principal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read Collection|ProductCategory[] $Childrens
 * @property-read int|null $childrens_count
 * @property-read ProductCategory|null $Parent
 * @property-read Collection|Product[] $Products
 * @property-read int|null $products_count
 * @method static Builder|ProductCategory newModelQuery()
 * @method static Builder|ProductCategory newQuery()
 * @method static Builder|ProductCategory query()
 * @method static Builder|ProductCategory whereActive($value)
 * @method static Builder|ProductCategory whereCreatedAt($value)
 * @method static Builder|ProductCategory whereCreatedBy($value)
 * @method static Builder|ProductCategory whereDescription($value)
 * @method static Builder|ProductCategory whereId($value)
 * @method static Builder|ProductCategory whereParentId($value)
 * @method static Builder|ProductCategory whereSlug($value)
 * @method static Builder|ProductCategory whereUpdatedAt($value)
 * @method static Builder|ProductCategory whereUpdatedBy($value)
 
 * @mixin Eloquent
 * @property-read Collection|\ProductCategory[] $Children
 * @property-read int|null $children_count
 * @method static Builder|\ProductCategory wherePhotoPrincipal($value)
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\ProductCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductCategory whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\ProductCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\ProductCategory withoutTrashed()
 */
class ProductCategory extends BaseModel
{
    use SoftDeletes, DeletedBy;

    protected $table = 'products_categories';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['parent_id'];

    const ROUTE_PATH = 'routes.categories'; // Variable de rutas en la configuración de idioma
    const SITEMAP_PRIORITY = 0.6;
    const IMAGE_PATH = '/public/products_categories/images/';// Ruta donde se guardan las imágenes (desde /storage)
    const IMAGE_URL = '/storage/products_categories/images/'; // Ruta para acceder o visualizar las imágenes¡

    //region Relationships
    public function Products(){
        return $this->hasMany(Product::class, 'category_id');
    }

    public function Parent(){
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function Children(){
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
    //endregion Relationships

    public function getPhoto(){
        return $this::IMAGE_URL.$this->photo_principal;
    }

    public static function getParentCategories(){
        return ProductCategory::whereParentId(null);
    }

    public static function getChildrenCategories(){
        return ProductCategory::doesntHave('children');
    }

    public static function assignSlug(string $name,int $id = 0) : string
    {
        $slug = Str::slug($name);
        $separator = '_';
        $existsSlug = ProductCategory::whereSlug($slug)->where('id', '!=', $id)->exists(); // Si ya existe el mismo slug, genera otro con un número random 0-99
        if ($existsSlug) {
            //contamos los slugs con el nombre del slug + numero
            $assignedNum = ProductCategory::where('slug', 'LIKE', $slug  .  $separator .'%')->where('id', '!=', $id)->count();
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

    //region uploads
    public function uploadImagePrincipal($image, $deleteOld = false){
        if($deleteOld){
            $fullPath = $this::IMAGE_PATH.$this->photo_principal;
            if(Storage::exists($fullPath)) {
                Storage::delete($fullPath);
            }
        }

        $filename = $this->getFileName($image);
        $image->storeAs($this::IMAGE_PATH, $filename);
        $this->photo_principal = $filename;
    }

    private function getFileName($attachment){
        return $this->id.'_'. $attachment->getClientOriginalName();
    }
    //endregion uploads

    //region Validation
    public static function rulesByLanguage(string $language){
        return [
            $language.'_name' => 'required',
            $language.'_description' => ['required', 'max:255']
        ];
    }

    public static function rulesMessagesByLanguage($language){
        return [
            $language.'_name.required' => 'El título del lenguage ['.$language.'] es requerido',
            $language.'_description.required' => 'La descripción del lenguage ['.$language.'] es requerido',
            $language.'_description.max' => 'El tamaño máximo de la descripción del lenguage ['.$language.'] es 255 carácteres',
        ];
    }

    public static $rules = [
        'photo_principal' => ['required', 'max:10240', 'image'],
    ];

    public static $rulesMessages = [
        'photo_principal.required' => 'Se debe adjuntar al menos una imagen',
        'photo_principal.max' => 'El tamaño máximo de la imagen principal es 10MB',
        'photo_principal.image' => 'La imagen principal adjuntada no es de un formato aceptado',
    ];

    //endregion Validation
}
