<?php

declare(strict_types=1);

namespace Bank\Transaction;

use Bank\Database\IDatabase;
use Bank\Database\DatabaseException;

class TransactionRepository implements ITransactionRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(TransactionDto $dto): int
    {
        $sql = "INSERT INTO `transaction` (`account_id`, `description`, `amount`, `date`)
                VALUES (?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->accountId,
                $dto->description,
                $dto->amount,
                $dto->date
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(TransactionDto $dto): int
    {
        $sql = "UPDATE `transaction` SET `account_id` = ?, `description` = ?, `amount` = ?, `date` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->accountId,
                $dto->description,
                $dto->amount,
                $dto->date,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?TransactionDto
    {
        $sql = "SELECT `id`, `account_id`, `description`, `amount`, `date`
                FROM `transaction` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new TransactionDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `account_id`, `description`, `amount`, `date`
                FROM `transaction`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new TransactionDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `transaction` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}