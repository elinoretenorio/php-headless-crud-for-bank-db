<?php

declare(strict_types=1);

namespace Bank\Loan;

class LoanDto 
{
    public int $id;
    public int $accountId;
    public int $loanTypeId;
    public float $amountPaid;
    public string $startDate;
    public string $dueDate;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->accountId = (int) ($row["account_id"] ?? 0);
        $this->loanTypeId = (int) ($row["loan_type_id"] ?? 0);
        $this->amountPaid = (float) ($row["amount_paid"] ?? 0);
        $this->startDate = $row["start_date"] ?? "";
        $this->dueDate = $row["due_date"] ?? "";
    }
}