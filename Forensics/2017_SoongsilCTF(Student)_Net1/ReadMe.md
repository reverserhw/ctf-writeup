# 2017 Soongsil CTF (고등부) - [Forensic] Net1
## Problem
```
SYSTEM - 개발자3의 등장
SYSTEM - 개발자3은 츤데레다
개발자3曰 풀던가 말던가 심심해서 만든거야 딱히 널 위해 만든게 아니라고 오해하지마개발자3曰 첫번째 문제이니 힌트는 줄게 이 문제는 wireshark라는 프로그램을 사용하면 쉽게 풀수있어
개발자3曰 그렇다고 꼭 이문제를 와이어샤크로 풀라는건 아니야
SYSTEM - 개발자3의 아이디와 비밀번호가 무슨언어로 되어있는지 알아보자
정답입력방식: 정답이 한국어 라면 korea를 입력하면됩니다.
```
## Solution
문제 파일을 와이어샤크로 열고, `Export Objects -> HTTP` 로 모두 저장을 하고 `procFileUpload` 의 이름의 `index.php` 파일을 보면 다음과 같이 나와있습니다.

```
-----------------------------7e12832b1207aa
Content-Disposition: form-data; name="editor_sequence"

2
-----------------------------7e12832b1207aa
Content-Disposition: form-data; name="mid"

notice
-----------------------------7e12832b1207aa
Content-Disposition: form-data; name="act"

procFileUpload
-----------------------------7e12832b1207aa
Content-Disposition: form-data; name="Filedata"; filename="account.txt"
Content-Type: text/plain

ID:alphabeta
Pass: gammadelta
-----------------------------7e12832b1207aa--
```

처음에 영어인줄 알고, `English`, `english`, `usa`, `duddj` 등으로 인증을 해보았지만 안되서
출제자분에게 물어보니, OOO어를 영어로 썼다고 합니다.

그리스어임을 직감하고, Greece 로 인증하였더니 됐습니다.

`Greece`