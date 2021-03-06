<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"
             integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
             crossorigin="anonymous"></script>
        
        <title>留言區</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
             html, body {
                background-color:#61C595;
                color: #E3DB64;
                font-family: 'Microsoft JhengHei','Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .content {
                font-weight:bold;
                text-align: center;
                padding-top:50px;
                
            }         
            input{
                margin:5px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">         
            <div class="content"> 
                <h1>開始留言</h1>               
                    <div class="register m-b-md"> 
                    <a href="{{ url('/') }}">回到首頁<a> <br>                                    
                    要留言的內容：<input id="comment" type="textarea"/>
                    <br/>                                
                    <button onclick="comment()">送出</button>
                    </div>               
                    <div class="register m-b-md">                                     
                    <a href="{{ url('/getComment') }}">去留言板看看~</a>
                    <br/>                        
                    </div>               
            </div>
        </div>
    </body>
    <script> 
         var token = localStorage.getItem("token");  
         function comment(){
            var content=$("#comment").val();                          
            $.ajax({
            url: 'http://127.0.0.1/web/public/api/comment',
            headers: {
            'Authorization': `Bearer ${token}`,
            }, 
            type: 'POST',                                            
            data: {
                "content":content,                                           
            },                                    
            dataType: 'json',                                      
            statusCode: {   
                200: function(res) {
                    console.log(res);
                    alert( "留言成功" );
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
