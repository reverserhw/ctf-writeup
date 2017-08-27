# 2017 HackCon CTF - [Web] Noobcoder
## Problem
```
A junior recently started doing PHP, and makes some random shit. He uses gedit as his go-to editor with a black theme thinking it was sublime.
So he made this login portal, I am sure he must have left something out. Why don't you give it a try?
Server: http://defcon.org.in:6062

Note: dirbuster is NOT required for this question
```
## Solution
디크립션을 읽어보니 `gedit` 라는 에디터를 써서 작업하는 도중에 꺼져서 백업파일이 생긴 것 같습니다. `gedit` 의 백업파일은 확장자 뒤에 `~` 가 붙습니다. 이를 이용해 일단 `index.php` 소스를 확인해봅니다

```
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
	<body>
		<div id="fullscreen_bg" class="fullscreen_bg"/>
			<div class="container">
				<div class = "container">
					<form class="form-signin" method="POST" name = "loginpage" action = "checker.php">
						<h1 class="form-signin-heading text-muted">Sign In</h1>
						<input id = "user" type="text" name = "username" class="form-control" placeholder="Email address" required="" autofocus="">
						<input id = "pass" type="password" name = "password" class="form-control" placeholder="Password" required="">
						<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="load();">
							Sign In
						</button>
					</form>
				</div>
			</div>
		</div>
		
	</body>

</html>
```


`index.php` 에는 별 다른게 없고 `checker.php` 에 값을 전송하는 것을 알 수 있습니다. `checker.php` 의 소스를 보면 다음과 같습니다.

```
<html>
<head>
</head>
<body>
<?php
if ($_POST["username"] == $_POST["password"] && $_POST["password"] !== $_POST["username"])
	echo "congratulations the flag is d4rk{TODO}c0de";
else
	echo "nice try, but try again";
?>
</body>
</html>
```

`==` 와 `!==` 를 보니 `php magic hash` 취약점인 것 같습니다.
`0e12345` 와 `0e67890` 을 각각 `username` 과 `password` 에 집어넣어서 로그인을 하면 플래그가 나옵니다.

`congratulations the flag is d4rk{l0l_g3dit_m4ster_roxx}c0de`

`d4rk{l0l_g3dit_m4ster_roxx}c0de`
