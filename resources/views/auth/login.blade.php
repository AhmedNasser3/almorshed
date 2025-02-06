<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r  ">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 space-y-6">
            <div class="flex justify-center">
                <div class="flex justify-center">
                    <img src="{{ asset('images/الشعار.png') }}" alt="الشعار" style="width: 100px">
                </div>
            </div>

            <h2 class="text-center text-2xl font-bold text-gray-700">تسجيل الدخول</h2>

            <x-validation-errors class="mb-4" />

            @if(session('status'))
                <div class="mb-4 text-green-600 text-sm text-center font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="البريد الإلكتروني" class="text-gray-700" />
                    <x-input id="email" class="block mt-2 w-full border-gray-300 focus:border-green-300 focus:border-green-300 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="كلمة المرور" class="text-gray-700" />
                    <x-input id="password" class="block mt-2 w-full border-gray-300 focus:border-green-300 focus:border-green-300 rounded-lg shadow-sm" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="flex items-center text-gray-600">
                        <x-checkbox id="remember_me" name="remember" class="focus:border-green-300" />
                        <span class="ml-2 text-sm">تذكرني</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm focus:border-green-300 hover:underline" href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
                    @endif
                </div>

                <div class="mt-6">
                    <x-button class="w-full bg-green-400 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                        تسجيل الدخول
                    </x-button>
                </div>
            </form>

            <p class="text-center text-gray-600 text-sm">
                ليس لديك حساب؟ <a href="{{ route('register') }}" class="focus:border-green-300 hover:underline font-semibold">إنشاء حساب</a>
            </p>
        </div>
    </div>
</x-guest-layout>
