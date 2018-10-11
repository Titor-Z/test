export class H2o {
    Alert({...item}) {
        let node = {
            tig: `${item.tig}` || '',
            target: item.tig + 'Modal' || '',
            status: item.status || 'default',
            content: {
                title: item.content.title || '',
                text: item.content.text || '',
                icon: item.content.icon || '',
            },
            closeBtn: {
                text: item.closeBtn.text || '关闭',
                class: item.closeBtn.class || 'btn btn-light my-2'
            },
            btn: item.btn,

            keyboard: item.keyboard || true,
            position: item.position || 'top',
            fn: item.fn || '',

        };

        let tpl = `
        <!-- 模态框 Start. -->
        <div id="${node.target.replace(`#`, '').replace(`.`, '')}" class="modal fade show" tabindex="-1" role="dialog" style="display: none; padding-right: 15px;">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content modal-filled bg-${node.status}">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            ${node.content.icon}
                            <h4 class="mt-2">${node.content.title}</h4>
                            <p class="mt-3">${node.content.text}</p>
                            <a class="${node.closeBtn.class}" data-dismiss="modal">${node.closeBtn.text}</a>
                            ${node.btn}
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- 模态框 End. -->
    `;
        node.fn;
        $("body").append(tpl);
        $(node.tig).attr("data-toggle", 'modal').attr("data-target", node.target).attr("data-backdrop", 'static').attr("data-keyboard", node.keyboard);

        let obj1 = item;
        let _;
        _ = obj1;
        return _;
    }


    Bind({...control}) {
        this.obj = control;
        this.version = 1;
        self = this.obj;
        return self;
    }

    uploadInit({...form}) {
        $("iframe").remove();
        let frame = $(`
        <iframe name="${form.target}" src="${form.action}" hidden class="hidden" frameborder="0"></iframe>
        `);
        $("body").append(frame);
    }
}
