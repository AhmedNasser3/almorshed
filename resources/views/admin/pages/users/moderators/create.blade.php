@extends('admin.master')
@section('AdminContent')
<div class="admin_create">
    <div class="admin_create_container">
        <div class="admin_create_content">
            <div class="admin_create_data">
                <div class="admin_create_title">
                    <div class="notify_title_cn">
                        <div class="notify_title">
                            <h2>انشيئ مرشد جديد</h2>
                            <p>انشيئ المرشد هنا</p>
                        </div>
                        <div class="notify_btn">
                            <button><a href="{{ route('moderators.show') }}">الرجوح الي الصفحة الاخيرة</a></button>
                        </div>
                    </div>                </div>
                <form action="{{ route('moderators.store') }}" method="POST">
                    @csrf
                    <div class="admin_create_cn">
                        <div class="admin_create_bg">
                            <div class="admin_create_bg_content">
                                <div class="admin_create_inputs">
                                    <label for="name">اسم المرشد</label>
                                    <input type="text" name="moderator_name" id="moderator_name" placeholder="اسم المرشد...">
                                </div>
                                <div class="admin_create_inputs">
                                    <label for="email">ايميل المرشد</label>
                                    <input type="email" name="moderator_email" id="moderator_email" placeholder="ايميل المرشد...">
                                </div>
                                <div class="admin_create_inputs">
                                    <label for="password">كلمة مرور المرشد</label>
                                    <input type="password" name="moderator_password" id="moderator_password" placeholder="كلمة مرور المرشد...">
                                </div>
                                <div class="admin_create_inputs">
                                    <button type="submit" class="btn btn-primary">إنشاء المرشد</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
