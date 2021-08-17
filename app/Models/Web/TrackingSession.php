<?php

class TrackingSession extends Eloquent
{

  	protected $table='tracking_sessions';
  	public $timestamps = true;
  	protected $primaryKey = 'id';

    public function Visit()
    {
        return $this->belongsTo('TrackingVisit', 'visit_id');
    }

    public static function newSession(TrackingVisit $visit, $request)
    {
        $session = new TrackingSession;
        $session->visit_id = $visit->id;
        $session->ip = $request->ip();

        $session->user_agent = $request->header('User-Agent');
        $session->referer = $request->server('HTTP_REFERER');
        // Parametros UTM
        $session->utm_source = $request->input('utm_source');
        $session->utm_medium = $request->input('utm_medium');
        $session->utm_name = $request->input('utm_name');
        $session->utm_term = $request->input('utm_term');
        $session->utm_content = $request->input('utm_content');
        $session->save();

        return $session;
    }

}
