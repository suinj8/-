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


### 사용자 정의 함수(user defined function)
함수의 이름은 대소문자를 구분하지 않습니다.  
PHP는 함수 오버로딩을 지원하지 않습니다.
``` php
function 함수명(매개변수1, 매개변수2, ... ) {
  // do something
}
```

### 함수의 값 반환  
return문을 이용하여 키워드를 명시할 수 있다.  
PHP7부터는 반환값 타입을 명시할 수 있다.
``` php
function sum($x, $y) : float {
  return $x + $y;
}

deflare(strict_types = 1); // 엄격한 타입모드
// 이 모드를 사용하면 타입 자동변환이 되지 않아 오류가 발생함
```

### 값 전달 방식
Pass by Value  
인수를 함수에 전달하면 값을 복사하여 저장  
함수 내부에서 인수 값을 바꿔도 원본 데이터는 영향 없음  
 
Pass by Reference  
참조 전달을 사용하기 위해 변수 앞에 &붙임  
참조 변수를 매개변수에 전달  
함수 내부에서 인수 값을 바꾸면 원본 데이터도 바뀜  

Default 매개변수  
대입연산자를 이용하여 설정  
``` php
function($a1, $a2 = 0, $a3 = 0) {
   // do_something
}
// a1은 반드시 전달받아야 하고
// a2, a3는 전달받지 못하면 0으로 자동 설정된다
```

가변 길이 인수 목록(variable-length argument list)  
전달받을 인수의 개수를 정하는것이 아닌, 호출할 때마다 유동적으로 인수를 넘기는 기능  
``` php
PHP 5.5이하 버전
가변 길이 변수 목록이 배열 형태로 들어온다.
function sum() {
  $sum = 0;
  foreach(func_get_args() as $n) {
    $sum += $n;
  }
  return $sum;
}

PHP5.6 이상
$sum 배열에 가변 인수 목록이 들어온다.
function sum(...$num) {
  $sum = 0;
  foreach($sum as %n) {
    $sum += $n;
  }
  return $sum;
}
```

### 함수의 활용

조건적인 함수(conditional function)  
특정 조건을 만족할 때만 선언되는 함수  
``` php
if($condition) { // condition조건을 만족해야만
  function func() { // func가 선언되어 사용가능해진다.
    echo "함수사용 가능!";
  }
}
```

함수 내부의 함수(function within function)  
``` php
function a() {
  function b() {
    echo "a가 호출되어야 b사용가능!";
  }
}
// a를 한번도 호출하지 않은 채로 b를 호출하면 에러
// 하지만 php함수는 모두 전역 함수이므로 선언되었다면 사용가능
```

가변함수(variable function)  
변수를 샤용하여 함수를 호출하는 것  
변수에 ()를 붙이면 해당 값에 해당하는 함수가 호출된다  
```
function f() {
  echo "f함수임";
}

function g($para) {
  echo "g함수임{$para}";
}
$func = "first";
$func(); // f함수임
$func = "second";
$func(10); // g함수임10
```

### 변수 관련 함수
  
함수의 타입 변경  
  
gettype()함수를 사용하면 타입을 알 수 있다.  
settype()함수를 사용하면 전달받은 변수의 타입을 변경한다.  
``` php
$x = 5;  
settype($x, "string");  
echo gettype($x); // string  
```
하지만 gettype()은 느리기 때문에  
변수 타입 검사는 다른 함수를 이용한다  
tcpschool.com/php/php_builtInFunction_variable  
  
함수의 상태 변경  
  
isset()함수는 전달받은 변수가 선언되어 있는지를 검사한다.  
변수가 존재하면 true, 존재하지 않으면 false를 리턴한다.  
  
unset()함수는 전달받은 변수를 제거한다.  
  
empty()함수는 변수가 비어있는지 검사한다   
비어있으면 true, 아니면 false를 리턴한다.  
비어있다고 인식하는 것  
정수0, 실수0.0, 문자열"0", 빈 문자열, null, false, 빈 배열, 초기화 되지 않은 변수  
  
특정 타입으로 변경  
intval() : 전달받은 변수에 해당하는 정수를 반환  
floatval() : 전달받은 변수에 해당하는 실수를 반환
strval() : 전달받은 변수에 해당하는 문자열 반환  
``` php
$x = "123.567abc";
echo intval($x); // 123
echo floatval($x); // 123.567
echo strval($x); // 123.567abc
```

### 배열 관련 함수 
배열 요소 개수  
count(), size() // 배열의 저장된 요소 개수 반환  
array_count_values() // 전달받은 배열을 확인하여 각 값이 몇번 등장하는지 확인  
// 그 후 배열 요소 값을 key로 빈도를 value로 하는 배열을 반환
``` php
$arr = array(1,2,3,3,1,2);
echo "배열 요소 수는".count($arr)."입니다"; // 6
echo "배열 요소 수는".sizeof($arr)."입니다"; // 6
$acv = array_count_values($arr) // 1 : 2, 2 : 2, 3 : 3
```

