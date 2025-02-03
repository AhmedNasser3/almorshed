@extends('frontend.master')
@section('frontendContent')
<div class="chat-container" style="min-height: 100vh">
    <!-- قائمة المستخدمين -->
    <div class="users-list">
        <h3>المستخدمون</h3>
        <div class="user-item">
            <img src="{{ asset('images/الشعار.png') }}" alt="User">
            <span>{{ $users->name }}</span>
        </div>
    </div>
    <!-- منطقة الشات -->
    <div class="chat-box">
        <div class="chat-header">
            <h3>{{ $users->name }}</h3>
            <i class="fa-solid fa-ellipsis"></i>
        </div>
        <div class="chat-messages" id="chat-messages">
            <!-- الرسائل ستظهر هنا -->
        </div>
        <div class="chat-input">
            <textarea id="message-input" placeholder="اكتب رسالتك هنا..."></textarea>
            <button id="send-message">إرسال</button>
        </div>
    </div>

    <!-- عرض الأخطاء -->
    <div id="error-message" style="display:none; color: red; margin-top: 20px;">
        <p id="error-text"></p>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const chatMessages = document.getElementById('chat-messages');
        const userId = "{{ $users->id }}"; // معرف المستخدم المحدد
        const currentUserId = "{{ auth()->user()->id }}"; // معرف المستخدم الحالي
        const apiKey = "2dbd1cc30191731218f9e417dee96f9f0873a77e"; // مفتاح API

        // وظيفة لحساب الوقت المنقضي
        const formatTime = (timestamp) => {
            const messageTime = new Date(timestamp);
            const currentTime = new Date();
            const timeDiff = currentTime - messageTime;

            const seconds = Math.floor(timeDiff / 1000);
            const minutes = Math.floor(seconds / 60);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);
            const weeks = Math.floor(days / 7);

            if (weeks >= 1) {
                return `${messageTime.getDate()} ${messageTime.toLocaleString('default', { month: 'long' })} ${messageTime.getFullYear()} ${messageTime.getHours()}:${messageTime.getMinutes()}`;
            } else if (days >= 1) {
                return `اليوم ${messageTime.getHours()}:${messageTime.getMinutes()}`;
            } else if (hours >= 1) {
                return `${hours} ساعة ${minutes % 60} دقيقة`;
            } else if (minutes >= 1) {
                return `${minutes} دقيقة`;
            } else {
                return `${seconds} ثانية`;
            }
        };

        // وظيفة لجلب الرسائل للمستخدم
        const fetchMessages = async () => {
            const options = {
                method: 'GET',
                headers: {
                    accept: 'application/json',
                    apikey: apiKey
                }
            };

            try {
                // استدعاء API لجلب الرسائل بناءً على معرف المستلم
                const response = await fetch(
                    `https://1400330a068fecb.api-us.cometchat.io/v3/messages?receiver=${userId}&limit=10`,
                    options
                );

                if (!response.ok) {
                    throw new Error('فشل في جلب الرسائل');
                }

                const data = await response.json();
                renderMessages(data.data); // عرض الرسائل
            } catch (error) {
                console.error('خطأ أثناء جلب الرسائل:', error);
                showErrorMessage('حدث خطأ أثناء جلب الرسائل. يرجى المحاولة لاحقًا.');
            }
        };

        // وظيفة لعرض الرسائل في واجهة المستخدم
        const renderMessages = (messages) => {
            chatMessages.innerHTML = ''; // تفريغ الرسائل الحالية

            messages.forEach((msg) => {
                // تحقق من ما إذا كانت الرسالة محذوفة أو لا
                if (msg.is_deleted) { // في حال وجود خاصية "is_deleted"
                    return; // إذا كانت الرسالة محذوفة، لا نقوم بعرضها
                }

                const messageElement = document.createElement('div');
                const senderName = msg.sender ? msg.sender.name : 'غير معروف'; // اسم المرسل
                const messageContent = msg.data.text; // نص الرسالة
                const messageTime = formatTime(msg.sent_at); // تنسيق الوقت

                // إضافة تنسيق حديث مع عرض اسم المرسل بشكل منفصل
                messageElement.classList.add('message'); // إضافة كلاس للرسالة

                // تحقق من المرسل والمستقبل لتحديد التنسيق
                if (msg.receiver === userId) {
                    // رسالة استقبلتها أنت (بالحجم الأخضر على اليسار)
                    messageElement.innerHTML = `
                        <div class="message-header">
                            <span class="message-time">${messageTime}</span>
                            <strong>{{ auth()->user()->name }}</strong>
                        </div>
                        <div class="message-content">
                            ${messageContent}
                        </div>
                    `;
                    messageElement.classList.add('received');
                } else {
                    // رسالة أرسلتها أنت (باللون الرمادي على اليمين)
                    messageElement.innerHTML = `
                        <div class="message-header">
                            <strong>الدكتور</strong>
                            <span class="message-time">${messageTime}</span>
                        </div>
                        <div class="message-content">
                            ${messageContent}
                        </div>
                    `;
                    messageElement.classList.add('sent');
                }

                chatMessages.appendChild(messageElement);
            });

            chatMessages.scrollTop = chatMessages.scrollHeight; // التمرير إلى الأسفل
        };

        // وظيفة لعرض رسالة خطأ
        const showErrorMessage = (message) => {
            const errorMessage = document.getElementById('error-message');
            const errorText = document.getElementById('error-text');
            errorText.textContent = message;
            errorMessage.style.display = 'block';
        };

        // استدعاء جلب الرسائل عند تحميل الصفحة
        fetchMessages();

        // تحديث الرسائل كل ثانية
        setInterval(fetchMessages, 1000); // جلب الرسائل كل ثانية (1000 ميلي ثانية)
    });
