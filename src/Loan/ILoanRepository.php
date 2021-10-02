<?php

declare(strict_types=1);

namespace Bank\Loan;

interface ILoanRepository
{
    public function insert(LoanDto $dto): int;

    public function update(LoanDto $dto): int;

    public function get(int $id): ?LoanDto;

    public function getAll(): array;

    public function delete(int $id): int;
}