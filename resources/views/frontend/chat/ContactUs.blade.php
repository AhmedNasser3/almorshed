    <div class="card_text">
        <div class="card_btn">
            <button style="visibility: hidden"><a href="#">مشاهدة جميع المقالات</a></button>
        </div>
        <div class="card_title">
            <p>مسارك للتواصل معنا هنا</p>
            <h2>تواصل معنا</h2>
        </div>
    </div>
    <div class="contact-container" style="direction: rtl">
        <h2>التواصل معنا</h2>
        {{--  <form action="send_email.php" method="POST">  --}}
            <div class="form-group">
                <label for="email">البريد الالكتروني</label>
                <input type="email" id="email" name="email" required placeholder="ادخل بريدك الالكتروني">
            </div>
            <div class="form-group">
                <label for="name">اسمك</label>
                <input type="text" id="name" name="name" required placeholder="ادخل اسمك">
            </div>
            <div class="form-group">
                <label for="subject">العنوان</label>
                <input type="text" id="subject" name="subject" required placeholder="ادخل العنوان">
            </div>
            <div class="form-group">
                <label for="message">الرسالة</label>
                <textarea id="message" name="message" required placeholder="رسالتك"></textarea>
            </div>
            <button type="submit" class="btn-submit">Send</button>
        {{--  </form>  --}}
    </div>
