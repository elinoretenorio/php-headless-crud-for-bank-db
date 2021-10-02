<?php

declare(strict_types=1);

namespace Bank\Card;

class CardDto 
{
    public int $id;
    public string $number;
    public string $expirationDate;
    public string $isBlocked;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->number = $row["number"] ?? "";
        $this->expirationDate = $row["expiration_date"] ?? "";
        $this->isBlocked = $row["is_blocked"] ?? "";
    }
}