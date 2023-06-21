<?php
declare(strict_types=1);

namespace App\solutions;

class OneFilter
{
	/**
	 * Получить уникальные записи массива
	 *
	 * @param array $data
	 * @param string $column
	 * @return array
	 */
	public function uniqueValues(array $data, string $column): array
	{
		$output = array_intersect_key($data, array_unique(array_column($data, $column)));

		return $output;
	}

	/**
	 * Получить дубликаты записей массива
	 *
	 * @param array $data
	 * @param array $unique
	 * @return array
	 */
	public function getDuplicates(array $data, array $unique): array
	{
		$output = array_values(array_diff_key($data, $unique));

		return $output;
	}

	/**
	 * Получить отсортированный массив в порядке убывания
	 *
	 * @param array $data
	 * @param string $column
	 * @return array
	 */
	public function sortByKey(array $data, string $column): array
	{
		array_multisort($data, SORT_DESC, array_column($data, $column));

		return $data;
	}

	/**
	 * Получить элементы массива по условию
	 *
	 * @param array $data
	 * @param string $column
	 * @param string $value
	 * @return array
	 */
	public function getElementByCondition(array $data, string $column, string $value): array
	{
		$output = array_map(function ($k) use ($data) {
			return in_array($k, array_keys($data)) ? $data[$k] : [];
		}, array_keys(array_filter(array_column($data, $column), function ($v) use ($value) {
			return $v === $value;
		}, ARRAY_FILTER_USE_BOTH)));

		return $output;
	}

	public function changeKeysAndValuesOfArray(array $data): array
	{
		$output = call_user_func_array('array_merge', array_map(function ($q) {
			return (array_key_first($q) === 'id') ? [$q['name'] => $q['id']] : null;
		}, $data));

		return $output;
	}

}
