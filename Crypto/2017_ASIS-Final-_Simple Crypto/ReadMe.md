# 2017 ASIS CTF Finals - [Crypto] Simple Crypto
## Problem

## Solution
`flag.enc` 와 파이썬 코드가 주어지는데, 파이썬 코드를 보면 다음과 같은 내용이 있습니다.

```
#!/usr/bin/python

import random
from secret import FLAG 

KEY = 'musZTXmxV58UdwiKt8Tp'

def xor_str(x, y):
    if len(x) > len(y):
        return ''.join([chr(ord(z) ^ ord(p)) for (z, p) in zip(x[:len(y)], y)])
    else:
        return ''.join([chr(ord(z) ^ ord(p)) for (z, p) in zip(x, y[:len(x)])])

flag, key = FLAG.encode('hex'), KEY.encode('hex')
enc = xor_str(key * (len(flag) // len(key) + 1), flag).encode('hex')

ef = open('flag.enc', 'w')
ef.write(enc.decode('hex'))
ef.close()
```

단순히 xor 연산을 해주는 것이기 때문에, 해당 `xor_str` 함수를 그대로 이용하여서 다음과 같이 코딩을 해주면 됩니다.

```
import random

KEY = 'musZTXmxV58UdwiKt8Tp'

def xor_str(x, y):
    if len(x) > len(y):
        return ''.join([chr(ord(z) ^ ord(p)) for (z, p) in zip(x[:len(y)], y)])
    else:
        return ''.join([chr(ord(z) ^ ord(p)) for (z, p) in zip(x, y[:len(x)])])

flag = open("flag.enc", "rb")
data = flag.read()
flag.close()

key = KEY.encode('hex')
enc = xor_str(key * (len(data) // len(key) + 1), data).decode('hex')

#ef = open('flag.enc', 'w')
#ef.write(enc.decode('hex'))
#ef.close()

dec_file = open("flag.dec", "wb")
dec_file.write(enc)
dec_file.close()
```

그리고 파일의 `hex`를 확인해보면, `PNG` 파일의 헤더가 나와있는데 확장자를 `png` 로 고쳐서 확인해보면 플래그가 나옵니다.


`ASIS{juSt_S1mpl3_Cryp7o_f0r_perFect_guy5_l1ke_You!}`
