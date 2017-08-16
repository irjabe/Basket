<?php
namespace AppBundle\Service;

/**
 * Class CalculatorService
 * @package AppBundle\Service
 */
class CalculatorService
{
    /**
     * @param $price
     * @param $quantity
     * @return float
     */
    public function calculateTotalWithoutTax($price, $quantity)
    {
        $total = round($price * $quantity, 1);
        return $total;
    }

    /**
     * @param $price
     * @param $quantity
     * @param $tva
     * @return float
     */
    public function calculateTotalTaxed($price, $quantity, $tva)
    {
        $totalTaxed = round(($price * $quantity) * (1 + ($tva / 100)), 1);
        return $totalTaxed;
    }
}
