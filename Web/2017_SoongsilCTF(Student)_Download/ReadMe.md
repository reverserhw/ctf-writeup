# 2017 Soongsil CTF (고등부) - [Web] Download
## Problem
```
파일의 내용을 확인해 주세요
```

## Solution
페이지 소스를 확인하면
```
<!DOCTYPE html>
<html>
	<head>
		<title>File download</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	</head>
	<body bgcolor=#cee76 align=center>
		<p align=center>	
		<table border="5" align=center>
		<tr>
		<td><b>File download</b></td>
		</tr>
		</table>
		<div style="margin-top:200px;" align=center>
			<input type="text" size=100 readonly="" value="파일의 내용을 확인해 주세요"/><br /><font color=#cee76>
			<="../missionfiles/hi_there.txt"><font color=#cee76>answer</font></a></font>
		</div>
		<div class="footBox" align=center>
		</br></br></br></br>
	<a href="../mission.php"/><input type="button" alt="" value="미션페이지로 가기"></input></a>
	</div>
	</body>
</html>
```

위와 같이 나오는데, `../missionfiles/hi_there.txt` 의 경로에 있으니 최종적인 경로는
`http://soongctf.com/missionfiles/hi_there.txt` 가 됩니다.

해당 텍스트 파일을 읽으면 플래그가 나옵니다.

`koong_san_is_stupid`