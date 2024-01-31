<?php

namespace App\Enums;

enum PurchaseStatus: int {
    case ABERTO = 1;
    case FECHADO = 2;

    public static function getDescription($status) 
    {
        switch ($status) {
            case 1:
                return "Aberto";
                break;
            case 2:
                return "Fechado";
                break;
        }
    }
}