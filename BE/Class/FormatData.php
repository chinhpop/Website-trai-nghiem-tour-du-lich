<?php 
    function formatCurrency($currency) {
        $formattedAmount = number_format($currency);
        // Thay thế dấu phẩy bằng dấu chấm 
        $formattedAmount = str_replace(',', '.', $formattedAmount); 
        return $formattedAmount . " VND";
    }

    function formatData($data) {
        $items = explode(', ', $data);
        $formmatted = "<table border = '0' class='tour-table'>";
        foreach ($items as $item) {
            $formmatted.= "<tr><td>". $item. "</td></tr>";
        }
        $formmatted .= "</table>";
        return $formmatted;
    }

    function formatPrice($price, $data) {
        $items = explode(', ', $data);
        $formmatted = "<table border = '0' class='tour-table'>";
        foreach ($items as $item) {
            $formmatted.= "<tr><td>". $price. "</td></tr>";
        }
        $formmatted .= "</table>";
        return $formmatted;
    }
?>