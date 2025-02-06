@extends('frontend.master')
@section('frontendContent')
<div>
    <style>
        /* تهيئة صفحة بشكل جيد */
        .bg_container {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        /* تنسيق الحاوية الأساسية */
        .container {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 800px;
            text-align: center;
        }

        /* تنسيق حقل التاريخ */
        #datetimeInput {
            font-size: 18px;
            padding: 10px;
            margin: 20px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            max-width: 300px;
        }

        /* تنسيق الحاوية الزمنية */
        .time_container {
            display: none;
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* تنسيق صندوق الجدول */
        .time_box {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 أعمدة */
            gap: 15px;
            padding: 10px;
        }

        .time_bg label {
            display: block;
            font-size: 18px;
            padding: 15px;
            background-color: #2c3e50;
            color: white;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            border: none;
        }

        .time_bg input[type="radio"]:checked + span {
            background-color: #3498db;
            transform: scale(1.1);
        }

        .time_bg input[type="radio"] {
            display: none; /* إخفاء العنصر input */
        }

        .time_bg span {
            display: block;
            padding: 10px;
            border-radius: 10px;
            background-color: #2c3e50;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        .time_bg input[type="radio"]:checked + span {
            background-color: #3498db;
            transform: scale(1.1);
        }

        /* تنسيق الزر */
        .btn-reserve {
            background-color: #3498db;
            color: white;
            font-size: 18px;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-reserve:hover {
            background-color: #2980b9;
        }

        /* تنسيق الاستجابة للصفحة */
        @media (max-width: 600px) {
            .time_box {
                grid-template-columns: repeat(2, 1fr); /* عمودين في الشاشات الصغيرة */
            }

            #datetimeInput {
                max-width: 80%;
            }
        }
    </style>

    <div class="bg_container">
        <div class="container">
            <h2>اختر التاريخ والوقت</h2>
            <input type="date" id="datetimeInput">

            <div class="time">
                <div class="time_container">
                    <div class="time_box">
                        <div class="time_bg" style="display: flex;">
                            @foreach ($appointments as $appointment)
                            <label style="padding: 0 20px;margin:0 2px ">
                                <input type="radio" name="time" value="{{ $appointment->time }}">
                                <span>{{ $appointment->calendar }} - {{ $appointment->time }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- زر حجز الموعد -->
            <button class="btn-reserve" id="reserveButton" disabled>حجز الموعد</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let now = new Date();
            let today = now.toISOString().split("T")[0]; // استخراج التاريخ فقط بصيغة YYYY-MM-DD
            let datetimeInput = document.getElementById("datetimeInput");
            let timeContainer = document.querySelector(".time_container");
            let reserveButton = document.getElementById("reserveButton");

            // ضبط الحد الأدنى ليكون تاريخ اليوم فقط
            datetimeInput.min = today;

            // إخفاء الساعات عند تحميل الصفحة
            timeContainer.style.display = "none";

            // عند اختيار تاريخ صحيح، يتم إظهار الساعات
            datetimeInput.addEventListener("input", function () {
                if (this.value >= today) { // التأكد أن التاريخ المختار ليس في الماضي
                    timeContainer.style.display = "block";
                } else {
                    timeContainer.style.display = "none"; // إخفاء الساعات إذا تم اختيار تاريخ قديم
                }
            });

            // تفعيل زر الحجز عند اختيار ساعة
            let timeRadios = document.querySelectorAll("input[name='time']");
            timeRadios.forEach(function (radio) {
                radio.addEventListener("change", function () {
                    if (document.querySelector("input[name='time']:checked")) {
                        reserveButton.disabled = false; // تفعيل زر الحجز
                    }
                });
            });
        });
    </script>
@endsection
