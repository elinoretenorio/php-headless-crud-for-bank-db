<?php

declare(strict_types=1);

namespace Bank\CustomerBranch;

interface ICustomerBranchRepository
{
    public function insert(CustomerBranchDto $dto): int;

    public function update(CustomerBranchDto $dto): int;

    public function get(int $id): ?CustomerBranchDto;

    public function getAll(): array;

    public function delete(int $id): int;
}