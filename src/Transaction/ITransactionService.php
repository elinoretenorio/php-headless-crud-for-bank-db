<?php

declare(strict_types=1);

namespace Bank\Transaction;

interface ITransactionService
{
    public function insert(TransactionModel $model): int;

    public function update(TransactionModel $model): int;

    public function get(int $id): ?TransactionModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?TransactionModel;
}