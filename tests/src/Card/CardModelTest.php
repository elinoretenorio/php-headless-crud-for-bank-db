<?php

declare(strict_types=1);

namespace Bank\Tests\Card;

use PHPUnit\Framework\TestCase;
use Bank\Card\{ CardDto, CardModel };

class CardModelTest extends TestCase
{
    private array $input;
    private CardDto $dto;
    private CardModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 3553,
            "number" => "partner",
            "expiration_date" => "2021-09-27",
            "is_blocked" => "Whatever office that can step.",
        ];
        $this->dto = new CardDto($this->input);
        $this->model = new CardModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new CardModel(null);

        $this->assertInstanceOf(CardModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 7661;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetNumber(): void
    {
        $this->assertEquals($this->dto->number, $this->model->getNumber());
    }

    public function testSetNumber(): void
    {
        $expected = "two";
        $model = $this->model;
        $model->setNumber($expected);

        $this->assertEquals($expected, $model->getNumber());
    }

    public function testGetExpirationDate(): void
    {
        $this->assertEquals($this->dto->expirationDate, $this->model->getExpirationDate());
    }

    public function testSetExpirationDate(): void
    {
        $expected = "2021-10-08";
        $model = $this->model;
        $model->setExpirationDate($expected);

        $this->assertEquals($expected, $model->getExpirationDate());
    }

    public function testGetIsBlocked(): void
    {
        $this->assertEquals($this->dto->isBlocked, $this->model->getIsBlocked());
    }

    public function testSetIsBlocked(): void
    {
        $expected = "May full give card really near into network.";
        $model = $this->model;
        $model->setIsBlocked($expected);

        $this->assertEquals($expected, $model->getIsBlocked());
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