<?php

declare(strict_types=1);

namespace Bank\Card;

interface ICardService
{
    public function insert(CardModel $model): int;

    public function update(CardModel $model): int;

    public function get(int $id): ?CardModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?CardModel;
}