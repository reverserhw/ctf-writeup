# 2014 Pico CTF - [Crypto] Caesar
## Problem
```
You find an encrypted message written on the documents. Can you decrypt it? encrypted.txt
```

## Solution
텍스트 파일을 열어보면 암호화된 문자열인 `xliwigvixtewwtlvewimwewtlonvlbuuihprubmdpcomvxkjxkd` 가 보이는데
`Caesar` 방식으로 `Key` 를 22로 맞춰주고 복호화를 해주면, 다음과 같이 나온다.

`thesecretpassphraseisasphkjrhxqqedlnqxizlykirtgftgz`

`the secret pass pharse is asphkjrhxqqedlnqxizlykirtgftgz`

FLAG : `asphkjrhxqqedlnqxizlykirtgftgz`
