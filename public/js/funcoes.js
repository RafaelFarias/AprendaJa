$(document).ready(function () {

    $('[name="senha"], [name="senha2"]').on('blur', function () {

        var senha = $('[name="senha"]').val();
        var senha2 = $('[name="senha2"]').val();

        if (senha != '' && senha2 != '' && senha != senha2) {
            alert('A senhas não conferem');
            $('#btnSalvar').addClass('disabled');
            $('#btnSalvar').attr('type', 'button');
        } else {
            $('#btnSalvar').removeClass('disabled');
            $('#btnSalvar').attr('type', 'submit');
        }

    });
});