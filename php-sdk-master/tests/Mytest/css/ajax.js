var myajax = {

    post: function(params){
        var xmlhttp = this.createXMLHttpRequest();
        if (xmlhttp != null)
        {
            var async = true;
            if (typeof params.async != "undefined")
                async = params.async;
            var data = null;
            if (typeof params.data != "undefined")
                data = params.data;
            var url = "";
            if (typeof params.url != "undefined")
                url = params.url;
            if (url == null || url.length == 0)
                return;
            xmlhttp.open("POST", url, async);
            if (async){
                xmlhttp.onreadystatechange = function(){

                    if (this.readyState==4){
                        if (this.status==200){

                            if (typeof params.success != "undefined") {
                                params.success(xmlhttp.responseText);
                            }
                        }
                        else {
                            if (typeof params.error != "undefined") {
                                params.error(xmlhttp.status + xmlhttp.statusText);
                            }
                            console.error(url + ": " + xmlhttp.status);
                        }
                    }
                };
            }

            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            var param = "";
            for (var prop in data) {
                param += prop + "=" + data[prop] + "&";
            }
            param = param.substring(0, param.length - 1);
            xmlhttp.send(param);
            if (!async) {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)

                    if (typeof params.success != "undefined") {
                        params.success(xmlhttp.responseText);
                    }
                    else {
                        if (typeof params.error != "undefined") {
                            params.error(xmlhttp.status + xmlhttp.statusText);
                        }
                        console.error(url + ": " + xmlhttp.status);
                    }

            }
        }
    },
    get: function(params){
        var xmlhttp = this.createXMLHttpRequest();
        if (xmlhttp != null)
        {
            var async = true;
            if (params.async != undefined)
                async = params.async;
            var url = "";
            if (params.url != undefined)
                url = params.url;
            if (url == null || url.length == 0)
                return;
            if (params.data != null) {
                var data = params.data;
                var paramPrefix = url.indexOf("?") == -1 ? "?" : "&";

                url = url + paramPrefix;
                for (var prop in data) {
                    url += prop + "=" + data[prop] + "&";
                }
                url = url.substring(0, url.length - 1);
            }
            xmlhttp.open("GET", url, async);
            if (async){
                xmlhttp.onreadystatechange = function(){
                    if (this.readyState==4){
                        if (this.status==200){
                            if (typeof params.success != "undefined") {
                                params.success(xmlhttp.responseText);
                            }
                        }
                        else {
                            if (typeof params.error != "undefined") {
                                params.error(xmlhttp.status + xmlhttp.statusText);
                            }
                            console.error(url + ": " + xmlhttp.status);
                        }
                    }
                };
            }

            xmlhttp.send(null);
            if (!async) {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    if (typeof params.success != "undefined") {
                        params.success(xmlhttp.responseText);
                    }
                    else {
                        if (typeof params.error != "undefined") {
                            params.error(xmlhttp.status + xmlhttp.statusText);
                        }
                        console.error(url + ": " + xmlhttp.status);
                    }


            }
        }
    },
    createXMLHttpRequest: function(){
        if (window.XMLHttpRequest)
        {
            return new XMLHttpRequest();
        }
        else if (window.ActiveXObject)
        {
            //code for IE5 and IE6
            return new ActiveXObject("Microsoft.XMLHTTP");
        }
        return null;
    },
    getJSONP: function(params) {

        var url = null;
        if (typeof params.url != "undefined") {
            url = params.url;
        }
        if (url == null) {
            return;
        }

        var ff = "" + new Date().getTime() + (parseInt(Math.random() * 10000000000));
        eval("jsonpCallback_" + ff + "=" + function(data){

            if (typeof params.success != "undefined") {
                params.success(data);
            }
        });

        //根据url中是否出现过 "?" 来决定添加时间戳参数时使用 "?" 还是 "&"
        var paramPrefix = url.indexOf("?") == -1 ? "?" : "&";

        url = url + paramPrefix + "jsonpCallback=" + "jsonpCallback_" + ff;
        var param = "";

        if (typeof params.data != "undefined" && params.data != null) {

            var data = params.data;
            for (var prop in data) {
                param += prop + "=" + data[prop] + "&";
            }
            param = param.substring(0, param.length - 1);
        }
        if (param.length > 0)
            url = url + "&" + param;
        var script = document.createElement("script");
        document.body.appendChild(script);
        script.src = url;
        script.charset ="UTF-8";
        // for firefox, google etc.
        script.onerror = function() {
            if (typeof params.error != "undefined") {
                params.error();
            }

        }
        script.onload = function() {

            document.body.removeChild(script);
        }
        // for ie
        script.onreadystatechange = function() {
            if (this.readyState == "loaded" || this.readyState == "complete") {
                document.body.removeChild(script);
            }
        }
    }

};