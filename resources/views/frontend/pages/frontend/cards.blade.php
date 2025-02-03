<div class="card_text">
    <div class="card_btn">
        <button><a href="#">مشاهدة جميع المرشيدون</a></button>
    </div>
    <div class="card_title">
        <p>مسارك للمرشيدون هنا</p>
        <h2>المرشيدون</h2>
    </div>
</div>
<div class="card">
    <div class="card_container">
        <div class="card_content">
            <div class="card_data">
                <div class="card_boxes">
                    @foreach ($services as $service)
                    <a href="{{ route('service.view',['ServicesId' => $service->id]) }}">
                        <div class="card_boxes_bg">
                            <div class="card_boxes_cn">
                                <div class="card_boxes_img">
                                <img src="{{ asset('images/الشعار.png') }}" alt="">
                            </div>
                        </div>
                        <div class="card_boxes_description">
                            <div class="card_boxes_title">
                                <h3>المرشد</h3>
                                <h4>د/{{ ($service->name) }}</ا>
                                </div>
                                <div class="card_boxes_stars">
                                    <div class="card_boxes_stars_icon">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="card_boxes_small_description">
                                        <p style="color: #565656"> دكتور واخصائي في العلاج النفسي والعلاج من الت ...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    @foreach ($services as $service)
                    <a href="{{ route('service.view',['ServicesId' => $service->id]) }}">
                        <div class="card_boxes_bg">
                            <div class="card_boxes_cn">
                                <div class="card_boxes_img">
                                <img src="{{ asset('images/الشعار.png') }}" alt="">
                            </div>
                        </div>
                        <div class="card_boxes_description">
                            <div class="card_boxes_title">
                                <h3>المرشد</h3>
                                <h4>د/{{ ($service->name) }}</ا>
                                </div>
                                <div class="card_boxes_stars">
                                    <div class="card_boxes_stars_icon">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="card_boxes_small_description">
                                        <p style="color: #565656"> دكتور واخصائي في العلاج النفسي والعلاج من الت ...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    @foreach ($services as $service)
                    <a href="{{ route('service.view',['ServicesId' => $service->id]) }}">
                        <div class="card_boxes_bg">
                            <div class="card_boxes_cn">
                                <div class="card_boxes_img">
                                <img src="{{ asset('images/الشعار.png') }}" alt="">
                            </div>
                        </div>
                        <div class="card_boxes_description">
                            <div class="card_boxes_title">
                                <h3>المرشد</h3>
                                <h4>د/{{ ($service->name) }}</ا>
                                </div>
                                <div class="card_boxes_stars">
                                    <div class="card_boxes_stars_icon">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="card_boxes_small_description">
                                        <p style="color: #565656"> دكتور واخصائي في العلاج النفسي والعلاج من الت ...</p>
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
