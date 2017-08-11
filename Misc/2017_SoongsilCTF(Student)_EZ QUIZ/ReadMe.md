# 2017 Soongsil CTF (고등부) - [Misc] EZ Quiz
## Problem
```
SYSTEM - 개발자1의 등장
개발자1의 공략방법 - 역사문제를 맞추면 된다.
개발자1을 공략해보자
문제: 힌트와 관련된 국가의 이름을 한글로 써주세요
이 문제는 추가 점수가 없습니다
```
## Solution
해당 페이지의 소스를 보면, 다음과 같이 나와있습니다.

```
<html>
  <head>
		<title>So ez</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<style>
			body {
				background-image: url('./picture/PSJ.jpg');
				background-size: contain;
				background-attachment: fixed; 
				background-repeat: no-repeat;
				background-position: center bottom;
				}
				<!-- qrcode.jpg -->
		</style>
 
<body>
   <p align=center>	
		<table border="5" align=center>
		<tr>
		<td><b><font color=#00ffff> So ez </font></b></td>
		</tr>
		</table>
		<div style="margin-top:200px;" align="center">
			<input type="text" size=100 readonly="" value="SYSTEM - 개발자1의 등장"/><br/>
			<input type="text" size=100 readonly="" value="개발자1의 공략방법- 역사문제를 맞추면된다."/><br/>
			<input type="text" size=100 readonly="" value="개발자1을 공략해보자"/><br/>
			<input type="text" size=100 readonly="" value="문제: 힌트와 관련된 국가의 이름을 한글로 써주세요"/><br/>
			<input type="text" size=100 readonly="" value="이 문제는 추가 점수가 없습니다"/><br/>
			<br/><br/><br/>
			</div>
		<div class="footBox" align="center">
	<a href="../mission.php"/><input type="button" alt="" value="미션페이지로 가기"></input></a>
	</div>
  </body>
</html>
```

여기서 `./Picture/PSJ.jpg` 를 통해서 현재 디렉토리에서 `/Picture/qrcode.jpg` 가 존재한다는 것을 알 수 있습니다.
`QR Code` 이미지를 디코딩하면 `http://m.site.naver.com/0kzgQ` 링크가 나옵니다. 
해당 링크로 들어가면, 주작 마크 하나하고 역사문화 사진이 하나 있는데 이를 구글 이미지로 검색해보면 강서 대묘 사신도라고 나옵니다.
하지만, 문제에서 요구한 플래그는 국가의 이름이라고 했으니, 최종 플래그는 `고구려` 입니다.