# 2017 Bugs Bunny - [Crypto] Scy Way
## Problem
```
Decrypt My Secret And Win!

IHUDERMRCPESOLLANOEIHR

Bugs_Bunny{flag}

Author: TnMch
```
## Solution
문제명이 Scy Way 이고, 워게임을 풀면서 Scytale 이라는 고전암호 방식을 봤었던 탓에
Scytale 암호라는 느낌이 들었습니다.

총 문자열 길이가 22글자이며, 이를 11글자씩 나눠서 세로로 읽어보면 다음과 같이 나옵니다.

```
IHUDERMRCPE
SOLLANOEIHR

-> ISHOULDLEARNMORECIPHER
```

`I SHOULD LEARN MORE CIPHER` 라는 문장이 만들어지는 것으로 보아 플래그인것 같습니다.
그러면 이걸 이제, 플래그형식에 맞춰서 인증을 하면 문제가 풀립니다.

`Bugs_Bunny{ISHOULDLEARNMORECIPHER}`
