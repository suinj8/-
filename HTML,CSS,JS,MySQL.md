# YESFORM STUDY
모든 컨텐츠는 
https://developer.mozilla.org/ko/  
www.tcpschool.com  
을 기반으로 작성됨  

## 주석
```
HTML : <!-- 주석 -->
CSS : /* 주석 */
JS, PHP : //주석 or /* 주석 */
MySQL : #주석, --(공백)주석, /* 주석 */
```

## HTML
### Tag
HTML 문서를 구성하는 기본단위, 여는태그와 닫는태그가 존재(닫는 태그가 없는 태그도 존재한다)
```
 <!doctype html> : html문서라는것을 표현
 <meta charset="utf-8"> : 인코딩 정보 표시
 <a> : 하이퍼링크 정의
 <hr> : 밑줄
 <h1 ~ h6> : 헤더태그
 <ul> : 순서가 없는 리스트 정의
 <ol> : 순서가 있는 리스트 정의
 <li> : 리스트 내부 아이템을 정의
 <br> : 줄바꿈
```
등 많은 Tag 존재
그 외 태그들 www.tcpschool.com/html-tags/intro

## CSS(Cascading Style Sheets)
글꼴, 색상, 크기 등 HTML에 스타일을 추가한다.

### HTML문서에 CSS 추가
``` css
<link rel="stylesheet" href="문서경로">
```

### Selector
``` css
유형 선택자
h1 {
 color: red;
 font-size: 20px;
}
h1태그에 적용

클래스 선택자
.className {
  color: red;
}
해당되는 class에 적용

ID 선택자
#idName {
  color: red;
}
해당되는 id에 적용

그룹 선택자
div, span {
  color: red;
}
일치하는 모든 노드를 선택, div와 span에 적용
```

``` html
자손 결합자
div span {
  color: red;
}
div의 자손 중 span에 적용
div의 내부에만 포함되어 있으면 적용됨

자식 결합자
div > span {
  color: red;
}
div의 직계자식인 span에 적용된다

즉 
<div>
  <span>
    <p></p>
  </span>
</div> 라면
div의 직계자식은 span태그
div의 자손은 span과 p태그 모두 적용됨

일반 형제 결합자
div ~ span {
  color:red:
}
(같은 부모를 공유하는 태그 중) div태그 뒤에 나오는 span태그에 적용

인접 형제 결합자
div + span {
  color:red;
}
(같은 부모를 공유하는 태그 중) div태그 *바로 뒤에 나오는 span태그에 적용

즉
<body>
  <div></div>
  <p></p>
  <a></a>
</body> 라면
div의 인접형제는 p태그 뿐이고,
div의 일반형제는 p와 a태그 둘 다이다.
```

### 의사클래스(Pseudo-classes), 의사요소(Pseudo elements)
의사클래스 : 선택자에 추가하는 키워드로 선택한 요소가 특별한 상태여야 만족한다.  
의사요소 : 선택한 요소의 일부분에만 스타일을 입힐 수 있다.

``` css
의사클래스
button:hover {
  color:blue;
}
```
마우스를 버튼에 올렸을 때만 파란색으로 바뀜

``` css
의사요소
div::first-line {
  color:blue;
}
```
div태그의 첫 문장만 색깔을 바꿈

### 블록 및 인라인

display 값으로 지정

block 정의 시
1. 박스가 사용 가능한 공간을 100%로 채움
2. 새 줄로 행갈이
3. width, height 속성부여 가능
4. padding, margin, border로 박스가 밀려남
ex) h1, p

inline 정의 시
1. 행갈이를 하지 않음
2. width, height 속성 적용 x
3. padding, margin, border로 밀려나지 않음
ex) a, span, em, strong 등

flex 정의 시
내부 디스플레이 박스가 flex로 변경

예스폼 HTML, CSS, JS, MySql, PHP 공부 내용 기록

### 상대 길이 단위
|단위|관련사항|
|------|---|
|em|요소의 글꼴 크기|
|rem|루트 요소의 글꼴 크기|
|vw|viewport 너비의 1%|
|vh|viewport 높이의 1%|
|vmin|viewport의 작은 치수의 1%|
|vmax|viewport 큰 치수의 1%|

