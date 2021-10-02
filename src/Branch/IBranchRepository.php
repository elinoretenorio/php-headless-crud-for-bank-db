<?php

declare(strict_types=1);

namespace Bank\Branch;

interface IBranchRepository
{
    public function insert(BranchDto $dto): int;

    public function update(BranchDto $dto): int;

    public function get(int $id): ?BranchDto;

    public function getAll(): array;

    public function delete(int $id): int;
}