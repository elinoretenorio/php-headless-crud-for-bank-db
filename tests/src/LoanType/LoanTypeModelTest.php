<?php

declare(strict_types=1);

namespace Bank\Tests\LoanType;

use PHPUnit\Framework\TestCase;
use Bank\LoanType\{ LoanTypeDto, LoanTypeModel };

class LoanTypeModelTest extends TestCase
{
    private array $input;
    private LoanTypeDto $dto;
    private LoanTypeModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 7503,
            "type" => "week",
            "description" => "out",
            "base_amount" => 653.33,
            "base_interest_rate" => 116.70,
        ];
        $this->dto = new LoanTypeDto($this->input);
        $this->model = new LoanTypeModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new LoanTypeModel(null);

        $this->assertInstanceOf(LoanTypeModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 909;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetType(): void
    {
        $this->assertEquals($this->dto->type, $this->model->getType());
    }

    public function testSetType(): void
    {
        $expected = "treat";
        $model = $this->model;
        $model->setType($expected);

        $this->assertEquals($expected, $model->getType());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->dto->description, $this->model->getDescription());
    }

    public function testSetDescription(): void
    {
        $expected = "bar";
        $model = $this->model;
        $model->setDescription($expected);

        $this->assertEquals($expected, $model->getDescription());
    }

    public function testGetBaseAmount(): void
    {
        $this->assertEquals($this->dto->baseAmount, $this->model->getBaseAmount());
    }

    public function testSetBaseAmount(): void
    {
        $expected = 82.99;
        $model = $this->model;
        $model->setBaseAmount($expected);

        $this->assertEquals($expected, $model->getBaseAmount());
    }

    public function testGetBaseInterestRate(): void
    {
        $this->assertEquals($this->dto->baseInterestRate, $this->model->getBaseInterestRate());
    }

    public function testSetBaseInterestRate(): void
    {
        $expected = 148.00;
        $model = $this->model;
        $model->setBaseInterestRate($expected);

        $this->assertEquals($expected, $model->getBaseInterestRate());
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