### 요소 배치 방식
1. display flex 속성 : 가변 상자 레이아웃 - 직계 자식이 flex된다.  
2. float 속성 : 부동 여부를 지정 - left, right, none(default), inherit(부모요소에서 상속)  
3. position 속성 : 정적, 상대, 절대, 고정, 스티키가 존재  
  정적 : default
  상대(relative) : 예상되는 기본값을 기준으로 위치를 조정
  절대(absolute) : 컨테이너 블록의 가장자리로부터 위치를 조정
  고정(fixed) : 절대와 같은 위치에 나타나지만, 뷰포트를 기준으로 고정 -> 스크롤을 내려도 따라옴
  스티키(sticky) : 정적와 고정의 혼합형, 원래는 정적이다가 뷰포트에 요소가 들어오면 고정으로 동작
  
### 반응형 디자인
미디어 쿼리
``` css
@media screen and (min-width: 800px) {
  .container {
    margin: 1em 2em;
  }
}
```
현재 화면 미디어로 표시되고 있는지 와 최소너비가 800px이상인지를 검사 후
둘 다 만족하면 내부가 적용됨

+)논리합을 이용하려면
조건을 ,로 분리하여 사용한다
``` css
@media screen and (min-width: 800px), (orientation: landscape) { ... }
```

미디어 쿼리의 방향성
``` css
@media(orientation: landscape) {
  body {
      color:red;
  }
}
```
가로, 세로모드 검사하여 적용

반응형 타이포그래피에 뷰포트 단위 적용하기
``` css
h1 {
  font-size: 5vw;
} 단 텍스트 확대, 축소기능 상실한다
따라서 calc를 이용할 수 있다
h1 {
  font-size: calc(1.5rem + 3vw);
}
```

뷰포트 메타 태그
``` html
<meta name="viewport" content="width=device-width, initial-scale=1">
```
너비를 장치의 실제 너비로 재정의


## JavsScript  
웹 페이지에서 복잡한 기능을 구현할 수 있도록 하는 스크립트, 프로그래밍 언어  
주기적 갱신, 사용자와의 상호작용과 같은 일을 가능하게 한다.  
자바는 클라이언트, 서버(Node.js) 사이드 코드가 모두 가능하다.  

기본적으로 script태그 안에 작성하여 동작한다.
``` html
<script src="script.js" defer></script>
여기서 defer 속성은 브라우저가 페이지 파싱을 모두 끝낸 후에 script를 실행하겠다는 것임
추가로 async 속성은 파싱과 script를 동시에 실행하는 것임
```

### for of 반복문
배열의 모든 값을 가져올때까지 반복
``` js
const fruits = ['apple', 'bananas', 'cherries'];
for(const fruit of fruits) {
  console.log(fruit);
}
``` 
fruits배열에 모든 값을 하나씩 가져와 콘솔에 나타냄  

자바스크립트의 변수 var, let, const
var은 재할당, 재선언이 가능
let은 재할당은 가능하지만 재선언 불가능
const는 재할당, 재선언 불가능
``` js
var a = '1';
var a = '2'; 재선언 가능
a = '3'; 재할당 가능

let b = '4';
let b = '5'; 오류 - 재선언 불가능
b = '6'; 재할당 가능

const c = '7';
const c = '8'; 오류 - 재선언 불가능
c = '9' 오류 - 재할당 불가능
```

문자열 <-> 숫자
``` js
var strNum = '123'
var num = Number(strNum);

var num = 123;
var strNum = num.toString();
```

문자열 길이알기
``` js
var str = '123';
str.length; // 3
```

문자열에 하위문자열 찾기
``` js
var str='123';
str.indexOf('2'); // 1
str.indexOf('4'); // -1 즉 -1이 나오면 존재하지 않는것
```

문자열 자르기
``` js
var str='123';
str.slice(0,2); // "12"
```

문자열 대/소문자 변경
``` js
var str='AbC';
str.toLowerCase(); // abc
str.toUpperCase(); // ABC
```

문자열 일부분 변경
``` js
var str='123';
str.replace('2','7'); // '173'
```

문자열 <-> 배열로
``` js
var str='a,b,c,d';
var arr=str.split(',');
arr // ['a','b','c','d']

var sstr = arr.join(','); // 'a,b,c,d'
```

배열의 끝에 값 넣고 빼기
``` js
var arr = ['a','b'];
arr.push('c');
arr // ['a','b','c']

arr.pop();
arr // ['a','b']
```

