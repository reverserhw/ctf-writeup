# 2014 Pico CTF - [Reversing] Basic ASM
## Problem
```
We found this program snippet.txt, but we're having some trouble figuring it out. What's the value of %eax when the last instruction (the NOP) runs?
```
## Solution
`snippet.txt` 를 열어보면 다음과 같은 어셈 코드가 있습니다.

```
# This file is in AT&T syntax - see http://www.imada.sdu.dk/Courses/DM18/Litteratur/IntelnATT.htm
# and http://en.wikipedia.org/wiki/X86_assembly_language#Syntax. Both gdb and objdump produce
# AT&T syntax by default.
MOV $119,%ebx
MOV $28557,%eax
MOV $8055,%ecx
CMP %eax,%ebx
JL L1
JMP L2
L1:
IMUL %eax,%ebx
ADD %eax,%ebx
MOV %ebx,%eax
SUB %ecx,%eax
JMP L3
L2:
IMUL %eax,%ebx
SUB %eax,%ebx
MOV %ebx,%eax
ADD %ecx,%eax
L3:
NOP
```

`AT&T` 방식으로 되어있으니, 해석은 다음과 같이 하면 됩니다.

```
MOV ebx, 119
MOV eax, 28557
MOV ecx, 8055
CMP ebx, eax
JL L1
JMP L2
L1:
IMUL ebx, eax
ADD ebx, eax
MOV eax, ebx
SUB eax, ecx
JMP L3
L2:
IMUL ebx, eax
SUB ebx, eax
MOV eax, ebx
ADD eax, ecx
L3:
NOP
```

다음과 같은 어셈구문을 분석하고 C로 그대로 작성을 하면 다음과 같이 나옵니다.

```
#include <stdio.h>

int main(void) {
	int a = 119;
	int b = 28557;
	int c = 8055;
	if(a < b) {
		a = a * b;
		a = a + b;
		b = a;
		b = b - c;
	} else {
		a = a * b;
		a = a - b;
		b = a;
		b = b + c;
	}
	printf("%d", b);
	return 0;
}
```

이를 컴파일해서 돌려보면, `3418785` 가 나옵니다.

그러므로 플래그는 다음과 같습니다.
`3418785`
