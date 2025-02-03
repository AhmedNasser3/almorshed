{{--  article banner  --}}
<div class="test_banner" style="padding: 30px 10%">
    <div class="test_banner_container">
        <div class="test_banner_content">
            <div class="test_banner_data" style="direction: rtl">
                <div class="test_banner_img">
                    <img style="width: 450px;" src="{{ asset('images/examnet-data-time-saver-colored.png') }}" alt="">
                </div>
                <div class="test_banner_test">
                    <h3>مقالات تحتوي على جميع المعلومات</h3>
                    <p>
                        استكشف مجموعة متنوعة من المقالات التي تضم معلومات شاملة وموثوقة حول مختلف المواضيع الصحية والطبية والنفسية. هذه المقالات مكتوبة بعناية من قبل خبراء متخصصين لتوفير إرشادات ونصائح مبنية على أسس علمية تساعدك على فهم أدق التفاصيل وتوجيهك نحو اتخاذ قرارات مستنيرة بشأن صحتك وحياتك.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card_text">
    <div class="card_btn">
        <button><a href="#">مشاهدة جميع المقالات</a></button>
    </div>
    <div class="card_title">
        <p>مسارك للمقالات هنا</p>
        <h2>المقالات</h2>
    </div>
</div>
<div class="card" style="background: linear-gradient(135deg, #fcfffb 85%, #8fffda -15%);">
    <div class="card_container">
        <div class="card_content">
            <div class="card_data">
                <div class="card_boxes">
                    @foreach ($articles as $article)
                    <a href="" style="background:white;">
                        <div class="card_boxes_bg">
                            <div class="card_boxes_cn">
                            <div class="card_boxes_img">
                                <img  src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->alt }}" style="object-fit: cover;min-width:160px;max-width:160px">
                            </div>
                        </div>
                        <div class="card_boxes_description" >
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
                    @foreach ($articles as $article)
                    <a href="" style="background:white;">
                        <div class="card_boxes_bg">
                            <div class="card_boxes_cn">
                            <div class="card_boxes_img">
                                <img  src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->alt }}" style="object-fit: cover;min-width:160px;max-width:160px">
                            </div>
                        </div>
                        <div class="card_boxes_description" >
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
                    @foreach ($articles as $article)
                    <a href="" style="background:white;">
                        <div class="card_boxes_bg">
                            <div class="card_boxes_cn">
                            <div class="card_boxes_img">
                                <img  src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->alt }}" style="object-fit: cover;min-width:160px;max-width:160px">
                            </div>
                        </div>
                        <div class="card_boxes_description" >
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