배열의 앞에 값 넣고 빼기
``` js
var arr = ['a','b'];
arr.unshift('c');
arr // ['c','a','b']

arr.shift();
arr // ['a','b']
```

### 익명함수 사용법
주로 이벤트 발생에 사용
``` js
myBtn.onClick = function() {
  alert("hi");
}
```

### 이벤트 핸들러 등록/제거
``` js
btn.addEventListener('click', changeBgcolor);
btn.removeEventListener('click', changeBgcolor);
```

### JSON  
자바스크립트 객체 문법을 따르는 문자 기반의 데이터 포맷  

### 비동기 처리  
특정 코드의 연산이 끝날 때까지 코드의 실행을 멈추지 않고  
다음 코드를 먼저 실행하는 특성  
ex)
``` js
function getData() {
  let data;
  $.get('url', function(response) {
    data = response;
  });
  return data;
}
console.log(getData()) // undefined
```
$.get 은 ajax로 비동기 처리된다.  
따라서 데이터를 요청하고 받아오는 것을 기다리는것이 아닌 다음 코드를 실행한다.  
즉 data변수에 값을 넣기 전에 return문을 실행하여 빈 data가 리턴되게 된다.  

CallBack 함수  
함수를 다른 함수의 인자로 사용하는 것 즉 고차함수  
위와 같은 상황을 callback 함수로 해결할 수 있다.  
``` js
function getData(callbackFunc) {
  $.get('url', function(response) {
    callbackFunc(response);
  });
}
getData(function(data) {
  console.log(data);
});
```

Promise  
자바스크립트 비동기 처리에 사용되는 객체  
비동기 처리를 위해 callback함수를 중첩으로 사용하면 callback 지옥에 빠질 수 있다.  
따라서 위 코드에 promise를 적용시킬 수 있다.  
``` js
function getData(callback) {
  return new Promise(function(resolve, reject) {
    $.get('url', function(response) {
      if(response) resolve(response);
      else reject(new Error("failed"));
    });
  });
}
getData().then(function(data) {
  console.log(data);
}).catch(function(err) {
  console.error(err);
});
```
promise 메서드를 호출하면 두개의 인자를 가진 콜백함수를 선언할 수 있다.  
인자로는 resolve와 reject가 존재하고  
resolve()를 실행하면 then()을 이용하여 처리 결과 값을 받을 수 있다.  
reject()를 실행하면 catch()로 실패 이유를 받을 수 있다.  
promise의 장점은 여러개의 promise가 연결 가능하다는 점이다.  
then()메서드를 호출하고 나면 새로운 promise객체가 반환되기 때문이다.
``` js
new Promise(function(resolve, reject) {
  setTimeout(function() {
    resolve(1);
  }, 2000);
}).then(function(result) {
  console.log(result); // 1
  return result + 10;
}).then(function(result) {
  console.log(result); // 11
  return result + 20;
}).then(function(result) {
  console.log(result); // 31
});
```

async/await  
promise나 callback의 단점을 해소하기 위해 만들어진 문법  
promise나 callback은 꼬리를 무는 코드가 나올 수 있다.  
  
await을 통해 promise객체를 받아올 수 있다.
``` js
const variable = await promise;
```

하지만 await은 반드시 async함수 내에서만 동작한다.  
``` js
(async = () => {
  const condition = true;
  const promise = new promise((resolve, reject) => {
    if(condition) {
      resolve("resolve");
    } else {
      reject("reject");
    }
  });
  
  try {
    const result = await promise; // promise 객체를 받아 변수에 저장한다
    console.log(result);
  } catch (err) {
    console.error(err);
  }
})();
```
async/await은 promise처럼 에러 핸들링 기능이 존재하지 않는다.  
따라서 try/catch문을 이용하여 에러를 핸들링한다.  
(기존 promise는 .catch()문을 이용하여 에러를 핸들링함)  
  
위와같은 방법을 사용하는 이유는  
callback지옥이나 then지옥의 가능성을 막고,  
코드가 길어질 수록 async/await을 이용한 코드가 가독성이 뛰어나다.  
마찬가지로 비동기 코드가 동기코드처럼 읽혀 코드흐름 이해가 간편하다.  
  
