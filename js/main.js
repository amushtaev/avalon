$(document).ready(function() {

    ua = navigator.userAgent;
    ios = /iphone/i.test( ua ) || /ipad/i.test( ua );
    android = /android/i.test( ua );
    mobile = ios || android;

    $("select.skew_select").replaceWith(function(){
        var empty = $(this).data('empty') != undefined;
        if ( empty ) {
            var val = '';
            var text = $(this).data('empty');
        } else {
            var val = $(this).children(':selected').attr('value');
            var text = $(this).children(':selected').text();
        }
        var ret = '<span class="skew_select' + ( mobile ? ' mobile' : '' ) + ( empty ? ' empty' : '' ) + '"';
        ret += $(this).attr('id')!='' ? ' id="'+$(this).attr('id')+'" ' : '' ;
        ret += $(this).attr('onchange')!='' ? ' data-change="'+$(this).attr('onchange')+'" ' : '' ;
        ret += 'data-value="'+val+'"><span>'+$(this).data('placeholder')+'</span><div>'+text+'</div>';
        if ( !mobile ) {
            ret += '<ul>';
            $(this).children('option').each(function(){
                ret += '<li data-value="'+$(this).attr('value')+'"><span>'+$(this).text()+'</span></li>';
            });
            ret += '</ul>';
        } else {
            ret += '<select>' + $(this).html() + '</select>';
        }
        ret += '</ul></span>';
        return ret;
    });
    if ( !mobile ) {
        $('.skew_select').hover(
            function() {
                $(this).find('ul').css('display','block');
                $(this).find('li').each(function(i){
                    $(this).stop().delay(i*20).css('visibility','visible').animate({'top':0,'opacity':1},200);
                });
            },
            function() {
                hide_select(this);
            }
        );
        $('.skew_select li').click(function() {
            var sl = $(this).parents('.skew_select').removeClass('empty');
            var val = $(this).data('value');
            var text = $(this).children('span').html();
            sl.data('value',val).children('div').html( $(this).children('span').html() );
            hide_select(sl);
            if ( sl.data('change') != '' ) {
                if ( typeof window[sl.data('change')] == 'function' ) {
                    window[sl.data('change')](val,text);
                }
            }
        });
    } else {
        $('.skew_select>select').change(function() {
            var sl = $(this).parents('.skew_select').removeClass('empty');
            var val = $(this).val();
            var text = $(this).children(':selected').text();
            sl.data('value',val).children('div').html( text );
            if ( sl.data('change') != '' ) {
                if ( typeof window[sl.data('change')] == 'function' ) {
                    window[sl.data('change')](val,text);
                }
            }
        });
    }
    
    $("input.skew_input").replaceWith(function(){
        return '<span class="skew_input" id="'+$(this).attr('id')+'" data-value="'+$(this).val()+'"><span>'+$(this).attr('placeholder')+'</span><input type="text" value="'+$(this).val()+'"></span>';
    });
    $('.skew_input').click(function () {
        $(this).children('input').focus();
    });
    $('.skew_input input').change(function () {
        $(this).parents('.skew_input').data('value',$(this).val());
    });
    
    $('#popups').click(function (e) {
        if ( e.target.id!='popups' && e.target.id!='popups_close' ) { return; }
        $('#popups').removeClass('popups_visible');
        $('#popups>div').removeClass('popups_center').addClass('popups_top');
        setTimeout(function() {
            $('#popups>div.popups_top').removeClass('popups_top');
            $('#popups>div').show();
        },300);
    }); 
    
    $('a').each(function() {
        var h = $(this).attr('href');
        if ( h==undefined ) { return true; }
        if ( h.indexOf('http')==0 ||  h.indexOf('tel')==0 || h.indexOf('javascript')==0 || h.length==0 || h[0]=='#' ) { return true; }
        var l = location.href;
        while ( l.lastIndexOf('/') == l.length-1 ) { l = l.slice(0,l.length-1); }
        $(this).attr('href',l+'/'+h);
    });

    $('#clubs_btn div').click(function() {
        var cl = $('#mobile_clubs_link');
        if( cl.is(':visible') ) {
            cl.fadeTo(200,0,function(){
                cl.css({'display':'none','opacity':1});
            });
            $('#clubs_btn').removeClass( 'downed' );
        } else{
            $('#clubs_btn').addClass( 'downed' );
            var lk = cl.children();
            lk.stop().css({'opacity':0,'top':'-70px'});
            cl.stop().show();
            lk.each(function(i){
                $(this).stop().delay(i*80).animate({'opacity':1,'top':0},200);
            });
        }
    });

    return;

});

function isMobile() {
    return !$('#getwidth').is(':visible');
}

function hide_select(sl) {
    var l = $(sl).find('li').length-1;
    $(sl).find('li').each(function(i){
        $(this).stop().delay(i*20).animate({'top':'-30px','opacity':0},200,'linear',function(){
            $(this).css('visibility','hidden');
            if ( $(this).index() == l ) {
                $(this).parents('ul').css('display','none');
            }
        });
    });
}

function show_popup(p) {
    if ( p=='map' || !$('#pmap>div').length ) {
        $('#pmap').append('<script async defer src=""></script>');
    }
    $('#popups>div:not(#p'+p+')').hide();
    $('#popups').addClass('popups_visible');
    $('#p'+p).addClass('popups_center');
}


function c( a ) {
    console.log( a );
}