<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顧客管理システム</title>
    
</head>
<body>
    <div class="message"><a href="customer_message">メッセージ</a></div>
    <div class="logout">
        
    
        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            <?php echo e(__('Logout')); ?>

        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>

    </div>
    <table>
     
        <?php if($customer_data->name_number!==1): ?>
        <tr>
            <td>名前:</td>
            <td><?php echo e($customer_data->user_name); ?></td>
        </tr>
        <?php endif; ?>
        <?php if($customer_data->email_number!==1): ?>
        <tr>
            <td>メールアドレス:</td>
            <td><?php echo e($customer_data->email); ?></td>
            
        </tr>
        <?php endif; ?>
        <?php if($customer_data->password_number!==1): ?>
        <tr>
            <td>パスワード:</td>
            <td><?php echo e($customer_data->password); ?></td>
            
        </tr>
        <?php endif; ?>
        <?php if($customer_data->gender_number!==1): ?>
        <tr>
            <td>性別:</td>
            <td>
                <?php if($customer_data->gender==1): ?>
                    男性    
                <?php else: ?>
        
                女性
                <?php endif; ?>
            </td>
            
        </tr>
        <?php endif; ?>
        <?php if($customer_data->image_number!==1): ?>
        <tr>
            <td>画像:</td>
            <td><img src="storage/<?php echo e($customer_data->image); ?>" alt=""></td>
            
        </tr>
        <?php endif; ?>
        <?php if($customer_data->address_number!==1): ?>
        <tr>
            <td>住所:</td>
            <td><?php echo e($customer_data->address); ?></td>
            
        </tr>
        <?php endif; ?>
        <?php if($customer_data->hobby_number!==1): ?>
        <tr>
            <td>趣味:</td>
            <td><?php echo e($customer_data->hobby); ?></td>
            <td><a href="customer_update">変更する</a></td>
        </tr>
        <?php endif; ?>
        <?php if($customer_data->other_number!==1): ?>
        <tr>
            <td>その他:</td>
            <td><?php echo e($customer_data->other); ?></td>
            <td><a href="customer_update">変更する</a></td>
        </tr>
        <?php endif; ?>
        <?php if($customer_data->correspond_mail_number==1): ?>
        <tr>
            <td>対応履歴:</td>
            <td><?php echo e($customer_data->correspond); ?></td>
        </tr>
        <?php endif; ?>
        <?php if($customer_data->information_public_number==1): ?>
        <tr>
            <td>お知らせ:</td>
            <td><?php echo e($customer_data->information); ?></td>
        </tr>
        <?php endif; ?>
    </table>    
</body>
</html><?php /**PATH C:\xampp\htdocs\customer_management_system\resources\views/my_page.blade.php ENDPATH**/ ?>