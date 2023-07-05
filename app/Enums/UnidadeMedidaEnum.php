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
    public const PAR = 19;
    public const JG = 20;
    public const KWH = 21;
    public const CJ = 22;
    public const DZ = 23;
    public const FD = 24;
    public const FL = 25;
    public const GL = 26;
    public const LT = 27;
    public const LTA = 28;
    public const MIL = 29;
    public const PCT = 30;
    public const PC = 31;
    public const RES = 32;
    public const RL = 33;
    public const TON = 34;
    public const VD = 35;
    public const CX = 36;
    public const CENTO = 37;
    public const OTHER = 100;

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
        self::PAR => 'par',
        self::JG => 'jg',
        self::KWH => 'kwh',
        self::CJ => 'cj',
        self::L => 'l',
        self::PAR => 'par',
        self::JG => 'jg',
        self::KWH => 'kwh',
        self::CJ => 'cj',
        self::CX => 'cx',
        self::DZ => 'dz',
        self::FD => 'fd',
        self::FL => 'fl',
        self::GL => 'gl',
        self::LT => 'lt',
        self::JG => 'jg',
        self::KG => 'kg',
        self::L => 'l',
        self::LTA => 'lta',
        self::M => 'm',
        self::MIL => 'mil',
        self::PAR => 'par',
        self::PCT => 'pct',
        self::PC => 'pc',
        self::RES => 'res',
        self::RL => 'rl',
        self::TON => 'ton',
        self::UN => 'un',
        self::VD => 'vd',
        self::CENTO => 'cento',
        self::OTHER => 'other',
    ];
}
