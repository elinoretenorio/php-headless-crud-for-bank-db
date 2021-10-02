<?php

declare(strict_types=1);

namespace Bank\Account;

use Bank\Database\IDatabase;
use Bank\Database\DatabaseException;

class AccountRepository implements IAccountRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(AccountDto $dto): int
    {
        $sql = "INSERT INTO `account` (`customer_id`, `card_id`, `balance`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->customerId,
                $dto->cardId,
                $dto->balance
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(AccountDto $dto): int
    {
        $sql = "UPDATE `account` SET `customer_id` = ?, `card_id` = ?, `balance` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->customerId,
                $dto->cardId,
                $dto->balance,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?AccountDto
    {
        $sql = "SELECT `id`, `customer_id`, `card_id`, `balance`
                FROM `account` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new AccountDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `customer_id`, `card_id`, `balance`
                FROM `account`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new AccountDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `account` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}