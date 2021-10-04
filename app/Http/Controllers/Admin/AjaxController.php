<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

// Clases propias
use Helper;
use ProductCategory;
use Product;
use ProductPhoto;
use Vendor;
use PaymentForm;
use PurchasePaymentForm;

class AjaxController extends Controller
{
    public function editorUpload(Request $request){
        $imgpath = $request->file('file')->store('uploads', 'public');
        $imgpath = '/storage/'.$imgpath;
        return response()->json(['location' => $imgpath]);
    }

    public function getSubcategories(Request $request){
        $categoryId = intval($request->query('categoryId'));
        if($categoryId === 0)
            return response()->json([]);

        $subcategories = ProductCategory::whereParentId($categoryId)->get();
        $select2Subcategories = array();
        foreach ($subcategories as $subcategory){
            array_push($select2Subcategories, ['id' => $subcategory->id, 'text' => $subcategory->name]);
        }

        return response()->json($select2Subcategories);
    }

    public function do_deleteProductPhoto(Request $request)
    {
        $photo = ProductPhoto::where('product_id', $request->product_id)->where('id', $request->id)->firstOrFail();

        $fullPath = Product::IMAGE_PATH.$photo->path;
        if(Storage::exists($fullPath)){
            Storage::delete($fullPath);
        }

        $photo->delete();

        return response()->json('ok');
    }

    /**
     * Listado Clientes
     *
     *
     */

     public function selectUsers(Request $request)
     {
         $output=array();

         $q = $request->input('search');
         $users = User::query();
         if($q!=""){
         $users->where(function($query) use($q){
           $query->where('name', 'LIKE','%'.$q.'%')->orwhere('username', 'LIKE','%'.$q.'%');
         });
         }

         $users = $users->orderBy('name', 'ASC');

         $total = $users->count();
         $users = $users->paginate(Helper::NUM_PAGED_RESULTS);

         $results=array();

         foreach ($users as $user)
         {
           $temp=array();
           $temp['id']=$user->id;
           $temp['text']=$user->name;
           $results[]=$temp;
         }
         $output['results']=$results;

         $pagination=array();
         $pagination['more']=$users->hasMorePages();

         $output['pagination']=$pagination;

         return json_encode($output);
    }


    public function selectClients(Request $request)
    {
        $output=array();

        $q = $request->input('search');
        $clients = Client::query();

        if($q!=""){
        $clients->where(function($query) use($q){
          $query->where('name', 'LIKE','%'.$q.'%')->orwhere('company_name', 'LIKE','%'.$q.'%')->orwhere('alias', 'LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%');
        });
        }

        $clients = $clients->orderBy('name', 'ASC');

        $total = $clients->count();
        $clients = $clients->paginate(Helper::NUM_PAGED_RESULTS);

        $results=array();

        foreach ($clients as $client)
        {
          $temp=array();
          $temp['id']=$client->id;
          $temp['text']=$client->name;
          $results[]=$temp;
        }
        $output['results']=$results;

        $pagination=array();
        $pagination['more']=$clients->hasMorePages();

        $output['pagination']=$pagination;

        return json_encode($output);
    }


    public function selectVendors(Request $request)
    {
        $output=array();

        $q = $request->input('search');
        $vendors = Vendor::query();

        if($q!=""){
          $vendors->where(function($query) use($q){
            $query->where('name', 'LIKE','%'.$q.'%')->orwhere('company_name', 'LIKE','%'.$q.'%')->orwhere('alias', 'LIKE','%'.$q.'%');
          });
        }

        $vendors = $vendors->orderBy('name', 'ASC');

        $total = $vendors->count();
        $vendors = $vendors->paginate(Helper::NUM_PAGED_RESULTS);

        $results=array();

        foreach($vendors as $vendor)
        {
          $temp=array();
          $temp['id']=$vendor->id;
          $temp['text']=$vendor->name;
          $results[]=$temp;
        }
        $output['results']=$results;

        $pagination=array();
        $pagination['more']=$vendors->hasMorePages();

        $output['pagination']=$pagination;

        return json_encode($output);
    }

