<div>
    <div class="w-full px-4 lg:px-[80px] py-[32px] bg-[#F3F3F6]">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mt-[30px]">
            <div class="lg:col-span-3 col-span-1">
                <div class="rounded-lg">

                    <div class="flex items-center text-[#707A8F] font-[400] text-[16px]">
                        <span class="leading-[24px]">Trang chủ</span>
                        <div
                            class="w-[1px] h-[14px] border-r border-solid border-[#707A8F] ps-[14px] me-[14px]">
                        </div>
                        <span class=" leading-[24px]">Tin tức</span>
                    </div>

                    <div class="pt-[16px]">
                        <h1 class="text-[#212731] text-[16px] font-[600] lg:font-[700] lg:text-[32px] mb-2 lg:mb-0">{{ $news->name }}</h1>
                    </div>

                    <div class="flex justify-between items-center pb-[16px]">

                        <div class="flex items-center text-[#707A8F] font-[400] text-[14px]">
                            <span class="hidden leading-[24px]">By Admin</span>
                            <div
                                class="hidden w-[1px] h-[14px] border-r border-solid border-[#707A8F] ps-[14px] me-[14px]">
                            </div>
                            <span
                                class=" leading-[24px]">{{ \Carbon\Carbon::parse($news->date_public)->format('ga\, \T\hứ N\, d/m/Y') }}</span>
                        </div>

                        <div class="flex items-center text-[#707A8F] font-[400] text-[14px]">
                            <svg class="pe-[4px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24"
                                 fill="none">
                                <path
                                    d="M20.8667 11.8859C20.2082 10.7392 17.6258 7 12.0004 7C6.37511 7 3.7927 10.7392 3.13416 11.8859C3.04576 12.0395 3 12.2066 3 12.3756C3 12.5446 3.04576 12.7117 3.13416 12.8653C3.7927 14.0108 6.37511 17.75 12.0004 17.75C17.6258 17.75 20.2082 14.0108 20.8667 12.8641C20.9549 12.7106 21.0006 12.5438 21.0006 12.375C21.0006 12.2062 20.9549 12.0394 20.8667 11.8859ZM12.0004 16.5556C7.26991 16.5556 5.06253 13.3509 4.49999 12.3816C5.06253 11.3991 7.26991 8.19444 12.0004 8.19444C16.7197 8.19444 18.9279 11.3854 19.5009 12.375C18.9279 13.3646 16.7197 16.5556 12.0004 16.5556Z"
                                    fill="#707A8F"/>
                                <path
                                    d="M12.0002 9.38867C11.2585 9.38867 10.5334 9.5638 9.91671 9.89192C9.29999 10.22 8.81932 10.6864 8.53547 11.232C8.25162 11.7777 8.17736 12.3781 8.32206 12.9573C8.46676 13.5366 8.82394 14.0687 9.34842 14.4863C9.8729 14.9039 10.5411 15.1883 11.2686 15.3035C11.9961 15.4187 12.7501 15.3596 13.4354 15.1336C14.1206 14.9076 14.7063 14.5248 15.1184 14.0338C15.5305 13.5427 15.7504 12.9654 15.7504 12.3748C15.7493 11.5831 15.3538 10.8241 14.6507 10.2643C13.9477 9.70453 12.9945 9.38962 12.0002 9.38867ZM12.0002 14.1665C11.5552 14.1665 11.1202 14.0614 10.7501 13.8645C10.3801 13.6676 10.0917 13.3878 9.92137 13.0604C9.75106 12.733 9.7065 12.3728 9.79333 12.0252C9.88015 11.6777 10.0945 11.3585 10.4091 11.1079C10.7238 10.8573 11.1248 10.6867 11.5612 10.6175C11.9977 10.5484 12.4502 10.5839 12.8613 10.7195C13.2725 10.8551 13.6239 11.0847 13.8711 11.3794C14.1184 11.674 14.2504 12.0204 14.2504 12.3748C14.2504 12.85 14.0133 13.3057 13.5913 13.6417C13.1693 13.9777 12.597 14.1665 12.0002 14.1665Z"
                                    fill="#707A8F"/>
                            </svg>
                            <span>{{ $news->view }}</span>
                            <div
                                class="w-[1px] h-[14px] border-r border-solid border-[#707A8F] ps-[14px] me-[14px]">
                            </div>
                            <svg class="pe-[4px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M12.6669 3.99609H7.33281C5.49456 3.99609 3.99903 5.49163 3.99903 7.32988V15.9004C3.99855 16.1598 4.0686 16.4146 4.20169 16.6373C4.33478 16.86 4.52591 17.0424 4.75464 17.1649C4.98336 17.2874 5.24109 17.3455 5.50025 17.3328C5.75941 17.3202 6.01027 17.2374 6.22599 17.0932L8.86835 15.331H12.6669C14.5051 15.331 16.0006 13.8354 16.0006 11.9972V7.32988C16.0006 5.49163 14.5051 3.99609 12.6669 3.99609ZM20.0012 9.9969V18.5674C20.0014 18.7557 19.9646 18.9421 19.8927 19.1161C19.8208 19.2901 19.7152 19.4482 19.5821 19.5814C19.449 19.7146 19.291 19.8201 19.117 19.8921C18.943 19.9641 18.7566 20.0011 18.5683 20.0009C18.2909 20.0009 18.0142 19.9202 17.7749 19.7609L15.1319 17.998H11.3333C10.8738 17.9969 10.4196 17.9003 9.99936 17.7144C9.57915 17.5284 9.20217 17.2572 8.89235 16.9178L9.27174 16.6645H12.6669C15.2399 16.6645 17.3342 14.5702 17.3342 11.9972V7.32988C17.3342 7.12451 17.3162 6.92449 17.2908 6.72579C18.0523 6.87114 18.7394 7.27718 19.234 7.87413C19.7286 8.47108 19.9999 9.22166 20.0012 9.9969Z"
                                    fill="#A9B3C6"/>
                            </svg>
                            <span>0</span>
                        </div>
                    </div>

                    <div class="mb-[30px] text-[#454E5F] text-[16px] font-[400]">
                        {!! $news->content !!}
                    </div>


                    <div class="flex items-center justify-end mb-[46.5px]">
                        <span class="text-[18px] font-[600] leading-[normal] text-[#888]">Share:</span>
                        <div
                            class="h-[35px] w-[35px] flex items-center justify-center bg-[#FFF] rounded-[50%] me-[20px] ms-[15px] hover:shadow-md">
                            <img src="{{ asset('/img/icon/fb_social.svg') }}" alt="facebook share"/>
                        </div>
                        <div
                            class="h-[35px] w-[35px] flex items-center justify-center bg-[#FFF] rounded-[50%] me-[20px]  hover:shadow-md">
                            <img src="{{ asset('/img/icon/ytb_social.svg') }}" alt="youtube share"/>
                        </div>
                        <div
                            class="h-[35px] w-[35px] flex items-center justify-center bg-[#FFF] rounded-[50%] hover:shadow-md">
                            <img src="{{ asset('/img/icon/instagram_social.svg') }}" alt="instagram share"/>
                        </div>
                    </div>


                    <div class="flex flex-col gap-4 px-4 py-4 rounded-xl bg-white border border-solid border-[#E8E8E8]">
                        <div class="flex">
                            <div class="flex items-center lg:mb-[24px]">
                                <div class="w-[24px] rotate-90 bg-[#0B89B7] h-[3px] rounded-[4px]"></div>
                                <p class="text-[#10151A] font-[700] text-[20px]">Bài viết liên quan</p>
                            </div>

                            @if($news->children_ids)
                                <div class="flex ms-auto h-[18px]">
                                    <a href="{{ route('categories', ['slug' => \App\Models\Category::find($news->children_ids[key($news->children_ids)])->slug]) }}"
                                       class="me-[4px] text-[#1D93CD] leading-[20px] font-[500] text-[14px]">Xem tất cả
                                    </a>
                                    <img class="h-[18px] w-[18px]" src="/img/icon/arrow-to-right.svg" alt="">
                                </div>
                            @endif
                        </div>

                        <div class="grid gap-4 grid-cols-1 lg:grid-cols-3">

                            @foreach($relatedNews as $rn)
                                <div class="lg:mb-[16px] flex lg:block lg:gap-0 gap-4">
                                    <div class="flex justify-center min-w-[110px]">
                                        <img class="h-[80px] w-[110px] lg:h-[200px] lg:w-[380px]"
                                             src="{{ $rn->getFirstMediaUrl('media') ?: asset('images/gallery.svg') }}"
                                             alt="{{ $rn->name }}">
                                    </div>
                                    <div class="">
                                        <div class="flex gap-4 mb-2 lg:mb-3 lg:mt-4">
                                            @foreach($rn->categories()->whereIn('category_id', $rn->children_ids)->get() as $ci)
                                                <p class="p-2 rounded bg-[#0B89B7] h-[29px] font-bold text-[11px] text-white leading-[13px] uppercase hidden lg:block">
                                                    {{$ci->name }}</p>
                                            @endforeach
                                            <p class="py-2 text-[#707A8F] font-[600] text-[12px] leading-[15px]">{{ \Carbon\Carbon::parse($rn->date_public)->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="bottom-[20px]">
                                            <a class="" href="{{ route('news-detail', ['slug' => $rn->slug]) }}">
                                                <p class="line-clamp-2 font-[600] text-[16px] text-[#10151A] leading-[normal] text-left cursor-pointer">
                                                    {{ $rn->name }}
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>


                    </div>


                    <div
                        class="flex flex-col gap-4 px-4 py-4 mb-0 lg:mb-[104px] mt-6 lg:mt-[40px] rounded-xl bg-white border border-solid border-[#E8E8E8]">
                        <div class="flex">
                            <div class="flex items-center mb-[42.5px]">
                                <div class="w-[24px] rotate-90 bg-[#0B89B7] h-[3px] rounded-[4px]"></div>
                                <p class="text-[#10151A] font-[700] text-[20px]">Bình luận</p>
                            </div>
                        </div>

                        <textarea placeholder="Bình luận"
                                  class="h-[188px] border-1 border-gray-300 rounded-[4px] text-[16px] font-normal font-weight-400 leading-6"></textarea>
                        <input type="text" placeholder="Tên*"
                               class="h-[56px] border-1 border-gray-300 rounded-[4px] text-[16px] font-normal font-weight-400 leading-6">
                        <input type="text" placeholder="Email*"
                               class="h-[56px] border-1 border-gray-300 rounded-[4px] text-[16px] font-normal font-weight-400 leading-6">

                        <div class="flex items-center">
                            <div class="lx oc yz flex items-center"><input id="saveInfo"
                                                                           aria-describedby="comments-description"
                                                                           name="saveInfo" type="checkbox"
                                                                           class="nw rx adp afv ayh bnr me-2 checked:text-[#1D93CD] rounded-[4px]">
                            </div>
                            <div class="jw awa awp">
                                <label
                                    for="saveInfo"
                                    class="awe axv lg:text-[16px] text-[14px] font-[400] leading-4 lg:leading-6">Lưu
                                    tên,
                                    email và trang web của tôi trong trình duyệt này cho lần tiếp theo tôi nhận
                                    xét.</label>
                            </div>
                        </div>

                        <div class="flex">
                            <button type="button"
                                    class=" mt-6 bg-[#1D93CD] w-[73px] h-[40px] font-[600] leading-6 text-[16px] text-white rounded-[4px]">
                                Đăng
                            </button>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-span-1">
                <div>
                    @include('guest.news_best')
                </div>
                <div class="mt-6">
                    @include('guest.notification_right_tab')
                </div>
            </div>
        </div>

    </div>
</div>
