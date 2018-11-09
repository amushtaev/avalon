gal_minprefix = 'min_';     //префикс миниатюр

gal_images = {};
gal_index = 0;
gal_imgwidth = 0;
gal_imgheight = 0;
gal_margin = 20;
gal_prevnextwidth = 0;
gal_screenminwidth = 800;
gal_swipemargin = 200;
gal_swipe = true;
gal_realsize = {};
gal_pitched = false;

function gal_showpict(this_image,images_class) {
    jQuery('#gal_image').css('display','none');
    jQuery('#gal_previmg, #gal_nextimg').show();
    gal_prevnextwidth = 200;
    jQuery('#gal_preimg').width(140).height(80);
    var cl = images_class ? '.'+images_class : '' ;
    gal_images = jQuery(this_image).parent().find('img'+cl);
    jQuery(gal_images).each(function(i){
        if ( jQuery(this).attr('src') == jQuery(this_image).find('img:eq(0)').attr('src') ) {
            gal_index = i;
            return false;
        }
    });
    jQuery('#gallery').fadeTo(200,1);
    gal_setimage(gal_extrflnm(jQuery(this_image).find('img:eq(0)').attr('src')));
    gal_swipe = true;
}

function gal_showonepict(image,miniature) {
    jQuery('#gal_image').css('display','none');
    jQuery('#gal_previmg, #gal_nextimg').hide();
    gal_prevnextwidth = 0;
    jQuery('#gal_preimg').width(140).height(80);
    gal_images = jQuery(image);
    gal_index = 0;
    var imnm = gal_images.attr('src');
    if ( miniature == true ) { imnm = gal_extrflnm(imnm); }
    jQuery('#gallery').fadeTo(200,1);
    gal_setimage(imnm);
    gal_swipe = false;
}


