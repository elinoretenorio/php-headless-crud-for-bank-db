<?php

declare(strict_types=1);

namespace Bank\CustomerBranch;

class CustomerBranchDto 
{
    public int $id;
    public int $customerId;
    public int $branchId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->customerId = (int) ($row["customer_id"] ?? 0);
        $this->branchId = (int) ($row["branch_id"] ?? 0);
    }
}