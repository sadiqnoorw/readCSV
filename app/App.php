<?php

declare(strict_types = 1);

function getTransactionFile(string $dirPath): array
{
    $files = [];

    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }
        $files[] = $dirPath.$file;
    }
    return $files;
}

function getTransaction(string $fileName, ?callable $transactionHandler = null): array
{
    if (!file_exists($fileName)) {
        trigger_error("File". $fileName . ' does not exist. '  , E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');
    fgetcsv($file);
    $transactions = [];

    while (($transaction = fgetcsv($file)) !== false) {
        $transactions[] = $transactionHandler($transaction);
    }

    return $transactions;
}

function extractTransaction(array $transactions): array
{
    [$date, $checkNumber, $descriptionn, $amount] = $transactions;

    $amount = str_replace(['$', ','], '', $amount);
    return [
        'date' => $date,
        'checkName' => $checkNumber,
        'descriptionn'=> $descriptionn,
        'amount'=> $amount
    ];
}

function calculateTotal( array $transactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount']; 
        if($transaction['amount'] > 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}