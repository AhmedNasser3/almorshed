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
                            <button><a href="{{ route('seo.index') }}">الرجوع إلى الصفحة الأخيرة</a></button>
                        </div>
                    </div>
                </div>
                <form action="{{ route('seo.store') }}" method="POST">
                    @csrf
                    <div class="admin_create_box">
                        <div class="admin_create_inputs">
                            <label for="meta_description">عنوان SEO</label>
                            <input type="text" name="meta_description" id="meta_description" placeholder="عنوان seo...">
                        </div>
                        <div class="admin_create_inputs">
                            <label for="meta_keywords">كلمة مفتاحية</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" placeholder="كلمة مفتاحيه...">
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
