<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"
             integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
             crossorigin="anonymous"></script>
        
        <title>登入</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
                   html, body {
                color: #000000;
                font-family: 'Microsoft JhengHei','Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
               
            }
            .content {
                font-weight:bold;
                text-align: center;
                padding-top:50px;
                
            }         
            input{
                margin:20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">         
            <div class="content"> 
                <h1>登入</h1>               
                    <div class="register m-b-md">
                    請輸入帳號：<input id="account" type="text"/>
                    <br/>                    
                    請輸入密碼：<input id="password" type="text"/>
                    <br/>                                
                    <button onclick="login()">登入</button>
                    </div>               
            </div>
        </div>
    </body>
    <script>
         $(document).ready(function () {
             if(localStorage.getItem("token")){
                 alert("您已登入！")
                 window.location.href = "http://127.0.0.1/web/public/";
             }else{
                 return 0;
             }
         })       
         function login(){
            var account=$("#account").val();
            var password=$("#password").val();              
            $.ajax({
            url: 'http://127.0.0.1/web/public/api/login', 
            type: 'POST',                                            
            data: {
                "account":account,                                           
                "password":password,   
            },                                    
            dataType: 'json',                                      
            success: function(data){                                
                localStorage.setItem("token",data)              
            },
            statusCode: {   
                200: function(res) {
                    console.log(res);
                    alert( "登入成功" );
                    window.location.href = "http://127.0.0.1/web/public/comment";
                },                                       
                400: function(res) {
                console.log(res.responseJSON[0]);
                alert( res.responseJSON[0]);
                }
            }
            })}
        </script>
</html>
