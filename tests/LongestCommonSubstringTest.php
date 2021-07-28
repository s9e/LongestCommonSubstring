<?php declare(strict_types=1);

/**
* @package   s9e\LongestCommonSubstring
* @copyright Copyright (c) 2021 The s9e authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
namespace s9e\LongestCommonSubstring\Tests;

use PHPUnit\Framework\TestCase;
use s9e\LongestCommonSubstring\LongestCommonSubstring;

class LongestCommonSubstringTest extends TestCase
{
	/**
	* @dataProvider getTestCases
	*/
	public function test(array $strings, $expected)
	{
		$lcs    = new LongestCommonSubstring;
		$actual = $lcs->get($strings);
		foreach ($strings as $string)
		{
			if ($string !== '')
			{
				$this->assertStringContainsString($actual, $string);
			}
		}
		$this->assertEquals($expected, $actual);
	}

	public function getTestCases()
	{
		return [
			[
				[],
				''
			],
			[
				[''],
				''
			],
			[
				['', ''],
				''
			],
			[
				['foo', 'bar'],
				''
			],
			[
				['foo', ''],
				''
			],
			[
				['abc', 'bcd'],
				'bc'
			],
			[
				['aaabbb', 'bbbaaa', 'aaaxbbb', 'bbbxaaa'],
				'aaa'
			],
			[
				['bbbaaa', 'aaabbb', 'bbbxaaa', 'aaaxbbb'],
				'aaa'
			],
		];
	}
}