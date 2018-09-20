// 得到多选框的值，并保存到一个数组对象中：
function checkedArr(items){
    var items = document.querySelectorAll(items),
        itemsArr= [];
    for (var k in items) {
        if(items[k].checked)
            itemsArr.push(items[k].value);
    }
    return itemsArr;
}

/*function bgState(who) {
    var state = who.attr('data-bg');
    switch (state) {
        case 0:
            obj.addClass('layui-btn-warm');
            break;
    }
}*/

function valSet(who) {
    var obj = $(who),
        value = obj.val();
    if(value.trim().length==0 && value.trim()=='') {
        return value = null;
    } else {
        return value;
    }
}

function removeArrNull(obj) {
    var obj = obj;
    for(var i in obj) {
        if(obj[i]==null) {
            delete obj[i];
        }
    }
    return obj;
}


/*
 * 提交裁定：
 * trigger: 触发器（提交按钮）
 * 用户进行数据提交，此函数执行预定义好的判决：
 * 如果判决不通过，则终止提交，并给予定义好的后期效果。
 * 判决通过，则程序继续正常执行。
 */
function submitCheck(items) {
    var items = {
        username: {
            null: function () {
            },
            min: function () {
            },
            max: function () {
            }
        }
    };

    items.username.null();
    return false;
}


function errorState(who,tipValue) {
    var input = $(who),
        tip = input.next();

    input.addClass('is-invalid');
    tip.removeClass('text-muted').addClass('text-danger');
    tip.html(tipValue);
}

function successState(who,tipValue) {
    var input = $(who),
        tip = input.next();

    input.removeClass('is-invalid');
    tip.removeClass('text-muted').removeClass('text-danger').addClass('text-success');
    tip.html(tipValue);
}

function state(who,state){
    var input = who,
        tip = input.next(),
        state = state;

    switch (state.state) {
        case "success":
            input.removeClass('is-invalid');
            tip.removeClass('text-muted').removeClass('text-danger').addClass('text-success');
            tip.html(state.success);
            break;
        case "error":
            input.addClass('is-invalid');
            tip.removeClass('text-muted').addClass('text-danger');
            tip.html(state.error);
            break;
    }
}

function nullSet(who) {
    for(var i=0; i < who.length; i++) {
        if(valSet(who[i]) == null) {
            errorState(who[i],'不能为空');
            return false;
        }
    }
}


(function () {
    var required = $('[required]'),
        button = $('a.btn'),
        recController = button.attr('data-recController');

    required.blur(function () {
        $(this).each(function () {
            var state;
            if (valSet($(this))==null){
                errorState($(this),'不能为空');
            }else{
                successState($(this),'完成');
            }
        })
    }); // required Blur End.


    $(".custom-control-label").click(function () {
        var control = $(this).parent(".custom-control"),
            checkbox = control.find("input");

        var radio_name = checkbox.attr('name');
        $("input[name="+radio_name+"]").each(function () {
            $(this).removeAttr('checked');
        });
        checkbox.attr("checked","checked");

        $("[type=radio]").each(function () {
            console.log( $(this).attr('checked') );
        });
    });
})();