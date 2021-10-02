<?php

declare(strict_types=1);

namespace Bank\Account;

class AccountDto 
{
    public int $id;
    public int $customerId;
    public int $cardId;
    public string $balance;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->customerId = (int) ($row["customer_id"] ?? 0);
        $this->cardId = (int) ($row["card_id"] ?? 0);
        $this->balance = $row["balance"] ?? "";
    }
}