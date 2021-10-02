<?php

declare(strict_types=1);

namespace Bank\CustomerBranch;

use Bank\Database\IDatabase;
use Bank\Database\DatabaseException;

class CustomerBranchRepository implements ICustomerBranchRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(CustomerBranchDto $dto): int
    {
        $sql = "INSERT INTO `customer_branch` (`customer_id`, `branch_id`)
                VALUES (?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->customerId,
                $dto->branchId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(CustomerBranchDto $dto): int
    {
        $sql = "UPDATE `customer_branch` SET `customer_id` = ?, `branch_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->customerId,
                $dto->branchId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?CustomerBranchDto
    {
        $sql = "SELECT `id`, `customer_id`, `branch_id`
                FROM `customer_branch` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new CustomerBranchDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `customer_id`, `branch_id`
                FROM `customer_branch`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new CustomerBranchDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `customer_branch` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}