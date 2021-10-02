<?php

declare(strict_types=1);

namespace Bank\Card;

class CardService implements ICardService
{
    private ICardRepository $repository;

    public function __construct(ICardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(CardModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(CardModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?CardModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new CardModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var CardDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new CardModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?CardModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new CardDto($row);

        return new CardModel($dto);
    }
}