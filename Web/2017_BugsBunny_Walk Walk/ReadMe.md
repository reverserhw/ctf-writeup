# 2017 Bugs_Bunny CTF - [Web] Walk Walk

## Problem
```
When you miss , you fall out boy
http://www.chouaibhm.me/
```

## Solution
처음 문제 페이지를 보면은, 뚜렷하게 취약점이다 하는 부분이 없어서 
웹서버의 정보를 먼저 알아보려고 크롬 개발자 도구를 사용하여 패킷을 확인했습니다.

그러니 `Response Header` 에 다음과 같은 내용이 있습니다.

```
Request URL:http://www.chouaibhm.me/robots.txt
Request Method:GET
Status Code:404 Not Found (from disk cache)
Remote Address:52.219.28.35:80
Referrer Policy:no-referrer-when-downgrade
Response Headers
Content-Length:538
Content-Type:text/html; charset=utf-8
Date:Thu, 10 Aug 2017 01:15:37 GMT
Server:AmazonS3
x-amz-id-2:/4NnCgHsgH/5CrKeN4eOCGdQVzbfxwHtQ0rc5+tRMHIlbX9iuYAPnSwfYaO84vAQtkpypcvpmkU=
x-amz-request-id:3F30665951CBD56F
```

`Amazon S3` 서버를 사용하는 것을 확인할 수 있는데, `Amazon S3 Buckets` 문제인 것 같습니다. `Amazon S3 Bucket` 에 대한 문서를 확인하면 가상 호스팅 방식의 URL에서 버킷 이름은 도메인 이름의 일부라고 나와있습니다.

예로 들면,

```
http://[bucket].s3.amazonaws.com
http://[bucket].s3-aws-region.amazonaws.com.
```

이런 식입니다. 가상 호스팅 방식의 URL 에서는 이러한 엔드포인트 중 하나를 사용할 수 있다고 나와있습니다.

그러면, 처음 예제에 나온 엔드포인트에 요청을 해봅시다.

`http://www.chouaibhm.me.s3.amazonaws.com/` 라는 url 을 요청하게 되면, xml 이 나오는 것을 확인 할 수 있습니다.

```
ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
<Name>www.chouaibhm.me</Name>
<Prefix/>
<Marker/>
<MaxKeys>1000</MaxKeys>
<IsTruncated>false</IsTruncated>
<Contents>
<Key>
QnVnc19CdW5ueXtZMHVfNHJlX0MwMDFfdDBkYXlfRHVkM30/flag.txt
</Key>
<LastModified>2017-07-20T07:33:18.000Z</LastModified>
<ETag>"b440f1e6f9a8c0ece5fcdce05252c818"</ETag>
<Size>69</Size>
<StorageClass>STANDARD</StorageClass>
</Contents>
<Contents>
<Key>css/animate.css</Key>
<LastModified>2017-07-20T07:33:11.000Z</LastModified>
<ETag>"f9ef19b8c81feae24fe5970bfadc34bb"</ETag>
<Size>71089</Size>
<StorageClass>STANDARD</StorageClass>
</Contents>
<Contents>
<Key>css/layout-rtl.css</Key>
<LastModified>2017-07-20T07:33:06.000Z</LastModified>
<ETag>"ca37e429881ee31d5d0605118689ad9e"</ETag>
<Size>23639</Size>
<StorageClass>STANDARD</StorageClass>
</Contents>
...
(생략)
```

그러면 `QnVnc19CdW5ueXtZMHVfNHJlX0MwMDFfdDBkYXlfRHVkM30/flag.txt` 이란 경로에 플래그가 존재하는 것을 알 수 있습니다.

해당 경로로 접근을 하면

```
you are so close don't be stupid tho xD

Bugs_Bunny{I_am_JOking_lol}
```

다음과 같은 화면을 만날 수 있습니다. 문장의 분위기로 봐서는 진짜 플래그가 아닌 것 같습니다.

그래서 `base64` 문자열을 디코딩하니, 진짜 플래그를 볼 수 있는 것을 알 수 있습니다.

`Bugs_Bunny{Y0u_4re_C001_t0day_Dud3}`
