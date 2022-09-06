# PHP (HyperText Preprocessor)
C언어를 기반으로한 서버 측에서 실행되는 서버 사이드 스크립트 언어  

## PHP Tag
``` php
<?php ... ?>
<?= ... ?> // 짧은 echo 태그 사용 시
```

PHP파서는 반드시 PHP 전용 태그에만 반응하기 때문에 HTML중간에 넣어 사용해도 무관하다.  

## PHP 주석

``` php
// 주석
/* 주석 */
# 주석
```

## PHP 자료형

### Booleans
항상 True or False 

false로 간주하는 것들  
1. false 그 자체
2. 정수 0(zero)
3. 실수 0.0, -0.0(zero)
4. 빈 문자열, "0"
5. 빈 배열
6. NULL
7. 속성이 없는 객체

외에는 모두 true로 간주한다.  

### Integer
정수 리터럴  
``` php
<?php
$a = 1234; // 10진수
$a = 0123; // 8진수 (10진수는 83)
$a = 0o123; // 8진수 (PHP 8.1.0부터)
$a = 0x1A; // 16진수(10진수는 26)
$a = 0b11111111; // 2진수(10진수는 255)
$a = 1_234_567 // 10진수(PHP 7.4.0부터) _은 무시된다.
?>
```

### float, double, real number 부동소수점
부동 소수점은 대략적인 값으로 정확하게 표현되지 않는다.  
따라서 부동 소수점을 이용한 비교는 권장하지 않는다.  
``` php
$x = 8 - 6.4; // 부동소수점 오차로 인해 1.599999...
$y = 1.6;
var_dump($x == $y) // false
```
### String 문자열
1. 작은 따옴표 이용하기  
'abc'  
작은 따옴표 자체를 출력하고자 한다면 앞에 백슬래시를 붙인다.  
'abc\'' // abc'

2. 큰 따옴표 이용하기
"abc"
큰 따옴표는 특정한 규칙을 따른다
php.net/manual/en/language.types.string.php  

### Array 배열

``` php
<? php
array(
  key1 => value1,
  key2 => value2,
  key3 => value3,
  ...
);

array("foo","bar","hello","world");
key를 선언하지 않으면 자동으로 0부터 인덱싱되어 들어감
?>
```
key 선언을 동일하게 하면 덮어씌워져 마지막 요소만 사용됨  
  
### 배열 다루기
배열 접근, 값 생성/수정, 값 삭제  
``` php
$arrName[key] // value

$arr[key] = value // key가 존재하면 value값으로 수정, 없으면 생성  
$arr[] = value // key를 넣지 않으면 최대값에 +1 되어 key로 설정됨
  
unset($arr[5]); // 해당 키에 해당하는 원소 삭제
unset($arr); // 배열 전체 삭제
```
배열 분해  
``` php
<?php
$source = ['foo','bar','baz'];
[$foo, $bar, $baz] = $source;
echo $foo; // "foo"
echo $bar; // "bar"
echo $baz; // "baz"
?> // 이 방법은 PHP 7.1.0부터 가능

<?php
$sourceArr = [
  [1, 'john'],
  [2, 'Jane'],
];
foreach($sourceArr as [$id, $name]) {
  // $id와 $name 로 배열 값을 받아옴
}
```

배열 풀기 
...를 이용해서 배열을 펼칠 수 있다(PHP 7.4.0부터)
``` php
<?php 
$arr1 = [1, 2, 3]
$arr2 = [...$arr1]; // [1, 2, 3]
$arr3 = [0, ...$arr1]; // [0, 1, 2, 3]
?>
```

### Objects
``` php
<?php
class foo {
  function do_foo() {
    echo "doing foo";
  }
}
$bar = new foo();
$bar->do_foo(); // doing_foo
?>
```

### Enumerations(PHP 8.1부터)
제한된 값을 제공하는 클래스

``` php
<?php
enum Suit {
  case Hearts;
  case Diamonds;
  case Clubs;
}
?>
```

### NULL
null은 유일타입 null로 할당되거나, 어떤 값도 설정되지 않았거나  





