<?php

declare(strict_types=1);

namespace Bank\LoanType;

use Bank\Database\IDatabase;
use Bank\Database\DatabaseException;

class LoanTypeRepository implements ILoanTypeRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(LoanTypeDto $dto): int
    {
        $sql = "INSERT INTO `loan_type` (`type`, `description`, `base_amount`, `base_interest_rate`)
                VALUES (?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->type,
                $dto->description,
                $dto->baseAmount,
                $dto->baseInterestRate
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(LoanTypeDto $dto): int
    {
        $sql = "UPDATE `loan_type` SET `type` = ?, `description` = ?, `base_amount` = ?, `base_interest_rate` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->type,
                $dto->description,
                $dto->baseAmount,
                $dto->baseInterestRate,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?LoanTypeDto
    {
        $sql = "SELECT `id`, `type`, `description`, `base_amount`, `base_interest_rate`
                FROM `loan_type` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new LoanTypeDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `type`, `description`, `base_amount`, `base_interest_rate`
                FROM `loan_type`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new LoanTypeDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `loan_type` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}