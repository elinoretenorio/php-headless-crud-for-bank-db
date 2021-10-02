<?php

declare(strict_types=1);

namespace Bank\LoanType;

class LoanTypeDto 
{
    public int $id;
    public string $type;
    public string $description;
    public float $baseAmount;
    public float $baseInterestRate;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->type = $row["type"] ?? "";
        $this->description = $row["description"] ?? "";
        $this->baseAmount = (float) ($row["base_amount"] ?? 0);
        $this->baseInterestRate = (float) ($row["base_interest_rate"] ?? 0);
    }
}