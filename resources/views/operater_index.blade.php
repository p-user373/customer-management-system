<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顧客管理システム</title>
    <style>
        .detail{
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
</head>
<body>
    <div class="o_name">管理者さんのページ</div>
    <div class="logout">
        
    
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    
    </div>
    <div class="search">
        <div class="search_title">顧客情報を検索する</div>
        <form action="operater_index" method="post">
        @csrf    
            <label for="">顧客の名前から検索(部分検索可)
                <input type="search" name="search_customer_name" id="" value="{{$search_customer_name}}">
            </label>
            <label for="">性別から絞り込む
                <select name="search_gender" id="">
                    @if($search_gender==1)
                    <option value="0">両方</option>
                    <option value="1" selected>男性</option>
                    <option value="2">女性</option>
                    @elseif($search_gender==2)
                    <option value="0" selected>両方</option>
                    <option value="1">男性</option>
                    <option value="2" selected>女性</option>
                    @else
                    <option value="0" selected>両方</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    @endif
                </select>
            </label>
            <input type="submit" value="検索">
        </form>
    </div> 
    <div class="register">
        <a href="register_customer">新規顧客情報を登録する</a>
    </div>
    <div class="customer_information">
        

        

        @foreach($customer_datas as $customer_data)
        <table>
        <div class="short">
            <tr>
                <td>{{$customer_user_id=$customer_data->customer_user_id}}.</td>
                <td>{{$customer_data->user_name}}</td>
                <td><a href="operater_update_customer?customer_id={{$customer_user_id}}">編集</a></td>
                <td class="show {{$customer_user_id}}_show">詳細を表示/非表示</td>
                <td><a href="operater_message?customer_id={{$customer_user_id}}">メッセージ</a></td>
            </tr>
        </div>
        </table>    
        <table class="detail {{$customer_user_id}}_detail">
        <tr>
            <td>名前:</td>
            <td>{{$customer_data->user_name}}</td>
            <td> 
            @if($customer_data->name_number==1)
                顧客用画面にて非表示
            @endif
            </td>
        </tr>
        <tr>
            <td>メールアドレス:</td>
            <td>{{$customer_data->email}}</td>
            <td>
                @if($customer_data->email_number==1)
                    顧客画面にて非表示
                @endif
            </td>
        </tr>
        <tr>
            <td>パスワード:</td>
            <td>{{$customer_data->password}}</td>
            <td>
                @if($customer_data->password_number==1)
                    顧客画面にて非表示
                @endif
            </td>
        </tr>
        <tr>
            <td>性別:</td>
            <td>
                @if($customer_data->gender==1)
                    男性    
                @else
                    女性
                @endif
            </td>
            <td>
                @if($customer_data->gender_number==1)
                    顧客画面にて非表示
                @endif
            </td>
        </tr>
        <tr>
            <td>画像:</td>
            <td><img src="storage/{{$customer_data->image}}" alt=""></td>
            <td>
                @if($customer_data->image_number==1)
                    顧客画面にて非表示
                @endif
            </td>
        </tr>
        <tr>
            <td>住所:</td>
            <td>{{$customer_data->address}}</td>
            <td>
                @if($customer_data->address_number==1)
                    顧客画面にて非表示
                @endif
            </td>
        </tr>
        <tr>
            <td>趣味:</td>
            <td>{{$customer_data->hobby}}</td>
            <td>
                @if($customer_data->hobby_number==1)
                    顧客画面にて非表示
                @endif
            </td>
        </tr>
        <tr>
            <td>その他:</td>
            <td>{{$customer_data->other}}</td>
            <td>
                @if($customer_data->other_number==1)
                    顧客画面にて非表示
                @endif
            </td>
        </tr>
        <tr>
            <td>対応履歴:</td>
            <td>{{$customer_data->correspond}}</td>
            <td>
                @if($customer_data->correspond_mail_number==1)
                    顧客へ公開
                @endif
            </td>
            <td>
                @if($customer_data->correspond_public_number==1)
                    顧客へメール送信
                @endif
            </td>
        </tr>
        <tr>
            <td>お知らせ:</td>
            <td>{{$customer_data->information}}</td>
            <td>
                @if($customer_data->information_public_number==1)
                    顧客へ公開
                @endif
            </td>
            <td>@if($customer_data->information_mail_number==1)
                    顧客へメール送信
                @endif
            </td>
        </tr>
    </table>
    <script>
        $(function(){
            $(".{{$customer_user_id}}_show").click(function(){
                $(".{{$customer_user_id}}_detail").toggle();
            });
        });
        
        
    </script>
        @endforeach
    </div>
</body>
</html>