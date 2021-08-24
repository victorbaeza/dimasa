<?php

use Illuminate\Contracts\Container\BindingResolutionException;

class Helper
{

    public const NUM_PAGED_RESULTS = 15;

    public static function notificationsValidator($errors)
    {
        $result = '<div class="alert alert-danger">
				  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  <strong>Error!</strong>&nbsp;';

        foreach ($errors->all() as $e) {
            $result = $result . $e . '<br>';
        }

        $result = $result . '</div>';
        return $result;
    }

    public static function generateFilename($file)
    {
        $array = explode(".", $file);
        return $array[0] . "_" . date('d-m-Y') . "." . $array[1];
    }


    // Graba en cache la ultima url para al volver redirigirnos alli
    public static function recordLastURL()
    {
        // Grabamos última url
        if (!Session::get('back_url') && URL::current() != URL::previous()) {
            Session::flash('back_url', URL::previous());
        } else {
            Session::reflash();
        }
    }

    public static function checkUrl($url)
    {
        $url = str_replace(URL::to('/').'/', '', $url);
        $current = Request::path();
        return $url == $current;
    }


    // Función para mostrar los botones para ordenar la columna
    public static function orderColumn($tabla, $columna, $orden)
    {
        if ($tabla == $columna) {
            switch ($orden) {
                case "asc":
                case "ASC":
                    $result = '<a class="order" data-order_col="' . $tabla . '" data-order="DESC"><i class="btn btn-rounded btn-light btn-xs fa fa-sort-asc"></i></a>';
                    break;
                case "DESC":
                case "desc":
                    $result = '<a class="order" data-order_col="' . $tabla . '" data-order="ASC"><i class="btn btn-rounded btn-light btn-xs fa fa-sort-desc"></i></a>';
                    break;
                default:
                    $result = '<a href="?order_col=' . $tabla . '&order=DESC"><i class="btn btn-rounded btn-light btn-xs fa fa-sort"></i></a>';
                    break;
            } // End switch
        } else {
            $result = '<a class="order" data-order_col="' . $tabla . '" data-order="DESC"><i class="btn btn-rounded btn-light btn-xs fa fa-sort"></i></a>';
        }

        return $result;
    }

    // Función para ordenar cualquier colección (ordenar una query)
    public static function do_OrderColumn($coleccion,$order_col,$order,$default_col='id',$default_order='DESC')
    {
      if($order_col && $order){
        return $coleccion->orderBy($order_col,$order);
      } else {
        return $coleccion->orderBy($default_col,$default_order);
      }
    }


    public static function getLanguageText($lang){
        switch ($lang){
          case "es": $output = '<img src="/images/flags/ES.png" alt="Español">Español'; break;
          case "en": $output = '<img src="/images/flags/EN.png" alt="English">English'; break;
          case "de": $output = '<img src="/images/flags/DE.png" alt="English">Deutsch'; break;
          case "fr": $output = '<img src="/images/flags/FR.png" alt="English">Français'; break;
          default: $output = ''; break;
        }

        return $output;
    }


    public static function showPrice($price, $currency = '€')
    {
        // $output = number_format($price, 2, ',', '');
        $output = number_format($price, 2, ".", ",");
        $output .= $currency;

        return $output;
    }

    // Función para comprobar el formato de un importe a la hora de guardar en la BD
    public static function convertAmount($amount)
    {
        return floatval(str_replace(',', '.', $amount));
    }

    // Función para mostrar la fecha en formato dd-mm-YYYY
    public static function showDate($date, $hour = false)
    {
        return $hour ? date('d-m-Y H:i:s', strtotime($date)) : date('d-m-Y', strtotime($date));
    }

    public static function keywordsToString($keywords): ?string
    {
        if ($keywords && is_array($keywords))
            return implode(',', $keywords);
        else return null;
    }

    public static function getKeywords($model, $lang): array
    {
        $keywords = $model->translate($lang)->keywords;
        return empty($keywords) ? [] : explode(',', $keywords);
    }

    public static function getCurrentCurrency(): string
    {
        return "€";
    }

    public static function getCartTotal() : float
    {
        return round(self::getCartSubtotal() + self::getTaxTotal(),2);
    }

    public static function getDiscountAppliedValue() : float
    {
        $total = Helper::getCartTotal();
        $totalWithDiscount = Helper::getTotalWithCoupons();

        $discount = $total-$totalWithDiscount;

        return $discount;
    }

    public static function getTotalWithCoupons() : float
    {
        $total = Helper::getCartTotal();

        if(Session::has('codes')){
            foreach (Session::get('codes') as $code){
                $total = $code->getDiscount($total);
            }
        }

        return $total;
    }

    public static function getCartSubtotal() : float
    {
        $total = 0;

        foreach (Cart::content() as $cartItem) {
           $total += ($cartItem->qty * $cartItem->price);
        }

        return round($total,2);
    }

    public static function getTaxTotal() : float
    {
        // return round(self::getCartSubtotal() * Order::VAT, 2);
        $vat = 0;

        foreach (Cart::content() as $cartItem) {
          $vat += $cartItem->qty * ($cartItem->model->VAT*$cartItem->price);
        }

        return round($vat, 2);
    }

}
