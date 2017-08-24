# 2017 Pico CTF - [Rev] Raw2Hex
## Problem
```
This program just prints a flag in raw form. All we need to do is convert the output to hex and we have it! CLI yourself to /problems/900be7006255006d8d4e09164dba63c0 and turn that Raw2Hex!
```
## Solution
문제 디렉토리로 들어가서 `xxd` 를 활용하여 다음과 같이 입력하면 `hex`값이 나옵니다.

```
reverserhw@shell-web:/problems/900be7006255006d8d4e09164dba63c0$ ./raw2hex | xxd
0000000: 5468 6520 666c 6167 2069 733a 31a3 30cd  The flag is:1.0.                                 
0000010: 93cd 9f0e fbf1 44d9 3036 eded            ......D.06..                                     
reverserhw@shell-web:/problems/900be7006255006d8d4e09164dba63c0$     
```

플래그는 다음과 같습니다.

`31a330cd93cd9f0efbf144d93036eded`
