<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顧客管理システム</title>
    <style>
        .message_list{
            display: flex;
        }
    </style>
</head>
<body>
    <div class="send">
        <form action="customer_message" method="post">
        @csrf
            <input type="text" name="message">
            <input type="submit" value="送信する">    
        </form>
    </div>
    <div class="message_list">
    <div class="message_list1">
        @foreach($message_list as $message)
        <table>
        
            <tr>
                <td>{{$message->name}}</td>
                <td>→</td>
                
            </tr>
        </table>    
        @endforeach
    </div>
    <div class="message_list2">
        @foreach($message_list_to_id as $message_to)
        <table>
            <tr>
                <td>{{$message_to->name}}</td>
                <td>{{$message_to->created_at}}</td>
                <td>{{$message_to->message}}</td>
            </tr>
        </table>
        @endforeach
    </div>
    </div>
</body>
</html>