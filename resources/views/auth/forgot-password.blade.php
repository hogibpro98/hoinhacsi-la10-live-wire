<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Quên mật khẩu? Không có gì. Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi email cho
            bạn liên kết đặt lại mật khẩu cho phép bạn chọn một mật khẩu mới.
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email', [], false) }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autofocus autocomplete="username" />
            </div>
            @if ($errors->any())
                <p class="text-[14px] font-normal text-[#F04438] mt-[8px]">Không tìm thấy tài khoản được liên kết với email
                    này</p>
            @endif
            <div class="flex items-center justify-start mt-4">
                <button type="submit"
                        class="normal-case rounded-[8px] bg-[#0B89B7] px-[16px] py-[12px] text-[16px] font-semibold text-white tracking-normal border-[#0B89B7]">
                    Email liên kết với tài khoản
                </button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
