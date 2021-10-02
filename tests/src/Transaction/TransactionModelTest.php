<?php

declare(strict_types=1);

namespace Bank\Tests\Transaction;

use PHPUnit\Framework\TestCase;
use Bank\Transaction\{ TransactionDto, TransactionModel };

class TransactionModelTest extends TestCase
{
    private array $input;
    private TransactionDto $dto;
    private TransactionModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 1135,
            "account_id" => 7739,
            "description" => "family",
            "amount" => 324.52,
            "date" => "2021-10-17",
        ];
        $this->dto = new TransactionDto($this->input);
        $this->model = new TransactionModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new TransactionModel(null);

        $this->assertInstanceOf(TransactionModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 5898;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetAccountId(): void
    {
        $this->assertEquals($this->dto->accountId, $this->model->getAccountId());
    }

    public function testSetAccountId(): void
    {
        $expected = 3522;
        $model = $this->model;
        $model->setAccountId($expected);

        $this->assertEquals($expected, $model->getAccountId());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->dto->description, $this->model->getDescription());
    }

    public function testSetDescription(): void
    {
        $expected = "policy";
        $model = $this->model;
        $model->setDescription($expected);

        $this->assertEquals($expected, $model->getDescription());
    }

    public function testGetAmount(): void
    {
        $this->assertEquals($this->dto->amount, $this->model->getAmount());
    }

    public function testSetAmount(): void
    {
        $expected = 222.10;
        $model = $this->model;
        $model->setAmount($expected);

        $this->assertEquals($expected, $model->getAmount());
    }

    public function testGetDate(): void
    {
        $this->assertEquals($this->dto->date, $this->model->getDate());
    }

    public function testSetDate(): void
    {
        $expected = "2021-10-01";
        $model = $this->model;
        $model->setDate($expected);

        $this->assertEquals($expected, $model->getDate());
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