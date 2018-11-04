function rvsubmit(pg,nm,ln) {
    var b = true;
    if ( typeof window.review_before == 'function' ) {
        b = review_before(pg,nm) !== false;
    }
    if ( !b ) { return; }
    if (( $('#rvname').val() == '' )||( $('#rvtext').val() == '' )) { return; }
    $.ajax({
        type : 'POST',
        data : { module : 'reviews',
                 rev : 'add',
                 inps : { name:$('#rvname').val(),
                          mail:$('#rvmail').val(),
                          text:$('#rvtext').val(),
                          captcha:$('#rvcaptcha').val() },
                 page : {name:pg,num:nm,lng:ln} },
        success: function (data, textStatus) {
            if ( data == 'captcha' ) {
                if ( typeof window.review_captcha == 'function' ) {
                    review_captcha(pg,nm);
                }
                return;
            }
            if ( typeof window.review_success == 'function' ) {
                review_success(data,pg,nm);
            }
        },
        error: function (data, textStatus) {
            if ( typeof window.review_error == 'function' ) {
                review_error(pg,nm);
            }
        }
    });
}

rvimcp = false;

function rvrecaptcha(ic) {
    $.ajax({
        type : 'POST',
        async : false,
        data : { module : 'reviews', rev : 'recap' },
        success: function (data, textStatus) {
            if ( !rvimcp ) { rvimcp = $('img[src="'+ic+'"]').attr('src',data); }
            $(rvimcp).attr('src',data);
        }
    });
}