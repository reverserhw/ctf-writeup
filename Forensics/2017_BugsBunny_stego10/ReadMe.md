# 2017 Bugs_Bunny CTF - [Stego] Stego10
## Problem
```
My comment :
Do you even need a description for this one ?!!
```
## Solution
처음 문제파일을 보면, 이미지가 나오는데 이미지의 정보를 확인하거나
카빙을 뜨거나 포토샵으로 채도, 밝기, 명암 등을 조절하는 
유형으로 나올 수가 있습니다. 맨 처음으로 EXIF 를 확인하면 다음과 같이 나옵니다.

[EXIF Online Viewer](http://exif-viewer.com/)
사이트에서 확인 했습니다.

```
Bugs_Bunny{0258c4a75fc36076b41d02df8074372b}
ExifImageLength	300
ExifImageWidth	700
ExifOffset	46
ExifVersion	48, 50, 50, 48
Software	Google
create	2017-08-09T10:02:15+00:00
ExifImageLength	300
ExifImageWidth	700
ExifOffset	46
ExifVersion	48, 50, 50, 48
Software	Google
modify	2017-08-09T10:02:15+00:00
ExifImageLength	300
ExifImageWidth	700
ExifOffset	46
ExifVersion	48, 50, 50, 48
Software	Google
colorspace	2
ExifImageLength	300
ExifImageWidth	700
ExifOffset	46
ExifVersion	48, 50, 50, 48
Software	Google
sampling-factor	1x1,1x1,1x1
ExifImageLength	300
ExifImageWidth	700
ExifOffset	46
ExifVersion	48, 50, 50, 48
Software	Google
```

`Comment` 로 플래그가 있는 것이 보입니다.


`Bugs_Bunny{0258c4a75fc36076b41d02df8074372b}`
