@extends('admin.master')

@section('AdminContent')
<h2 style="text-align: center;">اختيار التاريخ والوقت</h2>

<div id="date-picker" style="text-align: center; margin-bottom: 20px;">
  <input type="date" id="date-input" min="{{ \Carbon\Carbon::today()->toDateString() }}" style="padding: 10px; font-size: 16px;"/>
</div>

<div id="time-options" class="time-container" style="text-align: center; display: none;">
  <div id="times" style="margin-bottom: 20px;"></div>
  <button onclick="selectTime()" style="background-color: #2d3e50; color: white; padding: 10px 20px; font-size: 16px; border: none; cursor: pointer;">حدد الوقت</button>
</div>

<script>
  // قائمة الأوقات المحجوزة مسبقًا (مثال: يمكنك استبدال هذه بالقيم الحقيقية من قاعدة البيانات)
  const bookedSlots = {
    '2025-02-25': ['5:00 PM'], // تاريخ ووقت محجوز
    '2025-02-26': ['8:00 AM', '9:00 AM'], // تاريخ ووقت محجوز
  };

  function showTimeOptions() {
    const timeOptionsDiv = document.getElementById("time-options");
    const timesDiv = document.getElementById("times");
    const selectedDate = document.getElementById("date-input").value;

    // التحقق مما إذا كان هناك أوقات محجوزة لهذا التاريخ
    const bookedTimes = bookedSlots[selectedDate] || [];

    // ساعات العمل المرنة
    const workHours = [
      { start: 8, end: 12, period: 'AM' },
      { start: 1, end: 5, period: 'PM' },
      { start: 8, end: 10, period: 'PM' },
    ];

    const times = [];
    workHours.forEach(period => {
      for (let hour = period.start; hour <= period.end; hour++) {
        const time = formatTime(hour, period);
        if (!bookedTimes.includes(time)) { // تحقق إذا لم يكن الوقت محجوزًا
          times.push(time);
        }
      }
    });

    timesDiv.innerHTML = ""; // مسح المحتوى السابق
    times.forEach(time => {
      const button = document.createElement("button");
      button.innerText = time;
      button.onclick = () => selectButtonTime(button, time);
      button.style.backgroundColor = "#1a2a3a"; // لون الخلفية للأوقات المتاحة
      button.style.color = "white"; // لون النص
      button.style.padding = "10px 20px";
      button.style.margin = "5px";
      button.style.fontSize = "16px";
      button.style.border = "none";
      button.style.cursor = "pointer"; // تفعيل النقر على الأوقات المتاحة
      timesDiv.appendChild(button);
    });

    timeOptionsDiv.style.display = "block";
}


  function formatTime(hour, period) {
    const adjustedHour = hour > 12 ? hour - 12 : hour === 0 ? 12 : hour;
    return `${adjustedHour}:00 ${period}`;
  }

  function selectButtonTime(button, time) {
    // إذا كان الزر معطلاً (رمادي اللون)، لا نفعل شيء
    if (button.style.backgroundColor === "rgb(211, 211, 211)") {
      return;
    }

    // إزالة التحديد عن جميع الأزرار
    const allButtons = document.querySelectorAll("#times button");
    allButtons.forEach(btn => {
      btn.style.backgroundColor = "#1a2a3a"; // استرجاع الخلفية الزرقاء الغامقة
    });

    // تمييز الزر المختار
    button.style.backgroundColor = "#3a4a5a"; // خلفية أفتح عند التحديد

    // حفظ الوقت المحدد في متغير
    window.selectedTime = time;
  }

  function selectTime() {
    const selectedDate = document.getElementById("date-input").value;
    if (selectedDate && window.selectedTime) {
      alert(`تم تحديد الوقت: ${window.selectedTime} ليوم ${selectedDate}`);
    } else {
      alert("يرجى تحديد التاريخ والوقت أولاً.");
    }
  }

  // عند تغيير التاريخ، سيتم عرض خيارات الوقت
  document.getElementById("date-input").addEventListener("change", showTimeOptions);
</script>

@endsection
