<?php

declare(strict_types=1);

namespace Bank\LoanType;

class LoanTypeService implements ILoanTypeService
{
    private ILoanTypeRepository $repository;

    public function __construct(ILoanTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(LoanTypeModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(LoanTypeModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?LoanTypeModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new LoanTypeModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var LoanTypeDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new LoanTypeModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?LoanTypeModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new LoanTypeDto($row);

        return new LoanTypeModel($dto);
    }
}