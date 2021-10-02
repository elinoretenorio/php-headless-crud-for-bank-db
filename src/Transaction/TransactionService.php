<?php

declare(strict_types=1);

namespace Bank\Transaction;

class TransactionService implements ITransactionService
{
    private ITransactionRepository $repository;

    public function __construct(ITransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(TransactionModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(TransactionModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?TransactionModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new TransactionModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var TransactionDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new TransactionModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?TransactionModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new TransactionDto($row);

        return new TransactionModel($dto);
    }
}