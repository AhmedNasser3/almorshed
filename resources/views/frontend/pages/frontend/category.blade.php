<div class="category">
    <div class="category_container">
        <div class="category_content">
            <div class="category_data">
                <div class="category_icons">
                    @if (auth()->check())
                    <a href="{{ route('profile.show') }}"><i class="fa-regular fa-user"></i></a>
                    @else
                    <div class="category_btns">
                        <a href="{{ route('login') }}">دخول</a>
                        <a href="{{ route('register') }}">تسجيل</a>
                    </div>
                    @endif
                </div>
                <div class="category_links">
                    <div class="category_link"><a href="#">جميع الفئات</a></div>
                    <div class="category_link"><a href="#">المقالات</a></div>
                    <div class="category_link"><a href="#">الاختبارات</a></div>
                    <div class="category_link"><a href="#">المرشيدون</a></div>
                    <div class="category_link"><a href="#">مواعيد</a></div>
                    <div class="category_link"><a style="color:#b9cc2d;" href="#">جميع الفئات</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
