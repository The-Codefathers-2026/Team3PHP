<?php

function addSale(&$sales, $model) {
    if (isset($sales[$model])) {
        $sales[$model]++;
    } else {
        $sales[$model] = 1;
    }
}

function sortSales($sales) {
    $keys = array_keys($sales);
    $values = array_values($sales);
    $n = count($values);

    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($values[$j] < $values[$j + 1]) {
                $tempVal = $values[$j];
                $values[$j] = $values[$j + 1];
                $values[$j + 1] = $tempVal;

                $tempKey = $keys[$j];
                $keys[$j] = $keys[$j + 1];
                $keys[$j + 1] = $tempKey;
            }
        }
    }

    $sorted = [];
    for ($i = 0; $i < $n; $i++) {
        $sorted[$keys[$i]] = $values[$i];
    }

    return $sorted;
}