# 2017 Break In - [Reversing] Simple Secret - Part 1
## Problem
```
Mandy and Aalekh are good friends. Once Mandy thought of giving Aalekh a challenge where Aalekh has to extract the secret key used by Mandy in his C program. The executable generated by Mandy is given below. Can you help Aalekh in finding the secret key hidden by Mandy?

Link to executable: here
```

## Solution
문제파일을 다운 받아서 `IDA` 로 열어보면 64비트 elf 파일이라는 것을 알 수가 있습니다.
`idaq64.exe` 로 다시 열어서 메인코드를 살펴보면 다음과 같은 코드가 있습니다.

```
int __cdecl main(int argc, const char **argv, const char **envp)
{
  int result; // eax@4
  __int64 v4; // rdx@4
  char v5; // [sp+10h] [bp-2720h]@1
  __int64 v6; // [sp+2728h] [bp-8h]@1

  v6 = *MK_FP(__FS__, 40LL);
  scanf("%s", &v5, envp, argv);
  if ( &v5 == "the_flag_is_bond_007" )
    puts("Gotcha");
  else
    puts("Better luck next time");
  result = 0;
  v4 = *MK_FP(__FS__, 40LL) ^ v6;
  return result;
}
```

`v5` 라는 변수에 사용자의 입력값을 대입하고, v5 를 `the_flag_is_bond_007` 와 비교합니다.
출제자분들이 이런 풀이를 의도하셨는지는 모르겠지만, 헥스레이로 순삭이 가능합니다.

플래그는 다음과 같습니다.

`bond_007`
