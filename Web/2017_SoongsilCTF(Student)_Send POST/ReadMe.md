# 2017 Soongsil CTF (고등부) - [Web] Send POST
## Problem
```
간단한 웹 문제입니다. 이 페이지 URL: http://www.soongctf.com/mission/mission12 로
POST 형식을 이용하여 message=givemethekey 를 보내시면 됩니다.
Hint: mission11 페이지를 잘 보면 힌트를 얻을지도?
```
## Solution
크롬의 확장앱인 `Advanced REST Client` 를 사용하여 `POST` 값으로 `message=givemethekey` 를 보내니 플래그가 나왔습니다.

`watch_your_back`