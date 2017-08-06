# 2017 SHA CTF - [Web] Bon Appetit
## Problem
```
We are creating a new web-site for our restaurant. Can you check if it is secure enough
```

## Solution
처음 웹 페이지를 들어가면, `Home`, `About`, `What We Do`, `Menu`, `Contacts` 라는 카테고리가 있는데 이를 눌러보면, `GET` 방식의 `page` 파라미터가 날아가는 것을 확인할 수가 있다.

`page` 를 통해서 `LFI` 를 할 수가 있는데, `PHP Wrapper` 를 이용하여서 `flag` 를 읽을려고
시도를 해보면, 빈 화면만 나오는 것을 확인할 수가 있다.

여러가지를 시도해보다가 `.htaccess` 를 확인해보니 다음과 같은 내용이 있었다.

```
<FilesMatch "\.(htaccess|htpasswd|sqlite|db)$">
 Order Allow,Deny
 Deny from all
</FilesMatch>

<FilesMatch "\.phps$">
 Order Allow,Deny
 Allow from all
</FilesMatch>

<FilesMatch "suP3r_S3kr1t_Fl4G">
  Order Allow,Deny
  Deny from all
</FilesMatch>


# disable directory browsing
Options -Indexes
```

`suP3r_S3kr1t_Fl4G` 라는 파일에 대한 접근을 거부한 것으로 보아서,
여기에 플래그가 존재하지 않을까 하는 생각이 들어 해당 파일을 읽어본 결과 다음과 같이 플래그가 나왔다.

`flag{82d8173445ea865974fc0569c5c7cf7f}`
