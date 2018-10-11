import {H2o} from "./modal.js";

{
    // 上传
    let upload = new H2o().Bind({
        el: {
            form: $("#j_storePicForm"),
            file: $("#j_storePicForm").find("[name='file']"),
            showPic: $("#j_picShow"),
            saveBtn: $("#j_storePicSave"),
        },
        data: {
            text: 'This is Text',
        },
        method: {
            openFile: function () {
                self.el.file.click();
                new H2o().uploadInit({
                    target: self.el.form.attr("target"),
                    action: self.el.form.attr("action"),
                });
            },
            selectedFile: function () {
                let file = upload.el.file,
                    PicBox = self.el.showPic;

                if (file[0].files[0]) {
                    let reader = new FileReader();

                    reader.readAsDataURL(file[0].files[0]);
                    reader.onload = (evt) => {
                        PicBox.css({
                            'background-image': `url("${evt.target.result}")`,
                            "background-size": "100% auto"
                        });
                        self.el.saveBtn.attr('hidden', false);
                    }
                } else {
                    PicBox.css({
                        'background-image': `none`
                    });
                    self.el.saveBtn.attr('hidden', true);
                }
            },
            saveFile: function () {
                self.el.form[0].submit();

                let frame = document.querySelector("iframe");
                frame.onload = () => {
                    let body = frame.contentWindow.document;
                    let content = body.querySelector("body").textContent;
                    let uploadResult = JSON.parse(content);
                    if (uploadResult) {
                        layer.alert(uploadResult.msg,{closeBtn: 0},()=>{
                            window.location.reload();
                        });
                    }
                }
            }
        }
    });

    let selectBtn = $("#j_storePicSelect");
    selectBtn.click(() => {
        upload.method.openFile();
    });

    upload.el.file.on('change', () => {
        upload.method.selectedFile();
    });

    upload.el.saveBtn.on('click', () => {
        upload.method.saveFile();
    });



    // 基本设置
    $("#storeBashSave").click(()=>{
        var data = {
            name: valSet($("#j_s_name")),
            industry_id : valSet($("#j_s_industry_id")),
            industry_entity : valSet($("#j_s_industry_entity")),
            description : valSet($("#j_s_description")),
            services : valSet($("#j_s_services")),
            opening_hours : valSet($("#j_s_opening_hours")),
            ke_tel : valSet($("#j_s_ke_tel")),
            wechat : valSet($("#j_s_wechat"))
        };

        removeArrNull(data);

        let href = $("#storeBashSave").attr("data-href");
        $.post(href, {data: data}, (res)=>{
            layer.alert(res.msg);
        });
    });


}
