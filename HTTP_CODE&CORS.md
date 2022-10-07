# HTTP Status Code  
자주쓰이는 코드 위주로 정리   
   
## 100번대 
1xx informational response(조건부 응답)   
전송 프로토콜 수준의 정보 교환   
   
### 100 Continue(계속)
임시응답으로 지금까지 상태가 괜찮으며   
계속 요청하거나 완료한 경우에는 무시해도 됨을 알려줌   
   
### 101 Switching Protocol(프로토콜 전환)
클라이언트가 보낸 Upgrade요청 헤더에 대한 응답으로   
서버에서 프로토콜을 변경할 것임을 알려줌   

### 102 Processing(처리, WebDAV)
서버가 요청을 수신하였으며   
처리하고 있지만, 아직 응답을 줄 수 없음을 알림   
   
### 103 Early Hints(사전 도움)
주로 Link헤더와 함께 사용되어 서버가 응답을 준비하는 동안   
에이전트(User agent)가 사전 로딩(preloading)을 시작하도록 함   

## 200번대
2xx Success(성공)   
클라이언트 요청이 성공적으로 수행   
   
### 200 OK(성공)
요청이 성공적으로 성공함   
의미는 HTTP메서드에 따라 달라짐   
GET: 리소스를 불러와 메시지 바디에 전송   
HEAD: 개체 헤더가 메시지 바디에 존재   
PUT, POST: 수행 결과에 대한 미시지 바디에 전송   
DELETE: 삭제를 수행했고 응답 메시지가 이후 상태를 설명   
TRACE: 메시지 바디는 서버에서 수신한 요청 메시지를 포함   
   
### 201 Created(작성됨)   
요청이 성공적 + 결과로 새로운 리소스가 생성   
일반적으로 POST요청이나 PUT 요청 이후에 따라옴   
   
   
### 202 Accepted(허용됨)
요청을 수신하였지만 그에 응하여 행동할 수 없음   
즉, 서버가 요청을 접수했지만 아직 처리하지 않음   
   
### 203 Non_Authoritative Information(신뢰할 수 없는 정보)
돌려받은 메타 정보셋이 오리진 서버의 것과 일치하지 않지만   
로컬이나 서드 파티 복사본에서 모아졌음을 의미함   
이는 반드시 200 OK 응답을 반드시 우선함  

### 204 No Content(내용없음)
요청에 대해서 보내줄 수 있는 콘텐츠가 없지만   
헤더는 의미있을 수 있음   
   
## 300번대
3xx Redirection(리다이렉션, 경로 재지정)   
클라이언트가 요청을 완료하기 위해서 추가 조취를 취해야 함   
   
### 301 Moved Permanently(영구적 이동)
요청한 리소스의 URI가 변경되었음을 의미   
   
### 304 Not Modified(변경 없음)
캐시를 목적으로 사용   
클라이언트에 응답이 수정되지 않았음을 알려줌   
   
## 400번대
Client Error(클라이언트 오류)   
   
### 400 Bad Request(잘못된 요청)
잘못된 문법으로 인하여 서버가 요청을 이해할 수 없음을 의미   
   
### 401 Unauthorized(권한 없음)
의미상 비인증(Unauthenticated)을 의미함   
클라이언트는 요청한 응답을 받기 위해 스스로를 인증해야 함   
로그인을 실패한 경우 또는 로그인하지 않은 사용자가 사용하려 할 때 사용   
   
### 403 Forbidden(접근 금지)
클라이언트가 콘텐츠에 접근할 권리를 가지고 있지 않음   
예로 로그인은 했지만 결제를 하지 않아 이용할 수 없는 경우   
401과 다른점은 서버가 클라이언트가 누구인지 알고 있음   

### 404 Not Found(찾을 수 없음)
서버가 요청받은 리소스를 찾을 수 없음   
브라우저에서 알려지지 않은 URL을 의미   
API에서 종점(URI)는 적절하지만 리소스 자체는 존재하지 않음을 의미할 수도 있음   
서버는 인증받지 않은 클라이언트로부터 리소스를 숨기기 위해 403 대신 전송할 수도 있음   
가장 자주 볼 수 있는 코드   
   
### 405 Method Not Allowed(허용되지 않은 메서드)
요청에 지정된 메서드가 URI로 표시된 리소스에 허용되지 않음을 의미   
클라이언트가 조회만 제공하는 컬렉션에 POST, PUT, DELETE를 이용하여 변경하려는 경우일 수 있음   
   
### 408 Request Timeout(요청 시간 초과)
응답을 요청한지 시간이 오래된 연결에 전송   
서버가 사용되지 않은 연결을 끊고 싶어하는 것을 의미   
일부 서버는 메시지를 보내지 않고 끊기도 함   
   
## 500번대
5xx Server Error(서버 오류)   
   
### 500(내부 서버 오류)
서버에 오류가 발생하여 요청을 수행할 수 없음   
   
