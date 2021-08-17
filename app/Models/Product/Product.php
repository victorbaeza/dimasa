<?php

use App\Models\Enums\OperationType;
use App\Traits\DeletedBy;
use Astrotomic\Translatable\Translatable;
use \Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Gloudemans\Shoppingcart\Contracts\Buyable;

/**
 * App\Models\Product\Product
 *
 * @property int $id
 * @property int $category_id
 * @property float $price
 * @property bool $active
 * @property string $photo_principal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read Collection|ProductFile[] $Files
 * @property-read int|null $files_count
 * @property-read Collection|ProductPhoto[] $Photos
 * @property-read int|null $photos_count
 * @property-read ProductCategory $Category
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereCreatedBy($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product wherePrice1($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product whereUpdatedBy($value)
 * @mixin Eloquent
 * @property-read \ProductTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\ProductTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static Builder|Product listsTranslations($translationField)
 * @method static Builder|Product notTranslatedIn($locale = null)
 * @method static Builder|Product orWhereTranslation($translationField, $value, $locale = null)
 * @method static Builder|Product orWhereTranslationLike($translationField, $value, $locale = null)
 * @method static Builder|Product orderByTranslation($translationField, $sortMethod = 'asc')
 * @method static Builder|Product translated()
 * @method static Builder|Product translatedIn($locale = null)
 * @method static Builder|Product whereTranslation($translationField, $value, $locale = null, $method = 'whereHas', $operator = '=')
 * @method static Builder|Product whereTranslationLike($translationField, $value, $locale = null)
 * @method static Builder|Product withTranslation()
 * @method static Builder|Product whereActive($value)
 * @method static Builder|Product wherePhotoPrincipal($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\ProductOfferDetail[] $OffersDetails
 * @property-read int|null $offers_details_count
 * @method static Builder|Product wherePrice($value)
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Product whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Product withoutTrashed()
 */
class Product extends BaseModel implements TranslatableContract, Buyable
{
    use Translatable, SoftDeletes, DeletedBy;
    public $translatedAttributes = ['name', 'description', 'long_description', 'slug', 'title_seo', 'description_seo', 'keywords'];

    public static $staticTranslatedAttributes =  ['name', 'description', 'long_description', 'slug', 'title_seo', 'description_seo', 'keywords'];

    protected $table = 'products';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['buy_price', 'price_comparison', 'price', 'active', 'category_id', 'brand_id', 'VAT', 'weight'];

    const ROUTE_PATH = 'routes.products'; // Ruta para acceder a la ficha del producto desde el front
    const SITEMAP_PRIORITY = 0.9;
    const IMAGE_PATH = '/public/products/images';// Ruta donde se guardan las imágenes (desde /storage)
    const IMAGE_URL = '/storage/products/images/'; // Ruta para acceder o visualizar las imágenes
    const FILE_PATH = '/public/products/attachments';
    const FILE_URL = '/storage/products/attachments';

    //region Relationships
    public function Files(){
        return $this->hasMany(ProductFile::class, 'product_id');
    }

    public function Photos(){
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }

    public function Category(){
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

    public function OffersDetails(){
        return $this->belongsToMany(ProductOfferDetail::class, 'products_offers_details');
    }

    public function Children()
    {
        return $this->hasMany(Product::class, 'parent_id')->orderBy('price', 'ASC');
    }

    public function Parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function Reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }


    public function hasOffer(int $offerId){
        return ProductOfferDetail::where('product_id', '=', $this->id)->where('offer_id', '=', $offerId)->exists();
    }

    //endregion Relationships

    public function getSlug()
    {
        if ($this->Parent) return $this->Parent->slug;

        return $this->slug;
    }

    public static function assignSlug(string $name,int $id = 0) : string
    {
        $slug = Str::slug($name);
        $separator = '_';
        $existsSlug = ProductTranslation::whereSlug($slug)->where('product_id', '!=', $id)->exists(); // Si ya existe el mismo slug, genera otro con un número random 0-99
        if ($existsSlug) {
            //contamos los slugs con el nombre del slug + numero
            $assignedNum = ProductTranslation::where('slug', 'LIKE', $slug  .  $separator .'%')->where('product_id', '!=', $id)->count();
            $assignedNum++;
            return $slug . '_' . $assignedNum;
        }
        return $slug;
    }

    public function getPhotoPrincipal(){
        if ($this->Parent)
        {
          return self::IMAGE_URL.$this->Parent->photo_principal;
        }

        if(Storage::exists(self::IMAGE_URL.$this->photo_principal))
             return Storage::get(self::IMAGE_URL.$this->photo_principal);

        return self::IMAGE_URL.$this->photo_principal;
    }

    public static function getPhoto(string $path){
        if(Storage::exists(self::IMAGE_URL.$path))
            return Storage::get(self::IMAGE_URL.$path);

        return self::IMAGE_URL.$path;
    }

    public static function getPhotoPrincipalById(int $id){
        $product = Product::findOrFail($id);
        return $product->getPhotoPrincipal();
    }

