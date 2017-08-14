# 2017 Bugs_Bunny CTF - [Forensic] For25
## Problem
```
I found this file in my computer ,could you please give me the flag ?!
```
## Solution
문제 파일을 받아서 `Sublime_Text` 로 열어서 보면은 `HEX`, `PK` 로 시작되는 `String`, `Offset` 이 존재하는데 이를 `Ctrl+Shift+Mouse Right Click` 을 사용하여 `HEX` 만 따로 추출하여서 `zip` 파일로 저장을 해줍니다. 그리고 압축을 풀어서 이미지를 확인하면 플래그를 확인 할 수가 있습니다.

![플래그 사진](hex.png)

`Bugs_Bunny{Y0u_D1D_1T_W3ll}`
