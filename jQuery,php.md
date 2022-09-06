# jQuery, PHP  

## jQuery

제이쿼리는 자바스크립트 언어를 간편하게 사용할 수 있도록 한 자바스크립트 라이브러리  
DOM이벤트 처리와 Ajax응용 프로그램 및 플러그인 활용가능

### jQuery 기본문법

``` js
$(선택자).동작함수()
```
$는 jQuery를 의미하고 접근가능하게 해주는 식별자  
선택자를 이용하여 HTML요소를 선택하고 동작함수를 정의하여 선택된 요소에 동작을 설정  

일반적으로 JS코드는 웹 브라우저가 문서의 모든 요소를 로드한 후에 실행되어야 함  
따라서 JQuery는 이와같이 제공함  
``` js
$(document).ready(function() {
  ...
} // 문서가 모두 로드되면 실행

$(window).load(function() {
  ...
} // 창이 모두 로드되면 실행
```

jQuery는 CSS선택자나 id, class를 사용하여 HTML요소를 선택할 수 있음  
JS의 getElementsByTagName(), getElementsById(), getElementsByClassName() 메서드와 같은 동작
``` js
$(function() {
  $("p").on("click", function() {
    $("span").css("fontSize","28px");
  });
});

$(function() {
  $("p").on("click", function() {
    $(".jq").css("fontSize","28px");
  });
});

$(function() {
  $("p").on("click", function() {
    $("#jq").css("fontSize","28px");
  });
});
```
혹은 속성으로도 선택할 수 있음  
``` js
$(function() {
  $("p").on("click", function() {
    $("img[alt='flower']").attr("src","url"); // alt가 flower인 이미지의 속성 src를 바꿈
  });
});
```

제이쿼리는 비표준 선택자도 사용할 수 있음  
요소를 변수에 담고 필터링도 가능함  
``` js
$(function() {
  var items = $("li"); // 모든 li태그를 선택하여 변수에 담는다.
  $("button").on("click",function() { // 버튼이 클릭되면
    $("#len").text("저장된 <li> 요소 개수는 " + items.length + "개"); // 요소의 개수를 보여줌
  });
}); // 하지만 추가, 삭제된 요소를 자동으로 갱신하지는 않는다.

$(function() {
  $("button").on("click",function() { // 버튼이 클릭되면
    $("li:has(span)").text("span 요소가 있어요"); // li태그 내부에 span요소만을 선택
  });
});
```
필터링 선택자, 입력 양식 요소 선택자  
tcpschool.com/jquery/jq_elementSelection_jqSelector  

### jQuery getter, setter
getter는 특정요소에 접근  
setter는 대입하고자 하는 값을 전달  

html()메소드에 인자를 전달하지 않으면 getter  
html()메소드에 인자를 전달하면 setter  

``` js
var newText = $("h1").html(); // getter
$("#text").html(newText); // setter

$(function() {
  $("button").on("click", function() {
    $("#list").find("li").eq(1).html("두번째 아이템을 선택했다!");
    // id값이 list인 요소중 li요소를 모두 선택하여 두번째 요소의 값을 설정한다.
    // eq(idx)는 지정된 idx요소를 선택하는 메서드 
  });
}); 

$("list").find("li").eq(1).html("두번째 선택함!").end().eq(2).html("세번째 선택함!);
// 이와같이 end()메서드를 이용하면 바로 이전에 사용했던 요소의 집합을 다시 선택할 수 있다.
// 즉 첫번째 eq()메서드 이전의 집합을 다시 선택한다.
```

그 외 추가적인 메서드  
tcpschool.com/jquery/jq_elementSelection_access  

### 요소의 추가
.append() : 선택한 요소의 마지막에 새로운 요소나 콘텐츠 추가  
.prepend() : 선택한 요소의 처음에 새로운 요소나 콘텐츠 추가  
.appendTo() : append()에서 소스와 대상이 반대(뒤에추가)  
.prependTo() : prepend()에서 소스와 대상이 반대(앞에추가)  

