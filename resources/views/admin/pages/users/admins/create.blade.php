@extends('admin.master')
@section('AdminContent')
<div class="admin_create">
    <div class="admin_create_container">
        <div class="admin_create_content">
            <div class="admin_create_data">
                <div class="admin_create_title">
                    <div class="notify_title_cn">
                        <div class="notify_title">
                            <h2>إنشاء مدير جديد</h2>
                            <p>قم بإنشاء المدير هنا</p>
                        </div>
                        <div class="notify_btn">
                            <button><a href="{{ route('admins.show') }}">الرجوع إلى الصفحة الأخيرة</a></button>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admins.store') }}" method="POST">
                    @csrf
                    <div class="admin_create_box">
                        <div class="admin_create_inputs">
                            <label for="name">اسم المدير</label>
                            <input type="text" name="admin_name" id="admin_name" placeholder="اسم المدير...">
                        </div>
                        <div class="admin_create_inputs">
                            <label for="email">إيميل المدير</label>
                            <input type="email" name="admin_email" id="admin_email" placeholder="إيميل المدير...">
                        </div>
                        <div class="admin_create_inputs">
                            <label for="password">كلمة مرور المدير</label>
                            <input type="password" name="admin_password" id="admin_password" placeholder="كلمة مرور المدير...">
                        </div>
                        <div class="admin_create_inputs">
                            <button type="submit" class="btn btn-primary">إنشاء مدير</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
