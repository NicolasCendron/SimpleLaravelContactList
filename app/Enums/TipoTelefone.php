<?php

namespace App\Enums;

enum TipoTelefone: string
{
    case MOVEL = 'MOVEL';
    case FIXO = 'FIXO';
    case OUTRO = 'OUTRO';
}