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
map으로 구성된 순서가 있는 집합  
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

## 변수

### 전역변수(global variable)
``` php
<?php
$var = 10;
function varFunc() {
  global $var; // 함수 내부에서 사용할 전역변수 명시
  echo "전역변수 사용하기{$var}.";
}
varFunc();
?>
```

### 슈퍼글로벌
tcpschool.com/php/php_basic_variableType  

### 정적변수(static variable)
함수의 호출이 종료되어도 메모리상에서 지워지지 않는 변수  
``` php
<? php
function f() {
  static $x = 0;
  echo "x값은 {$x} 입니다.";
  $x++;
}
f(); // 0
f(); // 1
f(); // 2
?>
```

### 상수(constant)
일단 한번 선언되면 데이터 변경, 해제 불가  
define()함수를 이용하여 선언  
``` php
define(상수이름, 상수값, 대소문자구분여부);
<? php
define("PHP", "PHP상수선언") // 대소문자 구분(default - false)
echo PHP; // PHP상수선언
?>
```

마법상수(magic constants)  
php 내부에서 미리 정의된 상수  
tcpschool.com/php/php_basic_constants  


### 타입 변환 
타입 강도는 매우 약하고, 타입이 동적으로 
타입 강도는 매우 약하고, 타입이 동적으로 결정됨

강제 타입 변환  
()를 이용하여 강제로 타입 변환이 가능하다  
``` php
<?php
$var_01 = 10;
var_dump($var_01); // int(10)
$var_02 = (boolean) $var_01; // int형 var_01을 강제로 boolean형으로 변환
//0이 아닌 정수이므로 true
var_dump($var_02); // bool(true) 
?>
```
가변 변수(variable variables)  
변수의 이름을 동적으로 바꾼 변수  
해당 변수의 값을 다른 변수의 이름으로 취급한다.  

``` php
<?php
$PHP = "HTML";
$HTML = "CSS";
$CSS = "JavaScript";

echo $PHP; // HTML
echo $$PHP; // CSS
echo $$$PHP; // JavaScript;
?>
```

### 연산자(Operator)

산술연산자  
+, -, *, /, %, **(왼쪽 값에 오른쪽 값을 제곱, PHP 5.6부터)  
  
연산자 우선순위(Precedence), 결합순서(associativity)  
tcpschool.com/php/php_operator_arithmetic  

배열 합집합 연산자(array union operator)  
왼쪽 피연산자의 키값을 유지하고 거기에 맞춰 오른쪽 피연산자 배열을 합치는 방식
``` php
<?php
$arr1 = array("1st" => "PHP", "2nd" =>"MYSQL");
$arr2 = array("1st" => "HTML", "2nd" =>"CSS", "3rd" =>"javascript");

$result = $arr1 + $arr2; // [PHP, MYSQL, javascript]
?>
// 왼쪽이 기준이므로 2번배열의 HTML, CSS는 무시된다.
```

instaneof연산자  
1. 해당 변수가 클래스에서 생성된 객체인지 확인  
2. 해당 변수가 부모 클래스 에서 상속받은 클래스인지 확인  
3. 해당 변수가 클래스의 인스턴스인지 아닌지 확인  
4. 인터페이스로 구현한 클래스의 객체 인스턴스 인지 아닌지 확인  



