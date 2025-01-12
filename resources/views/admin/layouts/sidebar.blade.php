<div class="sidebar" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
    <div class="sidebar_container">
        <div class="sidebar_content">
            <div class="sidebar_data">
                <div class="sidebar_logo">
                    <h3>{{ __('Almorshed') }}</h3>
                    <img src="{{ asset('images/الشعار.png') }}" alt="">
                </div>
                <div class="sidebar_title">
                    <h4>{{ __('Dashboard') }}</h4>
                    <div class="sidebar_links">
                        <ul style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                            <li>
                                <a href="{{ url('/admin') }}" class="sidebar_link">{{ __('Users') }} <span class="arrow"><i class="fa-solid fa-house"></i></span></a>
                                <a href="#" class="sidebar_link">{{ __('Users') }} <span class="arrow"><i class="fa-solid fa-arrow-down"></i></span></a>
                                <ul class="sidebar_link_bg">
                                    <a href="{{ route('moderators.show') }}"><li>{{ __('Morsheds') }}</li></a>
                                    <a href="{{ route('admins.show') }}"><li>{{ __('Admins') }}</li></a>
                                    <a href=""><li>{{__('Customer')}}</li></a>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar_link">ادارة المحتوي<span class="arrow"><i class="fa-solid fa-arrow-down"></i></span></a>
                                <ul class="sidebar_link_bg">
                                    <a href="{{ route('articles.index') }}"><li>مقالات</li></a>
                                    <a href="{{ route('moderators.show') }}"><li>اختبارات</li></a>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar_link">{{ __('Permissions') }}<span class="arrow"><i class="fa-solid fa-arrow-down"></i></span></a>
                                <ul class="sidebar_link_bg">
                                    <a href=""><li>{{ __('Add admin permissions') }}</li></a>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('profile.show') }}" class="sidebar_link">{{ __('My Account') }}<span class="arrow"><i class="fa-regular fa-user"></i></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
