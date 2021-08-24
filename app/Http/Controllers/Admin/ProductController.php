<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Redirect;
use View;

// Clases propias
use App\Models\Enums\OperationType;
use Helper;
use Product;
use ProductCategory;
use ProductOffer;
use ProductOfferDetail;
use ProductRate;

class ProductController extends Controller
{
    //region Product

    public function list(Request $request)
    {
        $products = Product::query()->whereNull('parent_id');

        $q = $request->input('q');
        if (!empty($q)) {
            $products = $products->where('products.name', 'LIKE', '%' .$q. '%')->orWhere('products.sku', 'LIKE', '%' .$q. '%');
        }

        $order_col = $request->input('order_col');
        $order = $request->input('order');

        $products = Helper::do_orderColumn($products, $order_col, $order, 'id', 'ASC');

        $products = $products->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.products.list', compact('products', 'q', 'order_col', 'order'));
    }

    public function create(){
        $categories = ProductCategory::getChildrenCategories()->get();

        return view('admin.products.create', compact('categories'));
    }

    public function do_create(Request $request)
    {
        $product = new Product;
        $this->saveData($product, $request, true);

        return redirect()->route('admin.products.list')->with('success', 'El producto ha sido creado correctamente');
    }

    private function saveData(Product $product, Request $request, $new=false)
    {
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->name = $request->input('name');
        $product->buy_price = $request->input('buy_price');
        $product->price_comparison = $request->input('price_comparison');
        $product->price = $request->input('price');
        $product->VAT = $request->input('VAT');
        // $product->discount = $request->input('discount');
        $product->stock = $request->input('stock');
        $product->sku = $request->input('sku');
        $product->ean_code = $request->input('ean_code');
        $product->reference = $request->input('reference');

        // Campos para el front
        $product->slug = $product->assignSlug();
        $product->seo_title = $request->input('seo_title');
        $product->seo_description = $request->input('seo_description');
        $product->seo_keywords = $request->input('seo_keywords');

        if ($request->hasFile('image'))
            $product->uploadImage($request->file('image'));

        // if ($new)
        // {
        //     $product->slug = $product->assignSlug();
        // }

        $product->save();
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    public function do_edit(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $this->saveData($product, $request);

        return redirect()->back()->with('success', 'El producto ha sido modificado correctamente');
    }

    public function delete(Request $request, int $id){
        try {
            $product = Product::whereId($id)->first();
            $product->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'El producto a eliminar no existe');
        }

        return redirect()->route('admin.products.list')->with('success', 'El producto ha sido borrada correctamente');
    }

    public function do_deleteProductRate(int $id, int $rate_id)
    {
        $product_rate = ProductRate::where('id', $rate_id)->where('product_id', $id)->first();
        if (!$product_rate) return redirect()->back()->with('error', 'La tarifa que intenta eliminar no existe!');

        $product_rate->delete();

        return redirect()->back()->with('success', 'La tarifa ha sido eliminada correctamente!');
    }


    // Subproducts
    public function editSubproducts($id)
    {
        $product = Product::whereNull('parent_id')->where('id', $id)->first();
        if (!$product) return redirect()->back()->with('error', 'Ha ocurrido un error, por favor inténtelo de nuevo');

        $subproducts = Product::where('parent_id', $product->id)->get();
        $languages = Helper::getLanguages();

        return view('admin.products.subproducts.edit', compact('product', 'subproducts', 'languages'));
    }

