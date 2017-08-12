# 2017 Bugs_Bunny CTF - [Reversing] Only Guessing
## Problem
```
Reverse Engineering ... ooh no need !

put the right password between Bugs_Bunny{...}
```
## Solution
IDA 로 열어서 main 코드를 확인해줍시다.
```
int __cdecl main(int argc, const char **argv, const char **envp)
{
  int result; // eax@10
  __int64 v4; // rbx@10
  signed int i; // [sp+1Ch] [bp-64h]@2
  __int64 src; // [sp+20h] [bp-60h]@2
  int v7; // [sp+28h] [bp-58h]@2
  __int16 v8; // [sp+2Ch] [bp-54h]@2
  char v9; // [sp+2Eh] [bp-52h]@2
  char dest; // [sp+30h] [bp-50h]@2
  __int64 v11; // [sp+68h] [bp-18h]@1

  v11 = *MK_FP(__FS__, 40LL);
  if ( argc <= 1 )
  {
    puts("usage ./rev50 password");
  }
  else
  {
    src = 'sedecrem';
    v7 = 0;
    v8 = 0;
    v9 = 0;
    memcpy(&dest, &src, 9uLL);
    for ( i = 0; i <= 999; ++i )
    {
      if ( !strcmp(argv[1], (&dict)[8 * i]) && !strcmp(&dest, (&dict)[8 * i]) )
      {
        puts("Good password ! ");
        goto LABEL_10;
      }
    }
    puts("Bad ! password");
  }
LABEL_10:
  puts(&byte_40252A);
  result = 0;
  v4 = *MK_FP(__FS__, 40LL) ^ v11;
  return result;
}
```
해당 코드에서 `if` 문 안에 있는 `strcmp` 구문을 확인해보면, 입력한 값이랑 `dict` 주소에 있는 값이랑 비교를 하고, 또 다시 `dest` 주소에 있는 값이랑 비교를 합니다.

여기서 `dest` 주소에 있는 값은 위에서 `memcpy` 로 `src` 의 값을 `dest` 주소에 복사했으므로,
`mercedes` 가 됩니다.

`dict` 주소를 더블 클릭하면, 해당 주소에 존재하는 값들이 나옵니다.

```
.data:0000000000603080                                         ; "123456"
.data:0000000000603088                 dq offset aPassword     ; "password"
.data:0000000000603090                 dq offset a12345678     ; "12345678"
.data:0000000000603098                 dq offset aQwerty       ; "qwerty"
.data:00000000006030A0                 dq offset a123456789    ; "123456789"
.data:00000000006030A8                 dq offset a12345        ; "12345"
.data:00000000006030B0                 dq offset a1234         ; "1234"

(중략...)

.data:0000000000603528                 dq offset aSmokey       ; "smokey"
.data:0000000000603530                 dq offset aSteelers     ; "steelers"
.data:0000000000603538                 dq offset aJoseph       ; "joseph"
.data:0000000000603540                 dq offset aMercedes     ; "mercedes"

(생략...)
```

값을 찾아보면, `mercedes` 라는 단어가 존재하는 것을 알 수 있습니다. 이를 입력해보면, 답이 맞다고 뜹니다.

```
root@ubuntu:~# ./rev50 mercedes
Good password !
```
