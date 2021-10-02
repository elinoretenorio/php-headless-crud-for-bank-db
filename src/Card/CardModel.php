<?php

declare(strict_types=1);

namespace Bank\Card;

use JsonSerializable;

class CardModel implements JsonSerializable
{
    private int $id;
    private string $number;
    private string $expirationDate;
    private string $isBlocked;

    public function __construct(CardDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->number = $dto->number;
        $this->expirationDate = $dto->expirationDate;
        $this->isBlocked = $dto->isBlocked;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(string $expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }

    public function getIsBlocked(): string
    {
        return $this->isBlocked;
    }

    public function setIsBlocked(string $isBlocked): void
    {
        $this->isBlocked = $isBlocked;
    }

    public function toDto(): CardDto
    {
        $dto = new CardDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->number = $this->number ?? "";
        $dto->expirationDate = $this->expirationDate ?? "";
        $dto->isBlocked = $this->isBlocked ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "number" => $this->number,
            "expiration_date" => $this->expirationDate,
            "is_blocked" => $this->isBlocked,
        ];
    }
}