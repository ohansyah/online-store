<?php

if (!function_exists('formatCurrency')) {
    /**
     * Format a number as currency.
     *
     * @param float $amount
     * @return string
     */
    function formatCurrency($amount)
    {
        return 'Rp' . number_format($amount, 0, ',', '.');
    }
}
