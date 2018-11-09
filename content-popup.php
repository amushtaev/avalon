<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
global $post;
?>

<div id="popups">
    <div id="previews">
        <div id="smallreviews">
            <div class="review">
                <div class="rev_img">
                    <img src="./img/placeholder.jpg">
                </div>
                <b>Name</b>
                <div class="rev_text">
                    <span><br></span>
                    <span><br></span>
                    <span>Description</span>
                </div>
                <div class="rev_smalltext">
                    <span> Description small text.</span>
                </div>
            </div>
            <div class="review">
                <div class="rev_img">
                    <img src="./img/placeholder.jpg">
                </div>
                <b>Name</b>
                <div class="rev_text">
                    <span><br></span>
                    <span><br></span>
                    <span>Description</span>
                </div>
                <div class="rev_smalltext">
                    <span> Description small text.</span>
                </div>
            </div>
            <div class="review">
                <div class="rev_img">
                    <img src="./img/placeholder.jpg">
                </div>
                <b>Name</b>
                <div class="rev_text">
                    <span><br></span>
                    <span><br></span>
                    <span>Description</span>
                </div>
                <div class="rev_smalltext">
                    <span> Description small text.</span>
                </div>
            </div>
        </div>
        <div id="bigreviews">
            <div class="bigreview">
                <img src="./img/placeholder.jpg">
                <span>
                        <p>bigreview description.</p>
                    </span>
            </div>
        </div>
    </div>
    <!--Insert hear from Command JS-->
    <div id="pcommand">
        <ul class="command"></ul>
    </div>


    <div id="pselectclub">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2565.733632929067!2d36.26279631571448!3d49.97885367941306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a08382ccddff%3A0x963ff4847571cb16!2z0YPQuy4g0J_Qu9C10YXQsNC90L7QstGB0LrQsNGPLCA3Mywg0KXQsNGA0YzQutC-0LIsINCl0LDRgNGM0LrQvtCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDYxMDAw!5e0!3m2!1sru!2sua!4v1541147630646" width="800" height="282" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

    <div id="pfree">
        <img src="./Спортивный клуб _Чемпион__files/success.png">
        <p>Благодарим!<br><br>Ваша заявка успешно отправлена на рассмотрение. Вскоре наш администратор перестанет прыгать от радости и наберёт вас.</p>
        <div>
            <button class="center_button" onclick="$(&#39;#popups_close&#39;).click()">ОК</button>
        </div>
    </div>

    <span id="popups_close">Закрыть</span>

</div>