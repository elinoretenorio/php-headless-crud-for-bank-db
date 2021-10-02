<?php

declare(strict_types=1);

namespace Bank\Customer;

interface ICustomerRepository
{
    public function insert(CustomerDto $dto): int;

    public function update(CustomerDto $dto): int;

    public function get(int $id): ?CustomerDto;

    public function getAll(): array;

    public function delete(int $id): int;
}