<?php

namespace App\Http\Controllers;

use App\Models\Enums\OperationType;
use Helper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const NUM_PAGED_RESULTS = 15;

    public static function updateSitemap($model, $oldTranslations, $newTranslations){
        foreach (Helper::getLanguages() as $lang){
            if(!$model->active){
                if(!empty($oldTranslations[$lang]))
                    $model->generateSitemap(OperationType::DELETE(), $oldTranslations[$lang]['slug'], null, $lang);
            }else{
                //las dos traducciones existen, actualizar
                if(!empty($newTranslations[$lang]) && !empty($oldTranslations[$lang])){
                    $model->generateSitemap(OperationType::UPDATE(), $oldTranslations[$lang]['slug'], $newTranslations[$lang]['slug'], $lang);
                }
                //es traduccion nueva
                else if(!empty($newTranslations[$lang])){
                    $model->generateSitemap(OperationType::CREATE(), null, $newTranslations[$lang]['slug'], $lang);
                }
                //se ha borrado la traduccion
                else if(!empty($oldTranslations[$lang])){
                    $model->generateSitemap(OperationType::DELETE(), $oldTranslations[$lang]['slug'], null, $lang);
                }
            }
        }
    }

    public static function deleteRemovedTranslations($model, ?array $oldTranslations, Request $request, string  $principalTranslatedField){
        $toDeleteLanguages = array();
        foreach($oldTranslations as $lang => $translation){
            $principalField = $request->input($lang . $principalTranslatedField);
            if(empty($principalField)){
                array_push($toDeleteLanguages,$lang);
            }
        }
        $model->deleteTranslations($toDeleteLanguages);
    }
}
