# 2017 SHA CTF - [Misc] Stolen Bitcoins
## Problem
```
Someone stole our Bitcoins, luckily we captured the transaction. Can you find the flag that will allow us to get them back?
```
## Solution
처음 문제 파일을 받아서 열어보면, 암호화가 되있는 것을 볼 수가 있는데 이는 비트코인의 `BlockChain` 입니다. 

[Bitcoin Transaction Decode](https://chainquery.com/bitcoin-api/decodescript)

해당 사이트에서 이를 디코딩 해주시면, 다음과 같이 나옵니다.
```
{
	"result": {
		"asm": "0 0 0 0 0 OP_UNKNOWN 5402000000fd8b024c0100 10 OP_PICK 23 OP_PICK OP_ADD 99 OP_EQUAL OP_ADD 33 OP_PICK 21 OP_PICK OP_ADD 198 OP_EQUAL OP_ADD 37 OP_PICK 98 OP_ADD 206 OP_EQUAL OP_ADD 29 OP_PICK 25 OP_PICK OP_ADD 104 OP_EQUAL OP_ADD 26 OP_PICK 29 OP_PICK OP_ADD 148 OP_EQUAL OP_ADD 6 OP_PICK 3 OP_PICK OP_ADD 157 OP_EQUAL OP_ADD 30 OP_PICK OP_RIPEMD160 412fc6097e62d5c494b8df37e3805805467d1a2c OP_EQUAL OP_ADD 13 OP_PICK 11 OP_PICK OP_ADD 105 OP_EQUAL OP_ADD 32 OP_PICK 34 OP_PICK OP_ADD 155 OP_EQUAL OP_ADD 1 OP_PICK 113 OP_ADD 238 OP_EQUAL OP_ADD 18 OP_PICK 32 OP_PICK OP_ADD 149 OP_EQUAL OP_ADD 5 OP_PICK 3 OP_PICK OP_ADD 157 OP_EQUAL OP_ADD 2 OP_PICK 4 OP_PICK OP_ADD 112 OP_EQUAL OP_ADD 9 OP_PICK 34 OP_PICK OP_ADD 158 OP_EQUAL OP_ADD 25 OP_PICK 30 OP_PICK OP_ADD 149 OP_EQUAL OP_ADD 4 OP_PICK 11 OP_PICK OP_ADD 148 OP_EQUAL OP_ADD 21 OP_PICK 17 OP_PICK OP_ADD 111 OP_EQUAL OP_ADD 36 OP_PICK 22 OP_ADD 119 OP_EQUAL OP_ADD 27 OP_PICK 17 OP_PICK OP_ADD 106 OP_EQUAL OP_ADD 22 OP_PICK 17 OP_PICK OP_ADD 105 OP_EQUAL OP_ADD 35 OP_PICK 12 OP_ADD 115 OP_EQUAL OP_ADD 38 OP_PICK 111 OP_ADD 213 OP_EQUAL OP_ADD 8 OP_PICK 23 OP_PICK OP_ADD 106 OP_EQUAL OP_ADD 31 OP_PICK 7 OP_PICK OP_ADD 151 OP_EQUAL OP_ADD 12 OP_PICK 28 OP_PICK OP_ADD 148 OP_EQUAL OP_ADD 34 OP_PICK 53 OP_ADD 176 OP_EQUAL OP_ADD 28 OP_PICK 22 OP_PICK OP_ADD 106 OP_EQUAL OP_ADD 19 OP_PICK 4 OP_PICK OP_ADD 108 OP_EQUAL OP_ADD 23 OP_PICK OP_RIPEMD160 c47907abd2a80492ca9388b05c0e382518ff3960 OP_EQUAL OP_ADD 15 OP_PICK 18 OP_PICK OP_ADD 155 OP_EQUAL OP_ADD 11 OP_PICK OP_RIPEMD160 8e95e8ccac6c8eb91b8a7a8f02bca2fa2268d4b2 OP_EQUAL OP_ADD 16 OP_PICK 21 OP_PICK OP_ADD 152 OP_EQUAL OP_ADD 3 OP_PICK 34 OP_PICK OP_ADD 156 OP_EQUAL OP_ADD 17 OP_PICK 3 OP_PICK OP_ADD 157 OP_EQUAL OP_ADD 24 OP_PICK 20 OP_PICK OP_ADD 106 OP_EQUAL OP_ADD 7 OP_PICK OP_RIPEMD160 38f77e12c50a398d5eae85c9408667f971d09d09 OP_EQUAL OP_ADD 14 OP_PICK 29 OP_PICK OP_ADD 107 OP_EQUAL OP_ADD 20 OP_PICK 23 OP_PICK OP_ADD 147 OP_EQUAL OP_ADD OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP 38 OP_EQUAL 0 0 0 0",
		"type": "nonstandard",
		"p2sh": "3DCzgE4RiMMF1NSLgrDUaxwL5WHzoHvteq"
	},
	"error": null,
	"id": null
}
```

처음에는 0으로 시작하는데, 이는 스택에 푸시하는 값이 0이라는 뜻입니다.
그리고 다음과 같은 패턴이 지속되어서 나타납니다.

```
10 OP_PICK
23 OP_PICK
OP_ADD 99
OP_EQUAL
OP_ADD
```

이제 `Opcode` 를 분석 해보도록 하겠습니다.
비트코인 스크립트에 관한 사이트는 맨 아래에서 따로 참조부분을 넣도록 하겠습니다.

`OP_PICK` 은 스택의 항목 n 이 최상단에 올라오는 것을 뜻합니다. 즉, 10이 스택의 최상단에 올라오게 되고, 그 다음 23 이 맨 위에 올라오게 됩니다.

그리고 `OP_ADD` 를 통해 99 를 더해줍니다.


그러면 스택구조는 다음과 같이 짜여지게 됩니다.

```
99
val(10) + val(22)
-------------------- << base
0
```

그리고 `OP_EQUAL` 로 이 둘을 비교를 해줍니다.

```
(val(10)+val(22) == 99 ? 1 : 0)
------------ << base
0
```

그리고 `OP_ADD` 에 1 또는 0 의 값이 마지막으로 들어가게 되고, 스택 포인터의 시작을 다음코드로 초기화 시켜줍니다.

```
33 OP_PICK
21 OP_PICK
OP_ADD 198
OP_EQUAL
OP_ADD
```

이것도 아까와 스택구조와 동일하니 그대로 분석을 계속 해주다보면, 다음과 같은 코드를 만날 수 있습니다.

```
OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP OP_NIP
OP_NIP OP_NIP OP_NIP  OP_NIP OP_NIP OP_NIP
OP_NIP OP_NIP OP_NIP OP NIP OP NIP OP NIP
OP_NIP  OP_NIP  OP_NIP OP_NIP OP_NIP 
38
OP_EQUAL
```

OP_NIP 은 스택 맨 위에서 2번째 값을 제거하는 `Opcode` 입니다. 따라서 연산을 계속 수행하게 되면 이전의 값을 사라지고 스택에는 합계만 남게 됩니다.

그리고 `Hash Check` 라는 하는 부분이 따로 있는데, 이는 다음과 같습니다.

```
30 OP_PICK 
OP_RIPEMD160 
412fc6097e62d5c494b8df37e3805805467d1a2c 
OP_EQUAL 
OP_ADD 
```

다음 `opcode` 는 `ripemd160(val(30))` 이 `412fc6097e62d5c494b8df37e3805805467d1a2c` 가 맞는지에 대한 여부를 확인하는 것입니다. 여기서 우리는 `30` 이라는 수가 하나의 `ascii` 문자열이라는 것을 아까 분석에 의해서 알 수 있습니다.

해당 조건을 통해서 다음과 같이 브루트포싱 코드를 작성합니다.

```
import hashlib

def find(hash_string):
    for i in range(32,128):
        c = chr(i)
        h = hashlib.new('ripemd160')
        h.update(c)

        if h.hexdigest() == hash_string:
            return c

    return ''

print find("412fc6097e62d5c494b8df37e3805805467d1a2c")
```

그러면 다음과 같은 결과가 나옵니다.

```
>>> 
= RESTART: d:/Desktop/개인문서/CTF 문제풀이/문제/2017_SHA_Stolenbit/solve.py =
2
>>> 
```

이제 제일 지루한 파트인, 방정식 파트만 남았습니다...

```
10 + 22 = 99
13 + 10 = 105
4 + 10 = 148
33 + 20 = 198
29 + 24 = 104
26 + 28 = 148
6 + 2 = 157
5 + 2 = 157
...
```

아까와 같이 나왔던 것을 z3 솔버를 사용하여 풀어주면 3개의 플래그가 나옵니다.

```
flag{e612123bd7128a3df7598a6198fffc97}
flag{e622223bc6128a4ce7698a6198feec88}
flag{e632323bb5128a5bd7798a6198fddc79}
```

하나씩 인증하다보면, 다음 플래그가 인증되는 것을 확인 할 수 있습니다.

`flag{e622223bc6128a4ce7698a6198feec88}`
