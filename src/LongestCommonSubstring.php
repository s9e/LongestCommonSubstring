<?php declare(strict_types=1);

/**
* @package   s9e\LongestCommonSubstring
* @copyright Copyright (c) 2021 The s9e authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
namespace s9e\LongestCommonSubstring;

use const SORT_STRING;
use function array_shift, array_unique, sort, str_contains, strlen, substr, usort;

class LongestCommonSubstring
{
	/**
	* Return the longest substring that is contained in all of the input strings
	*
	* The result may be an empty string, which is technically the longest string contained in
	* all of the input as per str_contains()'s logic
	*/
	public function get(array $strings): string
	{
		$this->sortStringsByLength($strings);

		$string = array_shift($strings) ?? '';
		$len    = strlen($string);
		while ($len > 0)
		{
			foreach ($this->getSubstrings($string, $len) as $substring)
			{
				if ($this->stringsContain($strings, $substring))
				{
					return $substring;
				}
			}

			--$len;
		}

		return '';
	}

	/**
	* Get a list of unique substrings from given string, of given length
	*/
	protected function getSubstrings(string $string, int $len): array
	{
		$pos        = strlen($string) - $len;
		$substrings = [];
		do
		{
			$substrings[] = substr($string, $pos, $len);
		}
		while (--$pos >= 0);

		$substrings = array_unique($substrings);
		sort($substrings, SORT_STRING);

		return $substrings;
	}

	/**
	* Sort given list of strings by ascending length, in-place
	*
	* Iterating through the input in ascending order increases the chances of failing early on
	* the shortest strings
	*/
	protected function sortStringsByLength(array &$strings): void
	{
		usort(
			$strings,
			function (string $a, string $b): int
			{
				return strlen($a) - strlen($b);
			}
		);
	}

	/**
	* Test whether a list of strings all contain a given substring
	*/
	protected function stringsContain(array $strings, string $substring): bool
	{
		foreach ($strings as $string)
		{
			if (!str_contains($string, $substring))
			{
				return false;
			}
		}

		return true;
	}
}