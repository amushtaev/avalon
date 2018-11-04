$(document).ready(function() {
    
    hide_cards();
    
    $("#menu a, .scroll").click(function () {
        scroll_to( $(this).attr("href"), $(this).attr("top") );
        return false;
    });
    $("#mobile_clubs_link a").click(function () {
        $("#mobile_clubs_link").css("display", "none");
    });
    
    $('#photos img').click(function () {
        gal_showpict(this.parentNode);
    });

    fill_command( );
    
    var l = $('#pcommand .command li').length;
    var r = [];
    var v = 0;
    var cnt = 3;
    var cnt = l<cnt ? l : cnt ;
    for ( var i=1 ; i<=cnt ; i++ ) {
        do { var v = Math.floor(Math.random()*l); } while ( r.indexOf(v) != -1 )
        r.push(v);
        $('#command').append( $('#pcommand .command li').eq(v).clone().css('top',0) );
    }
    
    var l = $('#smallreviews .review').length;
    var r = 0;
    var v = 0;
    for ( var i=1 ; i<=2 ; i++ ) {
        while ( r == v ) { var r = Math.floor(Math.random()*l); }
        v = r;
        $('#reviews').append( $('#smallreviews .review').eq(v).clone() );
    }

    var free_fixed = $('#free_fixed');
    if ( localStorage.getItem('free_fixed') == 'clicked' ) {
        free_fixed.remove();
    } else if( isMobile() ) {
        free_fixed.fadeTo( 200, 1 );
    }

    $(window).resize(function() {
        if ( !$('#mobile_header').is(':visible') ) {
            $('#content').bind('scroll',function() {
                if( $(this).scrollTop() > $('#block1').height() ) {
                    $('#premenuwidth').addClass('stickytop').css('right',$('#content').width()-$('#block2').width()+'px');
                }
                else{
                    $('#premenuwidth').removeClass('stickytop');
                }
            }).scroll();
        } else {
            $('#content').unbind('scroll');
        }
        if ( !isMobile() ) {
            var scroll_width = window.innerWidth - $('#getwidth').width();
            free_fixed.css({
                'right': scroll_width + 'px',
                'margin-top': ~~( free_fixed.height() / -2 ) + 'px'
            }).show();
        }
    }).resize();

    $('#free_fixed .ff_bg').hover(
        function() { free_fixed.addClass('hover'); free_fixed.addClass('prehov'); },
        function() { free_fixed.removeClass('prehov'); setTimeout(function(){ if ( !free_fixed.hasClass('prehov') ) { free_fixed.removeClass('hover'); } }, 20); }
    ).click(function() {
        if ( !free_fixed.hasClass('hover') ) { return; }
        scroll_to( '#block5', $('#getwidth').is(':visible') ? 250 : 0 );
        localStorage.setItem( 'free_fixed', 'clicked' );
        free_fixed.fadeTo( 300, 0, function(){ free_fixed.hide(); } );
    });

    var phone = '';
    $( '#free_phone input' ).mask( '00 000-00-00', {
        placeholder: '__ ___-__-__',
        clearIfNotMatch: true,
        onChange: function( text, e, currentField, options ) {
            if ( text[0] == '0' ) {
                $( currentField ).val( phone );
            } else {
                phone = $( currentField ).val( );
            }
        }
    });

    /*$('#video div').click(function () {
        $(this).html('<iframe width="533" height="300" src="#" frameborder="0" allowfullscreen></iframe>');
    });*/

    return;

});

function scroll_to( href, top ) {
    var destination = $(href).offset().top + $("#content").scrollTop() - ( top || 100 );
    var speed = Math.abs( $("#content").scrollTop() - destination ) / 4;
    if ( speed < 400 ) { speed = 400; }
    if ( speed > 1000 ) { speed = 1000; }
    $("#content:not(:animated)").animate( { scrollTop: destination }, speed );
}

function show_cards() {
    $('#cards').empty();
    $.each(cards[$('#card_clubs').data('value')],function(i){
        if ( i=='name' || i=='single' ) { return true; }
        var s = '';
        $.each(this.service,function() {
            s += '<li>'+this+'</li>';
        });
        var r = (this.remark?'<div class="card_remark">'+this.remark+'</div>':'');
        var m = Math.round( this.cost[$('#card_period').data('value')][0] / $('#card_period').data('value') / 10 ) * 10;
        var c = $(
            '<div class="card">'+
                '<div class="card_name">'+this.name+'</div>'+
                '<ul class="card_service">'+s+'</ul>'+
                '<div class="card_cost">'+this.cost[$('#card_period').data('value')][0]+'</div>'+
                '<div class="card_month">'+m+'</div>'+
                r+
            '</div>'
        );
        c.addClass('card_bottom');
        $('#cards').append(c);
    });
    $('#cards').children('div').each(function(i){
        var d = $(this);
        setTimeout(function() {
            d.removeClass('card_bottom');
        },i*100);
    });
}

function hide_cards() {
    var l = $('#cards').children('div').length;
    if ( l == 0 ) {
        //show_cards();
        return;
    }
    $('#cards').children('div').each(function(i){
        var d = $(this);
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
    if ( $(b).hasClass('wait') ) { return; }
    if ( !$('#free_club').hasClass('empty') ) {
        $('#free_club').removeClass('error');
    } else {
        $('#free_club').addClass('error');
    }
    var tel = $('#free_phone input').cleanVal();
    if ( tel.length && tel[0]=='0' ) { tel = tel.substring(1) }
    if ( /^\d{9}$/.test(tel) ) {
        $('#free_phone').removeClass('error');
    } else {
        $('#free_phone').addClass('error').find('input').focus();
    }
    if ( $('#free_club').hasClass('error') || $('#free_phone').hasClass('error') ) { return; }
    $('#free_fixed').fadeTo( 300, 0, function(){ $('#free_fixed').hide(); } );
    localStorage.setItem( 'free_fixed', 'clicked' );
    $(b).addClass('wait');
    $.ajax({
        url : 'ajax.php',
        type : 'POST',
        data : {
            module : 'code',
            club : $('#free_club').data('value'),
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
            $(b).removeClass('wait');
        }
    });
}

function fill_command( ) {
    for ( i in command ) {
        var post = command[ i ].post.constructor === Array ? command[ i ].post.join( '<br>' ) : command[ i ].post ;
        $( '#pcommand .command' ).append(
            '<li style="top:' + (i % 3 * 30) + 'px"><div style="background-image:url(\'img/command/' + command[ i ].photo + '.jpg\');"></div><b>' + command[ i ].name + '</b><span>' + post + '</span><p>' + command[ i ].desc.join( '</p><p>' ) + '</p></li>'
        )
    }
}