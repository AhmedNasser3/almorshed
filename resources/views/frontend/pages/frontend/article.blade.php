<div class="card_text">
    <div class="card_btn">
        <button><a href="#">مشاهدة جميع المقالات</a></button>
    </div>
    <div class="card_title">
        <p>مسارك للمقالات هنا</p>
        <h2>المقالات</h2>
    </div>
</div>
<div class="card">
    <div class="card_container">
        <div class="card_content">
            <div class="card_data">
                <div class="card_boxes">
                    @foreach ($articles as $article)
                    <a href="">
                        <div class="card_boxes_bg">
                            <div class="card_boxes_cn">
                            <div class="card_boxes_img">
                                <img  src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->alt }}" style="object-fit: cover;min-width:160px;max-width:160px">
                            </div>
                        </div>
                        <div class="card_boxes_description">
                            <div class="card_boxes_title">
                                <h3>المقال</h3>
                                <h4>الناشر/{{ $article->user->name }}</ا>
                                </div>
                                <div class="card_boxes_stars">
                                    <div class="card_boxes_small_description" style="color: #131313">
                                        <h3>{{ $article->title }}</h3>
                                        @php
                                        // تقسيم النص إلى كلمات باستخدام الفراغ
                                        $words = explode(' ', $article->subtitle ?? '');
                                        // استخراج أول ثلاث كلمات فقط
                                        $firstThreeWords = implode(' ', array_slice($words, 0, 12));
                                    @endphp
                                        <p style="color: #939393; padding:10px 0 0 0;">{{ $firstThreeWords}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
</div>
