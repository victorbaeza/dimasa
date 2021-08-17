<?php

class ProductReviewPhoto extends Eloquent
{
    protected $table = 'products_reviews_photos';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function Review()
    {
        return $this->belongsTo(ProductReview::class, 'review_id');
    }

}