    public function getFinalPrice($quantity = null){
        $product_price = $this->price;

        $productOfferDetail = ProductOfferDetail::getValidOffersForProduct($this->id)->first();
        if(!empty($productOfferDetail))
        {
            return $productOfferDetail->Offer->getDiscount($product_price);
        }

        return $product_price;
    }


    public function getVATPercentage()
    {
        $vat = round($this->VAT*100, 2).'%';
        return $vat;
    }

    // Prices with VAT
    public function getFinalPriceWithVAT()
    {
        $total = $this->getFinalPrice();
        $vat = $this->VAT;

        $total_with_vat = $total*(1+$vat);

        return $total_with_vat;
        // return number_format(round($total_with_vat, 2), 2, ".", ",");
    }

    public function getLowestPriceWithVAT()
    {
        $lowest_price = $this->getLowestPrice();
        $vat = $this->VAT;

        $lowest_price_with_vat = $lowest_price*(1+$vat);
        return $lowest_price_with_vat;
    }

    public function getLowestPricePerUnitWithVAT()
    {
        $lowest_per_unit = $this->getLowestPricePerUnit();
        $vat = $this->VAT;

        $lowest_per_unit_with_vat = $lowest_per_unit*(1+$vat);
        return $lowest_per_unit_with_vat;
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

    public function uploadImages($images, $deleteOld = false){
        if($deleteOld){
           $paths = $this->Photos()->pluck('path')->all();
           foreach ($paths as $path){
               $fullPath = $this::IMAGE_PATH.$path;
               if(Storage::exists($fullPath)){
                   Storage::delete($fullPath);
               }
           }
           $this->Photos()->delete();
        }

        foreach ($images as $image){
            $filename = $this->getFileName($image);
            $finalFileName = $this::IMAGE_PATH.$filename;
            if(Storage::exists($finalFileName)){
                Storage::delete($finalFileName);
            }
            $image->storeAs($this::IMAGE_PATH, $filename);
            $this->Photos()->create([
                'path' => $filename
            ]);
        }
    }

    public function uploadFiles($files, $deleteOld = false){
        if($deleteOld){
            $paths = $this->Files()->pluck('path')->all();
            foreach($paths as $path){
                $fullPath = $this::FILE_PATH.$path;
                if(Storage::exists($fullPath)){
                    Storage::delete($fullPath);
                }
            }
        }

        foreach ($files as $file){
            $filename = $this->getFileName($file);
            $file->storeAs($this::FILE_PATH, $filename);
            $this->Files()->create([
                'path' => $filename
            ]);
        }
    }

    private function getFileName($attachment){
        return $this->id.'_'. $attachment->getClientOriginalName();
    }
    //endregion uploads

    //region Validation
    public static function rulesByLanguage($language){
        return [
            $language.'_name' => 'required',
            $language.'_description' => ['required','max:255']
        ];
    }

    public static function rulesMessagesByLanguage($language){
        return [
            $language.'_name.required' => 'El título del lenguage ['.$language.'] es requerido',
            $language.'_description.required' => 'La descripción del lenguage ['.$language.'] es requerido',
            $language.'_description.max' => 'El tamaño máximo de la descripción del lenguage ['.$language.'] es 255 carácteres',
        ];
    }

    public static $rulesCreate = [
        'photo_principal' => ['required', 'max:10240', 'image'],
        'photo' => ['nullable'],
        'photo.*' => ['image', 'max:10240'],
        'price' => ['required', 'numeric'],
        'VAT' => ['required', 'numeric'],
        'files' => ['nullable'],
        'files.*' => ['file', 'max:10240'],
        'category' => ['required'],
        'weight' => ['required', 'numeric']
    ];

    public static $rulesEdit = [
        'photo' => ['nullable'],
        'photo.*' => ['image', 'max:10240'],
        'price' => ['required', 'numeric'],
        'VAT' => ['required', 'numeric'],
        'files' => ['nullable'],
        'files.*' => ['file', 'max:10240'],
        'category' => ['required'],
        'weight' => ['required', 'numeric']
    ];

    public static $rulesMessages = [
        'photo_principal.required' => 'Se debe adjuntar la imagen principal',
        'photo_principal.max' => 'El tamaño máximo de la imagen principal es 10MB',
        'photo_principal.image' => 'La imagen principal adjuntada no es de un formato aceptado',
        'photo.max' => 'El tamaño máximo de cada una de las imagenes adjuntas es 10MB',
        'photo.image' => 'La imagen adjuntada no es de un formato aceptado',
        'price.required' => 'El precio es requerido',
        'price.numeric' => 'El precio debe ser númerico',
        'VAT.required' => 'El IVA es requerido',
        'VAT.numeric' => 'El IVA debe ser numérico',
        'files.file' => 'EL archivo no es de un formato aceptado',
        'file.max' => 'El tamaño máximo del archivo es 10MB',
        'category.required' => 'La categoría es requerida',
        'weight.required' => 'El peso del producto es obligatorio!',
        'weight.numeric' => 'El peso debe ser un valor numérico'
    ];
    //endregion Validation

    //region Buyable
    public function getBuyableIdentifier($options = null)
    {
       return $this->id;
    }

    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }

    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

    public function getBuyableWeight($options = null)
    {
        return null;
    }
    //enregion Buyable
}
