var ua = navigator.userAgent;
var ios = /iphone/i.test( ua ) || /ipad/i.test( ua );
var android = /android/i.test( ua );
var mobile = ios || android;

jQuery("select.skew_select").replaceWith(function(){
    var empty = jQuery(this).data('empty') != undefined;
    if ( empty ) {
        var val = '';
        var text = jQuery(this).data('empty');
    } else {
        var val = jQuery(this).children(':selected').attr('value');
        var text = jQuery(this).children(':selected').text();
    }
    var ret = '<span class="skew_select' + ( mobile ? ' mobile' : '' ) + ( empty ? ' empty' : '' ) + '"';
    ret += jQuery(this).attr('id')!='' ? ' id="'+jQuery(this).attr('id')+'" ' : '' ;
    ret += jQuery(this).attr('onchange')!='' ? ' data-change="'+jQuery(this).attr('onchange')+'" ' : '' ;
    ret += 'data-value="'+val+'"><span>'+jQuery(this).data('placeholder')+'</span><div>'+text+'</div>';
    if ( !mobile ) {
        ret += '<ul>';
        jQuery(this).children('option').each(function(){
            ret += '<li data-value="'+jQuery(this).attr('value')+'"><span>'+jQuery(this).text()+'</span></li>';
        });
        ret += '</ul>';
    } else {
        ret += '<select>' + jQuery(this).html() + '</select>';
    }
    ret += '</ul></span>';
    return ret;
});

if ( !mobile ) {
    jQuery('.skew_select').hover(
        function() {
            jQuery(this).find('ul').css('display','block');
            jQuery(this).find('li').each(function(i){
                jQuery(this).stop().delay(i*20).css('visibility','visible').animate({'top':0,'opacity':1},200);
            });
        },
        function() {
            hide_select(this);
        }
    );
    jQuery('.skew_select li').click(function() {
        var sl = jQuery(this).parents('.skew_select').removeClass('empty');
        var val = jQuery(this).data('value');
        var text = jQuery(this).children('span').html();
        sl.data('value',val).children('div').html( jQuery(this).children('span').html() );
        hide_select(sl);
        if ( sl.data('change') != '' ) {
            if ( typeof window[sl.data('change')] == 'function' ) {
                window[sl.data('change')](val,text);
            }
        }
    });
} else {
    jQuery('.skew_select>select').change(function() {
        var sl = jQuery(this).parents('.skew_select').removeClass('empty');
        var val = jQuery(this).val();
        var text = jQuery(this).children(':selected').text();
        sl.data('value',val).children('div').html( text );
        if ( sl.data('change') != '' ) {
            if ( typeof window[sl.data('change')] == 'function' ) {
                window[sl.data('change')](val,text);
            }
        }
    });
}

var free_fixed = jQuery('#free_fixed');
if ( localStorage.getItem('free_fixed') == 'clicked' ) {
    free_fixed.remove();
} else if( isMobile() ) {
    free_fixed.fadeTo( 200, 1 );
}

jQuery('#free_fixed .ff_bg').hover(
    function() { free_fixed.addClass('hover'); free_fixed.addClass('prehov'); },
    function() { free_fixed.removeClass('prehov'); setTimeout(function(){ if ( !free_fixed.hasClass('prehov') ) { free_fixed.removeClass('hover'); } }, 20); }
).click(function() {
    if ( !free_fixed.hasClass('hover') ) { return; }
    scroll_to( '#block5', jQuery('#getwidth').is(':visible') ? 250 : 0 );
    localStorage.setItem( 'free_fixed', 'clicked' );
    free_fixed.fadeTo( 300, 0, function(){ free_fixed.hide(); } );
});

jQuery("input.skew_input").replaceWith(function(){
    return '<span class="skew_input" id="'+jQuery(this).attr('id')+'" data-value="'+jQuery(this).val()+'"><span>'+jQuery(this).attr('placeholder')+'</span><input type="text" value="'+jQuery(this).val()+'"></span>';
});
jQuery('.skew_input').click(function () {
    jQuery(this).children('input').focus();
});
jQuery('.skew_input input').change(function () {
    jQuery(this).parents('.skew_input').data('value',jQuery(this).val());
});

jQuery('#popups').click(function (e) {
    if ( e.target.id!='popups' && e.target.id!='popups_close' ) { return; }
    jQuery('#popups').removeClass('popups_visible');
    jQuery('#popups>div').removeClass('popups_center').addClass('popups_top');
    setTimeout(function() {
        jQuery('#popups>div.popups_top').removeClass('popups_top');
        jQuery('#popups>div').show();
    },300);
});

