# 2017 Bugs_Bunny CTF - [PPC] Zero One !!
## Problem
```
What he means by ZERO-ONE !!! , Could you please give me the flag !
```
## Solution
처음 문제파일을 받으면, `ZERO`, `ONE` 이라는 문자열이 빼곡하게 있습니다. 
`python` 으로 각각 0, 1 로 치환해주고, 공백을 없애주는 스크립트를 만들어서 돌립니다.

그러면 0, 1 로 이루어진 바이너리 문자열이 나오는데, 이를 8비트로 나누어서 ascii 로 바꿔주면 다음과 같은
`base64` 문자열이 나옵니다.

`QnVnc19CdW5ueXswNWZlODIzOGNmZWUxZTVmMDRiNjUzMzliZWE0ZmVkMn0=`

이를 `Decode` 해주면 플래그를 얻을 수 있습니다.

`Bugs_Bunny{05fe8238cfee1e5f04b65339bea4fed2}`

## Zero-One Substitution Code  // Zero, One 을 각각 0,1 로 치환만 해줍니다.
```
# 2017 Bugs_Bunny CTF [Zero-One] Substitution


f = open("progTask.txt", "r")
f2 = open("DecryptTask.txt", "w")

parse_data = ""

data = f.read()
data = data.replace("ZERO", "0")
data = data.replace("ONE", "1")
data = data.replace(" ", "")
f2.write(data)
f.close()
f2.close()
```

## Decode Site

[Base64 Decode](https://www.base64decode.org/)

[Binary to Ascii](http://www.binaryhexconverter.com/binary-to-ascii-text-converter)
