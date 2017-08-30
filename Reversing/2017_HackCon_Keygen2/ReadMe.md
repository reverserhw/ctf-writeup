# 2017 HackCon CTF - [Reversing] Keygen2
## Problem
```
This is the continuation of Keygen, solve that first.
Now make a proper keygen.
```
## Solution
여김없이 `IDA` 로 메인소스를 까보니 띠용? 처음 풀었던 `Keygen` 과 소스가 동일합니다.
`Keygen` 에서 전송했던 페이로드를 다시 전송해봅시다.

```
Send me 10 keys for getting a match separated by,
followed by a NULL/EOF character.
```

라고 뜨는 군요. `Send me 10 keys` 라는 것을 보니 키를 10번 보내면 풀리는 것 같습니다.
다음과 같이 파이썬 코드를 작성하고 돌려봅시다.

```
#-*- coding: utf-8 -*-
import socket
def netcat(host, port, content):
	s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	s.connect((host, port))
	s.sendall(content)
	s.shutdown(socket.SHUT_WR)
	while 1:
		data = s.recv(1024)
		if data == "":
			break
		print "Received Data : ", repr(data)
	print "Connection Closed"
	s.close()
		
host = "defcon.org.in"
port = 8083
content = "73766575737473726573766f6f64797871737575\n"

netcat(host, port, content*10)
```

그러면 띠용하고~ 플래그가 나옵니다.


```
Received Data :  '\n\nSend me 10 keys for getting a match separated by \\n, followed by a NULL/EOF character.\n\n\n'
Received Data :  'Flag: d4rk{r0ck1ng_keyg3n_123}c0de\n'
```

`d4rk{r0ck1ng_keyg3n_123}c0de`
