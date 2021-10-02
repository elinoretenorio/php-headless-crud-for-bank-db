<?php

declare(strict_types=1);

namespace Bank\Loan;

use JsonSerializable;

class LoanModel implements JsonSerializable
{
    private int $id;
    private int $accountId;
    private int $loanTypeId;
    private float $amountPaid;
    private string $startDate;
    private string $dueDate;

    public function __construct(LoanDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->accountId = $dto->accountId;
        $this->loanTypeId = $dto->loanTypeId;
        $this->amountPaid = $dto->amountPaid;
        $this->startDate = $dto->startDate;
        $this->dueDate = $dto->dueDate;
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

    public function getLoanTypeId(): int
    {
        return $this->loanTypeId;
    }

    public function setLoanTypeId(int $loanTypeId): void
    {
        $this->loanTypeId = $loanTypeId;
    }

    public function getAmountPaid(): float
    {
        return $this->amountPaid;
    }

    public function setAmountPaid(float $amountPaid): void
    {
        $this->amountPaid = $amountPaid;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    public function setDueDate(string $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function toDto(): LoanDto
    {
        $dto = new LoanDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->accountId = (int) ($this->accountId ?? 0);
        $dto->loanTypeId = (int) ($this->loanTypeId ?? 0);
        $dto->amountPaid = (float) ($this->amountPaid ?? 0);
        $dto->startDate = $this->startDate ?? "";
        $dto->dueDate = $this->dueDate ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "account_id" => $this->accountId,
            "loan_type_id" => $this->loanTypeId,
            "amount_paid" => $this->amountPaid,
            "start_date" => $this->startDate,
            "due_date" => $this->dueDate,
        ];
    }
}