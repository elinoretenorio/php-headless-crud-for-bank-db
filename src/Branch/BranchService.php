<?php

declare(strict_types=1);

namespace Bank\Branch;

class BranchService implements IBranchService
{
    private IBranchRepository $repository;

    public function __construct(IBranchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(BranchModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(BranchModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?BranchModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new BranchModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var BranchDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new BranchModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?BranchModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new BranchDto($row);

        return new BranchModel($dto);
    }
}