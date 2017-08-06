# 2017 SHA CTF - [Binary] asby
## Problem
```
Eindbazen team member asby has by far been putting the most energy and time in creating the SHA2017 CTF. To honor his dedication and all his effort we created this challenge as an ode to him.

You can choose to reverse engineer this challenge or you can "asby" it. Good luck with the option you choose.
```
## Solution
처음 프로그램을 실행시켜보면, 다음과 같은 문자열이 나온다.

```
What is the flag?
```

아무 문자열이나 입력해서 보면 다음과 같이 나온다.

```
What is the flag? abcdefghijklmnopqrstuvwxyz1234567890
Checking char 1:WRONG!
What is the flag?
```

`Checking char 1` 이라는 것을 확인해보면, 한글자씩 비교를 하는 것을 알 수가 있다.

올리디버거를 켜서 분석을 하면, 다음과 같은 `CMP` 구문과 `JE` 구문이 존재한다.

```
004017A7   3845 80          CMP BYTE PTR SS:[EBP-80],AL
004017AA   0F94C0           SETE AL
004017AD   84C0             TEST AL,AL
004017AF   74 16            JE SHORT asby.004017C7
004017B1   C74424 04 4F9048>MOV DWORD PTR SS:[ESP+4],asby.0048904F   ; ASCII "CORRECT!
"
004017B9   C70424 40814800  MOV DWORD PTR SS:[ESP],asby.00488140
004017C0   E8 4B9F0700      CALL asby.0047B710
004017C5   EB 1D            JMP SHORT asby.004017E4
004017C7   C74424 04 599048>MOV DWORD PTR SS:[ESP+4],asby.00489059   ; ASCII "WRONG!
"
004017CF   C70424 40814800  MOV DWORD PTR SS:[ESP],asby.00488140
004017D6   C745 88 02000000 MOV DWORD PTR SS:[EBP-78],2
004017DD   E8 2E9F0700      CALL asby.0047B710
```

분석을 해보면, BYTE PTR SS:[EBP-80] 에 존재하는 값과, AL 을 비교하는 것을 알 수 있는데
여기에 브포를 걸고 `abcdefghijklmnopqrstuvwxyz1234567890` 이라는 문자열을 입력한 뒤,
확인을 해보면 다음과 브레이크가 걸리면서 밑에 비교값이 나온다.

```
AL=4C ('L')
Stack SS:[0028FE38]=4B ('K')
```

`Stack SS:[0028FE38]=4B ('K')` 이 우리가 입력한 값이고 위에 `AL=4C ('L')` 이 플래그의 첫글자인 것 같다.

연산과정을 통해서 우리가 입력한 문자열의 첫글자인 `a` 가 `K` 로 변한 것을 확인 할 수 있다.

그리고 임의로 값을 수정하여 계속 분기문을 맞게 통과시켜주니, 입력한 문자열의 길이만큼 비교하는 것을 알 수 있었다.

위에서 알게된 것들을 토대로 키 테이블을 만들어보았다.

```
abcdefghijklmnopqrstuvwxyz
KHINOLMBC@AFGDEZ[XY^_\]RSP

1   2   3   4  5  6  7  8  9  0
1B  18  19  1E 1F 1C 1D 12 13 1A

{ }
Q W
```

다음과 같이 키 테이블을 만들고, `flag` 형식이 `flag{md5}` 였던 것을 생각해보면
38글자를 비교해야하는 것을 알 수 있다.

`AL` 에 들어있던 값들을 모두 뽑아보니, 다음과 같이 나왔다.

```
1A 18 1E H K K 12 K I 1A 19 O L 18 18 L N N O 1C 1B I 1A L 1B 1B 1A 1C 13 L 18 L W
```

이를 미리 만들어놓은 키 테이블에 대입을 하면,

`flag{024baa8ac03ef22fdde61c0f11069f2f}`

플래그가 나온다. 이 것을 바이너리에 입력하면 다음과 같이 플래그가 맞음을 확인할 수 있다.

```
What is the flag? flag{024baa8ac03ef22fdde61c0f11069f2f}
Checking char 1:CORRECT!
Checking char 2:CORRECT!
Checking char 3:CORRECT!
Checking char 4:CORRECT!
Checking char 5:CORRECT!
Checking char 6:CORRECT!
Checking char 7:CORRECT!
Checking char 8:CORRECT!
Checking char 9:CORRECT!
Checking char 10:CORRECT!
Checking char 11:CORRECT!
Checking char 12:CORRECT!
Checking char 13:CORRECT!
Checking char 14:CORRECT!
Checking char 15:CORRECT!
Checking char 16:CORRECT!
Checking char 17:CORRECT!
Checking char 18:CORRECT!
Checking char 19:CORRECT!
Checking char 20:CORRECT!
Checking char 21:CORRECT!
Checking char 22:CORRECT!
Checking char 23:CORRECT!
Checking char 24:CORRECT!
Checking char 25:CORRECT!
Checking char 26:CORRECT!
Checking char 27:CORRECT!
Checking char 28:CORRECT!
Checking char 29:CORRECT!
Checking char 30:CORRECT!
Checking char 31:CORRECT!
Checking char 32:CORRECT!
Checking char 33:CORRECT!
Checking char 34:CORRECT!
Checking char 35:CORRECT!
Checking char 36:CORRECT!
Checking char 37:CORRECT!
Checking char 38:CORRECT!

Congrats, it seems you asby'ed the flag out of the challenge!
```


`flag{024baa8ac03ef22fdde61c0f11069f2f}`
