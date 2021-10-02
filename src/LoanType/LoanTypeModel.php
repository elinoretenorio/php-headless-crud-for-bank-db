<?php

declare(strict_types=1);

namespace Bank\LoanType;

use JsonSerializable;

class LoanTypeModel implements JsonSerializable
{
    private int $id;
    private string $type;
    private string $description;
    private float $baseAmount;
    private float $baseInterestRate;

    public function __construct(LoanTypeDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->type = $dto->type;
        $this->description = $dto->description;
        $this->baseAmount = $dto->baseAmount;
        $this->baseInterestRate = $dto->baseInterestRate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getBaseAmount(): float
    {
        return $this->baseAmount;
    }

    public function setBaseAmount(float $baseAmount): void
    {
        $this->baseAmount = $baseAmount;
    }

    public function getBaseInterestRate(): float
    {
        return $this->baseInterestRate;
    }

    public function setBaseInterestRate(float $baseInterestRate): void
    {
        $this->baseInterestRate = $baseInterestRate;
    }

    public function toDto(): LoanTypeDto
    {
        $dto = new LoanTypeDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->type = $this->type ?? "";
        $dto->description = $this->description ?? "";
        $dto->baseAmount = (float) ($this->baseAmount ?? 0);
        $dto->baseInterestRate = (float) ($this->baseInterestRate ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "type" => $this->type,
            "description" => $this->description,
            "base_amount" => $this->baseAmount,
            "base_interest_rate" => $this->baseInterestRate,
        ];
    }
}