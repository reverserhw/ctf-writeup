# 2017 SHA CTF - [Network] Vod Kanockers
## Problem
The name is Kanockers. Vod Kanockers.

## Solution
처음 문제 페이지를 들어가면, 모자를 쓴 남자아이 사진이 나오고,
소스를 확인하면 다음과 같이 나온다.

```
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>The name is Kanockers. Vod Kanockers</title>
  </head>
  <body>
    <!-- *Knock Knock* 88 156 983 1287 8743 5622 9123 -->
    <img src="vod.jpg" />
  </body>
</html>
```

Knock Knock 과 그 뒤에 숫자들을 보니, 해당 포트들에 순서대로 knock 를 하면 플래그를
뿌려줄 것 같다.

`nc` 를 이용하여, 다음과 같이 자동으로 순서대로 접속을 하게끔 cmd 창에 다음과 같은 스크립트를 붙여넣었다.

```
nc 34.249.81.124 88;
nc 34.249.81.124 156;
nc 34.249.81.124 983;
nc 34.249.81.124 1287;
nc 34.249.81.124 8743;
nc 34.249.81.124 5622;
nc 34.249.81.124 9123

```

그랬더니, 다음과 같이 플래그를 뿌려주는 것을 확인 할 수가 있었다.

```
nc 34.249.81.124 88;

nc 34.249.81.124 156;

nc 34.249.81.124 983;

nc 34.249.81.124 1287;

nc 34.249.81.124 8743;

nc 34.249.81.124 5622;

nc 34.249.81.124 9123
flag{6283a3856ce4766d88c475668837184b}
```

`flag{6283a3856ce4766d88c475668837184b}`