배열 탐색  
current(), post() : 배열 포인터가 현재 가리키고 있는 요소 반환  
next() : 포인터 하나 이동시키고 요소 반환  
prev() : 포인터를 뒤로 하나 이동시키고 요소 반환  
each() : 현재 가리키는 요소를 반환하고 앞으로 하나 이동  
reset() : 첫 요소로 이동하고 해당 값 반환  
end() : 마지막 요소로 이동하고 해당 값 반환  

배열의 정렬  
sort() : 정렬기준에 맞추어 정렬  
SORT_NUMERIC 배열을 숫자로 비교, SORT_STRING은 문자열로 비교  
대소문자를 구분하며 대문자가 앞쪽으로 정렬  
성공시 true, 실패시 false리턴  
``` php
$arr = array(15, 2, 1, 21, 121); 
sort($arr,SORT_NUMERIC); // 1, 2, 15, 21, 121
sort($arr,SORT_STRING); // 1, 121, 15, 2, 21
```

연관 배열은 키와 요소값으로 따로 정렬 가능  
ksort() : 각 요소의 키를 기준으로 정렬  
asort() : 각 요소의 값을 기준으로 정렬  

요소 재배치  
shuffle() : 배열 요소를 섞은 뒤 무작위로 재배치  
array_reverse() : 역순으로 바꾸어 반환  
  
### 문자열 관련 함수

문자열 길이  
strlen() : 문자열 길이 반환  
strcmp() : 두 문자열 비교  
strncasecmp() : 대소문자 구분하지 않고 비교  
strstr() : 처음으로 일치하는 부분을 포함하여 뒤로 다 반환 없으면 false  
strrchr() :  마지막으로 일치하는 부분을 포함하여 뒤로 다 반환 없으면 false  
strpos() : 처음으로 일치하는 부분의 시작 인덱스 반환
strrpos() : 마지막으로 일치하는 부분의 시작 인덱스 반환
substr() : 전달받은 길이만큼 추출하여 반환  
``` php
$str = "Hello, World";
echo substr($str, 3); // lo, World! 3번인덱스부터 뒤로 출력
echo substr($str, -3); // ld! 뒤에서 3개 출력
echo substr($str, 1, 5); // ello, 1번인덱스부터 5개 출력
echo substr($str, 1, -3); // ello, Wor 1번인덱스부터 뒤에서 3개 제외하고 출력
```
strtolower() : 모두 소문자로 변경  
strtoupper() : 모두 대분자로 변경  
ucfirst() : 첫 문자만 대문자로 변경  
ucwords() : 첫 문자만 대문자로 변경  
  
explode() : 특정 문자를 기준으로 문자열을 나누어 배열로 반환  
implode(), join() : 특정 문자를 사용하여 하나로 합친 문자열 반환  
strtok() : 특정 문자를 기준으로 토큰화 // 다음 토큰은 인자로 특정 문자를 전달한다
``` php
$str = "a,b,c";
$array = explode(',',$str);
echo $array[0]; // a
echo $array[1]; // b
echo $array[2]; // c

$str2 = implode('!', $array);
echo $str2 // a! b! c!

$token = strtok($str2, '!');
echo $token; // a
$token = strtok('!');
echo $token; // b
$token = strtok('!');
echo $token; // c
```
str_replace() : 해당하는 문자열을 모두 찾고 대체 문자열로 교체  
substr_replace() : 해당 문자열에서 특정 위치의 문자를 대체 문자열로 교체  
``` php
$str = "hello, world!";
echo str_replace('o','*',$str); // hell*, w*rld! 문자열의 모든 o를 *로 교체
echo substr_replace($str,'*',2); // he* 2번인덱스부터 끝까지 *로 교체
echo substr_replace($str,'*',-2); // hello, worl* 뒤에서 두번째 문자부터 끝까지 *로 교체
echo substr_replace($str,'*',2,4); // he* world! 2번 인덱스부터 네 글자를 *로 교체
echo substr_replace($str,'*',2,-4); // he*rld! 2번인덱스부터 뒤에서 다섯번째 문자까지 *로 대체
echo substr_replace($str,'*',2,0); // he*llo, world! 2번째 문자뒤에 *을 삽입함
```
ltrim() : 앞부분 공백 제거  
rtrin(), chop() : 뒷부분공백 제거  
trim() : 앞, 뒤 공백 제거  

### 날짜와 시간 관련 함수
tcpschool.com/php/php_builtInFunction_dateTime  

### 수학 관련 함수  
max() : 가장 큰 수 반환  
min() : 가장 작은 수 반환  
floor() : 전달받은 값중 같거나 작은 수 중 가장 큰 정수 반환(내림)  
ceil() : 전달받은 값중 같거나 큰 수 중 가장 큰 정수 반환(올림)  
round() : 반올림  
pow() : 거듭제곱  
exp() : e의 거듭제곱  
log() : 자연로그 값  
abs() : 절대값 반환  
rand() : 0보다 크거나 같고 getrandmax()함수의 반환값(2147483647)보다 작은 정수를 무작위로 생성하여 반환  

