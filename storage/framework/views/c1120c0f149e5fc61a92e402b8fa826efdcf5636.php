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
        <form action="operater_message?customer_id=<?php echo e($customer_id); ?>" method="post">
        <?php echo csrf_field(); ?>
            <input type="text" name="message">
            <input type="submit" value="送信する">    
        </form>
    </div>
    <div class="message_list">
    <div class="message_list1">
        <?php $__currentLoopData = $message_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table>
        
            <tr>
                <td><?php echo e($message->name); ?></td>
                <td>→</td>
                
            </tr>
        </table>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="message_list2">
        <?php $__currentLoopData = $message_list_to_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message_to): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table>
            <tr>
                <td><?php echo e($message_to->name); ?></td>
                <td><?php echo e($message_to->created_at); ?></td>
                <td><?php echo e($message_to->message); ?></td>
            </tr>
        </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\customer_management_system\resources\views/operater_message.blade.php ENDPATH**/ ?>