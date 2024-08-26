<?php

declare(strict_types = 1);

function table_data() {
    if (($handle = fopen(TRANSACTIONS_PATH . 'sample_1.csv', "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
            echo "<tr>";
            for ($c=0; $c < 4; $c++) {
                switch (true) {
                    case $data[$c] == $data[3]:
                        $transaction_value = str_replace('$', '', $data[3]);
                        $transaction_value = str_replace(',', '', $transaction_value);
                        if (floatval($transaction_value) < 0) {
                            echo "<td style='color: red'>$data[$c]</td>";
                        } else {
                            echo "<td>$data[$c]</td>";
                        }
                        break;
                    
                    default:
                        echo "<td>$data[$c]</td>";
                        break;
                }
                
                
            }
            echo "</tr>";
        }
        fclose($handle);
    }      

}

function table_net_total() {
    if (($handle = fopen(TRANSACTIONS_PATH . 'sample_1.csv', "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
            $transaction_value = str_replace("$", "", $data[3]);
            $transaction_value = str_replace(',', '', $transaction_value);   
            
            $net_total += floatval($transaction_value);         
        }
        echo $net_total;
    }
}

function table_total_income() {
    if (($handle = fopen(TRANSACTIONS_PATH . 'sample_1.csv', 'r')) !== FALSE) {
        while (($data = fgetcsv($handle, 0,',')) !== FALSE) {
            $transaction_value = str_replace('$', '', $data[3]);
            $transaction_value = str_replace(',', '', $transaction_value);


            if (str_contains($data[3], '-') == FALSE)
            $total_income += floatval($transaction_value);
        }
        echo $total_income;
    }
}

function table_total_expense() {
    if (($handle = fopen(TRANSACTIONS_PATH . 'sample_1.csv', 'r')) !== FALSE) {
        while (($data = fgetcsv($handle, 0,',')) !== FALSE) {
            $transaction_value = str_replace('$', '', $data[3]);
            $transaction_value = str_replace(',', '', $transaction_value);


            if (str_contains($data[3], '-') == TRUE)
            $total_income += floatval($transaction_value);
        }
        echo $total_income;
    }
}


