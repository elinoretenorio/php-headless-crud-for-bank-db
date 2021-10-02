<?php

declare(strict_types=1);

namespace Bank\Card;

use Bank\Database\IDatabase;
use Bank\Database\DatabaseException;

class CardRepository implements ICardRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(CardDto $dto): int
    {
        $sql = "INSERT INTO `card` (`number`, `expiration_date`, `is_blocked`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->number,
                $dto->expirationDate,
                $dto->isBlocked
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(CardDto $dto): int
    {
        $sql = "UPDATE `card` SET `number` = ?, `expiration_date` = ?, `is_blocked` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->number,
                $dto->expirationDate,
                $dto->isBlocked,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?CardDto
    {
        $sql = "SELECT `id`, `number`, `expiration_date`, `is_blocked`
                FROM `card` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new CardDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `number`, `expiration_date`, `is_blocked`
                FROM `card`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new CardDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `card` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}