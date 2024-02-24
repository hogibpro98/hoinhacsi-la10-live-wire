<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- <x-validation-errors class="mb-4" /> -->

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <p class="text-[#101828] text-[28px] max-md:text-[24px] font-semibold mb-[24px] text-center">
            Đăng nhập
        </p>
        <form method="POST" action="{{ route('login', [], false) }}">
            @csrf

            <div>
                <x-label for="email" value="Email" class="text-[14px] text-[#344054] mb-[8px]" />
                @if ($errors->any())
                    <x-input id="email"
                             class=" block bg-[transparent] shadow-[0px_1px_2px_0px_rgba(16,24,40,0.05)] border-solid !border-[#F04438] !rounded-[8px] w-full"
                             type="email" name="email" :value="old('email')" placeholder="Nhập email của bạn" required autofocus
                             autocomplete="username" />
                @else
                    <x-input id="email"
                             class=" block bg-[transparent] shadow-[0px_1px_2px_0px_rgba(16,24,40,0.05)] border-solid border-[#A9B3C6] !rounded-[8px] w-full"
                             type="email" name="email" :value="old('email')" placeholder="Nhập email của bạn" required autofocus
                             autocomplete="username" />
                @endif

            </div>

            <div class="mt-[16px]">
                <x-label for="password" value="Mật khẩu" class="text-[14px] text-[#344054] mb-[8px]" />
                @if ($errors->any())
                    <x-input id="password"
                             class=" block bg-[transparent] shadow-[0px_1px_2px_0px_rgba(16,24,40,0.05)] border-solid !border-[#F04438] !rounded-[8px] w-full"
                             type="password" name="password" placeholder="Nhập mật khẩu của bạn" required
                             autocomplete="current-password" />
                @else
                    <x-input id="password"
                             class="block bg-[transparent] shadow-[0px_1px_2px_0px_rgba(16,24,40,0.05)] border-solid border-[#A9B3C6] !rounded-[8px] w-full"
                             type="password" name="password" placeholder="Nhập mật khẩu của bạn" required
                             autocomplete="current-password" />
                @endif
            </div>

            <!-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class=" ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> -->

            <div class="flex flex-col  ml-auto mt-4">
                @if (Route::has('password.request'))
                    <a class=" text-[14px] ml-auto text-[#707A8F] hover:text-[#212731]"
                       href="{{ route('password.request', [], false) }}">
                        Quên mật khẩu
                    </a>
                @endif
                <button type="submit"
                        class="normal-case mt-[16px]  w-full justify-center rounded-[8px] bg-[#0B89B7] px-[16px] py-[12px] text-[16px] font-semibold text-white tracking-normal border-[#0B89B7]">
                    Đăng nhập
                </button>
            </div>
            @if ($errors->any())
                <p class="text-[14px] font-normal text-[#F04438] mt-[8px]">Tài khoản hoặc mật khẩu của bạn không chính xác
                </p>
            @endif
            <div class="text-[14px] text-[#475467] font-normal text-center mt-[24px]">
                <span>
                    Bạn chưa là thành viên Hội nhạc sĩ?
                </span>
                <span class="text-[#0B89B7] max-md:block font-semibold cursor-pointer">
                    Đăng ký hội viên
                </span>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
