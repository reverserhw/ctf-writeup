# 2017 HackCon CTF - [Bacche] 8 Problems

## Rotate it
### Problem
```
Found this weird code can you make something out of it?

q4ex{ju0_tvir$_pn3fne_va_PGS???}p0qr
```
### Solution
`ROT-13` 을 해주면 플래그가 나옵니다.

`d4rk{wh0_give$_ca3sar_in_CTF???}c0de`

## High Bass
### Problem
```
The secret code just became longer

VGhpcyB3YXMgaW4gYmFzZS02NDogZDRya3t0aGF0XyRpbXBsXzNuMHVnaDRfVX1jMGRl
```
### Solution
`base64` 로 디코딩 해주면 플래그가 나옵니다.
`d4rk{that_$impl_3n0ugh4_U}c0de`

## File
### Problem
```
This file is weird, what does it do?
```
### Solution
바이너리를 받아서 `IDA` 로 열어 메인을 까보면 플래그가 나옵니다.

`d4rk{s1mpl_linux_execUt4ble}c0de`

## Needle
### Problem
```
What are you looking for?
```
### Solution
압축파일이 하나 주어지고 거기에 텍스트파일에 존재합니다. 텍스트 파일의 내용중에서 플래그를 확인 할 수 있었습니다.
`d4rk{n33dle_in_a_h4ystck}c0de`

## ALL CAPS
### Problem
```
Another cipher? You got to be kidding me.
OF EKBHMGUKZHJB, Z LWALMOMWMOGF EOHJTK OL Z DTMJGX GY TFEGXOFU AB NJOEJ WFOML GY HSZOFMTVM ZKT KTHSZETX NOMJ EOHJTKMTVM, ZEEGKXOFU MG Z YOVTX LBLMTD; MJT "WFOML" DZB AT LOFUST STMMTKL (MJT DGLM EGDDGF), HZOKL GY STMMTKL, MKOHSTML GY STMMTKL, DOVMWKTL GY MJT ZAGRT, ZFX LG YGKMJ. MJT KTETORTK XTEOHJTKL MJT MTVM AB HTKYGKDOFU MJT OFRTKLT LWALMOMWMOGF. MJZFQL YGK KTZXOFU MJZM, JTKT'L BGWK YSZU: X4KQ{MKB_YZEEJ3_OYMJOL_MGG_LODHTS}E0XT
```
### Solution
quipqiup 에서 디코딩 돌리면 플래그가 나옵니다.
```
IN CRYPTOGRAPHY, A S??STIT?TION CIPHER IS A METHOD OF ENCODING ?Y WHICH ?NITS OF PLAINTEXT ARE REPLACED WITH CIPHERTEXT, ACCORDING TO A FIXED SYSTEM; THE "?NITS" MAY ?E SINGLE LETTERS (THE MOST COMMON), PAIRS OF LETTERS, TRIPLETS OF LETTERS, MIXT?RES OF THE A?O?E, AND SO FORTH. THE RECEI?ER DECIPHERS THE TEXT ?Y PERFORMING THE IN?ERSE S??STIT?TION. THANKS FOR READING THAT, HERE'S YO?R FLAG: D4RK{TRY_FACCH3_IFTHIS_TOO_SIMPEL}C0DE
```

`D4RK{TRY_FACCH3_IFTHIS_TOO_SIMPEL}C0DE`
