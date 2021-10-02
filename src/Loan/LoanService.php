<?php

declare(strict_types=1);

namespace Bank\Loan;

class LoanService implements ILoanService
{
    private ILoanRepository $repository;

    public function __construct(ILoanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(LoanModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(LoanModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?LoanModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new LoanModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var LoanDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new LoanModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?LoanModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new LoanDto($row);

        return new LoanModel($dto);
    }
}