    private function updateProductChildren(Product $product, Request $request)
    {
        foreach ($product->Children as $subproduct)
        {
            $subproduct->category_id = $product->category_id;
            $subproduct->price = floatval($request->input('subproduct_price_'.$subproduct->id));
            $subproduct->VAT = $product->VAT;
            $subproduct->weight = floatval($request->input('subproduct_weight_'.$subproduct->id));
            $subproduct->box_quantity = intval($request->input('subproduct_box_quantity_'.$subproduct->id));
            $subproduct->enterprise = $product->enterprise;
            $subproduct->parent_id = $product->id;
            $subproduct->name = $request->input('subproduct_name_'.$subproduct->id);
            $subproduct->save();
        }

        $num_new_subproducts = intval($request->input('num_subproducts'));
        for ($i=1 ; $i<=$num_new_subproducts ; $i++)
        {
           $name = $request->input('add_subproduct_name_'.$i);
           $price = floatval($request->input('add_subproduct_price_'.$i));

           if (isset($name) && isset($price))
           {
              $subproduct = new Product;
              $subproduct->category_id = $product->category_id;
              $subproduct->price = $price;
              $subproduct->VAT = $product->VAT;
              $subproduct->weight = floatval($request->input('add_subproduct_weight_'.$i));
              $subproduct->box_quantity = intval($request->input('add_subproduct_box_quantity_'.$i));
              $subproduct->enterprise = $product->enterprise;
              $subproduct->parent_id = $product->id;
              $subproduct->name = $name;
              $subproduct->save();
           }
        }

    }

    public function do_deleteSubproduct($id, $subproduct_id)
    {
        $subproduct = Product::where('parent_id', $id)->where('id', $subproduct_id)->first();
        if (!$subproduct) return redirect()->back()->with('error', 'El subproducto a eliminar no existe, por favor inténtelo de nuevo');

        $subproduct->delete();

        return redirect()->back()->with('success', 'El subproducto ha sido eliminado correctamente!');
    }

    private function updateProductRates(Product $product, Request $request)
    {
        foreach ($product->Rates as $rate)
        {
            $rate->min_quantity = $request->input('min_quantity_'.$rate->id);
            $rate->max_quantity = $request->input('max_quantity_'.$rate->id);
            $rate->unit_price = $request->input('unit_price_'.$rate->id);
            $rate->save();
        }

        $num_new_rates = intval($request->input('num_rates'));
        for ($i=1 ; $i<=$num_new_rates ; $i++)
        {
           $min_quantity = $request->input('add_rate_min_'.$i);
           $unit_price = $request->input('add_rate_price_'.$i);

           if (isset($min_quantity) && isset($unit_price))
           {
              $product_rate = new ProductRate;
              $product_rate->product_id = $product->id;
              $product_rate->min_quantity = $min_quantity;
              $product_rate->max_quantity = $request->input('add_rate_max_'.$i);
              $product_rate->unit_price = $unit_price;
              $product_rate->save();
           }
        }
    }

    private function uploadProductAttachments(Request $request, Product $product,bool $deleteOld){
        if($request->hasFile('photo_principal')){
            $product->uploadImagePrincipal($request->file('photo_principal'), true);
        }

        if($request->hasFile('photos')){
            $product->uploadImages($request->file('photos'), $deleteOld);
        }

        if($request->hasFile('files')){
            $product->uploadFiles($request->file('files'), $deleteOld);
        }
        $product->save();
    }

    public function changeAvailability(Request $request, $id){
        $product = Product::findOrFail($id);

        $active = $request->get('active');
        $product->active = $active;

        $product->save();

        return redirect()->route('admin.products.list');
    }

    private function validateProductTranslation(Request $request, $language)
    {
        $request->validate(Product::rulesByLanguage($language), Product::rulesMessagesByLanguage($language));
    }

    private function validateProduct(Request $request, bool $isCreate)
    {
        $request->validate($isCreate ? Product::$rulesCreate : Product::$rulesEdit, Product::$rulesMessages);
    }

    /*
    * END Productos
    /

    /*
    * Categorías
    */
    public function listCategories(Request $request)
    {
        $categories = ProductCategory::query();
        $q = $request->input('q');

        if ($q) $categories = $categories->where('name', 'LIKE', '%' .$q. '%')->orWhere('description', 'LIKE', '%' .$q. '%');

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $categories = Helper::do_orderColumn($categories, $order_col, $order, 'id', 'DESC');

        $categories = $categories->paginate(Helper::NUM_PAGED_RESULTS);

        return view('admin.products.categories.list', compact('categories', 'q', 'order_col', 'order'));
    }

