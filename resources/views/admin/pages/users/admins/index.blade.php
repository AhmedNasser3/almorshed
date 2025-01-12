@extends('admin.master')
@section('AdminContent')
<div class="admin_container" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<div class="notify">
    <div class="notify_container">
        <div class="notify_content">
            <div class="notify_data">
                <div class="notify_title_cn">
                    <div class="notify_title">
                        <h2>قائمة المديرين</h2>
                        <p> &nbsp; ادارة مدراء الموقع &nbsp;</p>
                    </div>
                    <div class="notify_btn">
                        <button><a href="{{ route('admins.create') }}">انشيئ مدير جديد</a></button>
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
                        @foreach ($admins as $key => $admin)
                        <tr class="tr_body">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <form action="{{ route('admins.status', ['id' => $admin->id]) }}" method="POST">
                                    @csrf
                                    <h2 style="cursor: pointer; color: {{ $admin->role == 'admin' ? 'green' : 'red' }}" onclick="this.closest('form').submit()">
                                        <i class="fa-solid fa-toggle-on"></i>
                                    </h2>
                                </form>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($admin->created_at)->translatedFormat('l، d F Y') }}</td>
                            <td ><i style="cursor: pointer" class="fa-solid fa-gear"></i></td>
                            <td>
                                <form action="{{ route('admins.delete',['id' => $admin->id]) }}" method="post">
                                    @csrf
                                    <a href="{{ route('admins.delete',['id' => $admin->id]) }}"><i style="color: #7e2020" class="fa-solid fa-trash"></i></a>
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
