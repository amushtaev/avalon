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
    if(top === "undefined") {
        top = 0;
    }
    console.log(href, "hrefsplit")
    var hrefsplit = href.split("/");
    if(hrefsplit.length > 0) {
        href = hrefsplit[hrefsplit.length -1];
    }
    var destination = jQuery(href).offset().top + jQuery("#content").scrollTop() - ( top || 100 );
    var speed = Math.abs( jQuery("#content").scrollTop() - destination ) / 4;
    if ( speed < 400 ) { speed = 400; }
    if ( speed > 1000 ) { speed = 1000; }
    jQuery("#content:not(:animated)").animate( { scrollTop: destination }, speed );
}

function c( a ) {
    console.log( a );
}