</script>


<script>
    // زر الإرسال
    const sendMessageButton = document.getElementById('send-message');
    const messageInput = document.getElementById('message-input');
    const chatMessages = document.getElementById('chat-messages');
    const errorMessage = document.getElementById('error-message');
    const errorText = document.getElementById('error-text');

    // الحصول على ID المرسل من المتغيرات في Laravel
    const senderId = "user-morshed-2";
    const receiverId = "{{ $users->id }}"; // معرف المستلم

    // وظيفة إرسال الرسالة
    const sendMessage = async () => {
        const message = messageInput.value.trim(); // قراءة الرسالة وإزالة الفراغات
        if (message === '') {
            showError('لا يمكن إرسال رسالة فارغة.');
            return;
        }

        const options = {
            method: 'POST',
            headers: {
                accept: 'application/json',
                'content-type': 'application/json',
                apikey: '2dbd1cc30191731218f9e417dee96f9f0873a77e'
            },
            body: JSON.stringify({
                category: 'message',
                type: 'text',
                data: { text: message },
                receiver: receiverId, // المرسل إليه
                receiverType: 'user',
                sender: senderId // المرسل هو المستخدم الحالي
            })
        };

        try {
            const response = await fetch('https://1400330a068fecb.api-us.cometchat.io/v3/messages', options);

            if (!response.ok) {
                const errorResponse = await response.json();
                showError(errorResponse.message || 'حدث خطأ أثناء إرسال الرسالة.');
                return;
            }

            const data = await response.json();
            appendMessage('أنت: ' + message); // إضافة الرسالة في واجهة المستخدم
            messageInput.value = ''; // تفريغ حقل الإدخال
            hideError(); // إخفاء رسالة الخطأ
        } catch (error) {
            showError('حدث خطأ غير متوقع. حاول مرة أخرى.');
            console.error(error);
        }
    };

    // إضافة الرسالة إلى واجهة المستخدم
    const appendMessage = (message) => {
        const messageElement = document.createElement('div');
        messageElement.textContent = message;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight; // التمرير إلى الأسفل
    };

    // عرض رسالة الخطأ
    const showError = (message) => {
        errorText.textContent = message;
        errorMessage.style.display = 'block';
    };

    // إخفاء رسالة الخطأ
    const hideError = () => {
        errorMessage.style.display = 'none';
    };

    // ربط زر الإرسال بالوظيفة
    sendMessageButton.addEventListener('click', sendMessage);

    // إرسال الرسالة عند الضغط على Enter
    messageInput.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault();
            sendMessage();
        }
    });
</script>

@endsection
