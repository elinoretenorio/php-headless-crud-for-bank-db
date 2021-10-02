<?php

declare(strict_types=1);

namespace Bank\CustomerBranch;

interface ICustomerBranchService
{
    public function insert(CustomerBranchModel $model): int;

    public function update(CustomerBranchModel $model): int;

    public function get(int $id): ?CustomerBranchModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?CustomerBranchModel;
}