<?php

declare(strict_types=1);

namespace Bank\Branch;

interface IBranchService
{
    public function insert(BranchModel $model): int;

    public function update(BranchModel $model): int;

    public function get(int $id): ?BranchModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?BranchModel;
}