### POSIX 정규표현식(Regular Expression) 
정규표현식 리터럴  
/검색패턴/플래그  
preg_match(패턴, 문자열, [반환할 값 저장할 배열])  
해당하는 값을 찾으면 즉시 중단, 찾으면 1, 없으면 0 반환  
간단한 패턴 검색은 reg_match('/abc/', $str); 정확히 abc인것을 찾는다.  
preg_match_all()은 일치하는 모든패턴을 검색하며 세번째 인수로 전달되는 배열에 결과 저장  

플래그  
i : 대소문자 구분 안함  
g : 일치하는 모든 부분을 선택하도록 설정  
m : 여러줄의 문자열을 그 상태 그대로 여러줄로 비교하도록 설정  
y : 대상 문자열의 현재 위치부터 비교를 시작하도록 설정  
u : 해당 문자열이 utf-8로 인코딩 된 것으로 설정  

### 세부 정규표현식
tcpschool.com/php/php_regularExpression_basic  
tcpschool.com/php/php_regularExpression_application  

## 클래스

### 클래스 구조  

생성자(constructor), 소멸자(destructor)  
클래스 객체 생성, 삭제 시 자동으로 호출 됨  
__construct() 이름 고정  
__destruct() 매개변수 못가짐  

### 클래스 사용  
인스턴스 생성 : new 키워드로 인스턴스 생성  
멤버 접근 : 화살표 기호(->) 사용하여 접근  

접근제어자  
public : 어디서나 접근 가능  
private : 클래스의 멤버만 접근  
protected : 멤버나 상속받은 자식 클래스만 접근가능  

### 상속(inheritance)
부모 클래스(parent, super class)의 public, protected 멤버를 자식 클래스(child, sub)클래스가 상속받음  
extends 키워드를 이용하여 정의  
자식클래스는 하나의 부모 클래스만 가질 수 있다.  
  
메소드 오버라이딩(overriding)  
자식클래스가 상속받은 부모의 메소드를 재정의하여 사용  
  
static 키워드  
static을 이용한 프로퍼티와 메서드는 인스턴스를 생성하지 않아도 접근이 가능하다.  
$this를 사용할 수 없다.  
정적프로퍼티는 인스턴스화 된 객체에 접근 못함  
정적 메소드는 인스턴스화 된 객체에 접근 가능  
  
### 인터페이스  
추상 메서드(abstract method)  
반드시 자식 클래스에서 오버라이딩 해야만 사용할 수 있는 메서드를 의미한다  
따라서 추상 메서드는 선언부만 존재하고 구현부는 작성되어 있지 않다.  
abstract 접근제어자 function 함수이름();  
  
추상 클래스(abstract class)  
적어도 하나 이상의 추상 메서드를 포함하는 클래스  
상속받는 자식클래스에 추상 메서드를 재정의 하도록 강제할 수 있다.  
추상클래스는 인스턴스를 생성할 수 없다.  
  
인터페이스(interface)  
다른 클래스를 작성할 때 기본이 되는 틀을 제공하는 일종의 추상 클래스  
추상메서드로 구성되어 있음  
interface function() { 구현 메서드; }  
인터페이스를 구현하는 클래스는 반드시 인터페이스 정의와 같은 형태로 정의해야 한다.  
인터페이스 끼리 extends키워드로 상속받을 수 있다.
``` php
class Car implements Overload {
 ...
}
// Car클래스는 반드시 동일한 형태로 Overload인터페이스를 구현해야 한다.
```

오버로딩(Overloading)  
tcpschool.com/php/php_oop_overloading  

## Form 처리 
form 태그로 전달받은 데이터는 배열에 담아 전달합니다.  
슈퍼글로벌 배열($_GET, $_POST - PHP 4.1.0부터)을 사용하므로 어디든 제약없이 접근이 가능합니다.  

GET방식은 브라우저에 의해 캐시되어 저장된다.  
또한 쿼리 문자열이 포함되어 전송되어 길이의 제한이 있다.  
보안상 취약점이 존재한다.  

POST방식은 data를 별도로 첨부하여 전달한다.  
POST방식은 캐시되지 않기 때문에 브라우저 히스토리에도 남지 않는다.  
길이의 제한이 없으며 GET방식보다 보안성이 높다.  

### Form검증
tcpschool.com/php/php_form_validation  
tcpschool.com/php/php_form_required  
tcpschool.com/php/php_form_format  

## 파일처리  
### 파일 읽기, 쓰기, 기타 파일 함수  
tcpschool.com/php/php_fileHandling_read  
tcpschool.com/php/php_fileHandling_write  
tcpschool.com/php/php_fileHandling_ect  

## 쿠키와 세션
쿠키 : 웹 접속시 서버에 의해 사용자 컴퓨터에 저장되는 정보  
tcpschool.com/php/php_cookieSession_cookie  
세션 : 여러 페이지에 걸쳐 사용되는 사용자 정보를 저장하는 방법  
tcpschool.com/php/php_cookieSession_session  

## 예외처리  
throw 예외객체;  
이때 예외 객체는 반드시 Exception클래스나 Exception클래스를 상속받은 자식 클래스  
try, catch, finnaly 문으로 처리  
tcpschool.com/php/php_exception_handling  


