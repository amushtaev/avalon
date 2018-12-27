function rvsubmit(pg,nm,ln) {
    var b = true;
    if ( typeof window.review-main_before == 'function' ) {
        b = review-main_before(pg,nm) !== false;
    }
    if ( !b ) { return; }
    if (( $('#rvname').val() == '' )||( $('#rvtext').val() == '' )) { return; }
    $.ajax({
        type : 'POST',
        data : { module : 'review-mains',
                 rev : 'add',
                 inps : { name:$('#rvname').val(),
                          mail:$('#rvmail').val(),
                          text:$('#rvtext').val(),
                          captcha:$('#rvcaptcha').val() },
                 page : {name:pg,num:nm,lng:ln} },
        success: function (data, textStatus) {
            if ( data == 'captcha' ) {
                if ( typeof window.review-main_captcha == 'function' ) {
                    review-main_captcha(pg,nm);
                }
                return;
            }
            if ( typeof window.review-main_success == 'function' ) {
                review-main_success(data,pg,nm);
            }
        },
        error: function (data, textStatus) {
            if ( typeof window.review-main_error == 'function' ) {
                review-main_error(pg,nm);
            }
        }
    });
}

rvimcp = false;

function rvrecaptcha(ic) {
    $.ajax({
        type : 'POST',
        async : false,
        data : { module : 'review-mains', rev : 'recap' },
        success: function (data, textStatus) {
            if ( !rvimcp ) { rvimcp = $('img[src="'+ic+'"]').attr('src',data); }
            $(rvimcp).attr('src',data);
        }
    });
}