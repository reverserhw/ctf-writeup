# 2014 PicoCTF - [Reversing] Function Address
## Problem
```
We found this program file on some systems. But we need the address of the 'find_string' function to do anything useful! Can you find it for us?
```
## Solution
문제를 보면, `find_string` 함수의 주소를 찾는 것입니다. 해당 문제의도는 IDA 의 기능을 알고있는지 혹은 사용할 줄 아는지에 대한 문제입니다.

IDA 를 열면 `Exports` 탭이 있는데, 여기로 가보면 다음과 같이 나옵니다.

```
Name                   Address  Ordinal     
----                   -------  -------     
__libc_csu_fini        080485B0             
__i686.get_pc_thunk.bx 080485B2             
.term_proc             080485EC             
__DTOR_END__           08049F20             
__dso_handle           0804A018             
_IO_stdin_used         0804860C             
__libc_csu_init        08048540             
_start                 08048390 [main entry]
_fp_hw                 08048608             
main                   080484DD             
find_string            08048444             
.init_proc             080482F4             
__data_start           0804A014             
```


`find_string` 의 주소를 찾을 수가 있습니다.


`08048444`
