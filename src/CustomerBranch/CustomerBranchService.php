<?php

declare(strict_types=1);

namespace Bank\CustomerBranch;

class CustomerBranchService implements ICustomerBranchService
{
    private ICustomerBranchRepository $repository;

    public function __construct(ICustomerBranchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(CustomerBranchModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(CustomerBranchModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?CustomerBranchModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new CustomerBranchModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var CustomerBranchDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new CustomerBranchModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?CustomerBranchModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new CustomerBranchDto($row);

        return new CustomerBranchModel($dto);
    }
}