@extends('admin.master')
@section('AdminContent')
<div class="admin_create">
    <div class="admin_create_container">
        <div class="admin_create_content">
            <div class="admin_create_data">
                <div class="admin_create_title">
                    <div class="notify_title_cn">
                        <div class="notify_title">
                            <h2>إنشاء مقال جديد</h2>
                            <p>قم بإنشاء المقال هنا</p>
                        </div>
                        <div class="notify_btn">
                            <button><a href="{{ route('articles.index') }}">الرجوع إلى الصفحة الأخيرة</a></button>
                        </div>
                    </div>
                </div>
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="admin_create_cn">
                        <div class="admin_create_bg">
                            <div class="admin_create_bg_content">
                                <div class="admin_create_inputs">
                                    <label for="title">العنوان</label>
                                    <input type="text" name="title" id="title" placeholder="أدخل العنوان...">
                                </div>
                                <div class="admin_create_inputs">
                                    <label for="subtitle">العنوان الفرعي</label>
                                    <input type="text" name="subtitle" id="subtitle" placeholder="أدخل العنوان الفرعي...">
                                </div>
                                <div class="admin_create_inputs">
                                    <label for="meta_description">الوصف الميتا</label>
                                    <textarea name="meta_description" id="meta_description" placeholder="أدخل وصف الميتا..."></textarea>
                                </div>
                                <div class="admin_create_inputs">
                                    <label for="image">الصورة</label>
                                    <input type="file"  style="border: none"  name="image" id="image">
                                </div>
                                <div class="admin_create_inputs">
                                    <label for="video">الفيديو</label>
                                    <input type="file"  style="border: none"  name="video" id="video">
                                </div>
                                <div class="admin_create_inputs">
                                    <label for="video_link">رابط الفيديو</label>
                                    <input type="text" name="video_link" id="video_link" placeholder="أدخل رابط الفيديو...">
                                </div>
                                <div class="admin_create_inputs">
                                    <label for="files">الملفات</label>
                                    <input type="file"  style="border: none"  name="files[]" id="files" multiple>
                                </div>
                                <div hidden class="admin_create_inputs">
                                    <label for="author">اسم الكاتب</label>
                                    <input type="text" name="author" id="author" value="{{ auth()->user()->id }}" placeholder="أدخل اسم الكاتب...">
                                </div>
                                <div class="admin_create_inputs">
                                    <label for="status">الحالة</label>
                                    <select style="padding: 10px" name="status" id="status">
                                        <option value="draft">مسودة</option>
                                        <option value="published">منشور</option>
                                        <option value="archived">مؤرشف</option>
                                    </select>
                                </div>
                                <div class="admin_create_inputs">
                                    <label for="alt">الوصف البديل</label>
                                    <input type="text" name="alt" id="alt" placeholder="أدخل الوصف البديل...">
                                </div>
                                <div class="admin_create_inputs">
                                    <button type="submit" class="btn btn-primary">إنشاء المقال</button>
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
