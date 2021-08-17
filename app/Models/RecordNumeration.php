<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class RecordNumeration extends Eloquent
{
    protected $table = 'record_numeration';
    public $timestamps = false;
    protected $primaryKey = 'id';

}
