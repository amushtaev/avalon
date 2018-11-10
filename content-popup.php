<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>
<section about="popup">
    <div id="popups">
        <div id="previews">
            <div id="smallreviews">
                <?php get_template_part( 'content', 'reviews' ); ?>
            </div>
        </div>
        <div id="pcommand">
            <ul class="command">
                <?php get_template_part( 'content', 'team' ); ?>
            </ul>
        </div>
        <div id="pselectclub">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2565.733632929067!2d36.26279631571448!3d49.97885367941306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a08382ccddff%3A0x963ff4847571cb16!2z0YPQuy4g0J_Qu9C10YXQsNC90L7QstGB0LrQsNGPLCA3Mywg0KXQsNGA0YzQutC-0LIsINCl0LDRgNGM0LrQvtCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDYxMDAw!5e0!3m2!1sru!2sua!4v1541147630646" width="800" height="282" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div id="pfree">
            <p>Благодарим!<br><br>Ваша заявка успешно отправлена на рассмотрение. Вскоре наш администратор перестанет прыгать от радости и наберёт вас.</p>
            <div>
                <button class="center_button" onclick="$('#popups_close').click()">ОК</button>
            </div>
        </div>
        <span id="popups_close">Закрыть</span>
    </div>
</section>