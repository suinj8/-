# YESFORM STUDY

## 주석
```
HTML : <!-- 주석 -->
CSS : /* 주석 */
JS, PHP : //주석 or /* 주석 */
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
```
<link rel="stylesheet" href="문서경로">
```

### Selector
```
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

```
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

```
의사클래스
button:hover {
  color:blue;
}
```
마우스를 버튼에 올렸을 때만 파란색으로 바뀜

```
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
