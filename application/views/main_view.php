<div class="row">
    <div class="col-md-12 text-center">
        <?php if(is_array($data['user'])){?>
        <h2>Вы вошли как <?php echo $data['user']['fio']?></h2>
            <a href="<?php echo Href::a('vk_auth/exit');?>"  class="btn btn-warning"> <i class="fa fa-sign-out"></i>Выйти </a>
        <?php } else {?>
        <a href="<?php echo Href::a('vk_auth');?>" class="btn btn-warning"> <i class="fa fa-vk"></i> Войти</a>
        <?php }?>
    </div>
</div>