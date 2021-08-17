<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class PostalCodeBlacklist extends Eloquent
{
    use SoftDeletes;

    protected $table = 'postal_codes_blacklist';
    public $timestamps = true;
    protected $primaryKey = 'id';


}