jQuery('#popups').click(function (e) {
    if ( e.target.id!='popups' && e.target.id!='popups_close' ) { return; }
    jQuery('#popups').removeClass('popups_visible');
    jQuery('#popups>div').removeClass('popups_center').addClass('popups_top');
    setTimeout(function() {
        jQuery('#popups>div.popups_top').removeClass('popups_top');
        jQuery('#popups>div').show();
    },300);
});

jQuery("#menu li a, .scroll").click(function () {
    scroll_to( jQuery(this).attr("href"), jQuery(this).attr("top") );
    window.location.href = jQuery(this).attr("href");
    return false;
});

jQuery("#mobile_clubs_link a").click(function () {
    jQuery("#mobile_clubs_link").css("display", "none");
});

jQuery('a').each(function() {
    var h = jQuery(this).attr('href');
    if ( h==undefined ) { return true; }
    if ( h.indexOf('http')==0 ||  h.indexOf('tel')==0 || h.indexOf('javascript')==0 || h.length==0 || h[0]=='#' ) { return true; }
    var l = location.href;
    while ( l.lastIndexOf('/') == l.length-1 ) { l = l.slice(0,l.length-1); }
    jQuery(this).attr('href',l+'/'+h);
});

jQuery('#clubs_btn div').click(function() {
    var cl = jQuery('#mobile_clubs_link');
    if( cl.is(':visible') ) {
        cl.fadeTo(200,0,function(){
            cl.css({'display':'none','opacity':1});
        });
        jQuery('#clubs_btn').removeClass( 'downed' );
    } else{
        jQuery('#clubs_btn').addClass( 'downed' );
        var lk = cl.children();
        lk.stop().css({'opacity':0,'top':'-70px'});
        cl.stop().show();
        lk.each(function(i){
            jQuery(this).stop().delay(i*80).animate({'opacity':1,'top':0},200);
        });
    }
});

var phone = '';
jQuery( '#free_phone input' ).mask( '00 000-00-00', {
    placeholder: '__ ___-__-__',
    clearIfNotMatch: true,
    onChange: function( text, e, currentField, options ) {
        if ( text[0] == '0' ) {
            jQuery( currentField ).val( phone );
        } else {
            phone = jQuery( currentField ).val( );
        }
    }
});

var intervalID = setInterval(function(){
    if(document.querySelectorAll("#pcommand li").length > 0) {
        clearInterval(intervalID);
        var arr = document.querySelectorAll('#pcommand .command li').length;
        var l = generateArrayRandomNumber(0, arr);
        for (var i = 0; i < l.length; i++) {
            jQuery('#command').append(jQuery('#pcommand .command li').eq(i).clone().css('top', 0));
        }
    }
}, 100);
setTimeout(function() {
    clearTimeout(intervalID);
}, 5000);

var intervaReview = setInterval(function(){
    if(document.querySelectorAll('#smallreviews .review').length > 0) {
        clearInterval(intervaReview);
        var arr = document.querySelectorAll('#smallreviews .review').length;
        var l = generateArrayRandomNumber(0, arr);
        for (var i = 0; i < l.length; i++) {
            jQuery('#reviews').append(jQuery('#smallreviews .review').eq(i).clone());
        }
    }
}, 100);
setTimeout(function() {
    clearTimeout(intervalID);
}, 5000);

jQuery(window).resize(function() {
    if ( !jQuery('#mobile_header').is(':visible') ) {
        jQuery('#content').bind('scroll',function() {
            if( jQuery(this).scrollTop() > jQuery('#block1').height() ) {
                jQuery('#premenuwidth').addClass('stickytop').css('right',jQuery('#content').width()-jQuery('#block2').width()+'px');
            }
            else{
                jQuery('#premenuwidth').removeClass('stickytop');
            }
        }).scroll();
    } else {
        jQuery('#content').unbind('scroll');
    }
    if ( !isMobile() ) {
        var scroll_width = window.innerWidth - jQuery('#getwidth').width();
        free_fixed.css({
            'right': scroll_width + 'px',
            'margin-top': ~~( free_fixed.height() / -2 ) + 'px'
        }).show();
    }
}).resize();

function isMobile() {
    return !jQuery('#getwidth').is(':visible');
}

function hide_select(sl) {
    var l = jQuery(sl).find('li').length-1;
    jQuery(sl).find('li').each(function(i){
        jQuery(this).stop().delay(i*20).animate({'top':'-30px','opacity':0},200,'linear',function(){
            jQuery(this).css('visibility','hidden');
            if ( jQuery(this).index() == l ) {
                jQuery(this).parents('ul').css('display','none');
            }
        });
    });
}

