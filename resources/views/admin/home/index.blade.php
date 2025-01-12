@extends('admin.master')
@section('AdminContent')
<div class="home" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<div class="home_container">
    <div class="home_alarm">
        <div class="home_container_container">
            <div class="home_container_title">
                <h2>
                    <span>
                        <i class="fa-solid fa-circle-info"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                    </span>
                    مرحبا بك ايها الادمن {{ auth()->check() ? auth()->user()->name : 'ادمن' }}
                </h2>
                <i id="home_toggle" class="fa-solid fa-x"></i> <!-- Toggle Icon -->
            </div>
        </div>
    </div>
    <div class="home_content">
        <div class="home_data">
            {{--  analytics  --}}
            <div class="home_cn">
                <div class="home_bg" style="background-color: #1b2d68;">
                    <div class="home_title">
                        <div class="home_icons">
                            <div class="home_icon"><i style="background-color: #ffffff;color: #334da0;"class="fa-solid fa-user"></i></div>
                        </div>
                        <h2 style="color: #fff;">{{ __('Number of users') }} - <span>60</span></h2>
                    </div>
                </div>
                <div class="home_bg">
                    <div class="home_title">
                        <div class="home_icons">
                            <div class="home_icon"><i class="fa-solid fa-person-military-pointing"></i></div>
                        </div>
                        <h2>{{ __('Number of Morsheds') }} - <span>32</span></h2>
                    </div>
                </div>
                <div class="home_bg">
                    <div class="home_title">
                        <div class="home_icons">
                            <div class="home_icon"><i class="fa-solid fa-lock"></i></div>
                        </div>
                        <h2>{{ __('Number of Admins') }} - <span>18</span></h2>
                    </div>
                </div>
            </div>
            {{--  Account  --}}
            <div class="account">
                <div class="account_container">
                    <div class="account_content">
                        <div class="account_data">
                            <div class="account_content">
                                <div class="account_title">
                                    <h3>{{ __('Account') }}</h3>
                                </div>
                            </div>
                            <div class="account_content_bg">
                                <div class="account_content_bg_data">
                                    <div class="account_content_bg_title">
                                        <h3 style="color: #131313">احمد ناصر مصطفي</h3>
                                        <p>151352</p>
                                    </div>
                                    <div class="account_content_bg_title">
                                        <h3>تاريخ الانطلاق</h3>
                                        <p>2025 18 يناير</p>
                                    </div>
                                    <div class="account_content_bg_title">
                                        <h3>الحاله</h3>
                                        <h2 style="color: rgb(90, 182, 102);"><i class="fa-solid fa-toggle-on"></i></h2>
                                    </div>
                                    <div class="account_content_bg_title">
                                        <h3>الإعدادت</h3>
                                        <p><i class="fa-solid fa-gear"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  notify  --}}
            <div class="notify">
                <div class="notify_container">
                    <div class="notify_content">
                        <div class="notify_data">
                            <div class="notify_title_cn">
                                <div class="notify_title">
                                    <h2>احدث الاشعارات</h2>
                                    <p>3 اشعار مفعّل</p>
                                </div>
                                <div class="notify_btn">
                                    <button><a href="#">اظهار كل الاشعارات</a></button>
                                </div>
                            </div>
                            <div class="notify_table">
                                <table>
                                    <tr class="tr_head">
                                        <th>الاشعار</th>
                                        <th>يظهر بعد</th>
                                        <th>مدة الظهور</th>
                                        <th>يظهر للزائر</th>
                                        <th>الحالة</th>
                                        <th>الإعدادت</th>
                                    </tr>
                                    <tr class="tr_body">
                                        <td>
                                            <h3>عدد الزوار الآن</h3>
                                            <p> العداد المباشر (الزوار)</p>
                                        </td>
                                        <td>ثواني 2 زمن التأخير</td>
                                        <td>5 ثواني</td>
                                        <td>يتكرر</td>
                                        <td><h2 style="color: rgb(90, 182, 102)"><i class="fa-solid fa-toggle-on"></i></h2></td>
                                        <td ><i style="cursor: pointer" class="fa-solid fa-gear"></i></td>
                                    </tr>
                                    <tr class="tr_body">
                                        <td>
                                            <h3>عميل اشترى قبل لحظات</h3>
                                            <p> عميل اشترى قبل لحظات</p>
                                        </td>
                                        <td>ثواني 2 زمن التأخير</td>
                                        <td>15 ثواني</td>
                                        <td>مرة واحد فقط</td>
                                        <td><h2 style="rotate:180deg; color: rgb(145, 52, 52)"><i class="fa-solid fa-toggle-on"></i></h2></td>
                                        <td ><i style="cursor: pointer" class="fa-solid fa-gear"></i></td>
                                    </tr>
                                    <tr class="tr_body">
                                        <td>
                                            <h3>عدد الزوار الآن</h3>
                                            <p> العداد المباشر (الزوار)</p>
                                        </td>
                                        <td>ثواني 2 زمن التأخير</td>
                                        <td>2 ثواني</td>
                                        <td>يتكرر</td>
                                        <td><h2 style="color: rgb(90, 182, 102)"><i class="fa-solid fa-toggle-on"></i></h2></td>
                                        <td ><i style="cursor: pointer" class="fa-solid fa-gear"></i></td>
                                    </tr>
                                    <tr class="tr_body">
                                        <td>
                                            <h3>عميل اشترى قبل لحظات</h3>
                                            <p> عميل اشترى قبل لحظات</p>
                                        </td>
                                        <td>ثواني 2 زمن التأخير</td>
                                        <td>5 ثواني</td>
                                        <td>مرة واحد فقط</td>
                                        <td><h2 style="rotate:180deg; color: rgb(145, 52, 52)"><i class="fa-solid fa-toggle-on"></i></h2></td>
                                        <td ><i style="cursor: pointer" class="fa-solid fa-gear"></i></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
