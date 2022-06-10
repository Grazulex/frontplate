<?php

namespace App\Enums;

enum ItemsEnums: string
{
    case BELFIUS_COMBI = 'Belfius Combi Plates';
    case TOYOTA_FINANCIAL = 'Toyota Financial Services';
    case VANBREDA_AOMBI = 'MyVanbreda combipack';
    case TEC = 'TEC';
    case PH_INV = 'PH_INV';
    case VISPH = 'VISPH';

    public function isCombo()
    {
        return [$this::BELFIUS_COMBI, $this::TOYOTA_FINANCIAL, $this::VANBREDA_AOMBI];
    }
}
