<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>顧客管理システム</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                
                margin: 0;
            }

            a{
                text-decoration: none;
            }

            

            .flex-center {
                text-align: center;
            }

            

           
            .title {
                font-size: 60px;
            }

            .m-b-md {
                margin-top: 220px;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    顧客管理システム
                </div>
                <div class="operater_or_customer">
                    <a href="operater_index">管理者用画面/顧客用画面へ</a>
                </div>
               
            </div>
        </div>
    </body>
</html>
