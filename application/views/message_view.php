<div class="row">
    <div class="col-sm-6">
        <?php if (!empty($_SESSION['uid'])) {?>
            <h2>Добавить сообщение</h2>
        <form action="<?php echo Href::a('message/add')?>" method="post">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="message" required></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Отправить</button>
        </form>
        <?php } else {?>
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                Добавлять сообщения и комментарии могут только зарегестрированные пользователи.
            </div>
        <?php }?>
    </div>
</div>
<div class="row margin_top">
    <div class="all_comments">
<?php echo $data['tree'];

?>
    </div>
</div>
<div class="modal fade in" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Введите сообщение</h4>
            </div>
            <div class="modal-body" >
                <form action="<?php echo Href::a('message/add')?>" method="post">
                    <input name="parent_id" value="" style="display: none" id="modal_mes">
                    <div class="form-group">
                        <textarea class="form-control text_mes" rows="3" name="message" required></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">закрыть</button>
                    <button type="submit" class="btn btn-warning" id="send_mes">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="modal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Редактирование сообщения</h4>
            </div>
            <div class="modal-body" >
                <form action="<?php echo Href::a('message/edit')?>" method="post">
                    <input name="id" value="" style="display: none" id="modal_mes_edit">
                    <div class="form-group">
                        <textarea class="form-control text_mes_edit" rows="3" name="message" required></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">закрыть</button>
                    <button type="submit" class="btn btn-warning" id="send_mes_edit">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('a#modal_act').click(function(event) {
        current_parent_id = $(this).attr('data-id');
        $('button#send_mes').click(function(event) {
            message = $("textarea.text_mes").val();
            $("input#modal_mes").val(current_parent_id);

        })
    });
    $('a#modal_edit').click(function(event) {
        current_id = $(this).attr('data-id');
        message_full = $('#message_full_'+current_id).text();
        message = $("textarea.text_mes_edit").val(message_full);
        $('button#send_mes_edit').click(function(event) {
            message = $("textarea.text_mes_edit").val();
            $("input#modal_mes_edit").val(current_id);

        })
    });

</script>