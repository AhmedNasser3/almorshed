@extends('frontend.master')
@section('frontendContent')
<div class="service">
    <div class="service_container">
        <div class="service_data">
            <div class="service_content">
                <div class="service_head">
                    <div class="service_btn">
                        <button><a href="#">سيرة المرشد</a></button>
                    </div>
                    <div class="service_title">
                        <p>احجز موعك من هنا</p>
                        <h2>المرشد</h2>
                    </div>
                </div>
                <div class="service_body" style="direction: rtl; ">
                    <div class="service_name" >
                        <img style="width: 100px" src="{{ asset('images/الشعار.png') }}" alt="">
                        <h3>د/ <span> احمد ناصر</span></h3>
                        <p> <span> نبذة/</span>
                            <br>
                            اخصائي الطب النفسي
                        </p>
                        <p style="width:900px;margin:20px 0 0 0">
                            <span>السيرة/</span>
                            <br>
                            د. أحمد علي، أخصائي الطب النفسي والمعالج السلوكي المعرفي، يتمتع بخبرة تزيد عن 10 سنوات في مساعدة الأفراد على تحسين صحتهم النفسية والتغلب على التحديات التي تواجههم. حاصل على درجة الدكتوراه في الطب النفسي من جامعة مرموقة، وشارك في العديد من البرامج التدريبية العالمية المعتمدة.
                            <br><br>
                            يمتاز د. أحمد بأسلوبه الإنساني في التعامل مع مرضاه، حيث يسعى لفهم احتياجاتهم النفسية والعملية، ويعتمد على أحدث الطرق العلاجية المبتكرة مثل العلاج السلوكي المعرفي (CBT) والعلاج النفسي الديناميكي.
                            <br><br>
                            قدم د. أحمد استشارات وعلاجات ناجحة لآلاف المرضى الذين يعانون من اضطرابات القلق، الاكتئاب، اضطرابات ما بعد الصدمة، وغيرها من الحالات النفسية المعقدة. كما يحرص على تقديم ورش عمل ومحاضرات توعوية بهدف نشر الوعي بأهمية الصحة النفسية في المجتمع.
                            <br><br>
                            بجانب ممارسته المهنية، يكرّس د. أحمد وقته للبحث العلمي، حيث نشر العديد من الأبحاث في مجلات طبية متخصصة، وشارك في مؤتمرات دولية لتطوير أدوات ووسائل جديدة لتحسين جودة العلاج النفسي.
                        </p>
                    </div>
                    <div class="service_services">
                        <div class="service_services_container">
                            <div class="service_services_content">
                                <div class="service_services_data">
                                    <a href="">
                                        <div class="service_services_bg">
                                            <div class="service_services_cn">
                                                <div class="service_services_title">
                                                    <h2>الخدمة</h2>
                                                    <div class="service_services_price">
                                                        <h3>30.د</h3>
                                                    </div>
                                                </div>
                                                <div class="service_services_description">
                                                    <div class="service_services_img">
                                                        <img src="{{ asset('images/الشعار.png') }}" alt="">
                                                    </div>
                                                    <h3>مكالمة هاتفية</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="service_services_bg">
                                            <div class="service_services_cn">
                                                <div class="service_services_title">
                                                    <h2>الخدمة</h2>
                                                    <div class="service_services_price">
                                                        <h3>30.د</h3>
                                                    </div>
                                                </div>
                                                <div class="service_services_description">
                                                    <div class="service_services_img">
                                                        <img src="{{ asset('images/الشعار.png') }}" alt="">
                                                    </div>
                                                    <h3>مكالمة هاتفية</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="service_services_bg">
                                            <div class="service_services_cn">
                                                <div class="service_services_title">
                                                    <h2>الخدمة</h2>
                                                    <div class="service_services_price">
                                                        <h3>30.د</h3>
                                                    </div>
                                                </div>
                                                <div class="service_services_description">
                                                    <div class="service_services_img">
                                                        <img src="{{ asset('images/الشعار.png') }}" alt="">
                                                    </div>
                                                    <h3>مكالمة هاتفية</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="service_services_bg">
                                            <div class="service_services_cn">
                                                <div class="service_services_title">
                                                    <h2>الخدمة</h2>
                                                    <div class="service_services_price">
                                                        <h3>30.د</h3>
                                                    </div>
                                                </div>
                                                <div class="service_services_description">
                                                    <div class="service_services_img">
                                                        <img src="{{ asset('images/الشعار.png') }}" alt="">
                                                    </div>
                                                    <h3>مكالمة هاتفية</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="padding: 40px 10%">
    <div class="card_text" >
        <div class="card_btn">
            <button style="display: none" ><a href="#">مشاهدة جميع المقالات</a></button>
        </div>
        <div class="card_title">
            <p>مسارك للمقالات هنا</p>
            <h2>التقييمات</h2>
        </div>
    </div>
</div>
@include('frontend.pages.review.review')


@endsection
