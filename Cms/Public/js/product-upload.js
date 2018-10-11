import {H2o} from "./modal.js";

{
    // 选择按钮
    let pselectBtn = $("#j_product_select"),
        psaveBtn = $("#j_product_save");

    let pUploadForm = $("#j_ProductPicForm"),
        pfile = pUploadForm.find("[name='pFile']");

    let PicBox = $("#j_ProductPicShow");


    pselectBtn.click(() => {
        pfile.click();
        new H2o().uploadInit({
            target: pUploadForm.attr("target"),
            action: pUploadForm.attr("action"),
        });
    });


    // file 控件改变之后
    // 实例化要上传的frame
    // 将选择框的背景图片设置为当前选择的图片
    pfile.on('change', function (e) {
        let fileInput = $(e.target),
            fileInputClone = fileInput.clone(true);
        let data = fileInput.prop('files');
        fileInput.after(fileInputClone).detach();



        if (pfile[0].files[0]) {
            let reader = new FileReader();

            reader.readAsDataURL(pfile[0].files[0]);
            reader.onload = (evt) => {
                PicBox.css({
                    'background-image': `url("${evt.target.result}")`,
                    "background-size": "100% auto"
                });
                psaveBtn.attr('hidden', false);
            }
        } else {
            PicBox.css({
                'background-image': `none`
            });
            psaveBtn.attr('hidden', true);
        }
    });


    // 上传按钮
    psaveBtn.click(()=>{
        pUploadForm.submit();

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
    });
}

