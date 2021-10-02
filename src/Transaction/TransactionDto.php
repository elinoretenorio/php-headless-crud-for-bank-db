<?php

declare(strict_types=1);

namespace Bank\Transaction;

class TransactionDto 
{
    public int $id;
    public int $accountId;
    public string $description;
    public float $amount;
    public string $date;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->accountId = (int) ($row["account_id"] ?? 0);
        $this->description = $row["description"] ?? "";
        $this->amount = (float) ($row["amount"] ?? 0);
        $this->date = $row["date"] ?? "";
    }
}