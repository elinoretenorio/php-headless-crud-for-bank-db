<?php

declare(strict_types=1);

namespace Bank\Customer;

use JsonSerializable;

class CustomerModel implements JsonSerializable
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $dateOfBirth;
    private string $gender;

    public function __construct(CustomerDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->firstName = $dto->firstName;
        $this->lastName = $dto->lastName;
        $this->dateOfBirth = $dto->dateOfBirth;
        $this->gender = $dto->gender;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(string $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function toDto(): CustomerDto
    {
        $dto = new CustomerDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->firstName = $this->firstName ?? "";
        $dto->lastName = $this->lastName ?? "";
        $dto->dateOfBirth = $this->dateOfBirth ?? "";
        $dto->gender = $this->gender ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "first_name" => $this->firstName,
            "last_name" => $this->lastName,
            "date_of_birth" => $this->dateOfBirth,
            "gender" => $this->gender,
        ];
    }
}