### workers  
근본적으로 프로그램은 단일쓰레드로 한 번에 한 작업만 수행이 가능하다.  
worker는 다른 쓰레드에서 작업을 할 수 있는 기능을 제공한다.  
  
하지만 쓰레드의 실행 순서는 알 수 없으므로  
서로의 변수에 접근할 수 없도록 합니다.  
따라서 worker는 DOM(window, document, 페이지 요소 등)에 엑세스 할 수 없습니다.

``` js
// main.js
const worker = new Worker('./worker.js'); // worker 생성

document.querySelector('#generate').addEventListener('click', () => { 
  const quota = document.querySelector('#quota').value;
  worker.postMessage({ // worker에 메시지를 전달
    command: 'generate', 
    quota: quota // 인수를 JSON 개체로 전달
  });
});

worker.addEventListener('message', message => { // worker에 event listener 등록
  document.querySelector('#output').textContent = `finished generating ${message.data} primes!`;
}); // 즉 worker가 일을 마치고 결과 데이터를 전달할 수 있도록 함
```

``` js 
worker.js // 메인스크립트에서 worker를 생성하자마자 실행됨
addEventListener("message", message => { // 워커는 메인스크립트로부터 메시지를 기다림
  if(message.data.command === 'generate') { // 특정 메시지를 받으면 작업을 수행
    generatePrimes(message.data.quota);
  }
});

function generatePrimes(quota) { 
  ...                          // 작업
  postMessage(primes.length); // 작업이 끝나면 메인스크립트로 메시지와 인자를 보냄
}
```
위 방법은 dedicated worker입니다.  
이 외에도  
Shared workers : 서로 다른 창에서 실행되는 여러 스크립트에서 공유  
Service workers : 오프라인 상태일 때 웹 어플리케이션이 동작할 수 있도록 리소스를 캐싱  
이 존재합니다.  

### API(Application Programming Interfaces)  
운영체제나 프로그래밍언어가 제공하는 기능을 제어할 수 있게 만든 인터페이스를 의미한다.  
하지만 보통 웹에서는 API를 요청, 응답하는데 사용한다.  
+) Web API - 다른 서비스에 요청을 보내고 응답을 받기 위해 정의된 명세 (위키백과)  

Fetch API  

``` js
fetch(url) // promise객체를 반환 (비동기), url을 인자로 받음
  .then((response) => { // then을 이용하여 promise객체를 받음
    if(!response.ok) {
      throw new Error(`HTTP error: ${response.status}`);
    }
    return response.text(); // response.text()또한 비동기로 promise객체 반환
  })
  .then((text) => poemDisplay.textContent = text) // 따라서 response.text()의 객체를 받아 출력
  .catch((error) => poemDisplay.textContent = `Could not fetch verse: ${error}`); // 에러검출
```

AJAX(Asynchronous JavaScript And XML)
서버와 통신하기 위해 XMHttpRequest객체를 사용하는 것을 말함  
JSON, XML, HTML 등 다양한 포맷을 주고 받을 수 있음  
이는 전체를 refresh를 하지 않고서도 수행이 가능 => 페이지의 일부분만 업데이트 할 수 있도록 함  

XMLHttpRequest 객체  
서버와 데이터를 교환할 때 사용  
``` js
var variable = new XMLHttpRequest();
```

open(), send() 메소드  
open()은 서버로 보낼 Ajax요청의 형식을 설정한다.  
send()는 Ajax요청을 서버로 전달
``` js
open(전달방식, URL주소, 동기여부);
send() // GET방식
send(문자열) // POST방식

// GET방식
httpRequest.open("GET", "url",  true); // true는 기본값, 비동기 방식을 사용하겠다는 뜻
                                      // false시 동기식으로 작동, 즉 응답을 대기함
httpRequest.send();

if(httpRequest.readyState == XMLHttpRequest.DONE && httpRequest == 200) {
  ... // 객체의 현재상태와 서버 상 문서 존재의 유무를 확인가능
}
// readyState의 값이 DONE이면 서버에 요청한 데이터 처리가 완료되어 응답할 준비가 완료되었다는 의미

// POST방식 - 데이터를 http헤더에 포함시켜 전송
httpRequest.open("POST", "url", true);
httpRequest.setRequestHeader("Content-Type", "application/x-www-form-unlencoded");
httpRequest.send("city=seoul&zipcode=11111");
```
+) readyState Property  
0) UNSENT : XMLHttpRequest 객체 생성됨  
1) OPENED : open()메서드가 성공적으로 실행  
2) HEADER_RECEIVED : 모든 요청에 대한 응답이 도착함  
3) LOADING : 요청한 데이터를 처리중임  
4) DONE : 요청한 데이터의 처리가 완료되어 응답 준비 완료  

