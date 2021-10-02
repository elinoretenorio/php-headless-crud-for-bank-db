<?php

declare(strict_types=1);

namespace Bank\Loan;

use Bank\Database\IDatabase;
use Bank\Database\DatabaseException;

class LoanRepository implements ILoanRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(LoanDto $dto): int
    {
        $sql = "INSERT INTO `loan` (`account_id`, `loan_type_id`, `amount_paid`, `start_date`, `due_date`)
                VALUES (?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->accountId,
                $dto->loanTypeId,
                $dto->amountPaid,
                $dto->startDate,
                $dto->dueDate
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(LoanDto $dto): int
    {
        $sql = "UPDATE `loan` SET `account_id` = ?, `loan_type_id` = ?, `amount_paid` = ?, `start_date` = ?, `due_date` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->accountId,
                $dto->loanTypeId,
                $dto->amountPaid,
                $dto->startDate,
                $dto->dueDate,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?LoanDto
    {
        $sql = "SELECT `id`, `account_id`, `loan_type_id`, `amount_paid`, `start_date`, `due_date`
                FROM `loan` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new LoanDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `account_id`, `loan_type_id`, `amount_paid`, `start_date`, `due_date`
                FROM `loan`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new LoanDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `loan` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}