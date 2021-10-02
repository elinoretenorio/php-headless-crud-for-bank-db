<?php

declare(strict_types=1);

namespace Bank\Customer;

interface ICustomerService
{
    public function insert(CustomerModel $model): int;

    public function update(CustomerModel $model): int;

    public function get(int $id): ?CustomerModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?CustomerModel;
}