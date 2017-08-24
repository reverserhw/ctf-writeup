# 2017 Pico CTF - [Web] What is Web
## Problem
```
Someone told me that some guy came up with the "World Wide Web", using "HTML" and "stuff". Can you help me figure out what that is? Website.
```

## Solution
처음 페이지 소스를 보면, 첫번째 플래그 `9daca0510ff` 가 나와있고 총 3파트가 존재한다고 알려주고 있습니다.
`hacker.css` 하고 `script.js` 가 수상하여 각각 확인해보니 2번째, 3번째 플래그를 찾을 수 있었습니다.

이를 조합하면 플래그가 완성됩니다.

`9daca0510ff`+`eb6c5680635`+`f1ef52d049f`

`9daca0510ffeb6c5680635f1ef52d049f`
