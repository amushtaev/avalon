var bnrs = {};

function bn_start(bn,ls,is,sp,it,fl,nw,ef) {
    bnrs[bn] = {};
    bnrs[bn].links = ls;
    bnrs[bn].ims = is;
    bnrs[bn].speed = sp;
    bnrs[bn].interval = it;
    bnrs[bn].folder = fl;
    bnrs[bn].now = nw;
    bnrs[bn].ani = false;
    bnrs[bn].effect = ef;
    if ( it != 0 ) { bnrs[bn].stint = setTimeout("bn_anim('"+bn+"')",it); }
}

function bn_anim(bn) {
    if ( bnrs[bn].now == bnrs[bn].links.length ) { bn_anishow(bn,1); }
    else { bn_anishow(bn,bnrs[bn].now+1); }
}

function bn_anishow(bn,num) {
    if ( bnrs[bn].ani == true ) { return; }
    if ( num == bnrs[bn].now ) { return; }
    bnrs[bn].ani = true;
    $('#'+bn+'_buts').children('div').attr('class',bn+'_act_but');
    $('#'+bn+'_buts').children('div:eq('+(num-1)+')').attr('class',bn+'_now_but');
    var nowimg = bnrs[bn].folder + bnrs[bn].ims[bnrs[bn].now-1];
    var numimg = bnrs[bn].folder + bnrs[bn].ims[num-1];
    clearTimeout(bnrs[bn].stint);
    
    if ( !bnrs[bn].effect[0] ) {
        $('#'+bn+'_ani img:eq(0)').attr('src',numimg);
        if ( bnrs[bn].links[num-1] == '#' ) { $('#'+bn+'_ani 1:eq(0)').removeAttr("href"); }
        else { $('#'+bn+'_ani a:eq(0)').attr("href",bnrs[bn].links[num-1]); }
        bn_endani(bn,num);
    }
    
    if ( bnrs[bn].effect[0] == 'emergence' ) {
        $('#'+bn+'_ani').html('<div><span></span><a rel="nofollow" target="_blank"><img src="'+bnrs[bn].folder + bnrs[bn].ims[num-1]+'" /></a></div>'+
                              '<div>'+$('#'+bn+'_ani').html()+'</div>');
        $('#'+bn+'_ani div').css({'position':'absolute','top':0,'left':0,'bottom':0,'right':0});
        if ( bnrs[bn].links[num-1] != '#' ) { $('#'+bn+'_ani a:eq(0)').attr("href",bnrs[bn].links[num-1]); }
        $('#'+bn+'_ani a:eq(1)').fadeTo(bnrs[bn].speed,0,function(){
            $('#'+bn+'_ani').html($('#'+bn+'_ani div:eq(0)').html()).removeAttr('class');
            bn_endani(bn,num);
        });
    }
    
    if ( bnrs[bn].effect[0] == 'vlines' ) {
        var vlc = bnrs[bn].effect[1];
        var vlw = $('#'+bn+'_ani').width();
        var vlh = $('#'+bn+'_ani').height();
        var vlih0 = $('#'+bn+'_ani').clone()
                                       .attr('id','')
                                       .css({'margin':0,'height':vlh+'px','width':vlw+'px','position':'absolute','top':0});
        var vlih1 = $(vlih0).clone();
        vlih1.find('img').attr('src',numimg);
        if ( bnrs[bn].links[num-1] == '#' ) { vlih1.find('a').removeAttr("href"); }
        else { vlih1.find('a').attr("href",bnrs[bn].links[num-1]); }
        var mlw = Math.floor(vlw/vlc);
        $('#'+bn+'_ani').empty();
        for ( i=0; i<vlc; i++ ) {
            $('#'+bn+'_ani').append(
                $('<div></div>').css({'display':'inline-block',
                                      'height':vlh+'px',
                                      'width':mlw+'px',
                                      'overflow':'hidden',
                                      'margin':0,
                                      'position':'relative'})
                                .append( vlih0.clone().css('left',(-mlw*i)+'px') )
                                .append( vlih1.clone().css({'left':(-mlw*i)+'px',height:0,opacity:0}) )
            );
        }
        if ( mlw*i < vlw ) {
            $('#'+bn+'_ani').append(
                $('<div></div>').css({'display':'inline-block',
                                      'height':vlh+'px',
                                      'width':(vlw-mlw*i)+'px',
                                      'overflow':'hidden',
                                      'margin':0,
                                      'position':'relative'})
                                .append( vlih0.clone().css('left',(-mlw*i)+'px') )
                                .append( vlih1.clone().css({'left':(-mlw*i)+'px',height:0,opacity:0}) )
            );
        }
        var lsl = $('#'+bn+'_ani').children('div');
        if ( num > bnrs[bn].now ) {
            for ( i=lsl.length-1; i>0; i-- ) {
                $(lsl[i]).children('div:eq(1)').delay(bnrs[bn].effect[2]*(lsl.length-i)).animate({height:vlh+'px',opacity:1},bnrs[bn].speed);
            }
            $(lsl[0]).children('div:eq(1)').delay(bnrs[bn].effect[2]*lsl.length).animate({height:vlh+'px',opacity:1},
                                                                         bnrs[bn].speed,
                                                                         "swing",
                                                                         function(){
                                                                            $('#'+bn+'_ani').html(vlih1.html());
                                                                            bn_endani(bn,num);
                                                                         });
        } else {
            for ( i=0; i<lsl.length-1; i++ ) {
                $(lsl[i]).children('div:eq(1)').delay(bnrs[bn].effect[2]*i).animate({height:vlh+'px',opacity:1},bnrs[bn].speed);
            }
            $(lsl[lsl.length-1]).children('div:eq(1)').delay(bnrs[bn].effect[2]*lsl.length).animate({height:vlh+'px',opacity:1},
                                                                         bnrs[bn].speed,
                                                                         "swing",
                                                                         function(){
                                                                            $('#'+bn+'_ani').html(vlih1.html());
                                                                            bn_endani(bn,num);
                                                                         });
        }
    }
    
    if ( bnrs[bn].effect[0] == 'slide' ) {
        $('#'+bn+'_ani').html('<div id="'+bn+'_slide_imgs">'+
                               '<div id="'+bn+'_1slidedv">'+$('#'+bn+'_ani').html()+'</div>'+
                               '<div>'+$('#'+bn+'_ani').html()+'</div>'+
                               '</div>').css({'overflow':'hidden','white-space':'nowrap'});
        $('#'+bn+'_slide_imgs').css({'width':($('#'+bn+'_ani').width()*2+5)+'px','height':$('#'+bn+'_ani').height()+'px','text-align':'left','position':'relative'});
        $('#'+bn+'_1slidedv').css({'margin-right':'5px'});
        $('#'+bn+'_slide_imgs div').css({'width':$('#'+bn+'_ani').width()+'px','height':$('#'+bn+'_ani').height()+'px','display':'inline-block','text-align':'center','padding':0});
        var bnims = $('#'+bn+'_slide_imgs').find('img');
        var bnas = $('#'+bn+'_slide_imgs').find('a');
        if ( num > bnrs[bn].now ) {
            bnims[0].src = nowimg;
            $('#'+bn+'_slide_imgs').stop().css('left',0);
            bnims[1].src = numimg;
            if ( bnrs[bn].links[num-1] == '#' ) { $(bnas[1]).removeAttr("href"); }
            else { $(bnas[1]).attr("href",bnrs[bn].links[num-1]); }
            var nwlf = $('#'+bn+'_ani').width()-$('#'+bn+'_slide_imgs').width();
            $('#'+bn+'_slide_imgs').animate({left:nwlf+'px'},bnrs[bn].speed,"swing",function(){
                $('#'+bn+'_ani').html($('#'+bn+'_slide_imgs div:eq(1)').html()).css({'overflow':'','white-space':''});
                bn_endani(bn,num);
            });
        } else {
            bnims[1].src = nowimg;
            $('#'+bn+'_slide_imgs').stop().css('left',($('#'+bn+'_ani').width()-$('#'+bn+'_slide_imgs').width())+'px');
            bnims[0].src = numimg;
            if ( bnrs[bn].links[num-1] == '#' ) { $(bnas[0]).removeAttr("href"); }
            else { $(bnas[0]).attr("href",bnrs[bn].links[num-1]); }
            $('#'+bn+'_slide_imgs').animate({'left':'0px'},bnrs[bn].speed,"swing",function(){
                $('#'+bn+'_ani').html($('#'+bn+'_slide_imgs div:eq(0)').html()).css({'overflow':'','white-space':''});
                bn_endani(bn,num);
            });
        }
    }
}

function bn_endani(bn,num) {
    bnrs[bn].now = num;
    bnrs[bn].ani = false;
    if ( bnrs[bn].interval != 0 ) { bnrs[bn].stint = setTimeout("bn_anim('"+bn+"')",bnrs[bn].interval); }
}

function bn_previous(bn) {
    if ( bnrs[bn].now == 1 ) { bn_anishow(bn,bnrs[bn].links.length) }
    else { bn_anishow(bn,bnrs[bn].now-1); }
}

function bn_next(bn) {
    if ( bnrs[bn].now == bnrs[bn].links.length ) { bn_anishow(bn,1); }
    else { bn_anishow(bn,bnrs[bn].now+1); }
}