<?php

namespace App\Enums;

enum PhoneType: string
{
    case MOBILE = '1';
    case LANDLINE = '2';
    case OTHER = '3';
}