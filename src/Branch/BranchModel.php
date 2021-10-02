<?php

declare(strict_types=1);

namespace Bank\Branch;

use JsonSerializable;

class BranchModel implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $address;

    public function __construct(BranchDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->address = $dto->address;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function toDto(): BranchDto
    {
        $dto = new BranchDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";
        $dto->address = $this->address ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "address" => $this->address,
        ];
    }
}