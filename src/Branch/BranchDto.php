<?php

declare(strict_types=1);

namespace Bank\Branch;

class BranchDto 
{
    public int $id;
    public string $name;
    public string $address;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->name = $row["name"] ?? "";
        $this->address = $row["address"] ?? "";
    }
}