+) status Property  
200) 서버에 문서가 존재  
404) 서버에 문서가 존재하지 않음  

+) onreadystatechange - readyState Property 값이 변할 때마다 자동으로 호출되는 함수를 설정  
즉 readyState값의 변화에 따라 총 5번 호출됨  

### HTTP 헤더 - 요청과 응답은 http 헤더로 수행, 다양한 데이터 포함 가능  
위의 setRequestHeader메서드를 이용함  

HTTP 응답 헤더  - Ajax는 서버로부터 전달받은 HTTP 응답 헤더 내용을 메서드를 이용하여 확인  
getAllResponseHeaders() 메서드 - HTTP응답 헤더의 모든 헤더를 문자열로 반환
getResponseHeader() 메서드 - HTTP응답 헤더 중 인수로 전달받은 이름과 일치하는 헤더의 값을 문자열로 반환  
``` js
var httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = function() {
  if(httpRequest.readystate == XMLHttpRequest.DONE && httpRequest.status == 200) {
    document.getElementById("text").value = httpRequest.reaponseText;
    ...
  }
};

httpRequest.open("GET","URL",true);
httpRequest.send();
```
  
Response Text, XML
``` js
document.getElementByID("text").innerHTML = httpRequest.responseText; // 텍스트 파일 응답 처리
document.getElementByID("xml").innerHTML = httpRequest.responseXML; // XML 파일 응답 처리
```

JQuery - Ajax 프레임워크  
``` js
$.ajax({
  url: "url", // 요청 보낼 서버의 주소
  data: {name : "홍길동"}, // 요청과 함께 보낼 데이터
  type: "GET", // HTTP 요청방식
  dataType: "json" // 서버에서 보내줄 데이터 타입
})
.done(function(json)) { // 요청에 성공하면 done()메서드로 전달
  ...
}
.fail(function(xhr, status, errorThrown) { // 요청에 실패하면 fail()메서드로 전달
  ...
}
.always(function(xhr, status) { // 성공 여부와 관계없이 항상 실행
  ...
}
```

### 기타 JQuery 메서드 - $.get() , $.post() , $.load()  
``` js
$(function() {
  $("#requestBtn").on("click", function() {
    $.get("url", function(data, status) { // GET방식 이용하여 서버에 HTTP요청 보냄
      $("#text").html(data + status); // data와 전송 성공 여부 보여줌
    });
  });
});

$(function() {
  $("#requestBtn").on("click", function() {
    $.post("url", function(data, status) // POST방식 이용하여 서버에 HTTP요청 보냄
      { name : "홍길동", age: "20" }, // 서버에 정보를 같이 보냄
      function(data, status) {
        $("#text").html(data + status); // data와 전송 성공 여부 보여줌
      }
    );
  });
});

$(function() {
  $("#requestBtn").on("click", function() {
    $("#list").load("url li");
    // URL 주소에 존재하는 HTML코드에서 <li>요소를 읽은 후에 id가 list인 요소에 배치함
    // url과 인수는 띄어쓰기로 구분함
  });
});
```

## MySQL
RDBMS, 오픈소스, 다양한 API제공, 구문은 대소문자 구분 안함(테이블 명, 필드 이름은 구분함)  

DB접속
``` mysql
mysql -uroot -p
후 패스워드 입력
```

### CREATE
  
DataBase 생성, 선택    
``` mysql
CREATE DATABASE TEST; // TEST라는 DATABASE 생성

USE TEST; // TEST라는 DATABASE 선택
```

Table 생성  
``` mysql
CREATE TABLE TEST( // TEST라는 TABLE생성
  ID INT,
  Name VARCHAR(20),
  ...
);
```

제약조건  
무결성을 지키기 위해 데이터를 입력받을 때 실행되는 검사 규칙  
  