``` js
$("#list").append("<li>새로 추가된 아이템!</li>"); // id list요소 마지막에 새롭게 추가
$("#list").prepend("<li>새로 추가된 아이템!</li>"); // id list요소 처음에 새롭게 추가
$("<li>새로 추가된 아이템!</li>").appendTo("#list"); // id list요소 마지막에 새롭게 추가
$("<li>새로 추가된 아이템!</li>").prependTo("#list"); // id list요소 처음에 새롭게 추가
```

.before() : 선택한 요소의 바로 앞에 새로운 요소나 콘텐츠 추가  
.after() : 선택한 요소의 바로 뒤에 새로운 요소나 콘텐츠 추가  
.insertBefore() : before()에서 소스와 대상이 반대(앞에추가)  
.insertAfter() : after()에서 소스와 대상이 반대(뒤에추가)  

``` js
$("#list").before("<li>새로 추가된 아이템!</li>"); // id list요소 바로 앞에 새롭게 추가
$("#list").after("<li>새로 추가된 아이템!</li>"); // id list요소 바로 뒤에 새롭게 추가
$("<li>새로 추가된 아이템!</li>").insertBefore("#list"); // id list요소 바로 앞에 새롭게 추가
$("<li>새로 추가된 아이템!</li>").insertAfter("#list"); // id list요소 바로 뒤에 새롭게 추가
```

.wrap() : 선택한 요소를 포함하는 새로운 요소를 추가  
.wrapAll() : 선택한 모든 요소를 포함하는 새로운 요소를 추가  
.wrapInner() : 선택한 요소에 포함되는 새로운 요소를 추가  

``` js
$(".list").wrap("<div class="wrapper"></div>"); // class가 list요소를 포함하여 새롭게 요소를 추가
// 즉 class가 list인 요소 각각 적용됨
$("#list").wrapAll("<div class="wrapper"></div>"); // class가 list인 모든 요소를 포함하여 새롭게 요소를 추가
// 즉 class가 list인 모든 요소를 한번에 적용시킴
$("#list").wrap("<div class="wrapper"></div>"); // class가 list인 요소에 포함되는 새로운 요소를 추가
```

### 요소의 복사 및 삭제
tcpschool.com/jquery/jq_elementManupulating_cloneDelete  

### 요소 탐색
tcpschool.com/jquery/jq_elementTraversing_AncestorTraversing  
기타 탐색 메서드  
tcpschool.com/jquery/jq_elementTraversing_etc  
필터링 메서드  
tcpschool.com/jquery/jq_elementTraversing_filtering

