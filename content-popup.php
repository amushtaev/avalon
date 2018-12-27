<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>
<section about="popup">
    <div id="popups">
        <div id="preview-mains">
            <div id="smallreview-mains">
                <?php get_template_part( 'content', 'review-mains' ); ?>
            </div>
        </div>
        <div id="pcommand">
            <ul class="command">
                <?php get_template_part( 'content', 'team' ); ?>
            </ul>
        </div>
        <div id="pselectclub" style="width: 85%;height:50% ">
            <iframe src="" scrolling="no" frameborder="0" style="border:none; width:100%; height:90%;" allowTransparency="true"></iframe>
        </div>
        <div id="pfree">
            <p>Благодарим!<br><br>Ваша заявка успешно отправлена на рассмотрение. Вскоре наш администратор перестанет прыгать от радости и наберёт вас.</p>
            <div>
                <button class="center_button" onclick="jQuery('#popups_close').click()">ОК</button>
            </div>
        </div>
        <span id="popups_close">Закрыть</span>
    </div>
</section>
<script type="text/javascript" async defer>
    setTimeout(function() {
        var f = document.querySelectorAll('iframe')[0];
        f.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2565.733632929067!2d36.26279631571448!3d49.97885367941306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a08382ccddff%3A0x963ff4847571cb16!2z0YPQuy4g0J_Qu9C10YXQsNC90L7QstGB0LrQsNGPLCA3Mywg0KXQsNGA0YzQutC-0LIsINCl0LDRgNGM0LrQvtCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDYxMDAw!5e0!3m2!1sru!2sua!4v1541147630646';
        f.width = "800px"; f.height = "400px";
        console.log('google loaded after 2s');
    }, 2000)
</script>