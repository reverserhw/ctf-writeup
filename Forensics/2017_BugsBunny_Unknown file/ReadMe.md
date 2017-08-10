# 2017 Bugs_Bunny CTF - [Forensic] UNKNOWN file !!
## Problem
```
? em rof ti evlos esaelp uoy dluoc, rekcah boon a m'I, elif egnarts a em dnes evah dneirf ym
```

## Solution
문제 파일을 받아서 `HxD` 로 열어보면 `PNG` 파일의 헤더가 거꾸로 되어있는 것을 알 수 있습니다. 이를 다시 뒤집으면, 플래그가 적힌 `PNG` 파일을 볼 수 있습니다. (플래그 마저도 거꾸로 ..)


`Bugs_Bunny{E4Sy_T4Sk_F0R_H4X0r_L1KeS_Y0u}`


## Solution Code
```
# 2017 Bugs_Bunny Unknown File!! Solve.py

file1 = open("UNKNOWN", "rb")
file2 = open("flag.png", "wb")

data = file1.read()[::-1]
file2.write(data)

file1.close()
file2.close()

```

## Flag.png string reverse code
```
print "}u0Y_SeK1L_r0X4H_R0F_kS4T_yS4E{ynnuB_sguB"[::-1]
```
