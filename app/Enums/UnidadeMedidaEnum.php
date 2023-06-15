<?php

namespace App\Enums;

use TiagoF2\Enums\Core\Enum;

class UnidadeMedidaEnum extends Enum
{
    public const M = 1;
    public const H = 2;
    public const T = 3;
    public const L = 4;
    public const KG = 5;
    public const M3 = 6;
    public const UN = 7;
    public const M2 = 8;
    public const CHP = 9;
    public const CHI = 10;
    public const MES = 11;
    public const TXKM = 12;
    public const KGXKM = 13;
    public const M3XKM = 14;
    public const UNXKM = 15;
    public const M2XKM = 16;
    public const LXKM = 17;
    public const MXKM = 18;

    protected static array $enums = [
        self::M => 'm',
        self::H => 'h',
        self::T => 't',
        self::L => 'l',
        self::KG => 'kg',
        self::M3 => 'm3',
        self::UN => 'un',
        self::M2 => 'm2',
        self::CHP => 'chp',
        self::CHI => 'chi',
        self::MES => 'mes',
        self::TXKM => 'txkm',
        self::KGXKM => 'kgxkm',
        self::M3XKM => 'm3xkm',
        self::UNXKM => 'unxkm',
        self::M2XKM => 'm2xkm',
        self::LXKM => 'lxkm',
        self::MXKM => 'mxkm',
    ];
}
