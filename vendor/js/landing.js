jQuery(document).ready(function() {
    jQuery("#menu a, .scroll").click(function () {
        scroll_to( jQuery(this).attr("href"), jQuery(this).attr("top") );
        return false;
    });
    jQuery("#menu li, .scroll").click(function () {
        scroll_to( jQuery(this).attr("href"), jQuery(this).attr("top") );
        return false;
    });
    jQuery("#mobile_clubs_link a").click(function () {
        jQuery("#mobile_clubs_link").css("display", "none");
    });

    jQuery('#photos img').click(function () {
        gal_showpict(this.parentNode);
    });
    var intervalID = setInterval(function(){
        if(document.querySelectorAll("#pcommand li").length > 0) {
            clearInterval(intervalID);
            var l = jQuery('#pcommand .command li').length;
            if (l > 0) {
                var r = [];
                var v = 0;
                var cnt = 3;
                var cnt = l < cnt ? l : cnt;
                for (var i = 1; i <= cnt; i++) {
                    do {
                        var v = Math.floor(Math.random() * l);
                    } while (r.indexOf(v) != -1);
                    r.push(v);
                    jQuery('#command').append(jQuery('#pcommand .command li').eq(v).clone().css('top', 0));
                }
            }
        }
    }, 1000);
    setTimeout(function() {
        clearTimeout(intervalID);
    }, 10000);
//пофиксить из-за этого виснет страница
    var l = jQuery('#smallreviews .review').length;
    if(l > 0) {
        var r = 0;
        var v = 0;
        for (var i = 1; i <= 2; i++) {
            while (r == v) {
                var r = Math.floor(Math.random() * l);
            }
            v = r;
            jQuery('#reviews').append(jQuery('#smallreviews .review').eq(v).clone());
        }
    }

    var free_fixed = jQuery('#free_fixed');
    if ( localStorage.getItem('free_fixed') == 'clicked' ) {
        free_fixed.remove();
    } else if( isMobile() ) {
        free_fixed.fadeTo( 200, 1 );
    }

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

    jQuery('#free_fixed .ff_bg').hover(
        function() { free_fixed.addClass('hover'); free_fixed.addClass('prehov'); },
        function() { free_fixed.removeClass('prehov'); setTimeout(function(){ if ( !free_fixed.hasClass('prehov') ) { free_fixed.removeClass('hover'); } }, 20); }
    ).click(function() {
        if ( !free_fixed.hasClass('hover') ) { return; }
        scroll_to( '#block5', jQuery('#getwidth').is(':visible') ? 250 : 0 );
        localStorage.setItem( 'free_fixed', 'clicked' );
        free_fixed.fadeTo( 300, 0, function(){ free_fixed.hide(); } );
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

});

function scroll_to( href, top ) {
    var destination = jQuery(href).offset().top + jQuery("#content").scrollTop() - ( top || 100 );
    var speed = Math.abs( jQuery("#content").scrollTop() - destination ) / 4;
    if ( speed < 400 ) { speed = 400; }
    if ( speed > 1000 ) { speed = 1000; }
    jQuery("#content:not(:animated)").animate( { scrollTop: destination }, speed );
}

function show_cards() {
    jQuery('#cards').empty();
    jQuery.each(cards[jQuery('#card_clubs').data('value')],function(i){
        if ( i=='name' || i=='single' ) { return true; }
        var s = '';
        jQuery.each(this.service,function() {
            s += '<li>'+this+'</li>';
        });
        var r = (this.remark?'<div class="card_remark">'+this.remark+'</div>':'');
        var m = Math.round( this.cost[jQuery('#card_period').data('value')][0] / jQuery('#card_period').data('value') / 10 ) * 10;
        var c = $(
            '<div class="card">'+
            '<div class="card_name">'+this.name+'</div>'+
            '<ul class="card_service">'+s+'</ul>'+
            '<div class="card_cost">'+this.cost[jQuery('#card_period').data('value')][0]+'</div>'+
            '<div class="card_month">'+m+'</div>'+
            r+
            '</div>'
        );
        c.addClass('card_bottom');
        jQuery('#cards').append(c);
    });
    jQuery('#cards').children('div').each(function(i){
        var d = jQuery(this);
        setTimeout(function() {
            d.removeClass('card_bottom');
        },i*100);
    });
}

function hide_cards() {
    var l = jQuery('#cards').children('div').length;
    if ( l == 0 ) {
        //show_cards();
        return;
    }
    jQuery('#cards').children('div').each(function(i){
        var d = jQuery(this);
        setTimeout(function() {
            d.addClass('card_top');
        },i*100);
        if ( d.index() == (l-1) ) {
            setTimeout(function() {
                //show_cards();
            },i*100+200);
        }
    });
}

function send_freetraining(b) {
    jQuery('#day').val(jQuery('#free_club').data('value'));
    if ( jQuery(b).hasClass('wait') ) { return; }
    if ( !jQuery('#free_club').hasClass('empty') ) {
        jQuery('#free_club').removeClass('error');
    } else {
        jQuery('#free_club').addClass('error');
    }
    var tel = jQuery('#free_phone input').cleanVal();
    if ( tel.length && tel[0]=='0' ) { tel = tel.substring(1) }
    if ( /^\d{9}$/.test(tel) ) {
        jQuery('#free_phone').removeClass('error');
    } else {
        jQuery('#free_phone').addClass('error').find('input').focus();
    }
    if ( jQuery('#free_club').hasClass('error') || jQuery('#free_phone').hasClass('error') ) { return; }
    jQuery('#free_fixed').fadeTo( 300, 0, function(){ jQuery('#free_fixed').hide(); } );
    localStorage.setItem( 'free_fixed', 'clicked' );
    jQuery(b).addClass('wait');
    jQuery.ajax({
        action: "avalon_action",
        url : '/wp-content/themes/avalon/mail.php',
        type : 'POST',
        data : {
            module : 'code',
            day : jQuery('#free_club').data('value'),
            phone : tel
        },
        success : function (data, textStatus) {
            if ( data == 'success' ) {
                show_popup('free');
            } else if ( /^isset:/.test(data) ) {
                alert('Вы уже оставляли заявку '+data.replace('isset:','')+'.\nЕсли вам так и не перезвонили, приносим извенения и просим связаться с нами по телефону интересующего вас клуба.');
            } else {
                alert('Не удалось отправить заявку :_(\nПопробуйте ещё раз или свяжитесь с администратором интересующего вас клуба.');
                console.log(data);
            }
        },
        complete : function (XMLHttpRequest, textStatus) {
            jQuery(b).removeClass('wait');
        }
    });
}
