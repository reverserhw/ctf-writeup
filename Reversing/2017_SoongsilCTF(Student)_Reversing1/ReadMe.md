# 2017 Soongsil CTF (고등부) - [Reversing] Reversing1
## Problem
```
잘 들어봐. 너희 생명이 사라져 가는 소리를.-강성중
백신 잠시 꺼주세요. 켜져 있으면 다운로드 및 실행이 안됩니다.
```

## Solution
IDA 로 열어서 메인코드를 살펴봅시다.

```
int __cdecl main(int argc, const char **argv, const char **envp)
{
  int v4; // [sp+1Ch] [bp-4h]@1

  __main();
  puts("당신은 허강민에 의해 한 밀실에 갇혀있다.");
  puts("먼저 이 방을 나갈려면 먼저 금고 번호를 알아내서 입력해야 한다.");
  puts("그 금고 안에는 방문의 암호가 적힌 종이가 있다. ");
  puts("행운을 빈다.");
  puts("----------------------------------------\n");
  scanf("%d", &v4);
  if ( v4 == 20140428 )
  {
    puts("\n System:종이에는 Hymn_for_the_Weekend 적혀있다.");
    puts("\n.\a");
    putchar(10);
    putchar(10);
  }
  if ( v4 != 20140428 )
  {
    puts("열리지 않는다. \a");
    putchar(10);
    putchar(10);
  }
  return system("PAUSE");
}
```

플래그가 슥삭하고 털립니다.

`Hymn_for_the_Weekend`