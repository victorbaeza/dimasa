<?php

use Illuminate\Notifications\Action;
use MyCLabs\Enum\Enum;

/**
 * DiscountType enum
 * @method static Action PERCENTAGE()
 * @method static Action ABSOLUTE()
 */
class DiscountType extends Enum
{
    public const ABSOLUTE = 1;
    public const PERCENTAGE = 2;

    public static function getText(DiscountType $type){
        switch ($type){
            case DiscountType::ABSOLUTE():
                return 'Absoluto (-€)';
            case DiscountType::PERCENTAGE():
                return 'Porcentual (-%)';
            default:
                return '';
        }
    }

    public static function convertToSymbol(int $type){
        switch ($type){
            case 1:
                return '€';
            case 2:
                return '%';
            default:
                return '';
        }
    }
}