1. NOT NULL : 해당 필드는 NULL값 지정 불가  
2. UNIQUE : 해당 필드는 서로 다른 값을 가져야만 함
3. PRIMARY KEY : 해당 필드가 NOT NULL과 UNIQUE특성을 모두 가짐
4. FOREIGN KEY : 하나의 테이블을 다른 테이블에 의존하게 만듬
 - ON DELETE, ON UPDATE // 참조되는 테이블에 영향을 받는다  
  -- CASCADE : 참조되는 테이블에서 삭세, 수정되면 참조하는 테이블도 같이 변함  
  -- SET NULL : 참조되는 테이블에서 삭제, 수정되면 참조하는 테이블의 데이터는 NULL로 변경  
  -- NOT ACTION : 참조되는 테이블에서 삭제, 수정되어도 참조하는 테이블은 변화없음  
  -- SET DEFAULT : 참조되는 테이블에서 삭제, 수정되면 참조하는 테이블은 기본값으로 변경  
  -- RESTRICT : 참조하는 테이블에 데이터가 남아있으면 참조되는 테이블의 데이터를 삭제, 수정 불가능  
5. DEFAULT : 해당 필드의 기본값을 설정  

### ALTER
데이터베이스나 테이블을 변경할 수 있음  

``` mysql
ALTER DATABASE TEST CHARACTER SET=utf8; // DB의 문자 집합을 변경
ALTER TABLE TEST ADD Phone INT; // TEST테이블의 Phone이라는 INT형 필드를 추가
ALTER TABLE TEST DROP Phone; // TEST테이블의 Phone이라는 필드를 삭제
ALTER TABLE TEST MODIFY COLUMN NAME VARCHAR(30); // TEST테이블의 NAME 필드를 VARCHAR(30)으로 변경
```

### DROP
데이터베이스나 테이블을 삭제  

``` mysql
DROP DATABASE TEST; // TEST라는 데이터베이스 삭제
DROP TABLE TEST; // TEST라는 테이블 삭제
TRUNCATE TABLE TEST; // TEST라는 테이블은 남기고 저장된 데이터만 삭제
```

### INSERT
테이블에 새로운 데이터를 추가  

``` mysql
INSERT INTO TEST(ID, Name, Phone) VALUES(0, '홍길동', '010-1111-1111'); // 새로운 레코드 추가
// 반드시 모든 컬럼을 명시해 줄 필요는 없다
```

### UPDATE
테이블의 레코드를 수정  
```mysql
UPDATE TEST // 1. TEST테이블에서
SET ID = 10;  // 3. ID를 10으로 변경한다
WHERE NAME = "홍길동"; // 2. 이름이 홍길동인 레코드를 찾아
// 만약 WHERE절을 생략하면 모든 ID값이 10으로 변경됨 
```

### DELETE
해당 테이블에서 레코드를 삭제  

```
DELETE FROM TEST WHERE NAME = "홍길동"; // TEST테이블에서 이름이 홍길동인 레코드를 삭제
```

### SELECT
테이블의 레코드를 선택  

```
SELECT ID // 3. ID 필드를 가져온다.
FROM TEST // 1. TEST 테이블로부터
WHERE NAME="홍길동"; // 2. 이름이 홍길동인 레코드의

WHERE절을 이용하여 조건에 맞는 데이터를 가져옴

SELECT *
FROM TEST; // TEST테이블의 모든 값을 가져옴

SELECT DISTINCT NAME
FROM TEST; // DISTINCT는 같은 필드에서 중복되는 값이 있으면 한번만 선택되도록 한다
```

### MySQL Data Type
1. 숫자  
2. 문자열    
3. 날짜와 시간    

숫자 타입  
정수 - INT, BIGINT ...  
고정 소수점 - DECIMAL(정확하게 실수를 표현하기 위함)  
부동 소수점 - FLOAT, DOUBLE  
비트값 - BIT(바이너리 값 표현)  

문자열 타입  
CHAR - 고정 길이(남은 공간은 공백으로 채움)  
VARCHAR - 가변 길이(입력된 문자열의 길이만큼만 저장)  
BLOB - 다양한 크기의 바이너리 데이터를 저장할 수 있는 타입  
TEXT - VARCHAR와 비슷하지만 기본값을 가질 수 없음, BLOB과 비슷하지만 대소문자 구분  
ENUM - 미리 정의한 집합의 요소 중 하나만 저장할 수 있는 타입, 가독성 높임, 내부적으로 정수로 인식  
SET - 미리 정의한 집합의 요소 중 동시에 여러개를 저장할 수 있는 타입  
``` mysql
ENUM('single','twin', 'double');
SET('a','b','c');
```

