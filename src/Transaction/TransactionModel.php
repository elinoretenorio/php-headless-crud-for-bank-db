<?php

declare(strict_types=1);

namespace Bank\Transaction;

use JsonSerializable;

class TransactionModel implements JsonSerializable
{
    private int $id;
    private int $accountId;
    private string $description;
    private float $amount;
    private string $date;

    public function __construct(TransactionDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->accountId = $dto->accountId;
        $this->description = $dto->description;
        $this->amount = $dto->amount;
        $this->date = $dto->date;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function setAccountId(int $accountId): void
    {
        $this->accountId = $accountId;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function toDto(): TransactionDto
    {
        $dto = new TransactionDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->accountId = (int) ($this->accountId ?? 0);
        $dto->description = $this->description ?? "";
        $dto->amount = (float) ($this->amount ?? 0);
        $dto->date = $this->date ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "account_id" => $this->accountId,
            "description" => $this->description,
            "amount" => $this->amount,
            "date" => $this->date,
        ];
    }
}