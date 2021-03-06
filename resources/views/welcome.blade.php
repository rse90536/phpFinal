<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"
             integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
             crossorigin="anonymous"></script>
        <title>首頁</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
          html, body {
              background-color: #fff;
              color: #636b6f;
              font-family: 'Microsoft JhengHei','Raleway', sans-serif;
              font-weight: 500;
              height: 100vh;
              margin: 0;
          }

          .full-height {
              height: 100vh;
          }

          .flex-center {
              align-items: center;
              display: flex;
              justify-content: center;
          }

          .position-ref {
              position: relative;
          }

          .top-right {
              position: absolute;
              right: 10px;
              top: 18px;
          }

          .title {
              font-size: 60px;
          }

          .links > a {
              color: #636b6f;
              padding: 0 25px;
              font-size: 12px;
              font-weight: 600;
              letter-spacing: .1rem;
              text-decoration: none;
              text-transform: uppercase;
          }
      </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">                               
            <div class="content">
            <div class="title">
                歡迎來到Laravel留言板                
            </div>
            <br/>
                <a href="{{ url('/login') }}">登入</a>
                    /
                <a href="{{ url('/register') }}">註冊</a>
                    /
                <a href="{{ url('/comment') }}">留言</a>
                    /
                <a href="{{ url('/getComment') }}">查看留言</a>
                    /
                <a onclick="logout()">登出</a>
            </div>
        </div>
    </body>
    <script> 
         var token = localStorage.getItem("token");  
         function logout(){                       
            $.ajax({
            url: 'http://127.0.0.1/web/public/api/logout',
            headers: {
            'Authorization': `Bearer ${token}`,
            }, 
            type: 'POST',                                                                             
            dataType: 'json',                                      
            statusCode: {   
                200: function(res) {
                    console.log(res);
                    alert( res );
                    localStorage.clear();
                },                                       
                400: function(res) {
                console.log(res.responseJSON[0]);
                alert( res.responseJSON[0]);
                }
            }
            })}
        </script>
</html>
