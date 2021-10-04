<?php

class TrackingVisit extends Eloquent
{

  	protected $table='tracking_visits';
  	public $timestamps = true;
  	protected $primaryKey = 'id';

    public function Sessions()
    {
        return $this->hasMany('TrackingSession', 'visit_id');
    }

    public static function newVisitor($unique_token)
    {
        $visit = new TrackingVisit;
        $visit->uuid = $unique_token;
        $visit->save();

        return $visit;
    }


}
