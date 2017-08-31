# 2017 HackCon CTF - [Web] Dictator
## Problem
```
A dictator is creating a lot of fuss nowadays by claiming to have nuclear weapons. I somehow got access to his personal website that he uses to send instructions, but I cannot get in. Can you try?

Link: Website

Hint: you need to be living in that country to get access.
Hint2: north korea
```
## Solution
네 처음 문제 설명을 보는데 1도 모르겠군요. 그러므로 구글번역기를 돌려서 확인을 해봅시다.
```
독재자는 요즘 핵무기 보유를 주장하면서 많은 소란을 겪고 있습니다. 나는 그것을 사용하는 방법을 모르지만 들어갈 수 없습니다. 시도해 볼 수 있습니까?
```
라고 구글번역기가 알려주네요. 역시 갓갓 번역기!

그냥 링크를 타고 들어가보니, Access Denied 라는 문자열이 보이는 것을 보니
아무래도 시나리오가 북한의 사이트를 접속하는 것 같은데, 무엇때문인지 접속이 잘 되지 않는 것 같습니다. `X-Forwarded-For` 를 사용하여서 북한의 아이피대역으로 한번 들어가봅시다.

여기서 `X-Forwarded-For` 란 `HTTP Server` 에 요청한 클라이언트의 `IP`를 식별하기 위한 표준헤더입니다.

북한의 아이피대역은 구글링을 하시면 아실 수 있습니다.

`Advanced REST Client` 라는 크롬 확장앱을 사용하여 헤더를 맞춰주고 접속을 해보면 다음과 같이 뜹니다.

`You are not following the instructions given by the supreme-leader`

오잉? 최고지도자가 지시한 내용을 따르지 않았다고 합니다. 요거요거.. 아무래도 북한에서 따로 쓰는 무언가가 있는 것 같습니다. 아! 생각해보니 북한의 운영체제인 `붉은 별`이 생각납니다. 붉은 별 브라우저는 내나라 브라우저를 사용하고 있으니, 내나라 브라우저의 `User-Agent` 를 넣어주면 될 것 같습니다.

내나라 브라우저의 `User-Agent` 는 다음과 같습니다.
`Mozilla/5.0 (X11; U; Linux i686; ko-KP; rv: 19.1br) Gecko/20130508 Fedora/1.9.1-2.5.rs3.0 NaenaraBrowser/3.5b4`

`User-Agent` 까지 딱 추가해주고 다시 페이지를 요청하면!

짜잔! 플래그가 등장했습니다!

`d4rk{Welcome_To_DictatorRuling.TogetherweshalltkeWorld}c0de`
