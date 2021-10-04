<?php


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * ProductOfferDetail
 *
 * @property int $product_id
 * @property int $offer_id
 * @property-read \ProductOffer $Offer
 * @property-read \Product $Product
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductOfferDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductOfferDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductOfferDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductOfferDetail whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ProductOfferDetail whereProductId($value)
 * @mixin \Eloquent
 */
class ProductOfferDetail extends Model
{
    protected $table = 'products_offers_details';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function Product(){
        return $this->belongsTo(Product::class);
    }

    public function Offer(){
        return $this->belongsTo(ProductOffer::class);
    }

    public static function assignOfferToProducts($offer, $products, $deleteOld = false){
        if($deleteOld)
            ProductOfferDetail::where('offer_id', '=', $offer->id)->delete();

        foreach ($products as $product){
            $product_offer = new ProductOfferDetail();
            $product_offer->product_id = $product->id;
            $product_offer->offer_id = $offer->id;
            $product_offer->save();
        }
    }

    public static function assignOffersToProduct($productId, $offersId, $deleteOld = false){
        if($deleteOld)
            self::deleteOffersFromProduct($productId);

        foreach ($offersId as $offerId){
            $product_offer = new ProductOfferDetail();
            $product_offer->product_id = $productId;
            $product_offer->offer_id = $offerId;
            $product_offer->save();
        }
    }

    public static function deleteOffersFromProduct($productId){
        ProductOfferDetail::where('product_id', '=', $productId)->delete();
    }

    public static function getValidOffersForProduct($productId){
        return ProductOfferDetail::whereProductId($productId)->whereHas('offer', function($q){
            $q->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now());
        });
    }
}
