<?php

// Створення двовимірного масиву 10 х 10

$matrix = array();
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        $matrix[$i][$j] = rand(0, 10);
    }
}

echo "Початковий масив:\n";
printMatrix($matrix);

// Сортування першого стовпця за спаданням
array_multisort(array_column($matrix, 0), SORT_DESC, $matrix);

// Сортування останнього рядка за зростанням
sort($matrix[9]);

echo "Масив після сортувань:\n";
printMatrix($matrix);

// Умови
if (array_sum($matrix[0]) < 50) {
    $product = array_product(array_column($matrix, 9));
    echo "Добуток елементів останнього стовпця: $product\n";
} else {
    $oddSum = getSumOfOddElements($matrix);
    echo "Сума непарних елементів: $oddSum\n";
}

// Добуток всіх елементів масиву
$totalProduct = array_product(array_map('array_product', $matrix));
echo "Добуток всіх елементів масиву: $totalProduct\n";

// Оновлення 2 стовпця масиву
foreach ($matrix as &$row) {
    $row[1] = $row[1] ** 2 - $row[1];
}

echo "Масив після оновлення 2 стовпця:\n";
printMatrix($matrix);

function printMatrix($matrix) {
    foreach ($matrix as $row) {
        echo implode("\t", $row) . "\n";
    }
}

// Сума непарних елементів
function getSumOfOddElements($matrix) {
    $oddSum = 0;
    foreach ($matrix as $row) {
        foreach ($row as $element) {
            if ($element % 2 !== 0) {
                $oddSum += $element;
            }
        }
    }
    return $oddSum;
}

?>