<!--<a type="button"  data-toggle="modal" data-target="#myModal"></a>-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ipê Digital</h4>
            </div>
            <div class="modal-body">
                <div class="box-body" style="color: <?php echo $color; ?>;">
                    <h4 class="modal-title" id="myModalLabel"><b id="msg"><?php if(isset($msg)){ echo $msg; } ?></b><b><?php if(isset($id)){ echo $id; } ?></b></h4>
                    
                </div>
                <div id="conteudo_RecuperarSenha"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


