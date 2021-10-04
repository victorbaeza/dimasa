<?php

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Sitemap
 *
 * @property int $id
 * @property int|null $changefreq_id
 * @property string $loc
 * @property string $lastmod
 * @property float $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read \SitemapChangefreq|null $Changefreq
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap whereChangefreqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap whereLastmod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap whereLoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Sitemap whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Sitemap extends BaseModel{
	protected $table='sitemaps';
	public $timestamps = true;
	protected $primaryKey = 'id';

	use SoftDeletes;

    /**
     * @return BelongsTo
     */
    public function Changefreq(){
    return $this->belongsTo('SitemapChangefreq','changefreq_id');
  }

// Función para generar el código .xml de una URL
  public function generateCode(){
    $url = URL::to('/');
    $break = "\r\n";
    $tab = "\t";
    $result = '<url>'.$break.$tab;
    if($this->Changefreq){
      $result = $result.'<changefreq>'.$this->Changefreq->nombre.'</changefreq>'.$break.$tab;
    }
    $result = $result.'<loc>'.$url.'/'.$this->loc.'</loc>'.$break.$tab;
    $result = $result.'<priority>'.$this->priority.'</priority>'.$break.$tab;
		$result = $result.'<lastmod>'.date('c', strtotime($this->lastmod)).'</lastmod>'.$break.$tab;
    $result = $result.'</url>'.$break;

    return $result;
  }
// Función para comprobar si existe la misma URL en el sitemap
	public static function existsUrl($url){
		$existe = Sitemap::where('loc','=',$url)->first();
		if($existe){
			return true;
		} else {
			return false;
		}
	}
// Función para agregar una URL al sitemap
	public static function addURL($url, $priority, $lastmod){
		if(!Sitemap::existsUrl($url)){
			$sitemap = new Sitemap;
			$sitemap->loc = $url;
			$sitemap->priority = $priority;
			$sitemap->lastmod = $lastmod;
			$sitemap->save();
		}
	}
// Función para actualizar una URL en el sitemap
	public static function updateURL($old_url, $url, $priority, $lastmod){
		$sitemap = Sitemap::where('loc','=',$old_url)->first();
		if($sitemap){
			$sitemap->loc = $url;
			$sitemap->priority = $priority;
			$sitemap->lastmod = $lastmod;
			$sitemap->save();
		} else {
			Sitemap::addURL($url,$priority,$lastmod);
		}
	}
// Función para borrar una URL del sitemap
	public static function deleteURL($url){
		$sitemap = Sitemap::where('loc','=',$url)->first();
		if($sitemap) $sitemap->delete();
	}

	//Function that creates sitemap files
	public static function generateSitemapFile(){
		$dirname = public_path().'/storage/sitemaps';
			
		if (!is_dir($dirname))
		{
		    mkdir($dirname, 0755, true);
		}

		$xml = '<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

		foreach(Helper::getLanguages() as $lang){

			$xml .= '
<sitemap>
  <loc>'.env('APP_URL').'/storage/sitemaps/sitemap_'.$lang.'.xml</loc>
</sitemap>';

			$sitemaps = Sitemap::where('loc', 'like', $lang.'/%')->get();
			$xml_lang = '<?xml version="1.0" encoding="UTF-8"?>
	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

		if($sitemaps->isNotEmpty()){
			foreach($sitemaps as $sitemap){
				$xml_lang .= $sitemap->generateCode();
			}
		}

			$xml_lang .= '</urlset>';

			$myfile = fopen(public_path()."/storage/sitemaps/sitemap_".$lang.".xml", "w");
			$txt = $xml_lang;
			fwrite($myfile, $txt);
			fclose($myfile);
		}

		$xml .= '</sitemapindex>';

		$myfile = fopen(public_path()."/sitemap_index.xml", "w");
		$txt = $xml;
		fwrite($myfile, $txt);
		fclose($myfile);

	}

}
