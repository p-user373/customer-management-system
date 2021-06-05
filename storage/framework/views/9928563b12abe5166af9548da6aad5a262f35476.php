<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顧客管理システム</title>
    <style>
        .message{
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <form action="operater_index" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <table>
        <tr>
            <td>名前</td>
            <td><input type="text" name="customer_name" id="" required></td>
            <td><label for="name"><input type="checkbox" name="name_number" id="name" value=1>非表示にする</label></td>
        </tr>
        <?php $__errorArgs = ["customer_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <tr>
            <td class="message"><?php echo e($message); ?></td>
        </tr>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <tr>
            <td>メールアドレス</td>
            <td><input type="text" name="email" id=""></td>
            <td><label for="email"><input type="checkbox" name="email_number" id="email" value=1>非表示にする</label></td>
        </tr>
        <?php $__errorArgs = ["email"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <tr>
            <td class="message"><?php echo e($message); ?></td>
        </tr>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <tr>
            <td>パスワード</td>
            <td><input type="text" name="password" id=""></td>
            <td><label for="password"><input type="checkbox" name="password_number" id="password" value=1>非表示にする</label></td>
        </tr>
        <?php $__errorArgs = ["password"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <tr>
            <td class="message"><?php echo e($message); ?></td>
        </tr>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <tr>
            <td>性別</td>
            <td>
                <select name="gender" id="">
                    <option value="1"　selected>男性</option>
                    <option value="2">女性</option>
                </select>
            </td>
            <td><label for="gender"><input type="checkbox" name="gender_number" id="gender" value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>画像</td>
            <td><input type="file" name="image" id=""></td>
            <td><label for="image"><input type="checkbox" name="image_number" id="image" value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>住所</td>
            <td><input type="text" name="address" id=""></td>
            <td><label for="address"><input type="checkbox" name="address_number" id="address" value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>趣味</td>
            <td><input type="text" name="hobby" id=""></td>
            <td><label for="hobby"><input type="checkbox" name="hobby_number" id="hobby" value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>その他</td>
            <td><input type="text" name="other" id=""></td>
            <td><label for="other"><input type="checkbox" name="other_number" id="other" value=1>非表示にする</label></td>
        </tr>
        <tr>
            <td>対応履歴</td>
            <td><input type="text" name="correspond" id=""></td>
            <td><label for="correspond_public_number"><input type="checkbox" name="correspond_public_number" id="correspond_public_number" value=1 checked="checked">公開</label></td>
            <td><label for="correspond_mail_number"><input type="checkbox" name="correspond_mail_number" id="correspond_mail_number" value=1 checked="checked">メール送信</label></td>
        </tr>
        <tr>
            <td>お知らせ</td>
            <td><input type="text" name="information" id=""></td>
            <td><label for="information_public_number"><input type="checkbox" name="information_public_number" id="information_public_number" value=1 checked="checked">公開</label></td>
            <td><label for="information_mail_number"><input type="checkbox" name="information_mail_number" id="information_mail_number" value=1 checked="checked">メール送信</label></td>
        </tr>
        <tr><td><input type="submit" value="登録する"></td></tr>
    </table>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\customer_management_system\resources\views/register_customer.blade.php ENDPATH**/ ?>