### 요소의 크기
![image](https://user-images.githubusercontent.com/90179555/188545176-e0e899e6-6308-4452-bb13-a3674b026b4c.png)  

### 요소의 위치
https://tcpschool.com/jquery/jq_elementDimension_position  

### 프로퍼티 설정
.css() 메서드 : css스타일을 설정 // camelCase 권장
``` js
$("p").css({
  fontSize: "20px",
  backgroundColor: "yellow"
});
```

.attr() : 선택한 요소집합 첫 번째 요소의 속성을 반환 혹은 전달한 값으로 설정  
.removeAttr() : 지정된 속성 제거  
.prop() : 선택한 요소집합 첫 번째 요소의 프로퍼티 반환 혹은 전달한 값으로 설정  
.removeProp() : 지정된 프로퍼티 제거  

``` js
$("#word").attr("title", "타이틀지정"); // id가 word인 요소에 title속성 부여
$("#word").removeAttr("title"); // title속성 삭제
$("input[value='jquery']").prop({ // input요소 중 value 값이 jquery인 요소를 선택 후
  checked: true // checked property 값을 설정
});
$("input[value='jquery']").removeProp("checked"); // checked property삭제
```

### 클래스 설정

1. addClass() : 클래스 추가
2. removeClass() : 클래스 제거
3. hasClass() : 클래스 확인
4. toggleClass() : 해당 클래스가 존재하면 제거, 존재하지 않으면 생성

### 이벤트, 이벤트 핸들러
이벤트 핸들러를 등록하여 이벤트를 처리함  
  
### 이벤트 연결  
.on() : 특정요소를 이벤트에 바인딩함 
1. 선택한 요소에 어떤 타입이라도 연결 가능  
2. 하나의 이벤트 핸들러에 여러개의 이벤트 동시에 연결 가능  
3. 선택한 요소에 여러개이 이벤트 핸들러와 여러개의 이벤트 같이 연결 가능  
4. 사용자 지정 이벤트를 위해 이벤트 핸들러로 데이터를 넘길 수 있음  
5. 차후에 다루게 될 요소를 이벤트에 연결  

``` js
$("button").on({
  mouseenter: function() {
    $("#text").append("마우스 진입<br>");
  },
  click: function() {
    $("#text").append("마우스 클릭<br>");
  },
  mouseleave: function() {
    $("#text").append("마우스 나감<br>");
  }
});
```

.one() : 이벤트 핸들러가 한번 실행되고 더는 실행되지 않음(1회용)  
.off() : 이벤트와의 연결을 제거함  

### 이벤트 위임
이벤트 위임을 통해 다수의 요소에 공통으로 적용되는 이벤트 핸들러를 공통된 조상 요소에 한번만  
연결하여 동작할 수 있도록 한다.  

``` js
$("ul").on("click", "a", function(e) { // on()메서드는 해당 요소에 첫 번째 인수로 전달받은 이벤트가 전달되었을 때,
                                       // 요소가 두 번째 인수로 전달받은 선택자와 같은지 검사, 같으면 핸들러 실행
  e.preventDefault();
  $("#text").append("링크 동작안함");
});
```

### 이벤트 메서드
tcpschool.com/jquery/jq_event_method  

### 요소의 표시와 숨김
이펙트 효과는 기본 설정으로 사용 가능하며, animate()메서드를 이용하여 변경해서 사용할 수도 있다.  

.hide() : 요소를 순간적으로 사라지게 함 // CSS display 속성이 none으로 설정되어 레이아웃에 영향을 주지않음 
.show() : 나타나게 함

``` js
$("#text).hide(fast); // id가 text인 요소 숨김
$("#text).show(2000); // 밀리초를 넣거나 slow, fast를 넣을 수 있다
$("#text).toggle(2000); // 나타나 있는 상태면 hide, 사라진 상태면 show동작
```

### Fade 효과
CSS opacity 속성값 변경
1. .fadeIn() : 서서히 나타나게 함 // 시간지정 가능  
2. .fadeOut() : 서서히 사라지게 함  // 시간지정 가능  
3. .fadeToggle() : 나타나있는 상태면 fadeIn, 사라진 상태면 fadeOut  // 시간지정 가능  
4. .fadeTo() : opacity 속성값 직접 설정 가능 // 시간지정, opacity값 지정  

### Slide 효과
height 값 빠르게 변화
1. slideUp() : 서서히 올라감  
2. slideDown() : 서서히 내려옴  
3. sildeToggle() : 나타나 있으면 slideUp, 사라진 상태면 slideDown  

### Effect 제어
1. .delay() : 이펙트 효과 사이 지연시간 설정  
2. .stop() : 이펙트 효과 즉시 중지 // 중간에 멈춤  
3. .finish() : 이펙트 효과 즉시 중지 후 큐까지 모두 제거 // 바로 결과로 넘어감  

``` js
$("#divBox").fadeOut(500).delay(1000).fadeIn(2000); // 0.5초에 걸쳐 사라짐, 1초 대기, 2초에 걸쳐 나타남
$("#divBox").stop(); // id가 divBox요소에서 실행중인 모든 이펙트 중지
$("#divBox").finish(); // 즉시 중지 후 큐까지 모두 제거
```

+) jquery.fx 객체  
tcpschool.com/jquery/jq_effect_jqueryfx  
  