jQuery(document).ready(function() {
    jQuery('body').append(
        '<div id="gallery">'+
            '<div id="gal_preimg"><img src="" id="gal_image" onclick="gal_nextshow()" /></div>'+
            '<div id="gal_previmg" onclick="gal_preshow()"><img src="" /></div>'+
            '<div id="gal_nextimg" onclick="gal_nextshow()"><img src="" /></div>'+
        '</div>'
    );
    jQuery('#gallery').click(function(e) {
        if ( e.target.id != 'gallery' ) { return; }
        jQuery('#gallery').fadeTo(300,0,function(){
            jQuery('#gallery').css('display','none');
            jQuery('#gal_preimg').css({'top':0,'left':0});
        });
    });
    jQuery('#gallery').each(function() {
        this.onselectstart = function() { return false; }; 
        this.unselectable = "on"; 
        jQuery(this).css({
          '-moz-user-select': 'none',
          '-khtml-user-select': 'none',
          '-webkit-user-select': 'none',
          '-o-user-select': 'none',
          'user-select': 'none'
        });
    });
    
    var gal_swipestart = {};
    var gal_swipedirection = 0;
    var gal_swiperesult = 0;
    var gal_pitchstart = 0;
    var gal_pitchsize = {};
    jQuery('#gallery').bind({
        'touchstart' : function(event) {
            gal_swipedirection = 0;
            gal_swipestart.x = event.originalEvent.changedTouches[0].pageX;
            gal_swipestart.y = event.originalEvent.changedTouches[0].pageY;
            gal_pitchsize = {w:jQuery('#gal_preimg').width(),h:jQuery('#gal_preimg').height()}
        },
        'touchmove' : function(event) {
            var t = event.originalEvent.touches;
            if ( t.length>1 && gal_swipedirection==0 ) {
                gal_swipedirection = 3;
                gal_pitchstart = distance(t[0],t[1]);
            }
            if ( gal_swipedirection == 3 ) {
                var k = distance(t[0],t[1])-gal_pitchstart;
                var h = gal_pitchsize.h+k;
                if ( h < gal_realsize.h ) { h = gal_realsize.h; }
                if ( h > gal_imgheight ) { h = gal_imgheight; }
                var w = gal_imgwidth/(gal_imgheight/h);
                jQuery('#gal_preimg').width(w);
                jQuery('#gal_preimg').height(h);
                gal_pitched = h!=gal_realsize.h;
            } else if ( !gal_pitched ) {
                gal_swiperesult = 0;
                var sw_x = t[0].pageX - gal_swipestart.x;
                var sw_y = t[0].pageY - gal_swipestart.y;
                if ((( Math.abs(sw_x)>Math.abs(sw_y) && gal_swipedirection==0 )||( gal_swipedirection == 1 ))&&( gal_swipe )) {
                    if ( Math.abs(sw_x)>20 && gal_swipedirection==0 ) { gal_swipedirection = 1; }
                    var mrg = sw_x<-gal_swipemargin ? -gal_swipemargin : sw_x ;
                    mrg = mrg>gal_swipemargin ? gal_swipemargin : mrg ;
                    jQuery('#gal_preimg').css('top',0);
                    jQuery('#gallery').css('opacity',1);
                    jQuery('#gal_preimg').css('left',mrg+'px');
                    if ( mrg == gal_swipemargin ) { gal_swiperesult = 1; }
                    if ( mrg == -gal_swipemargin ) { gal_swiperesult = 2; }
                } else {
                    if ( Math.abs(sw_y)>20 && gal_swipedirection==0 ) { gal_swipedirection = 2; }
                    var mrg = sw_y<-gal_swipemargin ? -gal_swipemargin : sw_y ;
                    mrg = mrg>gal_swipemargin ? gal_swipemargin : mrg ;
                    jQuery('#gal_preimg').css('top',mrg+'px');
                    jQuery('#gallery').css('opacity',(1-Math.abs(mrg)/gal_swipemargin));
                    jQuery('#gal_preimg').css('left',0);
                    if ( Math.abs(mrg) == gal_swipemargin ) { gal_swiperesult = 3; }
                }
            }
            if ( gal_pitched ) { jQuery('#gallery').css('overflow','auto'); }
            else { jQuery('#gallery').css('overflow','visible'); }
        },
        'touchend' : function(event) {
            if ( gal_swiperesult == 0 ) {
                jQuery('#gal_preimg').animate({'top':0,'left':0},200);
                jQuery('#gallery').animate({'opacity':1},200);
            }
            if ( gal_swiperesult == 1 ) {
                jQuery('#gal_preimg').animate({'left':(gal_swipemargin+100)+'px','opacity':0},200,function(){
                    jQuery('#gal_preimg').css('left',0);
                    gal_preshow();
                    jQuery('#gal_preimg').animate({'opacity':1},200);
                });
            }
            if ( gal_swiperesult == 2 ) {
                jQuery('#gal_preimg').animate({'left':(-gal_swipemargin-100)+'px','opacity':0},200,function(){
                    jQuery('#gal_preimg').css('left',0);
                    gal_nextshow();
                    jQuery('#gal_preimg').animate({'opacity':1},200);
                });
            }
            if ( gal_swiperesult == 3 ) {
                jQuery('#gallery').click();
            }
            gal_swiperesult = 0;
            gal_swipedirection = 0;
        }
    });
    function distance (p1, p2) {
        return (Math.sqrt(Math.pow((p1.clientX - p2.clientX), 2) + Math.pow((p1.clientY - p2.clientY), 2)));
    }
}); 

function gal_setimage(img) {
    jQuery('#gal_image, #gal_previmg, #gal_nextimg').stop().fadeTo(100,0);
    var hiddenImg = new Image();
    hiddenImg.onload = function(){
        gal_imgwidth = this.width;
        gal_imgheight = this.height;
        var crd = gal_setcoord();
        var wd = crd['w'];
        var hg = crd['h'];
        var thsc = this.src;
        if (( jQuery('#gal_preimg').width() != wd )||( jQuery('#gal_preimg').height() != hg )) {
            var sp = Math.round(Math.abs(jQuery('#gal_preimg').width()*jQuery('#gal_preimg').height()-wd*hg)/1500);
            sp = sp>400 ? 400 : sp ;
            sp = sp<150 ? 150 : sp ;
            jQuery('#gal_preimg').animate({width : wd+'px', height : hg+'px'}, sp, 'swing', function(){ gal_endani(thsc, wd, hg); });
        } else {
            gal_endani(thsc, wd, hg);
        }
    }
    hiddenImg.src = img;
}

