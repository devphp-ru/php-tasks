<?php
declare(strict_types=1);

namespace App\solutions;

use PHPUnit\Framework\TestCase;

class OneFilterTest extends TestCase
{
	private OneFilter $filter;

	public function setUp(): void
	{
		$this->filter = new OneFilter();
	}

	public function testGeneralAssignment(): void
	{
		$input = [
			['id' => '1', 'date' => '12.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			['id' => '1', 'date' => '22.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '11.11.2020', 'name' => 'test4'],
			['id' => '3', 'date' => '06.06.2020', 'name' => 'test3'],
		];

		$this->assertIsArray($input);
		$this->assertCount(count($input), $input);

		$expect = [
			['id' => '1', 'date' => '12.01.2020', 'name' => 'test1' ],
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			5 => ['id' => '3', 'date' => '06.06.2020', 'name' => 'test3'],
		];
		//1
		$outputUnique = $this->filter->uniqueValues($input, 'id');

		$this->assertCount(count($expect), $outputUnique);
		$this->assertEquals($expect, $outputUnique);

		$outputDuplicates = $this->filter->getDuplicates($input, $outputUnique);

		$expect = [
			['id' => '1', 'date' => '22.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '11.11.2020', 'name' => 'test4'],
		];

		$this->assertCount(count($expect), $outputDuplicates);
		$this->assertEquals($expect, $outputDuplicates);
		//2
		$expect = [
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			['id' => '3', 'date' => '06.06.2020', 'name' => 'test3'],
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '1', 'date' => '12.01.2020', 'name' => 'test1'],
		];

		$outputSort = $this->filter->sortByKey($outputUnique, 'name');

		$this->assertEQuals($expect, $outputSort);
		//3
		$outputCondition = $this->filter->getElementByCondition($input, 'id', '2');

		$expect = [
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '2', 'date' => '11.11.2020', 'name' => 'test4'],
		];

		$this->assertEquals($expect, $outputCondition);

		//4
		$expect = [
			'test1' => '1',
			'test2' => '2',
			'test3' => '3',
			'test4' => '4',
		];

		$outputChanges = $this->filter->changeKeysAndValuesOfArray($outputSort);
		asort($outputChanges);//если важен порядок в этом пункте, т.к приходит $outputSort desc, а $expect asc

		$this->assertSame($expect, $outputChanges);
	}

	/**
	 * 1. выделить уникальные записи (убрать дубли) в отдельный массив.
	 * В конечном массиве не должно быть элементов с одинаковым id.
	 */
	public function testGetUniqueValueArrays(): void
	{
		$input = [
			['id' => '1', 'date' => '12.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			['id' => '1', 'date' => '22.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '11.11.2020', 'name' => 'test4'],
			['id' => '3', 'date' => '06.06.2020', 'name' => 'test3'],
		];

		$this->assertIsArray($input);
		$this->assertCount(count($input), $input);

		$expect = [
			['id' => '1', 'date' => '12.01.2020', 'name' => 'test1' ],
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			5 => ['id' => '3', 'date' => '06.06.2020', 'name' => 'test3'],
		];

		$output = $this->filter->uniqueValues($input, 'id');

		$this->assertCount(count($expect), $output);
		$this->assertEquals($expect, $output);

	}

	/**
	 * 1. выделить уникальные записи (убрать дубли) в отдельный массив.
	 * В конечном массиве не должно быть элементов с одинаковым id.
	 */
	public function testGetDuplicatesFromArray(): void
	{
		$input = [
			['id' => '1', 'date' => '12.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			['id' => '1', 'date' => '22.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '11.11.2020', 'name' => 'test4'],
			['id' => '3', 'date' => '06.06.2020', 'name' => 'test3'],
		];

		$unique = $this->filter->uniqueValues($input, 'id');
		$output = $this->filter->getDuplicates($input, $unique);

		$expect = [
			['id' => '1', 'date' => '22.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '11.11.2020', 'name' => 'test4'],
		];

		$this->assertCount(count($expect), $output);
		$this->assertEquals($expect, $output);
	}

	/**
	 * 2. отсортировать многомерный массив по ключу (любому)
	 */
	public function testSortTheArray(): void
	{
		//массив с уникальными записями
		$input = [
			['id' => '1', 'date' => '12.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			5 => ['id' => '3', 'date' => '06.06.2020', 'name' => 'test3'],
		];

		$expect = [
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			['id' => '3', 'date' => '06.06.2020', 'name' => 'test3'],
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '1', 'date' => '12.01.2020', 'name' => 'test1'],
		];

		$output = $this->filter->sortByKey($input, 'name');

		$this->assertEQuals($expect, $output);
	}

	/**
	 * 3. вернуть из массива только элементы, удовлетворяющие внешним
	 * условиям (например элементы с определенным id)
	 */
	public function testGetElementByCondition(): void
	{
		$input = [
			['id' => '1', 'date' => '12.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			['id' => '1', 'date' => '22.01.2020', 'name' => 'test1'],
			['id' => '2', 'date' => '11.11.2020', 'name' => 'test4'],
			['id' => '3', 'date' => '06.06.2020', 'name' => 'test3'],
		];

		$output = $this->filter->getElementByCondition($input, 'id', '2');

		$expect = [
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '2', 'date' => '11.11.2020', 'name' => 'test4'],
		];

		$this->assertEquals($expect, $output);

		$output = $this->filter->getElementByCondition($input, 'name', 'test4');

		$expect = [
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			['id' => '2', 'date' => '11.11.2020', 'name' => 'test4'],
		];
		$this->assertEquals($expect, $output);
	}

	/**
	 * 4. изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)
	 */
	public function testChangeKeysAndValuesOfArray(): void
	{
		$input = [
			['id' => '4', 'date' => '08.03.2020', 'name' => 'test4'],
			['id' => '3', 'date' => '06.06.2020', 'name' => 'test3'],
			['id' => '2', 'date' => '02.05.2020', 'name' => 'test2'],
			['id' => '1', 'date' => '12.01.2020', 'name' => 'test1'],
		];

		$expect = [
			'test1' => '1',
			'test2' => '2',
			'test3' => '3',
			'test4' => '4',
		];

		$output = $this->filter->changeKeysAndValuesOfArray($input);

		$this->assertEquals($expect, $output);
	}

}