### 사용자 정의 이펙트  
.animate() 메서드를 이용하여 원하는 이펙트 효과 정의  
$(선택자).animate(프로퍼티[,지속시간][,시간당속도함수][,콜백함수]);  

``` js
$("#divBox").aniamte(
  {
    left: "+=100", // 오른쪽으로 100px이동
    opacity: 0.2   // 투명도를 0.2로
  }, 500, function() { // 0.5초에 걸쳐
    $("#text").html("사용자 정의 이펙트 실행!"); // 콜백함수는 동작 이후 작동
  }
);
```

그 외 적용 가능 속성들  
tcpschool.com/jquery/jq_effect_customEffect  

### Ajax(Asynchronous JavaScript and XML)
웹페이지를 전부 다시 로딩하는 것이 아닌 일부만 갱신할 수 있도록 해줌  
Ajax 프레임 워크 -> JQuery  

### HTTP 요청 
GET, POST방식 사용  
  
$.get(URL주소[,콜백함수]);  
``` js
$(function() {
  $(#requestBtn").on("click",function() {
    $.get("url...", // url
      { species: "개", name: "복실이", age:4 }, // 서버가 필요한 정보를 같이 보냄
      function() { // 콜백함수
        $("#text").html(data + "<br>" + status);
      }
    );
  });
});
```
$.post(URL주소[,데이터][,콜백함수]); // 형식은 get과 유사  

### ajax()메서드  
$.ajax(URL주소[,옵션]);  
``` js
$.ajax({
  url: "url", // 요청할 url
  data: { name: "홍길동" }, // 요청과 함께 보낼 데이터
  method: "GET" // 요청방식 or POST
  dataType: "json" // 서버에서 보내줄 데이터 타입
})
.done(function(json) { // 요청 성공 시 실행
  $("<h1>").text(json.title).appendTo("body");
  $<"<div class=\"content\">").html(json.html).appendTo("body");
})
.fail(function(xhr, status, errorThrown) { // 요청 실패 시 관련된 정보가 전달됨
  $("#text").html("오류 발생<br>")
  .append("오류명: " + errorThrown + "<br>")
  .append("상태: " + status);
})
.always(function(xhr, status) { // 성공 여부와 관계없이 항상 실행
  $("#text").html("요청 완료<br>");
});
```

### load 메서드
선택한 요소에서 호출하는 유일한 JQuery 메서드  
load는 서버에서 데이터를 읽은 후 읽어들인 HTML 코드를 선택한 요소에 배치  
URL과 선택자를 같이 전송하면, HTML코드 중 선택자와 일치하는 요소만 배치함  

``` js
$(function() {
  $("#requestBtn").on("click", function() {
    $("#list").load("url li"); // url 주소에 존재하는 HTML코드에서 li와 일치하는 요소를 읽어 list요소에 배치
  });
});
```

+) 추가적인 Ajax 메서드
tcpschool.com/jquery/jq_ajax_method  

### Ajax와 Form 요소  
Ajax는 비동기 통신을 위해 form으로 입력받은 데이터를 직렬화 하여 전송함
.serialize() : HTML form 요소를 통해 입력된 데이터를 쿼리 문자열로 변환
.serializeArray() : 문자열이 아닌 배열 객체로 변환
``` js
$(function() {
  $("form").on("submit", function(e) { // form요소의 submit 이벤트 발생 시
    event.preventDefault();  // 예시를 위해 서버 전송을 막고
    $("#text").html($(this).serialize()); // 데이터를 직렬화 하여 나타냄
  });
});
```

### 타입 검사 메서드
tcpschool.com/jquery/jq_utilityMethod_isMethod  
### 그외 기타 유틸리티 메서드  
tcpschool.com/jquery/jq_utilityMethod_ectMethod  
