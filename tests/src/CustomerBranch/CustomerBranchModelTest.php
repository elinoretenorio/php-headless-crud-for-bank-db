<?php

declare(strict_types=1);

namespace Bank\Tests\CustomerBranch;

use PHPUnit\Framework\TestCase;
use Bank\CustomerBranch\{ CustomerBranchDto, CustomerBranchModel };

class CustomerBranchModelTest extends TestCase
{
    private array $input;
    private CustomerBranchDto $dto;
    private CustomerBranchModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 4224,
            "customer_id" => 5637,
            "branch_id" => 1821,
        ];
        $this->dto = new CustomerBranchDto($this->input);
        $this->model = new CustomerBranchModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new CustomerBranchModel(null);

        $this->assertInstanceOf(CustomerBranchModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 8406;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetCustomerId(): void
    {
        $this->assertEquals($this->dto->customerId, $this->model->getCustomerId());
    }

    public function testSetCustomerId(): void
    {
        $expected = 571;
        $model = $this->model;
        $model->setCustomerId($expected);

        $this->assertEquals($expected, $model->getCustomerId());
    }

    public function testGetBranchId(): void
    {
        $this->assertEquals($this->dto->branchId, $this->model->getBranchId());
    }

    public function testSetBranchId(): void
    {
        $expected = 7594;
        $model = $this->model;
        $model->setBranchId($expected);

        $this->assertEquals($expected, $model->getBranchId());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}