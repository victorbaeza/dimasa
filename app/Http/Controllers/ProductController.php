<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Product;
use Cart;
use ProductOfferDetail;

class ProductController extends Controller
{

  public function getProductsCategory()
{
    return view('site.products.category', compact('familia', 'products', 'total'));
}

    public function showProductList(Request $request)
    {
        // $products = Product::where('active', 1)->whereNull('parent_id')->get();
        $products = Product::translatedIn(app()->getLocale())
                           ->where('active', 1)->whereNull('parent_id')->orderByTranslation('name', 'DESC')->get();

        return view('site.store.product_list', compact('products'));
    }

    public function show(Request $request, string $slug)
    {
        $product = Product::whereNull('parent_id')->whereTranslation('slug', $slug)->firstOrFail();

        $isInCart = false;
        foreach (Cart::content() as $cartItem){
            if($cartItem->id == $product->id){
                $isInCart = $cartItem->rowId;
                break;
            }
        }

        $related_products = Product::translatedIn(app()->getLocale())
                                   ->whereNull('parent_id')->where('id', '!=', $product->id)->limit(3)->get();

        $productOfferPrice = $product->getFinalPriceWithVAT();
        return view('site.store.product_view', compact('product','isInCart','productOfferPrice', 'related_products'));
    }
}
