{
    // 添加操作
    let addBtn = $("#productAdd");
    addBtn.click(()=>{
        let href = addBtn.attr("data-href");
        layer.prompt({
                title: '添加产品',
                scrollbar: false
            },
            (val, index) => {
                // 添加到后台
                let data = {name: val};
                $.post(`${href}`,{data:data},(res) => {
                    if(res.state===true) {
                        layer.msg(res.msg, {time: 2000}, ()=>{
                            window.location.reload();
                        });
                    }
                    else {
                        layer.alert(res.msg);
                        layer.close(index);
                    }
                });
            });
    });
}

// 打开编辑指定的产品页面，通过layer的 frame
function editProduct(who) {
    let id = $(who).attr("data-productId"),
        editUrl = $(who).attr("data-href");

    let index = layer.open({
        title: "编辑",
        type: 2,
        content: `${editUrl}?id=${id}`,
        area: ['640px', '100%'],
        maxmin: true
    });
    layer.full(index);
}


// 删除指定的产品
function delProduct(who) {
    let id = $(who).attr("data-productId"),
        Url = $(who).attr("data-href");

    layer.msg('确定删除？', {
        time: 0 , // 不自动关闭
        btn: ['确定', '返回'],
        yes: (index) => {
            $.get(`${Url}?id=${id}`,function (res) {
                if (res.state === true) {
                    layer.msg(res.msg, {time: 2000}, ()=>{
                        window.location.reload();
                    });
                }
                else {
                    layer.alert(res.msg);
                    layer.close(index);
                }
            });
        }
    });
}

// 保存指定的产品
function saveProduct(who) {
    let url = $(who).attr("data-href");

    let data = {
        id: $("#j_s_id").val(),
        name: $("#j_s_name").val(),
        price: $("#j_s_price").val(),
        online: $("#j_s_online").val(),
        bath: $("#j_s_bath").val(),
        window: $("#j_s_window").val(),
        capacity: $("#j_s_capacity").val(),
        area: $("#j_s_area").val(),
        floor: $("#j_s_floor").val(),
        model: $("#j_s_model").val(),
        other : $("#j_s_other").val(),
        breakfast: $("#j_s_breakfast").val(),
    };

    $.post(url, {data: data}, (res)=>{
        if (res.state === true) {
            layer.alert(res.msg, ()=>{
                window.location.reload();
            });
        }else {
            layer.alert(res.msg);
        }
    });
}