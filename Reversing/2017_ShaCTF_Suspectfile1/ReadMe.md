# 2017 SHA CTF - [Reversing] Suspect File1
## Problem
```
We found some software on our suspects development server, it looks like they created some different versions, are you able to crack the software?

Challenge created by the Digital and Biometric Traces division of the Netherlands Forensic Institute.
```

## Solution
처음 `IDA` 로 열어보면 정말 미친듯한 `while` 문과 `if` 문을 볼 수가 있는데, 정신적으로 해로운 것 같으니 리눅스로 넘어가서 분석을 합시다.
바이너리를 실행을 한번 시켜보면, 아래와 같이 나옵니다.

```
reverserhw@ubuntu:~/바탕화면/CTF$ ./100
Sorry
reverserhw@ubuntu:~/바탕화면/CTF$ 
```

`gdb` 로 메인을 디스어셈블 해서 보면 다음과 같이 나옵니다.

```
(중략...)
   0x08049d93 <+5411>:	mov    edx,0xe6cbc1fb
   0x08049d98 <+5416>:	jmp    0x8048977 <main+263>
   0x08049d9d <+5421>:	cmp    eax,0x5b903f26
   0x08049da2 <+5426>:	mov    edx,0xe6cbc1fb
   0x08049da7 <+5431>:	jne    0x8048977 <main+263>
   0x08049dad <+5437>:	call   0x8048850 <sorry>
   0x08049db2 <+5442>:	sub    esp,0x10
   0x08049db5 <+5445>:	mov    DWORD PTR [esp],0x80bc38e
   0x08049dbc <+5452>:	call   0x8050610 <puts>
   0x08049dc1 <+5457>:	add    esp,0x10
   0x08049dc4 <+5460>:	mov    eax,DWORD PTR [ebp-0xbc]
   0x08049dca <+5466>:	xor    eax,eax
   0x08049dcc <+5468>:	lea    esp,[ebp-0xc]
   0x08049dcf <+5471>:	pop    esi
   0x08049dd0 <+5472>:	pop    edi
   0x08049dd1 <+5473>:	pop    ebx
   0x08049dd2 <+5474>:	pop    ebp
   0x08049dd3 <+5475>:	ret    
   0x08049dd4 <+5476>:	call   0x8048850 <sorry>
   0x08049dd9 <+5481>:	call   0x8048850 <sorry>
   0x08049dde <+5486>:	call   0x8048850 <sorry>
End of assembler dump.
gdb-peda$ 
```

`sorry` 라는 함수에 브레이크 포인트를 걸어서 다시 확인해봅시다.

```
gdb-peda$ break sorry
Breakpoint 1 at 0x8048850
gdb-peda$ r asdasasd
Starting program: /home/reverserhw/바탕화면/CTF/100 asdasasd

[----------------------------------registers-----------------------------------]
EAX: 0xb3fdf676 
EBX: 0x8048164 (<_init>:	push   ebx)
ECX: 0x9ebe6441 
EDX: 0xe6cbc1fb 
ESI: 0x80ea0c4 --> 0x8068270 (<__strcpy_sse2>:	mov    edx,DWORD PTR [esp+0x4])
EDI: 0x5e ('^')
EBP: 0xffffce48 --> 0x1000 
ESP: 0xffffccbc --> 0x8049dd9 (<main+5481>:	call   0x8048850 <sorry>)
EIP: 0x8048850 (<sorry>:	sub    esp,0xc)
EFLAGS: 0x246 (carry PARITY adjust ZERO sign trap INTERRUPT direction overflow)
[-------------------------------------code-------------------------------------]
   0x804883e <frame_dummy+94>:	xchg   ax,ax
   0x8048840 <maybe>:	ret    
   0x8048841:	
    data16 data16 data16 data16 data16 nop WORD PTR cs:[eax+eax*1+0x0]
=> 0x8048850 <sorry>:	sub    esp,0xc
   0x8048853 <sorry+3>:	mov    DWORD PTR [esp],0x80bc388
   0x804885a <sorry+10>:	call   0x8050610 <puts>
   0x804885f <sorry+15>:	mov    DWORD PTR [esp],0x0
   0x8048866 <sorry+22>:	call   0x804f7b0 <exit>
[------------------------------------stack-------------------------------------]
0000| 0xffffccbc --> 0x8049dd9 (<main+5481>:	call   0x8048850 <sorry>)
0004| 0xffffccc0 ("flag{57201791ea24f3acd852cee3271333a8}\002\002")
0008| 0xffffccc4 ("{57201791ea24f3acd852cee3271333a8}\002\002")
0012| 0xffffccc8 ("01791ea24f3acd852cee3271333a8}\002\002")
0016| 0xffffcccc ("1ea24f3acd852cee3271333a8}\002\002")
0020| 0xffffccd0 ("4f3acd852cee3271333a8}\002\002")
0024| 0xffffccd4 ("cd852cee3271333a8}\002\002")
0028| 0xffffccd8 ("2cee3271333a8}\002\002")
[------------------------------------------------------------------------------]
Legend: code, data, rodata, value

Breakpoint 1, 0x08048850 in sorry ()
gdb-peda$ 
```

다음과 같이 플래그를 획득할 수 있습니다.

`flag{57201791ea24f3acd852cee3271333a8}`
