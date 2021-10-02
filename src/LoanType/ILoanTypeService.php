<?php

declare(strict_types=1);

namespace Bank\LoanType;

interface ILoanTypeService
{
    public function insert(LoanTypeModel $model): int;

    public function update(LoanTypeModel $model): int;

    public function get(int $id): ?LoanTypeModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?LoanTypeModel;
}