function gal_setcoord() {
    var dw = jQuery(window).width();
    var dh = jQuery(window).height();
    var wd = gal_imgwidth;
    var hg = gal_imgheight;
    var pnwd = jQuery('#gal_previmg').is(':visible') ? gal_prevnextwidth : 0 ;
    var mgwd = document.documentElement.clientWidth>gal_screenminwidth ? gal_margin : 0 ;
    if ( dw < (wd+pnwd+mgwd*2) ) { var wtm = dw-pnwd-mgwd*2; }
    else { var wtm = wd; }
    if ( dh < (hg+mgwd*2) ) { var htm = dh-mgwd*2; }
    else { var htm = hg; }
    if ( wd > wtm ) {
        hg = hg/(wd/wtm);
        wd = wtm;
    }
    if ( hg > htm ) {
        wd = wd/(hg/htm);
        hg = htm;
    }
    gal_realsize = { w:Math.round(wd) , h:Math.round(hg) };
    return {'w':Math.round(wd), 'h':Math.round(hg)}
}

function gal_endani(thsc, wd, hg) {
    if ( gal_index > 0 ) {
        jQuery('#gal_previmg img').attr('src',gal_images[gal_index-1].src).show();
        jQuery('#gal_previmg').removeClass('gal_repeat');
    } else {
        jQuery('#gal_previmg img').hide();
        jQuery('#gal_previmg').addClass('gal_repeat');
    }
    if ( gal_index < gal_images.length-1 ) {
        jQuery('#gal_nextimg img').attr('src',gal_images[gal_index+1].src).show();
        jQuery('#gal_nextimg').removeClass('gal_repeat');
    } else {
        jQuery('#gal_nextimg img').hide();
        jQuery('#gal_nextimg').addClass('gal_repeat');
    }
    jQuery('#gal_image').attr('src',thsc).stop().fadeTo(100,1);
    if ( gal_images.length > 1 ) { jQuery('#gal_previmg, #gal_nextimg').css('visibility','visible').stop().fadeTo(100,1); }
}

function gal_resize() {
    var crd = gal_setcoord();
    jQuery('#gal_preimg').width(crd['w']);
    jQuery('#gal_preimg').height(crd['h']);
    gal_pitched = false;
    jQuery('#gallery').css('overflow','visible');
}

function gal_preshow() {
    if ( gal_index == 0 ) { gal_index = gal_images.length-1; }
    else { gal_index--; }
    gal_setimage(gal_extrflnm(gal_images[gal_index].src));
}

function gal_nextshow() {
    if ( gal_pitched ) {
        jQuery('#gal_preimg').animate({'width':gal_realsize.w+'px','height':gal_realsize.h+'px'},300);
        gal_pitched = false;
        jQuery('#gallery').css('overflow','visible');
        return;
    }
    if ( gal_images.length < 2 ) {
        jQuery('#gallery').click();
        return;
    }
    if ( gal_index == gal_images.length-1 ) { gal_index = 0; }
    else { gal_index++; }
    gal_setimage(gal_extrflnm(gal_images[gal_index].src));
}

function gal_extrflnm(minnm) {
    if ( gal_minprefix == '' ) { return minnm; }
    else {
        return minnm.substr(0,minnm.lastIndexOf('/')+1)
             + minnm.substr(minnm.lastIndexOf(gal_minprefix)+gal_minprefix.length);
    }
}

jQuery(window).resize(function () {
    if ( jQuery('#gallery').is(':visible') ) { gal_resize(); }
});