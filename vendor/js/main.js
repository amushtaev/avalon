jQuery(document).ready(function() {

    ua = navigator.userAgent;
    ios = /iphone/i.test( ua ) || /ipad/i.test( ua );
    android = /android/i.test( ua );
    mobile = ios || android;

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

    return;

});

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


function c( a ) {
    console.log( a );
}