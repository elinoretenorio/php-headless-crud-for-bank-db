<?php

declare(strict_types=1);

namespace Bank\Tests\Branch;

use PHPUnit\Framework\TestCase;
use Bank\Branch\{ BranchDto, BranchModel };

class BranchModelTest extends TestCase
{
    private array $input;
    private BranchDto $dto;
    private BranchModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 2557,
            "name" => "already",
            "address" => "item",
        ];
        $this->dto = new BranchDto($this->input);
        $this->model = new BranchModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new BranchModel(null);

        $this->assertInstanceOf(BranchModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 2448;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "finally";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetAddress(): void
    {
        $this->assertEquals($this->dto->address, $this->model->getAddress());
    }

    public function testSetAddress(): void
    {
        $expected = "memory";
        $model = $this->model;
        $model->setAddress($expected);

        $this->assertEquals($expected, $model->getAddress());
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