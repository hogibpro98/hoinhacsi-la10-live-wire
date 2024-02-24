<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <script src="{{ asset('lib/ckeditor/ckeditor.js') }}"></script>
    @stack('scripts')
    @stack('styles')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/guest.js','resources/css/guest.css'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class=" font-[Inter] bg-[#F3F3F6]">
<header class="">
    @livewire('header')
</header>
<div class="font-[Inter] content-page text-gray-900 antialiased ">
    @livewire('navigation')

    <main>
        {{ $slot }}
    </main>
</div>
<footer>
    <div class=" w-full px-[80px] pb-[24px] pt-[55.31px] max-md:pt-[24px]
            border-t bg-white border-[#E3E7ED] text-[#707A8F] text-[16px] max-md:px-[16px] ">
        <div class="flex flex-wrap justify-between">
            <div class=" w-[40%] mr-[10%] max-lg:w-[100%]  max-md:mr-[0px]">
                <img src=" {{asset('img/logo.svg')}}" class="h-[55.379px] mb-[17.31px]" alt="">
                <p class="mb-[8px] ">
                    Trang Web của <b class="text-[black]">Hội Nhạc Sĩ Việt Nam</b> thiết lập theo giấy phép số
                    143/GP-BC
                    ngày
                    26/5/2006 của Cục Báo
                    Chí,
                    Bộ Văn Hóa Thông tin
                </p>
                <p class="mb-[8px]">
                    Với sự trợ giúp của Hội Nhạc Sĩ Thế Giới, Hiệp hội âm nhạc Châu Á - Thái Bình Dương.
                </p>
                <p class="mb-[8px]">
                    Hiệp hội công nghiệp ghi âm Việt Nam RIAV, các hãng phát hành băng đĩa trong và ngoài nước.
                </p>
            </div>
            <div class="flex justify-between items-baseline flex-wrap w-[50%]  max-lg:w-[100%]">
                <div class="text-[16px]  max-sm:w-[100%]">
                    <h3 class="text-[18px] flex items-center h-[50px] max-sm:mb-[0px] max-md:mt-[24px]  font-semibold
                         text-[#10151A] mb-[8px]">
                        Cổng thông tin
                    </h3>
                    <a class="mt-[20px] block" href="/">Trang chủ</a>
                    <a class="mt-[20px] block">Giới thiệu</a>
                    <a class="mt-[20px] block">Tin tức</a>
                    <a class="mt-[20px] block">Sự kiện</a>
                    <a class="mt-[20px] block">Trung tâm âm nhạc</a>
                </div>
                <div class="text-[16px]  max-sm:w-[100%] max-sm:mt-[48px]">
                    <h3 class="text-[18px] flex items-center h-[50px]  max-sm:mb-[4px]
                        font-semibold text-[#10151A] mb-[12px]">
                        Liên hệ với chúng tôi
                    </h3>
                    <p class="mt-[16px]">
                        <b class="text-[#333A47]  font-semibold">Email:</b> <br>
                        vnmusic2010@gmail.com
                    </p>
                    <p class="mt-[16px]">
                        <b class="text-[#333A47] font-semibold">Địa chỉ:</b> <br>
                        51 Trần Hưng Đạo, Hoàn Kiếm, Hà Nội
                    </p>
                </div>
                <div class=" max-sm:w-[100%] max-sm:mt-[48px]">
                    <h3 class="text-[18px] flex items-center h-[50px] font-semibold
                        max-sm:mb-[20px] text-[#10151A] mb-[28px]">
                        Mạng xã hội
                    </h3>
                    <div class="flex">
                        <img src="{{asset('img/logo-facebook.svg')}}" class="h-[32px] " alt="">
                        <img src="{{asset('img/logo-youtube.svg')}}" class="h-[32px] ml-[24px]" alt="">
                        <img src="{{asset('img/logo-tiktok.svg')}}" class="h-[32px] ml-[24px]" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-[76px]  max-sm:mt-[48px] pt-[24px] border-t border-[#D0D7E1] w-full
             flex items-center text-[#707A8F]">
            <div class=" flex items-center">
                <p class=" text-[16px] font-normal  max-sm:hidden">Powered by</p>
                <img src="{{asset('img/logo-mate.svg')}}"
                     class="h-[48px] ml-[16px] max-sm:w-[67.077px] max-sm:h-[32px]" alt="">
            </div>
            <div class="ml-[auto] text-[15px] font-medium">
                <a href="">Chính sách</a>
                <a href="" class="ml-[32px]">Quyền riêng tư </a>
            </div>
        </div>
    </div>
</footer>

@livewireScripts


</body>

</html>
