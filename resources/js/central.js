$(document).ready(function(){
    $('.deletarUsuario').click(function(){
        if (confirm('Deseja excluir o usuário selecionado?')){
            var id = $(this).attr('id');
            $('#formExcuir').attr('action','/admin/user/'+id);
            $('#formExcuir').submit();
        } else {
            return false;
        }
        
    });
})