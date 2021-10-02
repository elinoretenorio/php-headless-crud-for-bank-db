<?php

declare(strict_types=1);

namespace Bank\Account;

interface IAccountRepository
{
    public function insert(AccountDto $dto): int;

    public function update(AccountDto $dto): int;

    public function get(int $id): ?AccountDto;

    public function getAll(): array;

    public function delete(int $id): int;
}