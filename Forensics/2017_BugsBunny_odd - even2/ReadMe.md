# 2017 Bugs_Bunny CTF - [Forensic] odd & even2
## Problem
```
odd and even are two friends since ever.
Can you detach them.
Be the devil and do it.

flag : BUGS_BUNNY{}
```

## Solution
문제 그림파일이 주어지는데, `HxD` 로 열어봐도 별 다른게 없고 `EXIF` 를 확인해도 별 다른게 없습니다.
문제유형으로 봤을 때, 포토샵 같은 것으로 효과를 주면 되지않을까 싶습니다.

[온라인 포토샵](http://www.onlinephotoshopfree.net/) 을 사용하여 `Sharp` 효과를 준 결과 플래그가 나오는 것을 확인할 수 있습니다.

![Flag](flag.png)

`Bugs_Bunny{odd_2nd_3v3n_2r3nt_funny}`
