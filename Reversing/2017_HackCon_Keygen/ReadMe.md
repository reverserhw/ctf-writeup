# 2017 HackCon CTF - [Rev] Keygen
## Problem
```
This proprietary software asks for a key, can you find what it is?
To get the flag send your key to

defcon.org.in:8082

eg:
echo 'your_key' | nc defcon.org.in 8082
```
## Solution
`IDA` 로 문제파일을 연 뒤 메인을 살펴보면 다음과 같은 코드가 나와있습니다.
```
int __cdecl main(int argc, const char **argv, const char **envp)
{
  char *s2; // ST10_8@1
  unsigned __int8 *v4; // ST18_8@1
  int v5; // edx@1
  int v6; // edx@1
  size_t v7; // rdx@1

  s2 = (char *)malloc(0x3E8uLL);
  scanf("%s", s2);
  v4 = (unsigned __int8 *)malloc(0x3E8uLL);
  v5 = strlen("firhfgferfibbqlkdfhh");
  HexToBin(s2, v4, v5);
  v6 = strlen("firhfgferfibbqlkdfhh");
  rot13(v4, s2, v6);
  v7 = strlen("firhfgferfibbqlkdfhh");
  if ( !strncmp("firhfgferfibbqlkdfhh", s2, v7) )
    puts("Match");
  else
    puts("Nope");
  return 0;
}
```

`firhfgferfibbqlkdfhh` 를 `rot13` 디코딩을 해주고 `BinToHex` 해준 것을 전송하면 플래그가 나옵니다.

```
reverserhw@ubuntu:~/바탕화면/CTF$ (echo '73766575737473726573766f6f64797871737575' | cat -) | nc defcon.org.in 8082


Send me the key for getting a match, followed by a NULL/EOF character.


Flag: d4rk{595c7f5b595a59587f595c55557e5f5e57595b5b}c0de
```

`d4rk{595c7f5b595a59587f595c55557e5f5e57595b5b}c0de`