    public function selectProducts(Request $request)
    {
        $output=array();

        $q = $request->input('search');
        $products = Product::query();

        if($q!=""){
          $products = $products->whereTranslationLike('name','%'.$q.'%');
          // $products->where(function($query) use($q){
          //   $query->whereTranslationLike('name', '%'.$q.'%')->orWhere('sku', 'LIKE','%'.$q.'%')->orWhere('reference', 'LIKE','%'.$q.'%');
          // });
        }

        // $products = $products->orderBy('name', 'ASC');

        $total = $products->count();
        $products = $products->paginate(Helper::NUM_PAGED_RESULTS);

        $results=array();

        foreach($products as $product)
        {
          $temp=array();
          $temp['id']=$product->id;
          $temp['text']=$product->name;
          $results[]=$temp;
        }
        $output['results']=$results;

        $pagination=array();
        $pagination['more']=$products->hasMorePages();

        $output['pagination']=$pagination;

        return json_encode($output);
    }


    public function selectPaymentForms(Request $request)
    {
        $output=array();

        $q = $request->input('search');
        $payment_forms = PaymentForm::query();

        if($q!=""){
          $payment_forms->where(function($query) use($q){
            $query->where('short_name', 'LIKE','%'.$q.'%')->orWhere('name', 'LIKE', '%' .$q . '%');
          });
        }

        // $payment_forms = $payment_forms->orderBy('name', 'ASC');

        $total = $payment_forms->count();
        $payment_forms = $payment_forms->paginate(Helper::NUM_PAGED_RESULTS);

        $results=array();

        foreach($payment_forms as $payment_form)
        {
          $temp=array();
          $temp['id']=$payment_form->id;
          $temp['text']=$payment_form->name;
          $results[]=$temp;
        }
        $output['results']=$results;

        $pagination=array();
        $pagination['more']=$payment_forms->hasMorePages();

        $output['pagination']=$pagination;

        return json_encode($output);
    }

    public function selectPurchasePaymentForms(Request $request)
    {
        $output=array();

        $q = $request->input('search');
        $payment_forms = PurchasePaymentForm::query();

        if($q!=""){
          $payment_forms->where(function($query) use($q){
            $query->where('short_name', 'LIKE','%'.$q.'%')->orWhere('name', 'LIKE', '%' .$q . '%');
          });
        }

        // $payment_forms = $payment_forms->orderBy('name', 'ASC');

        $total = $payment_forms->count();
        $payment_forms = $payment_forms->paginate(Helper::NUM_PAGED_RESULTS);

        $results=array();

        foreach($payment_forms as $payment_form)
        {
          $temp=array();
          $temp['id']=$payment_form->id;
          $temp['text']=$payment_form->name;
          $results[]=$temp;
        }
        $output['results']=$results;

        $pagination=array();
        $pagination['more']=$payment_forms->hasMorePages();

        $output['pagination']=$pagination;

        return json_encode($output);
    }


    // Productos
    public function getProductInfo(Request $request)
    {
        $output = array();
        $product = Product::findOrFail($request->input('id'));

        $output['id'] = $product->id;
        $output['name'] = $product->name;
        $output['category_id'] = $product->category_id;
        $output['buy_price'] = $product->buy_price;
        $output['price'] = $product->price;
        $output['VAT'] = $product->VAT;
        $output['discount'] = $product->discount;
        $output['stock'] = $product->stock;
        $output['sku'] = $product->sku;
        $output['ean_code'] = $product->ean_code;
        $output['reference'] = $product->reference;

        return json_encode($output);
    }

    // Clientes
    public function getClientInfo(Request $request)
    {
        $output = array();
        $client = Client::findOrFail($request->input('id'));

        $output['id'] = $client->id;
        $output['name'] = $client->name;
        $output['company_name'] = $client->company_name;
        $output['NIF'] = $client->NIF;
        $output['email'] = $client->email;
        $output['phone'] = $client->phone;
        $output['address'] = $client->address;
        $output['city'] = $client->city;
        $output['zip'] = $client->zip;
        $output['province'] = $client->province;
        $output['country'] = $client->country;
        $output['payment_form_id'] = $client->payment_form_id;
        $output['observations'] = $client->observatio;

        return json_encode($output);
    }
}