### 501(구현되지 않음)
서버에 요청을 수행할 수 있는 기능이 없음   
서버가 요청 메소드를 인식하지 못할 때 이 코드 표시   
   
### 502 Bad Gateway(불량 게이트웨이)
서버가 게이트웨이나 프록시 역할을 하고 있거나   
또는 업스트림 서버에서 잘못된 응답을 받음   
   
### 503(서비스를 사용할 수 없음)
서버가 오버로드 되었거나 유지관리를 위해 다운되었기 때문에   
서버를 이용할 수 없음   
일반적으로 일시적인 상태   
   
### 504(게이트웨이 시간초과)
서버가 게이트웨이나 프록시 역할을 하고 있거나   
업스트림 서버에서 제때 요청을 받지 못함   

   
# CORS(Cross-Origin Resource Sharing) 정책
교차 출처 리소스 공유   
서로 다른 출처를 가진 리소스를 안전하게 사용하게 함   
   
## CORS의 동작
웹 클라이언트는 어플리케이션이 다른 출처의 리소스를 요청할 때 HTTP프로토콜을 이용하여 요청   
이 때, 브라우저는 요청 헤더에 Origin이라는 필드에 요청을 보내는 출처를 함께 담아 보냄   
``` http
Origin: https://~
```
이후 서버가 이 요청에 대해 응답할 때 응답 헤더의 Access-Control-Allow-Origin이라는 값에   
"이 리소스를 접근하는 것이 허용된 출처"를 내리고   
이후 브라우저는 자신이 보냈던 요청의 Origin과 서버가 보내준 응답의 Access-Control-Allow-Origin을 비교한 후   
응답이 유요한지 판단함   
   
## Preflight Request
Preflight방식은 일반적으로 웹 어플리케이션을 개발할 때 가장 많이 마주치는 시나리오   
이 방식은 본 요청과 예비 요청을 나누어 서버에 전송   
여기서 예비요청을 Preflight라고 부름   
   
예비요청에는 OPTIONS메서드를 사용함   
예비요청의 역할은 본 요청 전 브라우저 스스로 요청이 안전한지 확인하는 것   
   
만약 JS로 fetch API를 사용하여 브라우저에 리소스를 받아오라고 한다면   
브라우저는 서버에 예비 요청을 보내고   
서버는 응답으로 어떤것들을 허용하고 금지하는지에 대해 응답헤더에 담아 반환함   
   
이후 브라우저는 자신이 보낸 예비요청과 서버응답의 허용정책과 비교한 뒤   
요청을 보내는 것이 안전하다고 판단되면 본 요청을 보내게 됨   
이후 본 요청의 응답을 JS에 넘겨줌   
``` http
// 서버가 OPTIONS의 응답으로  
HTTP/1.1 200 OK
Date: Mon, 01 Dec 2008 01:15:39 GMT
Server: Apache/2.0.61 (Unix)
Access-Control-Allow-Origin: http://foo.example
Access-Control-Allow-Methods: POST, GET, OPTIONS
Access-Control-Allow-Headers: X-PINGOTHER, Content-Type
Access-Control-Max-Age: 86400
Vary: Accept-Encoding, Origin
Content-Encoding: gzip
Content-Length: 0
Keep-Alive: timeout=2, max=100
Connection: Keep-Alive
Content-Type: text/plain
```
여기서 요청한 출처의 Origin값과 응답의 Access-Control-Allow-Origin값이   
다르다면 서버에서 허용한 출처와 다르다는 의미로   
CORS정책을 위반했다고 판단함   
이는 정상적으로 200 Code가 반환되지만 이와는 별개의 문제임   
   
## Simple Request
예비요청을 보내지 않고 바로 서버에게 본 요청을 보내는 방식   
이후 응답 헤더에 Access-Control-Allow_origin값과 비교하여 CORS 정책 위반 여부를 검사   
이는 특정 조건을 만족하는 경우에만 예비요청을 생략할 수 있음   

### 조건
1. 요청의 메서드는 GET, HEAD, POST중 하나   
2. Accept, Accept-Language, Content-Language, Content-Type, DPR, Downlink, Save-Data, Viewport-Width, Width   
를 제외한 헤더를 사용하면 안됨   
3. 만약 Content-Type을 사용하는 경우 application/x-www-form-urlencoded, multipart/form-data, text/plain 만 허용   
일반적으로 흔한 상황은 아니고 만족하기 어려움   

## Credentialed Request
인증된 요청을 사용하는 방법   
다른 출처 간 통신에 보안을 강화하고 싶을 때 사용하는 방식   
요청에 인증과 관련된 정보를 담을 수 있게 해주는 옵션(credentials)사용   
   
### 옵션 종류
1. same-origin(Default): 같은 출처 간 요청에만 인증 정보를 담을 수 있음
2. include: 모든 요청에 인증 정보를 담을 수 있음
3. omit: 모든 요청에 인증 정보를 담지 않음   
여기서 1, 2번 옵션을 사용한다면 Access-Control-Allow-Origin외에 더 많은 검사를 