날짜와 시간 타입  
DATE - 날짜를 저장하는 타입 기본형식 'YYYY-MM-DD'  
DATETIME - 날짜와 시간을 저장하는 타입 'YYYY-MM-DD HH:MM:SS'  
TIMESTAMP - 날짜와 시간을 나타내는 타임스탬프를 저장하는 타입 // 위 3개 타입은 유효하지 않으면 0으로 저장  
TIME - 시간을 저장하는 타입 'HH-MM-SS' or 'HHH-MM-SS'  
YEAR(4) - 연도를 저장  

### 비교연산자

<=> : 모두 NULL이면 참  
IS : 양쪽 피연산자가 같으면 참 // 보통 오른쪽 피연산자가 불리언 값일 때 사용  
IS NOT : 양쪽 피연산자가 다르면 참  

### 패턴 매칭(LIKE)  
와일드카드를 이용하여 매칭  

``` mysql
SELECT * FROM TEST
WHERE NAME LIKE '장%'; // 장으로 시작하는 모든 이름을 가져옴

와일드카드
% : 0개 이상의 문자를 대체 
_ : 1개 이상의 문자를 대체
즉 '장%'는 '장'도 가능
'장_'는 '장' 불가능 -> 장으로 시작하는 최소 2글자 이상
```

복잡한 패턴매칭은 REGEXP 연산자를 이용한다  
https://www.geeksforgeeks.org/mysql-regular-expressions-regexp/  

### 서브쿼리
서브쿼리란 다른 쿼리 내부에 포함되어 있는 SELECT문을 의미함  
``` mysql
SELECT ID, ROOMNUM // 6. ID와 방번호를 RESERVE테이블에서 가져온다.
FROM RESERVE // 4. RESERVE 테이블의 
WHERE NAME IN // 5. 이름과 가져온 컬럼과 비교하여 일치하는 데이터의
(SELECT NAME // 3. 이름 컬럼을 가져와서
From CUSTOMER // 1. CUSTOMER 테이블에서
WHERE ADDRESS="서울"); // 2. 주소가 서울인 것들의
```

### INDEX
인덱스는 테이블에서 원하는 데이터를 쉽고 빠르게 찾기 위해 사용함  
인덱스를 이용하면 테이블 전체를 읽지 않아도 되므로, 처리가 빨라짐  
따라서 보통 검색이 자주 사용되는 테이블에 이용  

인덱스 생성  
``` mysql
CREATE INDEX TESTIDX
ON TEST (NAME); // TEST테이블의 NAME 필드에 TESTIDX라는 INDEX를 생성


SHOW INDEX
FROM TEST; // TEST테이블의 인덱스를 확인할 수 있다
```

인덱스 추가  
``` mysql
ALTER TABLE TEST
ADD INDEX TESTIDX (NAME); // TEST테이블의 NAME컬럼에 기본 인덱스를 추가
```

인덱스 삭제  
``` mysql
ALTER TABLE TEST
DROP INDEX TESTIDX; // TEST테이블에서 TESTIDX 삭제
또는
DROP INDEX TESTIDX; 
ON TEST // TEST테이블에서 TESTIDX삭제
```

### MySQL 내장함수

