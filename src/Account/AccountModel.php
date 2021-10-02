<?php

declare(strict_types=1);

namespace Bank\Account;

use JsonSerializable;

class AccountModel implements JsonSerializable
{
    private int $id;
    private int $customerId;
    private int $cardId;
    private string $balance;

    public function __construct(AccountDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->customerId = $dto->customerId;
        $this->cardId = $dto->cardId;
        $this->balance = $dto->balance;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getCardId(): int
    {
        return $this->cardId;
    }

    public function setCardId(int $cardId): void
    {
        $this->cardId = $cardId;
    }

    public function getBalance(): string
    {
        return $this->balance;
    }

    public function setBalance(string $balance): void
    {
        $this->balance = $balance;
    }

    public function toDto(): AccountDto
    {
        $dto = new AccountDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->customerId = (int) ($this->customerId ?? 0);
        $dto->cardId = (int) ($this->cardId ?? 0);
        $dto->balance = $this->balance ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "customer_id" => $this->customerId,
            "card_id" => $this->cardId,
            "balance" => $this->balance,
        ];
    }
}