<?php 
    function formatCurrency($currency) {
        $formattedAmount = number_format($currency);
        // Thay thế dấu phẩy bằng dấu chấm 
        $formattedAmount = str_replace(',', '.', $formattedAmount); 
        return $formattedAmount . " VND";
    }
?>