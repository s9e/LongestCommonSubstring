s9e\LongestCommonSubstring takes a list of strings and returns a single string that is contained in all of the given input. The implementation is designed for sets where the shortest input string is 10-20 bytes long at most, and where a common substring is not guaranteed to exist. For large input, you'll want to use a different implementation.


## Usage

```php
$lcs = new s9e\LongestCommonSubstring\LongestCommonSubstring;
var_dump($lcs->get(['abcdxyz', 'xyzabcd']));
```
```
string(4) "abcd"
```

```php
$lcs = new s9e\LongestCommonSubstring\LongestCommonSubstring;
var_dump($lcs->get(['foo', 'bar']));
```
```
string(0) ""
```
