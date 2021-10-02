<?php

declare(strict_types=1);

namespace Bank\Transaction;

interface ITransactionRepository
{
    public function insert(TransactionDto $dto): int;

    public function update(TransactionDto $dto): int;

    public function get(int $id): ?TransactionDto;

    public function getAll(): array;

    public function delete(int $id): int;
}