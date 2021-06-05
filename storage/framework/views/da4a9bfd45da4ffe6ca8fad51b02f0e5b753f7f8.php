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
        
    
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                ログアウト
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
    
    </div>
    <div class="search">
        <div class="search_title">顧客情報を検索する</div>
        <form action="operater_index" method="post">
        <?php echo csrf_field(); ?>    
            <label for="">顧客の名前から検索(部分検索可)
                <input type="search" name="search_customer_name" id="" value="<?php echo e($search_customer_name); ?>">
            </label>
            <label for="">性別から絞り込む
                <select name="search_gender" id="">
                    <?php if($search_gender==1): ?>
                    <option value="0">両方</option>
                    <option value="1" selected>男性</option>
                    <option value="2">女性</option>
                    <?php elseif($search_gender==2): ?>
                    <option value="0" selected>両方</option>
                    <option value="1">男性</option>
                    <option value="2" selected>女性</option>
                    <?php else: ?>
                    <option value="0" selected>両方</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <?php endif; ?>
                </select>
            </label>
            <input type="submit" value="検索">
        </form>
    </div> 
    <div class="register">
        <a href="register_customer">新規顧客情報を登録する</a>
    </div>
    <div class="customer_information">
        

        

        <?php $__currentLoopData = $customer_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table>
        <div class="short">
            <tr>
                <td><?php echo e($customer_user_id=$customer_data->customer_user_id); ?>.</td>
                <td><?php echo e($customer_data->user_name); ?></td>
                <td><a href="operater_update_customer?customer_id=<?php echo e($customer_user_id); ?>">編集</a></td>
                <td class="show <?php echo e($customer_user_id); ?>_show">詳細を表示/非表示</td>
                <td><a href="operater_message?customer_id=<?php echo e($customer_user_id); ?>">メッセージ</a></td>
            </tr>
        </div>
        </table>    
        <table class="detail <?php echo e($customer_user_id); ?>_detail">
        <tr>
            <td>名前:</td>
            <td><?php echo e($customer_data->user_name); ?></td>
            <td> 
            <?php if($customer_data->name_number==1): ?>
                顧客用画面にて非表示
            <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>メールアドレス:</td>
            <td><?php echo e($customer_data->email); ?></td>
            <td>
                <?php if($customer_data->email_number==1): ?>
                    顧客画面にて非表示
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>パスワード:</td>
            <td><?php echo e($customer_data->password); ?></td>
            <td>
                <?php if($customer_data->password_number==1): ?>
                    顧客画面にて非表示
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>性別:</td>
            <td>
                <?php if($customer_data->gender==1): ?>
                    男性    
                <?php else: ?>
                    女性
                <?php endif; ?>
            </td>
            <td>
                <?php if($customer_data->gender_number==1): ?>
                    顧客画面にて非表示
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>画像:</td>
            <td><img src="storage/<?php echo e($customer_data->image); ?>" alt=""></td>
            <td>
                <?php if($customer_data->image_number==1): ?>
                    顧客画面にて非表示
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>住所:</td>
            <td><?php echo e($customer_data->address); ?></td>
            <td>
                <?php if($customer_data->address_number==1): ?>
                    顧客画面にて非表示
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>趣味:</td>
            <td><?php echo e($customer_data->hobby); ?></td>
            <td>
                <?php if($customer_data->hobby_number==1): ?>
                    顧客画面にて非表示
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>その他:</td>
            <td><?php echo e($customer_data->other); ?></td>
            <td>
                <?php if($customer_data->other_number==1): ?>
                    顧客画面にて非表示
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>対応履歴:</td>
            <td><?php echo e($customer_data->correspond); ?></td>
            <td>
                <?php if($customer_data->correspond_mail_number==1): ?>
                    顧客へ公開
                <?php endif; ?>
            </td>
            <td>
                <?php if($customer_data->correspond_public_number==1): ?>
                    顧客へメール送信
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>お知らせ:</td>
            <td><?php echo e($customer_data->information); ?></td>
            <td>
                <?php if($customer_data->information_public_number==1): ?>
                    顧客へ公開
                <?php endif; ?>
            </td>
            <td><?php if($customer_data->information_mail_number==1): ?>
                    顧客へメール送信
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <script>
        $(function(){
            $(".<?php echo e($customer_user_id); ?>_show").click(function(){
                $(".<?php echo e($customer_user_id); ?>_detail").toggle();
            });
        });
        
        
    </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\customer_management_system\resources\views/operater_index.blade.php ENDPATH**/ ?>