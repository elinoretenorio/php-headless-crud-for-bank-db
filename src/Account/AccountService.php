<?php

declare(strict_types=1);

namespace Bank\Account;

class AccountService implements IAccountService
{
    private IAccountRepository $repository;

    public function __construct(IAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(AccountModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(AccountModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?AccountModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new AccountModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var AccountDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new AccountModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?AccountModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new AccountDto($row);

        return new AccountModel($dto);
    }
}