<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顧客管理システム</title>
</head>
<body>
    <form action="my_page" method="post">
    <?php echo csrf_field(); ?>
    <table>    
        <tr>
            <td>趣味</td>
            <td><input type="text" name="hobby" id="" value=<?php echo e($hobby); ?>></td>
            
        </tr>
        <tr>
            <td>その他</td>
            <td><input type="text" name="other" id="" value=<?php echo e($other); ?>></td>
            
        </tr>
        <tr><td><input type="submit" value="変更する"></td></tr>
    </table>    
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\customer_management_system\resources\views/customer_update.blade.php ENDPATH**/ ?>