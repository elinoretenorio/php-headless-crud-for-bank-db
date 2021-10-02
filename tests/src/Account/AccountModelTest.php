<?php

declare(strict_types=1);

namespace Bank\Tests\Account;

use PHPUnit\Framework\TestCase;
use Bank\Account\{ AccountDto, AccountModel };

class AccountModelTest extends TestCase
{
    private array $input;
    private AccountDto $dto;
    private AccountModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 4587,
            "customer_id" => 7619,
            "card_id" => 4821,
            "balance" => "marriage",
        ];
        $this->dto = new AccountDto($this->input);
        $this->model = new AccountModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new AccountModel(null);

        $this->assertInstanceOf(AccountModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 8261;
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
        $expected = 227;
        $model = $this->model;
        $model->setCustomerId($expected);

        $this->assertEquals($expected, $model->getCustomerId());
    }

    public function testGetCardId(): void
    {
        $this->assertEquals($this->dto->cardId, $this->model->getCardId());
    }

    public function testSetCardId(): void
    {
        $expected = 7066;
        $model = $this->model;
        $model->setCardId($expected);

        $this->assertEquals($expected, $model->getCardId());
    }

    public function testGetBalance(): void
    {
        $this->assertEquals($this->dto->balance, $this->model->getBalance());
    }

    public function testSetBalance(): void
    {
        $expected = "wait";
        $model = $this->model;
        $model->setBalance($expected);

        $this->assertEquals($expected, $model->getBalance());
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