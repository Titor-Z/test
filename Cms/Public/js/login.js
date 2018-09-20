(function () {
    var required = $('[required]'),
        button = $('#form_submit'),
        action = $("form").attr('action');

    button.click(function () {
        var form = $("form"),
            username = form.find("[name=username]"),
            password = form.find("[name=password]");

        var data = {
            'username' : valSet(username),
            'password'  : valSet(password)
        };

        if (nullSet([username,password])===false){
            return false;
        }

        removeArrNull(data);

        $.post(action,{'data': data}, function (result) {
            console.info(result);
            window.location.href = result.href;
        });// Ajax End.
    });
})();