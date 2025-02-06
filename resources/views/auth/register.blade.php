<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 space-y-6">
            <div class="flex justify-center">
                <div class="flex justify-center">
                    <img src="{{ asset('images/الشعار.png') }}" alt="الشعار" style="width: 100px">
                </div>
            </div>

            <h2 class="text-center text-2xl font-bold text-gray-700">إنشاء حساب جديد</h2>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-label for="name" value="الاسم الكامل" class="text-gray-700" />
                    <x-input id="name" class="block mt-2 w-full border-gray-300 focus:border-green-300 rounded-lg shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="البريد الإلكتروني" class="text-gray-700" />
                    <x-input id="email" class="block mt-2 w-full border-gray-300 focus:border-green-300 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="كلمة المرور" class="text-gray-700" />
                    <x-input id="password" class="block mt-2 w-full border-gray-300 focus:border-green-300 rounded-lg shadow-sm" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="تأكيد كلمة المرور" class="text-gray-700" />
                    <x-input id="password_confirmation" class="block mt-2 w-full border-gray-300 focus:border-green-300 rounded-lg shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="mt-6">
                    <x-button class="w-full bg-green-400 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                        تسجيل
                    </x-button>
                </div>
            </form>

            <p class="text-center text-gray-600 text-sm">
                لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="focus:border-green-300 hover:underline font-semibold">تسجيل الدخول</a>
            </p>
        </div>
    </div>
</x-guest-layout>
