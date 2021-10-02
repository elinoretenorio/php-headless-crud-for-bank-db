<?php

declare(strict_types=1);

namespace Bank\CustomerBranch;

use JsonSerializable;

class CustomerBranchModel implements JsonSerializable
{
    private int $id;
    private int $customerId;
    private int $branchId;

    public function __construct(CustomerBranchDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->customerId = $dto->customerId;
        $this->branchId = $dto->branchId;
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

    public function getBranchId(): int
    {
        return $this->branchId;
    }

    public function setBranchId(int $branchId): void
    {
        $this->branchId = $branchId;
    }

    public function toDto(): CustomerBranchDto
    {
        $dto = new CustomerBranchDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->customerId = (int) ($this->customerId ?? 0);
        $dto->branchId = (int) ($this->branchId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "customer_id" => $this->customerId,
            "branch_id" => $this->branchId,
        ];
    }
}