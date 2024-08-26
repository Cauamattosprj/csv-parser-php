<?php

declare(strict_types = 1);

# Função para adicionar o conteúdo CSV em table datas HTML. Essa função é chamada dentro de 'views/transactions.php'.
function table_data() {
    # trecho demonstrativo da função fgetcsv() retirado diretamente da documentação oficial do PHP, adaptado com a lógica necessária para essa aplicação.
    if (($handle = fopen(TRANSACTIONS_PATH . 'sample_1.csv', "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
            echo "<tr>";
            for ($c=0; $c < 4; $c++) {
                switch (true) {
                    # Quando o iterador $c passar pelo índice 3 do array $data (amount) a variável $transaction_value passa por dois str_replace para correta formatação para os cálculos.
                    case $data[$c] == $data[3]:
                        $transaction_value = str_replace('$', '', $data[3]);
                        $transaction_value = str_replace(',', '', $transaction_value);
                        # se o valor for negativo, a cor passa a ser vermelha.
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
# calculos para o total líquido das transações
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

# total de receitas
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

# total de despesas
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


