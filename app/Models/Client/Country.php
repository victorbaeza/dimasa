<?php

use Illuminate\Database\Eloquent\Model;

/**
 * Country
 *
 * @property int $id
 * @property string $name
 * @property string $short_code
 * @method static \Illuminate\Database\Eloquent\Builder|\Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Country whereShortCode($value)
 * @mixin \Eloquent
 * @property float|null $vat
 * @method static \Illuminate\Database\Eloquent\Builder|\Country whereVat($value)
 */
class Country extends Model
{
    protected $fillable = ['name', 'short_code', 'vat'];
    public const ID_SPAIN = 202;
}
