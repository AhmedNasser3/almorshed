@extends('admin.master')
@section('AdminContent')
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
@endsection
