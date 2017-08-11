# 2017 BugsBunny CTF - [Misc] Primitive encryption
## Problem
```
Hi Hacker


What about a time travel ? ^^
Your mission is to be very observative, sometimes a theory start from a supposition.
Decrypt this and you will get your flag :
i KTAX ZTRTRTC SuB AKXy KXlp you GiRViRF youN GlTF TRV iA'C FFAKTAwTCXTCy
```
## Solution
문제로 나온 암호화된 문자열을 보면, 예전 CTF 에서 봤었던 문제유형이 생각나면서
자작암호화 비슷한 것 같습니다.

`quipquip` 사이트에서 디코딩을 해보니, 다음과 같이 복호화된 결과들이 나옵니다.

```
0	-1.175	i HATE BANANAS CuM THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
1	-1.180	i HATE BANANAS WuZ THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
2	-1.191	i HATE BANANAS CuP THEy HElm you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
3	-1.207	i HATE BANANAS ZuM THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
4	-1.230	i HATE BANANAS KuM THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
5	-1.241	i HATE BANANAS VuK THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
6	-1.246	i HATE BANANAS WuK THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
7	-1.254	i HATE BANANAS MuK THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
8	-1.255	i HATE BANANAS WuZ THEy HElm you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
9	-1.258	i HATE BANANAS CuV THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
10	-1.259	i HATE BANANAS JuV THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
11	-1.262	i HATE BANANAS MuX THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
12	-1.263	i HATE BANANAS CuZ THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
13	-1.265	i HATE BANANAS MuC THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
14	-1.270	i HATE BANANAS MuZ THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
15	-1.272	i HATE BANANAS CuP THEy HElv you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
16	-1.275	i HATE BANANAS KuJ THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
17	-1.276	i HATE BANANAS VuM THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
18	-1.277	i HATE BANANAS JuZ THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
19	-1.280	i HATE BANANAS JuM THEy HElp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy
... (생략)
```

`i HATE BANANAS ??? THEy HELp you FiNDiNG youR FlAG AND iT'S GGTHAT?ASEASy`

라고 나옵니다. 여기서 플래그 부분만 살짝 보면
`GGTHAT?ASEASY` 가 보이는데, 문장의 구조상 `It's GG that was easy` 로 볼 수 있습니다.
그러면 `UpperCase` 를 해서 인증을 하라고 했으니 `UpperCase` 를 해줍니다.

`Bugs_Bunny{GGTHATWASEASY}`
