s9e\LongestCommonSubstring takes a list of strings and returns a single string that is contained in all of the given input.


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
