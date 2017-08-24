# 2017 Pico CTF - [Reversing] Hex2Raw
## Problem
```
This program requires some unprintable characters as input... But how do you print unprintable characters? CLI yourself to /problems/88518d23aee7ee21e50bdd8414a404c1 and turn that Hex2Raw!
```

## Solution
사이트 내에서 쉘을 제공해주므로, 간단하게 풀 수 있습니다.
처음 문제파일이 존재하는 디렉토리에서 `flag` 를 보면 퍼미션이 걸려있습니다. `hex2raw` 을 실행시켜보니, 문자열 하나를 주는데 이 것을 `raw` 데이터로 입력하라는 것 같습니다.

`xxd` 를 활용해주어, `echo 7ca67167db329a5d1508cc4ad5380678 | xxd -r -p | ./hex2raw` 로 실행을 해주면 플래그가 나옵니다.

```
reverserhw@shell-web:/problems/88518d23aee7ee21e50bdd8414a404c1$ echo 7ca67167db329a5d1508cc4ad5380
678 | xxd -r -p | ./hex2raw
Give me this in raw form (0x41 -> 'A'):                                                            
7ca67167db329a5d1508cc4ad5380678                                                                   
                                                                                                   
You gave me:                                                                                       
7ca67167db329a5d1508cc4ad5380678                                                                   
Yay! That's what I wanted! Here be the flag:                                                       
75d3080d00407fa709c18a6cc69d1edc
```

`75d3080d00407fa709c18a6cc69d1edc`
