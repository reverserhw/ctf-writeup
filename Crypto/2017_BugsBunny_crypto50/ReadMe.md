# 2017 Bugs Bunny CTF - [Crypto] crypto-50
## Problem

```
Crypto-50
50

Decode ME faster !
```


## Solution

문제파일로 주어진 `enc.txt` 를 보면 `base64` 로 `encode` 가 더럽게 많이 되어 있는 것을 볼 수 있는데, 이를 원래 문자열이 나올때까지 끊임없이 디코딩을 해주면 플래그가 나옵니다.

```
Bugs_Bunny{N0T_H4Rd_4T_4ll}
```
