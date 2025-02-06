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
                        <h2 style="color: #fff;">{{ __('Number of users') }} -
                            <span>
                                {{ $users ? $users->count() : '0' }}
                            </span>
                        </h2>
                    </div>
                </div>
                <div class="home_bg">
                    <div class="home_title">
                        <div class="home_icons">
                            <div class="home_icon"><i class="fa-solid fa-person-military-pointing"></i></div>
                        </div>
                        <h2>{{ __('Number of Morsheds') }} -
                            <span>
                                {{ $doctors ? $doctors->count() : '0'}}
                            </span>
                        </h2>
                    </div>
                </div>
                <div class="home_bg">
                    <div class="home_title">
                        <div class="home_icons">
                            <div class="home_icon"><i class="fa-solid fa-lock"></i></div>
                        </div>
                        <h2>{{ __('Number of Admins') }} -
                            <span>
                                {{ $admins ? $admins->count() : '0' }}
                            </span>
                        </h2>
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
                                        <h3 style="color: #131313">{{ auth()->user()->name }}</h3>
                                        <p>151352</p>
                                    </div>
                                    <div class="account_content_bg_title">
                                        <h3>تاريخ الانطلاق</h3>
                                        <p>{{ auth()->user()->created_at->locale('ar')->isoFormat('YYYY MMMM D') }}</p>
                                    </div>
                                    <div class="account_content_bg_title">
                                        <h3>الحاله</h3>
                                        <h2 style="color: rgb(90, 182, 102);"><i class="fa-solid fa-toggle-on"></i></h2>
                                    </div>
                                    <div class="account_content_bg_title">
                                        <h3>الإعدادت</h3>
                                        <a href="{{ route('profile.show') }}">
                                        <p><i style="color: #444242" class="fa-solid fa-gear"></i></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  users  --}}
            <div class="admin_container" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                <div class="notify">
                    <div class="notify_container">
                        <div class="notify_content">
                            <div class="notify_data">
                                <div class="notify_title_cn">
                                    <div class="notify_title">
                                        <h2>قائمة المرشدون</h2>
                                        <p> &nbsp; ادارة مرشدون الموقع &nbsp;</p>
                                    </div>
                                    <div class="notify_btn">
                                        <button><a href="{{ route('moderators.create') }}">انشيئ مرشد جديد</a></button>
                                    </div>
                                </div>
                                <div class="notify_table">
                                    <table>
                                        <tr class="tr_head">
                                            <th>رقم</th>
                                            <th>ID</th>
                                            <th>اسم الادمن</th>
                                            <th>البريد الالكتروني للادمن</th>
                                            <th>حالة الادمن</th>
                                            <th>تاريخ اضافة الادمن</th>
                                            <th>اعدادات</th>
                                            <th>حذف</th>
                                        </tr>
                                        @foreach ($moderators as $key => $moderator)
                                        <tr class="tr_body">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $moderator->id }}</td>
                                            <td>{{ $moderator->name }}</td>
                                            <td>{{ $moderator->email }}</td>
                                            <td><h2 style="color: rgb(90, 182, 102)"><i class="fa-solid fa-toggle-on"></i></h2></td>
                                            <td>{{ \Carbon\Carbon::parse($moderator->created_at)->translatedFormat('l، d F Y') }}</td>
                                            <td ><i style="cursor: pointer" class="fa-solid fa-gear"></i></td>
                                            <td>
                                                <form action="{{ route('moderators.delete',['id' => $moderator->id]) }}" method="post">
                                                    @csrf
                                                    <a href="{{ route('moderators.delete',['id' => $moderator->id]) }}"><i style="color: #7e2020" class="fa-solid fa-trash"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            {{--  notify  --}}
            {{--  <div class="notify">
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
            </div>  --}}
        </div>
    </div>
</div>
</div>
@endsection