function show_popup(p) {
    if ( p=='map' || !jQuery('#pmap>div').length ) {
        jQuery('#pmap').append('<script async defer src=""></script>');
    }
    jQuery('#popups>div:not(#p'+p+')').hide();
    jQuery('#popups').addClass('popups_visible');
    jQuery('#p'+p).addClass('popups_center');
}

function scroll_to( href, top ) {
    if(window.location.pathname.length > 1) return;
    c(href)
    c(top)
    if(top === "undefined") {
        top = 0;
    }
    if(window.location.hash !== "") {
        var hrefsplit = href.split("/");
        href = hrefsplit[hrefsplit.length -1];
    }
    var destination = jQuery(href).offset().top + jQuery("#content").scrollTop() - ( top || 100 );
    var speed = Math.abs( jQuery("#content").scrollTop() - destination ) / 4;
    if ( speed < 400 ) { speed = 400; }
    if ( speed > 1000 ) { speed = 1000; }
    jQuery("#content:not(:animated)").animate( { scrollTop: destination }, speed );
}

function send_freetraining(b) {
    jQuery('#day').val(jQuery('#free_club').data('value'));
    if ( jQuery(b).hasClass('wait') ) { return; }
    if ( !jQuery('#free_club').hasClass('empty') ) {
        jQuery('#free_club').removeClass('error');
    } else {
        jQuery('#free_club').addClass('error');
    }
    if ( jQuery('#free_name input').val().length > 0 ) {
        jQuery('#free_name').removeClass('error');
    } else {
        jQuery('#free_name').addClass('error');
    }
    var tel = jQuery('#free_phone input').cleanVal();
    if ( tel.length && tel[0]=='0' ) { tel = tel.substring(1) }
    if ( /^\d{9}$/.test(tel) ) {
        jQuery('#free_phone').removeClass('error');
    } else {
        jQuery('#free_phone').addClass('error').find('input').focus();
    }
    if ( jQuery('#free_club').hasClass('error') || jQuery('#free_name').hasClass('error') ||  jQuery('#free_phone').hasClass('error')) { return; }
    jQuery('#free_fixed').fadeTo( 300, 0, function(){ jQuery('#free_fixed').hide(); } );
    jQuery(b).addClass('wait');
    /*var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10) {
        dd = '0'+dd
    }
    if(mm<10) {
        mm = '0'+mm
    }
    today = dd;
    if (dd === parseInt(localStorage.getItem('day')) && (parseInt(localStorage.getItem('day'))-dd) < 2 ) {
        alert('Вы уже оставляли заявку '+localStorage.getItem('day')+'/'+localStorage.getItem('manth')+'.\nЕсли вам так и не перезвонили, приносим извенения и просим связаться с нами по телефону нашего клуба.');
        jQuery("#block5 .skew_button img").hide();
    } else if (localStorage.getItem('phone')){
        alert('Не удалось отправить заявку :_(\nПопробуйте ещё раз или свяжитесь с администратором нашего клуба.');
        jQuery("#block5 .skew_button img").hide();
    }*/
    if(!localStorage.getItem('phone')) {
        jQuery.ajax({
            url : '/wp-content/themes/avalon/mail.php',
            type : 'POST',
            data : {
                day : jQuery('#free_club').data('value'),
                name : jQuery('#free_name').data('value'),
                phone : tel
            },
            success : function (data, textStatus) {
                if ( textStatus == 'success' ) {
                    /*localStorage.setItem('phone', tel);
                    localStorage.setItem('day', dd);
                    localStorage.setItem('manth', mm);*/
                    jQuery("#block5 .skew_button img").hide();
                    window.location.href = "https://avalon.kharkov.ua/thanks/"
                    //show_popup('free');
                }
            },
            complete : function (XMLHttpRequest, textStatus) {
                jQuery(b).removeClass('wait');
            }
        });
    }
}

function generateArrayRandomNumber (min, max) {
    var totalNumbers 		= max - min + 1,
        arrayTotalNumbers 	= [],
        arrayRandomNumbers 	= [],
        tempRandomNumber;

    while (totalNumbers--) {
        arrayTotalNumbers.push(totalNumbers + min);
    }

    while (arrayTotalNumbers.length) {
        tempRandomNumber = Math.round(Math.random() * (arrayTotalNumbers.length - 1));
        arrayRandomNumbers.push(arrayTotalNumbers[tempRandomNumber]);
        arrayTotalNumbers.splice(tempRandomNumber, 1);
    }
    if(max > 3) {
        arrayRandomNumbers.splice(0, 3);
    }
    return arrayRandomNumbers;
}

//scroll_to(window.location.href, 0);

function c( a ) {
    console.log( a );
}