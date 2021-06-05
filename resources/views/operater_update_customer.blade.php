<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顧客管理システム</title>
</head>
<body>
    <form action="operater_update_customer" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>名前</td>
            <td><input type="text" name="customer_name" id="" value="{{$customer_name}}" required></td>
            <td><label for="name"><input type="checkbox" name="name_number" id="name" @if($name_number==1) checked="checked" @endif value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td>{{$email}}</td>
            <td><label for="email"><input type="checkbox" name="email_number" id="email" @if($email_number==1) checked="checked" @endif value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>パスワード</td>
            <td><input type="text" name="password" id="" value="{{$password}}"></td>
            <td><label for="password"><input type="checkbox" name="password_number" id="password" @if($password_number==1) checked="checked" @endif value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>性別</td>
            <td>
                <select name="gender" id="">
                    @if($gender==1)
                        <option value="1" selected>男性</option>
                        <option value="2">女性</option>
                    @else
                        <option value="1">男性</option>
                        <option value="2" selected>女性</option>
                    @endif    
                </select>
            </td>
            <td><label for="gender"><input type="checkbox" name="gender_number" id="gender" @if($gender_number==1) checked="checked" @endif value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>画像</td>
            <td><img src="storage/{{$image}}" alt=""></td>
            <td><div>別の画像に変更する</div><input type="file" name="image" id=""></td>
            <td><label for="image"><input type="checkbox" name="image_number" id="image" @if($image_number==1) checked="checked" @endif value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>住所</td>
            <td><input type="text" name="address" id="" value="{{$address}}"></td>
            <td><label for="address"><input type="checkbox" name="address_number" id="address" @if($address_number==1) checked="checked" @endif value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>趣味</td>
            <td><input type="text" name="hobby" id="" value="{{$hobby}}"></td>
            <td><label for="hobby"><input type="checkbox" name="hobby_number" id="hobby" @if($hobby_number==1) checked="checked" @endif value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>その他</td>
            <td><input type="text" name="other" id="" value="{{$other}}"></td>
            <td><label for="other"><input type="checkbox" name="other_number" id="other" @if($other_number==1) checked="checked" @endif value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>対応履歴</td>
            <td><input type="text" name="correspond" id="" value="{{$correspond}}"></td>
            <td><label for="correspond_public_number"><input type="checkbox" name="correspond_public_number" id="correspond_public_number" @if($correspond_mail_number==1) checked="checked" @endif value=1>公開</label></td>
            <td><label for="correspond_mail_number"><input type="checkbox" name="correspond_mail_number" id="correspond_mail_number" @if($correspond_public_number==1) checked="checked" @endif value=1>メール送信</label></td>
        </tr>
        <tr>
            <td>お知らせ</td>
            <td><input type="text" name="information" id="" value="{{$information}}"></td>
            <td><label for="information_public_number"><input type="checkbox" name="information_public_number" id="information_public_number" @if($information_public_number==1) checked="checked" @endif value=1>公開</label></td>
            <td><label for="information_mail_number"><input type="checkbox" name="information_mail_number" id="information_mail_number" @if($information_mail_number==1) checked="checked" @endif value=1>メール送信</label></td>
        </tr>
        <tr><td><input type="submit" value="変更する"></td></tr>
    </table>
    </form>
</body>
</html>