    public function createCategory()
    {
        return view('admin.products.categories.create');
    }

    public function do_createCategory(Request $request)
    {
        $category = new ProductCategory;
        $this->saveDataCategory($category, $request, true);

        return redirect()->action('ProductsController@listCategories')->with('success', 'La categoría de producto ha sido creado correctamente');
    }

    private function saveDataCategory(ProductCategory $category, Request $request, $new=false)
    {

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');

        // Campos del front
        $category->slug = $category->assignSlug($category->name);
        $category->seo_title = $request->input('seo_title');
        $category->seo_description = $request->input('seo_description');
        $category->seo_keywords = $request->input('seo_keywords');

        $category->save();

    }

    public function editCategory($id)
    {
        $category = ProductCategory::findOrFail($id);

        return view('admin.products.categories.edit', compact('category'));
    }

    public function do_editCategory(Request $request)
    {
        $category = ProductCategory::findOrFail($request->id);

        $this->saveDataCategory($category, $request);

        return redirect()->back()->with('success', 'La categoría de producto ha sido modificado correctamente');
    }

    public function deleteCategory(Request $request, int $id){
        try {
            $category = ProductCategory::whereId($id)->first();
            $category->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'La categoría a eliminar no existe');
        }

        return redirect()->route('admin.products.categories.list')->with('success', 'La categoría ha sido borrada correctamente');
    }


    private function validateCategory(Request $request)
    {
        $request->validate(ProductCategory::$rules, ProductCategory::$rulesMessages);
    }
    //endregion Product Category


    /*
    *   BRANDS
    */
    public function listBrands(Request $request)
    {
        $brands = ProductBrand::query();
        $q = $request->input('q');

        if ($q) $brands = $brands->where('name', 'LIKE', '%' .$q. '%')->orWhere('description', 'LIKE', '%' .$q. '%');

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $brands = Helper::do_do_orderColumn($brands, $order_col, $order, 'id', 'DESC');

        $brands = $brands->paginate(Helper::NUM_PAGED_RESULTS);

        return view('admin.products.brands.list', compact('brands', 'q', 'order_col', 'order'));
    }

    public function createBrand()
    {
        return view('admin.products.brands.create');
    }

    public function do_createBrand(Request $request)
    {
        $brand = new ProductBrand;
        $this->saveDataBrand($brand, $request, true);

        return redirect()->action('ProductsController@listBrands')->with('success', 'La marca de producto ha sido creado correctamente');
    }

    private function saveDataBrand(ProductBrand $brand, Request $request, $new=false)
    {

        $brand->name = $request->input('name');
        $brand->description = $request->input('description');

        // Campos del front
        $brand->slug = $brand->assignSlug();
        $brand->seo_title = $request->input('seo_title');
        $brand->seo_description = $request->input('seo_description');
        $brand->seo_keywords = $request->input('seo_keywords');
        $brand->save();

    }

    public function editBrand($id)
    {
        $brand = ProductBrand::findOrFail($id);

        return view('admin.products.brands.edit', compact('brand'));
    }

    public function do_editBrand(Request $request)
    {
        $brand = ProductBrand::findOrFail($request->id);

        $this->saveDataBrand($brand, $request);

        return redirect()->back()->with('success', 'La marca de producto ha sido modificado correctamente');
    }

    /*
    *   Endregion BRANDS
    */



    //region Product Offers
    public function listOffers(Request $request){
        $offers = ProductOffer::query();
        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $offers = Helper::do_orderColumn($offers,$order_col,$order);
        $offers = $offers->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.products.offers.list', compact('offers', 'order_col', 'order'));
    }

    public function createOffer(){
        $categories = ProductCategory::getParentCategories()->get();

        return view('admin.products.offers.create', compact('categories'));
    }

    public function do_createOffer(Request $request){
        $offerData = $this->getOfferData($request);
        $offer = new ProductOffer();
        $offer = $offer::create($offerData);
        $categoryId = $request->input('category');
        $subcategoriesId = $request->input('subcategories');

        if(!$categoryId)
            return redirect()->route('admin.products.offers.list')->with('success', 'La oferta ha sido creada');

        $this->assignOfferToProducts($offer, $categoryId, $subcategoriesId);

        return redirect()->route('admin.products.offers.list')->with('success', 'La oferta ha sido creada');
    }

    public function editOffer(int $id){
        $offer = ProductOffer::findOrFail($id);
        $languages = Helper::getLanguages();
        $categories = ProductCategory::getParentCategories()->get();
        $productsAssigned = Product::whereIn('id', function($query) use ($offer) {
            $query->select('product_id')->from('products_offers_details')->where('offer_id', '=', $offer->id);
        })->get();
        return view('admin.products.offers.edit', compact('languages', 'offer', 'categories', 'productsAssigned'));
    }

    public function do_editOffer(Request $request, int $id){
        $offer = ProductOffer::findOrFail($id);
        $offerData = $this->getOfferData($request);
        $offer->fill($offerData);
        $offer->save();

        $categoryId = $request->input('category');
        $subcategoriesId = $request->input('subcategories');

        if(!$categoryId)
            return redirect()->route('admin.products.offers.list')->with('success', 'La oferta ha sido modificada');

        $this->assignOfferToProducts($offer, $categoryId, $subcategoriesId, true);

        return redirect()->route('admin.products.offers.list')->with('success', 'La oferta ha sido modificada');
    }

    public function deleteOffer(Request $request, int $id){
        try {
            $offer = ProductOffer::whereId($id)->first();
            $offer->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'La oferta a eliminar no existe');
        }

        return redirect()->route('admin.products.offers.list')->with('success', 'La oferta ha sido borrada correctamente');
    }

    private function getOfferData(Request $request){
        $this->validateOffer($request);

        return [
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'discount' => $request->input('discount'),
            'discount_type' => intval($request->input('discount_type'))
        ];
    }

    private function assignOfferToProducts(ProductOffer $offer, int $categoryId, ?array $subcategoriesId, bool $isEdit = false){
        if($subcategoriesId){
            foreach($subcategoriesId as $subcategoryId){
                $subcategory = ProductCategory::findOrFail($subcategoryId);
                ProductOfferDetail::assignOfferToProducts($offer, $subcategory->products, $isEdit);
            }
        }else{
            $category = ProductCategory::findOrFail($categoryId);
            if($category->Children->count() > 0){
                foreach ($category->Children as $subcategory) {
                    ProductOfferDetail::assignOfferToProducts($offer, $subcategory->products, $isEdit);
                }
            }else{
                ProductOfferDetail::assignOfferToProducts($offer, $category->products, $isEdit);
            }

        }
    }

    public function assignOffers(int $id){
        $product = Product::findOrFail($id);
        $offers = ProductOffer::where('end_date', '>=', date("Y-m-d"))->orderBy('start_date')->get();


        return view('admin.products.assign_offers', compact('product', 'offers'));
    }

    public function do_assignOffers(Request $request, int $id){
        Product::findOrFail($id);
        $offers = $request->input('offers');
        if($offers){
            $offersId = array_keys($offers);
            ProductOfferDetail::assignOffersToProduct($id,$offersId,true);
        }else{
            ProductOfferDetail::deleteOffersFromProduct($id);
        }
        return redirect()->route('admin.products.list');
    }

    private function validateOffer(Request $request){
        $request->validate(ProductOffer::$rules, ProductOffer::$rulesMessages);
    }
    //endregion Product Offers

}
