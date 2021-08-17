<?php

use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReview extends Eloquent
{
    use SoftDeletes;

    protected $table = 'products_reviews';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'title', 'description', 'stars'];

    public function Photos()
    {
        return $this->hasMany(ProductReviewPhoto::class, 'review_id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function Client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


}
