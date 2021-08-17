<?php


/**
 * App\Models\Product\ProductPhoto
 *
 * @property int $id
 * @property int $product_id
 * @property string $path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @method static Builder|ProductAttachment newModelQuery()
 * @method static Builder|ProductAttachment newQuery()
 * @method static Builder|ProductAttachment query()
 * @method static Builder|ProductAttachment whereCreatedAt($value)
 * @method static Builder|ProductAttachment whereCreatedBy($value)
 * @method static Builder|ProductAttachment whereId($value)
 * @method static Builder|ProductAttachment wherePath($value)
 * @method static Builder|ProductAttachment whereProductId($value)
 * @method static Builder|ProductAttachment whereUpdatedAt($value)
 * @method static Builder|ProductAttachment whereUpdatedBy($value)
 * @mixin Eloquent
 */
class ProductPhoto extends BaseModel
{
    protected $table = 'products_photos';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['path'];
}
