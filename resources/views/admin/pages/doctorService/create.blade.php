<!-- resources/views/admin/doctorServiceCreate.blade.php -->

@extends('admin.master')

@section('AdminContent')
<div class="admin_create">
    <div class="admin_create_container">
        <div class="admin_create_content">
            <div class="admin_create_data">
                <div class="admin_create_title">
                    <div class="notify_title_cn">
                        <div class="notify_title">
                            <h2>إضافة خدمة للطبيب</h2>
                            <p>قم بإضافة خدمة للطبيب هنا</p>
                        </div>
                        <div class="notify_btn">
                            <button><a href="{{ route('doctor-service.store') }}">الرجوع إلى الصفحة السابقة</a></button>
                        </div>
                    </div>
                </div>

                <!-- عرض إشعارات النجاح أو الخطأ -->
                @if (session('success'))
                    <div class="notification success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="notification error">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- نموذج إضافة الخدمة للطبيب -->
                <form action="{{ route('doctor-service.store') }}" method="POST">
                    @csrf
                    <div class="admin_create_box">
                        <div class="admin_create_inputs">
                            <label for="user_id">الطبيب</label>
                            <select name="user_id" id="user_id" required>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="admin_create_inputs">
                            <label for="service_id">الخدمة</label>
                            <select name="service_id" id="service_id" required>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="admin_create_inputs">
                            <label for="available_days">الأيام المتاحة</label>
                            <input type="text" name="available_days" id="available_days" required placeholder="مثل: Monday, Wednesday">
                        </div>

                        <div class="admin_create_inputs">
                            <label for="available_hours">ساعات العمل المتاحة</label>
                            <input type="text" name="available_hours[]" id="available_hours" required placeholder="مثل: ['07:00-09:00', '09:00-12:00']">
                            <input type="text" name="available_hours[]" id="available_hours" required placeholder="مثل: ['12:00-14:00']">
                        </div>

                        <div class="admin_create_inputs">
                            <label for="unavailable_hours">ساعات غير متاحة</label>
                            <input type="text" name="unavailable_hours[Monday][]" id="unavailable_hours" required placeholder="مثال: ['13:00-14:00']">
                            <input type="text" name="unavailable_hours[Wednesday][]" id="unavailable_hours" required placeholder="مثال: ['17:00-19:00']">
                        </div>

                        <div class="admin_create_inputs">
                            <label for="price">السعر</label>
                            <input type="text" name="price" id="price" required placeholder="مثال: 1000">
                        </div>

                        <div class="admin_create_inputs">
                            <button type="submit" class="btn btn-primary">إضافة الخدمة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