LENGTH() - 문자열 길이 반환  
CONCAT() - 입력받은 문자열을 모두 합침, 하나라도 NULL이면 NULL출력  
LOCATE() - 특정 문자열이 나타나는 위치를 찾음(단, MySQL은 문자열의 첫 문자의 인덱스를 1부터 계산!)  
``` mysql
SELECT LOCATE('abc','ababcDEFabc'), // 3
LOCATE('abc','ababcDEFabc',4); // 9 세번째 인수는 특정 문자열을 찾기 시작할 인덱스 지정 즉 4번째부터 찾기 시작
```
LEFT(), RIGHT() - 왼쪽, 오른쪽으로부터 명시한 개수만큼 문자 반환  
``` mysql
SELECT LEFT('abcd', 2), // ab
RIGHT('abcd',2); // cd
```
LOWER(), UPPER() - 입력받은 문자열을 모두 소문자/대문자로 바꿈  
REPLACE() - 전달받은 문자열에서 특정 문자열을 찾아 대체 문자열로 교체  
``` mysql
SELECT REPLACE('abcd','ab','kk'); // kkcd
```
TRIM() - 입력받은 문자열의 앞 or 뒤 or 양쪽 모두에 있는 특정 문자를 제거  
BOTH - 양쪽제거, LEADING - 앞 제거, TRAILING - 뒤 제거  
``` mysql
SELECT TRIM('    !!!abc!!!     '), // (!!!abc!!!) 제거할 문자를 명시하지 않으면 자동으로 공백 제거
TRIM(LEADING '!' FROM '!!!abc!!!'); // (abc!!!)
```
NOW() - 현재 날짜와 시간 반환 'YYYY-MM-DD HH:MM:SS' or 'YYYYMMDDHHMMSS'  
CURDATE() - 현재 날짜 반환 'YYYY-MM-DD' or 'YYYYMMDD'  
CURTIME() - 현재 시간 반환 'HH:MM:SS' or 'HHMMSS'  
그 외 날짜, 시간 형식화  
tcpschool.com/mysql/mysql_builtInFunction_dateTime  

### 그룹함수
COUNT() - 만족하는 총 개수 반환  
MIN(), MAX() - 선택된 필드의 최소, 최대값 반환  
SUM() - 숫자 필드에 저장된 값의 총 합 반환  
AVG() - 숫자 필드에 저장된 값의 평균 반환  
  
### GROUP BY 절
선택된 레코드의 집합을 필드의 값이나 표현식에 의해 그룹화한 결과 집합 반환  
SELECT 절에서만 사용 가능하며 그룹함수와 많이 사용함  
```
SELECT AGE, COUNT(*) AS cnt // 4. AGE와 개수를 나타낸다
FROM CUSTOMER // 1. CUSTOMER 테이블에서
GROUP BY AGE // 2. AGE로 그룹화된 결과 집합 중
HAVING 조건; // 3. 조건에 맞는것의
```
+) HAVING 절을 이용하여 GROUP BY로 반환되는 집합 조건을 설정 가능  

## MySQL과 PHP
동작 방식  
1. 브라우저(사용자)가 웹서버에 웹페이지를 요청
2. 웹서버는 PHP파서에 스크립트 실행 요청
3. PHP파서는 DB와 작업
4. 작업 결과를 웹서버에 전달
5. 웹서버가 요청에 응답

간단한 MySQL연결, Query 사용하기
``` php
<?php
$connect = mysqli_connect(서버이름, 사용자명, 비밀번호, DB명);
if(!$connect) { echo "서버 연결 실패"; }
if(mysqli_query($connect, "Query" )) {
    echo "Query 성공";
  } else {
    echo "Query 실패";
  }
  mysqli_close($connect);
?>
```

## MySQL Trigger
어떤 이벤트가 발생했을 때, 자동으로 실행되게 하는 것  
DML 이벤트 발생 시 작동  
테이블에 부착됨  

### 행 트리거  
테이블 내부 영향을 받은 행 각각에 대해 실행  
변경 전/후를 OLD/NEW라는 가상 줄 변수를 사용하여 읽을 수 있다.  
+) delete는 OLD만, insert는 NEW만 존재한다.  

### 문장 트리거  
한번만 실행됨  
행 수에 관계없이 각 트랜잭션에 대해 명령문 레벨 트리거가 한번 실행됨  
BEFORE, AFTER로 트리거가 실행되는 시기를 지정한다.  
+) INSTEAD OF 원래 문장 대신 트리거가 동작  


``` mysql
CREATE TRIGGER 트리거명
BEFORE/AFTER 명령 키워드 on 테이블명
FOR EACH ROW
BEGIN
  처리정보
END

ex)
DELIMITER $$

CREATE TRIGGER backup_trigger // 트리거 정의
BEFORE DELETE ON data // data 테이블에서 값이 지워지기 전
FOR EACH ROW //  각 행에 대해
BEGIN
  INSERT INTO backup (col1, col2, ... ) VALUES (val1, val2, ...); // 값을 넣음
END;

DELIMITER ;
$$
  
```
