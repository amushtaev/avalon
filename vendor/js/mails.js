mails = {

    send : function(params,callback) {
        $.ajax({
            type : 'POST',
            data : { module : 'mails', send : {
                subject : params.subject,
                from : params.from,
                text : params.text
            } },
            success : function (data, textStatus) {
                if ( data == 'success' ) {
                    if ( typeof callback.success == 'function' ) { callback.success(); }
                } else {
                    console.log(data);
                    if ( typeof callback.error == 'function' ) { callback.error(); }
                }
            },
            complete : function (XMLHttpRequest, textStatus) {
                if ( typeof callback.complete == 'function' ) { callback.complete(); }
            }
        });
    }
    
}

function mlsubmit() {
    mails.send({
        subject : $('#mlsubject').val(),
        from : $('#mlfrom').val(),
        text : $('#mltext').val()
    })
}