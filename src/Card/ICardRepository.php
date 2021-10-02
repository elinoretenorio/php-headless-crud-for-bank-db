<?php

declare(strict_types=1);

namespace Bank\Card;

interface ICardRepository
{
    public function insert(CardDto $dto): int;

    public function update(CardDto $dto): int;

    public function get(int $id): ?CardDto;

    public function getAll(): array;

    public function delete(int $id): int;
}