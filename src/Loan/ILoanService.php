<?php

declare(strict_types=1);

namespace Bank\Loan;

interface ILoanService
{
    public function insert(LoanModel $model): int;

    public function update(LoanModel $model): int;

    public function get(int $id): ?LoanModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?LoanModel;
}