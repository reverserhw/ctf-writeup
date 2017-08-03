# 2017 Bugs Bunny - [Crypto] crypto-15
## Problem
```
Some classics crypto task ! Cesar maybe !!

Author : Sold1er
```
## Solution
문제에서 주어진 `crypto-15.txt` 를 확인해보면 다음과 같은 내용이 있다.
```
# -*- pbqvat: hgs-8 -*-
#/hfe/ova/rai clguba
vzcbeg fgevat
# Synt : Cvht_Cvooz{D35bS_3OD0E3_4S3_O0U_T3DvS3_BU_4MM}
qrs rapbqr(fgbel, fuvsg):
  erghea ''.wbva([ 
            (ynzoqn p, vf_hccre: p.hccre() vs vf_hccre ryfr p)
                (
                  ("nopqrstuvwxyzabcdefghijklm"*2)[beq(pune.ybjre()) - beq('n') + fuvsg % 26], 
                  pune.vfhccre()
                )
            vs pune.vfnycun() ryfr pune 
            sbe pune va fgbel 
        ])


qrs qrpbqr(fgbel,xrl):
	cnff


vs __anzr__ == '__znva__':
	xrl = [_LBHE_XRL_URER_]
	cevag qrpbqr("Cvht_Cvooz{D35bS_3OD0E3_4S3_O0U_T3DvS3_BU_4MM}",xrl)
```

문제에서 `Cesar maybe !!` 라는 문구가 있었으니 아무래도 파이썬 코드가 시저로 암호화된거 같다.

그러면, 이를 다시 복호화를 진행하면 다음과 같이 나온다.

```
# -*- coding: utf-8 -*- 
#/usr/bin/env python
import string
# Flag : Piug_Pibbm{Q35oF_3BQ0R3_4F3_B0H_G3QiF3_OH_4ZZ}
def encode(story, shift): 
	return ''.join([ (lambda c, is_upper: c.upper() if is_upper else c)
		( 
			("abcdefghijklmnopqrstuvwxyz"*2)[ord(char.lower()) - ord('a') + 
			shift % 26],
			char.isupper() 
			) 
		if char.isalpha() else char
		for char in story 
		]) 

def decode(story,key): 
	pass


if __name__ == '__main__':
	key = [_YOUR_KEY_HERE_]
	print decode("Piug_Pibbm{Q35oF_3BQ0R3_4F3_B0H_G3QiF3_OH_4ZZ}",key)
```

`Piug_Pibbm{Q35oF_3BQ0R3_4F3_B0H_G3QiF3_OH_4ZZ}` 역시 시저암호로 되어있으니, 이를 복호화해보면 다음과 같이 플래그가 나온다.

`Bugs_Bunny{C35aR_3NC0D3_4R3_N0T_S3CuR3_AT_4LL}`
