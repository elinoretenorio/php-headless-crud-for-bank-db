<?php

declare(strict_types=1);

namespace Bank\LoanType;

interface ILoanTypeRepository
{
    public function insert(LoanTypeDto $dto): int;

    public function update(LoanTypeDto $dto): int;

    public function get(int $id): ?LoanTypeDto;

    public function getAll(): array;

    public function delete(int $id): int;
}