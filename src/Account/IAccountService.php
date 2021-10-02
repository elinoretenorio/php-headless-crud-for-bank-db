<?php

declare(strict_types=1);

namespace Bank\Account;

interface IAccountService
{
    public function insert(AccountModel $model): int;

    public function update(AccountModel $model): int;

    public function get(int $id): ?AccountModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?AccountModel;
}