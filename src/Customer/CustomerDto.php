<?php

declare(strict_types=1);

namespace Bank\Customer;

class CustomerDto 
{
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $dateOfBirth;
    public string $gender;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->firstName = $row["first_name"] ?? "";
        $this->lastName = $row["last_name"] ?? "";
        $this->dateOfBirth = $row["date_of_birth"] ?? "";
        $this->gender = $row["gender"] ?? "";
    }
}