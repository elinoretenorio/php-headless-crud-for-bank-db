<?php

declare(strict_types=1);

namespace Bank\Customer;

use Bank\Database\IDatabase;
use Bank\Database\DatabaseException;

class CustomerRepository implements ICustomerRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(CustomerDto $dto): int
    {
        $sql = "INSERT INTO `customer` (`first_name`, `last_name`, `date_of_birth`, `gender`)
                VALUES (?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->firstName,
                $dto->lastName,
                $dto->dateOfBirth,
                $dto->gender
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(CustomerDto $dto): int
    {
        $sql = "UPDATE `customer` SET `first_name` = ?, `last_name` = ?, `date_of_birth` = ?, `gender` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->firstName,
                $dto->lastName,
                $dto->dateOfBirth,
                $dto->gender,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?CustomerDto
    {
        $sql = "SELECT `id`, `first_name`, `last_name`, `date_of_birth`, `gender`
                FROM `customer` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new CustomerDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `first_name`, `last_name`, `date_of_birth`, `gender`
                FROM `customer`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new CustomerDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `customer` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}