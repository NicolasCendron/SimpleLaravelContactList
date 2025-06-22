<?php

namespace App\Enums;

enum ContactCategory: string
{
    case PERSONAL = '1';
    case PROFISSIONAL = '2';
    case FAMILY = '3';
    case OTHER = '4';
}