<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Product\ProductFile
 *
 * @property int $id
 * @property int $product_id
 * @property string $path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @method static Builder|ProductFile newModelQuery()
 * @method static Builder|ProductFile newQuery()
 * @method static Builder|ProductFile query()
 * @method static Builder|ProductFile whereCreatedAt($value)
 * @method static Builder|ProductFile whereCreatedBy($value)
 * @method static Builder|ProductFile whereId($value)
 * @method static Builder|ProductFile wherePath($value)
 * @method static Builder|ProductFile whereProductId($value)
 * @method static Builder|ProductFile whereUpdatedAt($value)
 * @method static Builder|ProductFile whereUpdatedBy($value)
 * @mixin Eloquent
 */
class ProductFile extends BaseModel
{
    protected $table = 'products_files';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['path'];
}
