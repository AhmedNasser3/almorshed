@extends('admin.master')
@section('AdminContent')
<div class="admin_create">
    <div class="admin_create_container">
        <div class="admin_create_content">
            <div class="admin_create_data">
                <div class="admin_create_title">
                    <div class="notify_title_cn">
                        <div class="notify_title">
                            <h2>إنشاء خدمة جديد</h2>
                            <p>قم بإنشاء الخدمة هنا</p>
                        </div>
                        <div class="notify_btn">
                            <button><a href="{{ route('admins.show') }}">الرجوع إلى الصفحة الأخيرة</a></button>
                        </div>
                    </div>
                </div>

                <!-- إشعار -->
                @if (session('success'))
                <div class="notification success" style="color: rgb(107, 224, 107)">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="notification error" style="color: rgb(255, 255, 255)">
                    {{ session('error') }}
                </div>
            @endif

                <form action="{{ route('service.store') }}" method="POST">
                    @csrf
                    <div class="admin_create_box">
                        <div class="admin_create_inputs">
                            <label for="name">نوع الخدمة</label>
                            <select style="padding: 10px 0;" required name="name" id="name">
                                <option value="call">مكالمة</option>
                                <option value="chat">دردشة</option>
                                <option value="interview">مقابلة</option>
                            </select>
                        </div>

                        <div class="admin_create_inputs">
                            <label for="">مدة الخدمة</label>
                            <input type="text" name="" id="" value="ساعة واحدة" readonly>
                        </div>

                        <div hidden class="admin_create_inputs">
                            <label hidden for="duration">مدة الخدمة</label>
                            <input hidden type="text" name="duration" id="duration" value="hour" readonly>
                        </div>

                        <div class="admin_create_inputs">
                            <button type="submit" class="btn btn-primary">إنشاء خدمة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
