<?php

namespace App;

use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    private array $array;

    public function setUp(): void
    {
        $this->array = [
            ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
            ['id' => 2, 'date' => "12.02.2020", 'name' => "test2"],
            ['id' => 4, 'date' => "12.03.2020", 'name' => "test4"],
            ['id' => 1, 'date' => "12.04.2020", 'name' => "test1"],
            ['id' => 2, 'date' => "12.05.2020", 'name' => "test4"],
            ['id' => 3, 'date' => "12.06.2020", 'name' => "test3"],
        ];
    }

    /**
     * Выделить уникальные записи (убрать дубли) в отдельный массив. в конечном массиве не должно быть элементов с одинаковым id.
     */
    public function test_isArrayHasUniqueIds(): void
    {
        $uniques = [];
        $expected =  [
            ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
            ['id' => 2, 'date' => "12.02.2020", 'name' => "test2"],
            ['id' => 4, 'date' => "12.03.2020", 'name' => "test4"],
            ['id' => 3, 'date' => "12.06.2020", 'name' => "test3"],
        ];

        $result = array_filter($this->array, function ($item) use (&$uniques): array {
            if (!in_array($item['id'], $uniques)) {
                $uniques[] = $item['id'];
                return $item;
            }
            return [];
        });

        $this->assertSame($expected, array_values($result));
    }

    /**
     * Отсортировать многомерный массив по любому ключу
     */
    public function test_itSortArrayByKey(): void
    {
        $key = 'name';
        $expected = [
            ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
            ['id' => 1, 'date' => "12.04.2020", 'name' => "test1"],
            ['id' => 2, 'date' => "12.02.2020", 'name' => "test2"],
            ['id' => 3, 'date' => "12.06.2020", 'name' => "test3"],
            ['id' => 4, 'date' => "12.03.2020", 'name' => "test4"],
            ['id' => 2, 'date' => "12.05.2020", 'name' => "test4"],
        ];

        uasort($this->array, fn ($a, $b) => $a[$key] <=> $b[$key]);

        $this->assertSame($expected, array_values($this->array));
    }

    /**
     * Вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)
     */
    public function test_filteringArrayById(): void
    {
        $id = 2;
        $expected = [
            ['id' => 2, 'date' => "12.02.2020", 'name' => "test2"],
            ['id' => 2, 'date' => "12.05.2020", 'name' => "test4"],
        ];

        $result = array_filter($this->array, function ($item) use ($id) {
            return $item['id'] === $id;
        });

        $this->assertSame($expected, array_values($result));
    }

    /**
     * Изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)
     */
    public function test_isSwapKeyValues(): void
    {
        $key1 = 'name';
        $key2 = 'id';
        $expected = [
            'test1' => 1,
            'test2' => 2,
            'test4' => 2,
            'test3' => 3,
        ];

       $result = array_combine(array_column($this->array, $key1), array_column($this->array, $key2));

       $this->assertSame($expected, $result);
    }

}
