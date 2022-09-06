# jQuery, PHP  

## jQuery

제이쿼리는 자바스크립트 언어를 간편하게 사용할 수 있도록 한 자바스크립트 라이브러리  
DOM이벤트 처리와 Ajax응용 프로그램 및 플러그인 활용가능

### jQuery 기본문법

``` jquery
$(선택자).동작함수()
```
$는 jQuery를 의미하고 접근가능하게 해주는 식별자  
선택자를 이용하여 HTML요소를 선택하고 동작함수를 정의하여 선택된 요소에 동작을 설정  

일반적으로 JS코드는 웹 브라우저가 문서의 모든 요소를 로드한 후에 실행되어야 함  
따라서 JQuery는 이와같이 제공함  
``` jquery
$(document).ready(function() {
  ...
} // 문서가 모두 로드되면 실행

$(window).load(function() {
  ...
} // 창이 모두 로드되면 실행
```

jQuery는 CSS선택자나 id, class를 사용하여 HTML요소를 선택할 수 있음  
JS의 getElementsByTagName(), getElementsById(), getElementsByClassName() 메서드와 같은 동작
``` jquery
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
``` jquery
$(function() {
  $("p").on("click", function() {
    $("img[alt='flower']").attr("src","url"); // alt가 flower인 이미지의 속성 src를 바꿈
  });
});
```

제이쿼리는 비표준 선택자도 사용할 수 있음  
요소를 변수에 담고 필터링도 가능함  
``` jquery
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

``` jQuery
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

```
$("#list").append("<li>새로 추가된 아이템!</li>"); // id list요소 마지막에 새롭게 추가
$("#list").prepend("<li>새로 추가된 아이템!</li>"); // id list요소 처음에 새롭게 추가
$("<li>새로 추가된 아이템!</li>").appendTo("#list"); // id list요소 마지막에 새롭게 추가
$("<li>새로 추가된 아이템!</li>").prependTo("#list"); // id list요소 처음에 새롭게 추가
```

.before() : 선택한 요소의 바로 앞에 새로운 요소나 콘텐츠 추가  
.after() : 선택한 요소의 바로 뒤에 새로운 요소나 콘텐츠 추가  
.insertBefore() : before()에서 소스와 대상이 반대(앞에추가)  
.insertAfter() : after()에서 소스와 대상이 반대(뒤에추가)  

```
$("#list").before("<li>새로 추가된 아이템!</li>"); // id list요소 바로 앞에 새롭게 추가
$("#list").after("<li>새로 추가된 아이템!</li>"); // id list요소 바로 뒤에 새롭게 추가
$("<li>새로 추가된 아이템!</li>").insertBefore("#list"); // id list요소 바로 앞에 새롭게 추가
$("<li>새로 추가된 아이템!</li>").insertAfter("#list"); // id list요소 바로 뒤에 새롭게 추가
```

.wrap() : 선택한 요소를 포함하는 새로운 요소를 추가  
.wrapAll() : 선택한 모든 요소를 포함하는 새로운 요소를 추가  
.wrapInner() : 선택한 요소에 포함되는 새로운 요소를 추가  

```
$(".list").wrap("<div class="wrapper"></div>"); // class가 list요소를 포함하여 새롭게 요소를 추가
// 즉 class가 list인 요소 각각 적용됨
$("#list").wrapAll("<div class="wrapper"></div>"); // class가 list인 모든 요소를 포함하여 새롭게 요소를 추가
// 즉 class가 list인 모든 요소를 한번에 적용시킴
$("#list").wrap("<div class="wrapper"></div>"); // class가 list인 요소에 포함되는 새로운 요소를 추가
```
