<div class="card_text">
    <div class="card_btn">
        <button><a href="#">مشاهدة جميع الاختبارات</a></button>
    </div>
    <div class="card_title">
        <p>مسارك للاختبارات هنا</p>
        <h2>الاختبارات</h2>
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
                            </div>
                        </div>
                        <div class="card_boxes_description">
                            <div class="card_boxes_title">
                                <h3>الاختبار</h3>
                                <h4>الناشر/{{ $article->user->name }}</ا>
                                </div>
                                <div class="card_boxes_stars">
                                    <div class="card_boxes_small_description" style="color: #131313">
                                        <h3>{{ $article->title }}</h3>
                                        @php
                                        $words = explode(' ', $article->subtitle ?? '');
                                        $firstThreeWords = implode(' ', array_slice($words, 0, 60));
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
