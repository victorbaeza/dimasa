<?php


namespace App\Models\Enums;


use MyCLabs\Enum\Enum;

/**
 * DiscountType enum
 * @method static Action CREATE()
 * @method static Action UPDATE()
 * @method static Action DELETE()
 */
class OperationType extends Enum
{
    private const CREATE = 1;
    private const UPDATE = 2;
    private const DELETE = 3;
}
