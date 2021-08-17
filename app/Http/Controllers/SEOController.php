<?php namespace App\Http\Controllers;

// Clases laravel
use Illuminate\Http\Request;
use View;
use Redirect;
use Validator;
use URL;
use Response;

//Clases propias
use Helper;
use Sitemap;
use SitemapChangefreq;


class SEOController extends Controller{

  public function generateSitemap(){
    $url = URL::to('/');

    $header = '<?xml version="1.0" encoding="UTF-8"?>'."\r\n";
    $header = $header.'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'."\r\n";

    $content = '<url>'."\r\n\t";
    // $content = $content.'<changefreq>weekly</changefreq>'."\r\n\t";
    $content = $content.'<loc>'.$url.'</loc>'."\r\n\t";
    $content = $content.'<priority>1.00</priority>'."\r\n";
    $content = $content.'</url>'."\r\n";

    $sitemaps = Sitemap::all();
    foreach($sitemaps as $sitemap){
      $content = $content.$sitemap->generateCode();
    }

    $result = $header.$content.'</urlset>';

    return Response::make($result, '200')->header('Content-Type', 'text/xml');
  }

  public function listSitemap(Request $request){
    $sitemaps = Sitemap::whereNotNull('id');

    $order_col = $request->input('order_col');
    $order = $request->input('order');
    $sitemaps = Helper::orderColumn($sitemaps,$order_col,$order,'lastmod','DESC');

    $sitemaps = $sitemaps->paginate(self::NUM_PAGED_RESULTS);

    return view('admin.seo.sitemap.lista', compact('sitemaps','order_col','order'));
  }

  public function createSitemap(Request $request){

    $rules = [
      'add_url' => 'required',
      'add_priority' => 'required|numeric|min:0|max:1',
      'add_lastmod' => 'required|date_format:Y-m-d H:i:s',
    ];
    $customMessages = [
      'add_url.required' => 'Es obligatorio indicar la URL!',
      'add_priority.required' => 'Es obligatorio indicar el priority!',
      'add_priority.numeric' => 'El priority debe ser un valor numérico!',
      'add_priority.min' => 'El priority no debe ser menor a 0.00!',
      'add_priority.max' => 'El priority no debe ser mayor a 1.00!',
      'add_lastmod.required' => 'Es obligatorio indicar la fecha de lastmod!',
      'add_lastmod.date_format' => 'El formato del lastmod debe ser válido!',
    ];

    $urls = $request->input('add_url');
    if(!$urls) return Redirect::back()->with('warning', 'No ha agregado ninguna URL');
    $priority = $request->input('add_priority');
    $lastmod = $request->input('add_lastmod');
    $changefreq = $request->input('add_changefreq');
    $i=0;
    foreach($urls as $url){
      $inputs = array();
      $inputs['add_url'] = $url;
      $inputs['add_priority'] = $priority[$i];
      $inputs['add_lastmod'] = date('Y-m-d H:i:s', strtotime($lastmod[$i]));

      $validator = Validator::make($inputs, $rules, $customMessages);
       if ($validator->fails()) {
         // dd($validator);
        return redirect()->back()->withErrors($validator);
      }

      $sitemap = new Sitemap;
      $sitemap->loc = $url;
      $sitemap->changefreq_id = $changefreq[$i];
      $sitemap->priority = $priority[$i];
      $sitemap->lastmod = $inputs['add_lastmod'];
      $sitemap->save();

      $i++;
    }

    return redirect()->back()->with('success', 'Las URLs nuevas han sido agregadas al Sitemaps correctamente!');
  }


  public function do_editSitemap(Request $request){
    $rules = [
      // 'url' => 'required',
      'priority' => 'required|numeric|min:0|max:1',
      'lastmod' => 'required',
    ];
    $customMessages = [
      // 'url.required' => 'Es obligatorio indicar la URL!',
      'priority.required' => 'Es obligatorio indicar el priority!',
      'priority.numeric' => 'El priority debe ser un valor numérico!',
      'priority.min' => 'El priority no debe ser menor a 0.00!',
      'priority.max' => 'El priority no debe ser mayor a 1.00!',
      'lastmod.required' => 'Es obligatorio indicar la fecha de lastmod!',
    ];

    $sitemap = Sitemap::findOrFail($request->input('id'));
    if($sitemap){

      $validator = Validator::make($request->all(), $rules, $customMessages);
       if ($validator->fails()) {
         return 'Alguno de los campos introducidos no es válido!';
      }

      // $sitemap->loc = $request->input('url');
      $sitemap->changefreq_id = $request->input('changefreq');
      $sitemap->priority = $request->input('priority');
      $sitemap->lastmod = date('Y-m-d H:i:s', strtotime($request->input('lastmod')));
      $sitemap->save();

      return 'ok';
    } else {
      return 'Ha ocurrido un error, por favor refresque la página e inténtelo de nuevo';
    }
  }





}
