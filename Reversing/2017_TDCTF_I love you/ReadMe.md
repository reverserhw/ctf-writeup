# 2017 TDCTF - [Rev] I love you
## Solution
올리디버거로 열어서 Run 을 돌려보면 detected Debugging!! 이라는 문구와 함께 프로그램이 뻗어버립니다. 그렇다고 또 IDA 로 열어서 확인을 해보면, 안티디버깅으로 인하여 헥스레이가 되지 않습니다. `I like you` 문제와 똑같은 안티디버깅이 적용되있는 것을 여기서 확인을 할 수가 있습니다.

SEH Anti-Debugging 기법을 우회하기 위해서, `Options -> Debugging Options -> Exceptions` 에서 `Ignore (pass to program) following exceptions:` 의 항목을 모두 체크해줍시다.

그러면 예외처리를 디버거에 맡기기 때문에 안티디버깅을 우회할 수가 있습니다.

그럼 이제 다시 분석을 해봅시다.

플래그를 입력받고, 입력한 문자열에 대해 암호화를 한 문자열을 보여줍니다. 그리고 `Correct` 와 `Incorrect` 를 각각 출력해주는데 비교를 하는 부분을 한번 분석을 해봅시다. `00CE37CA CALL` 주소에 브포를 걸어주고 런을 돌려봅시다. 그리고 스텝인으로 함수를 파고들어서 확인해보면, 특정 문자열과 비교를 하는 것을 확인 할 수가 있습니다.


```
54A3D440   8B02             MOV EAX,DWORD PTR DS:[EDX]
54A3D442   3A01             CMP AL,BYTE PTR DS:[ECX]
```

```
Stack DS:[001EF98C]=7E796F7E
EAX=001EF950, (ASCII "^NI^LqN:US:_UAD:]U>D^;UN;Y>??9HFSU>DNU>D^;UB9RX>Sw")
```

`^NI^LqN:US:_UAD:]U>D^;UN;Y>??9HFSU>DNU>D^;UB9RX>Sw` 해당 문자열에서 알 수 있는 것은

```
^ = T
N = D
I = C
^ = T
L = F
... (생략)

```

입니다. `ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890{}` 에 대한 키 테이블을 만들어서 문제를 푸는 방법이 존재하고, 또 다른 방법으로는 암호화를 하는 함수를 파고들어서 문제를 풀이하는 방법이 있습니다.

다른 방법에 대해서는 다음에 제 개인 깃헙에 따로 올리도록 하겠습니다.

궁금한 사항이 있으시면, 메일이나 페이스북 메시지를 보내주시길 바랍니다 :)

`security_swn@naver.com (ReverserHW)`
[페이스북 주소](https://www.facebook.com/reverser.hw)
