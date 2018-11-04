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
    $('#gal_image').css('display','none');
    $('#gal_previmg, #gal_nextimg').show();
    gal_prevnextwidth = 200;
    $('#gal_preimg').width(140).height(80);
    var cl = images_class ? '.'+images_class : '' ;
    gal_images = $(this_image).parent().find('img'+cl);
    $(gal_images).each(function(i){
        if ( $(this).attr('src') == $(this_image).find('img:eq(0)').attr('src') ) {
            gal_index = i;
            return false;
        }
    });
    $('#gallery').fadeTo(200,1);
    gal_setimage(gal_extrflnm($(this_image).find('img:eq(0)').attr('src')));
    gal_swipe = true;
}

function gal_showonepict(image,miniature) {
    $('#gal_image').css('display','none');
    $('#gal_previmg, #gal_nextimg').hide();
    gal_prevnextwidth = 0;
    $('#gal_preimg').width(140).height(80);
    gal_images = $(image);
    gal_index = 0;
    var imnm = gal_images.attr('src');
    if ( miniature == true ) { imnm = gal_extrflnm(imnm); }
    $('#gallery').fadeTo(200,1);
    gal_setimage(imnm);
    gal_swipe = false;
}


$(document).ready(function() {
    $('body').append(
        '<div id="gallery">'+
            '<div id="gal_preimg"><img src="" id="gal_image" onclick="gal_nextshow()" /></div>'+
            '<div id="gal_previmg" onclick="gal_preshow()"><img src="" /></div>'+
            '<div id="gal_nextimg" onclick="gal_nextshow()"><img src="" /></div>'+
        '</div>'
    );
    $('#gallery').click(function(e) {
        if ( e.target.id != 'gallery' ) { return; }
        $('#gallery').fadeTo(300,0,function(){
            $('#gallery').css('display','none');
            $('#gal_preimg').css({'top':0,'left':0});
        });
    });
    $('#gallery').each(function() {
        this.onselectstart = function() { return false; }; 
        this.unselectable = "on"; 
        $(this).css({
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
    $('#gallery').bind({
        'touchstart' : function(event) {
            gal_swipedirection = 0;
            gal_swipestart.x = event.originalEvent.changedTouches[0].pageX;
            gal_swipestart.y = event.originalEvent.changedTouches[0].pageY;
            gal_pitchsize = {w:$('#gal_preimg').width(),h:$('#gal_preimg').height()}
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
                $('#gal_preimg').width(w);
                $('#gal_preimg').height(h);
                gal_pitched = h!=gal_realsize.h;
            } else if ( !gal_pitched ) {
                gal_swiperesult = 0;
                var sw_x = t[0].pageX - gal_swipestart.x;
                var sw_y = t[0].pageY - gal_swipestart.y;
                if ((( Math.abs(sw_x)>Math.abs(sw_y) && gal_swipedirection==0 )||( gal_swipedirection == 1 ))&&( gal_swipe )) {
                    if ( Math.abs(sw_x)>20 && gal_swipedirection==0 ) { gal_swipedirection = 1; }
                    var mrg = sw_x<-gal_swipemargin ? -gal_swipemargin : sw_x ;
                    mrg = mrg>gal_swipemargin ? gal_swipemargin : mrg ;
                    $('#gal_preimg').css('top',0);
                    $('#gallery').css('opacity',1);
                    $('#gal_preimg').css('left',mrg+'px');
                    if ( mrg == gal_swipemargin ) { gal_swiperesult = 1; }
                    if ( mrg == -gal_swipemargin ) { gal_swiperesult = 2; }
                } else {
                    if ( Math.abs(sw_y)>20 && gal_swipedirection==0 ) { gal_swipedirection = 2; }
                    var mrg = sw_y<-gal_swipemargin ? -gal_swipemargin : sw_y ;
                    mrg = mrg>gal_swipemargin ? gal_swipemargin : mrg ;
                    $('#gal_preimg').css('top',mrg+'px');
                    $('#gallery').css('opacity',(1-Math.abs(mrg)/gal_swipemargin));
                    $('#gal_preimg').css('left',0);
                    if ( Math.abs(mrg) == gal_swipemargin ) { gal_swiperesult = 3; }
                }
            }
            if ( gal_pitched ) { $('#gallery').css('overflow','auto'); }
            else { $('#gallery').css('overflow','visible'); }
        },
        'touchend' : function(event) {
            if ( gal_swiperesult == 0 ) {
                $('#gal_preimg').animate({'top':0,'left':0},200);
                $('#gallery').animate({'opacity':1},200);
            }
            if ( gal_swiperesult == 1 ) {
                $('#gal_preimg').animate({'left':(gal_swipemargin+100)+'px','opacity':0},200,function(){
                    $('#gal_preimg').css('left',0);
                    gal_preshow();
                    $('#gal_preimg').animate({'opacity':1},200);
                });
            }
            if ( gal_swiperesult == 2 ) {
                $('#gal_preimg').animate({'left':(-gal_swipemargin-100)+'px','opacity':0},200,function(){
                    $('#gal_preimg').css('left',0);
                    gal_nextshow();
                    $('#gal_preimg').animate({'opacity':1},200);
                });
            }
            if ( gal_swiperesult == 3 ) {
                $('#gallery').click();
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
    $('#gal_image, #gal_previmg, #gal_nextimg').stop().fadeTo(100,0);
    var hiddenImg = new Image();
    hiddenImg.onload = function(){
        gal_imgwidth = this.width;
        gal_imgheight = this.height;
        var crd = gal_setcoord();
        var wd = crd['w'];
        var hg = crd['h'];
        var thsc = this.src;
        if (( $('#gal_preimg').width() != wd )||( $('#gal_preimg').height() != hg )) {
            var sp = Math.round(Math.abs($('#gal_preimg').width()*$('#gal_preimg').height()-wd*hg)/1500);
            sp = sp>400 ? 400 : sp ;
            sp = sp<150 ? 150 : sp ;
            $('#gal_preimg').animate({width : wd+'px', height : hg+'px'}, sp, 'swing', function(){ gal_endani(thsc, wd, hg); });
        } else {
            gal_endani(thsc, wd, hg);
        }
    }
    hiddenImg.src = img;
}

function gal_setcoord() {
    var dw = $(window).width();
    var dh = $(window).height();
    var wd = gal_imgwidth;
    var hg = gal_imgheight;
    var pnwd = $('#gal_previmg').is(':visible') ? gal_prevnextwidth : 0 ;
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
        $('#gal_previmg img').attr('src',gal_images[gal_index-1].src).show();
        $('#gal_previmg').removeClass('gal_repeat');
    } else {
        $('#gal_previmg img').hide();
        $('#gal_previmg').addClass('gal_repeat');
    }
    if ( gal_index < gal_images.length-1 ) {
        $('#gal_nextimg img').attr('src',gal_images[gal_index+1].src).show();
        $('#gal_nextimg').removeClass('gal_repeat');
    } else {
        $('#gal_nextimg img').hide();
        $('#gal_nextimg').addClass('gal_repeat');
    }
    $('#gal_image').attr('src',thsc).stop().fadeTo(100,1);
    if ( gal_images.length > 1 ) { $('#gal_previmg, #gal_nextimg').css('visibility','visible').stop().fadeTo(100,1); }
}

function gal_resize() {
    var crd = gal_setcoord();
    $('#gal_preimg').width(crd['w']);
    $('#gal_preimg').height(crd['h']);
    gal_pitched = false;
    $('#gallery').css('overflow','visible');
}

function gal_preshow() {
    if ( gal_index == 0 ) { gal_index = gal_images.length-1; }
    else { gal_index--; }
    gal_setimage(gal_extrflnm(gal_images[gal_index].src));
}

function gal_nextshow() {
    if ( gal_pitched ) {
        $('#gal_preimg').animate({'width':gal_realsize.w+'px','height':gal_realsize.h+'px'},300);
        gal_pitched = false;
        $('#gallery').css('overflow','visible');
        return;
    }
    if ( gal_images.length < 2 ) {
        $('#gallery').click();
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

$(window).resize(function () {
    if ( $('#gallery').is(':visible') ) { gal_resize(); }
});