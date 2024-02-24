<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\FortifyServiceProvider::class,
        App\Providers\JetstreamServiceProvider::class,

        Spatie\Permission\PermissionServiceProvider::class,

    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

    'dataUser' => [
        'nguyen_duc_trinh' => [
            'name' => 'Nguyễn Đức Trịnh',
            'public_name' => 'NS. Đức Trịnh',
            'position' => 'Chủ tịch Hội nhạc sĩ',
            'categories' => [],
            'featured_works' => 15,
            'musical_instruments' => 6,
            'prizes' => [
                'Giải A,B,C Hội Nhạc sĩ Việt Nam năm 1994-2009',
                'Giải A giải thưởng Văn học-Nghệ thuật của Bộ Quốc phòng Việt Nam (1994-1999)(2014-2019',
                'Nhà giáo ưu tú năm 2010',
                'Giải thưởng Nhà nước về Văn học-Nghệ thuật năm 2012',
            ],
            'opera' => 2,
            'story' => 'Đức Trịnh (sinh 1957) là nhạc sĩ Việt Nam. Ông từng giữ chức vụ Hiệu trưởng Trường Đại học Văn hóa Nghệ thuật Quân đội, hàm Thiếu tướng Quân đội nhân dân Việt Nam. Từ năm 2022, ông giữ chức Chủ tịch Hội Nhạc sĩ Việt Nam. Ông được Nhà nước Việt Nam phong tặng danh hiệu Nhà giáo Ưu tú năm 2010, Giải thưởng Nhà nước năm 2012.

Tiểu sử
Tên khai sinh của ông là Nguyễn Đức Trịnh, sinh năm 1957, quê tại Bắc Giang nhưng sống và lớn lên tại Hà Đông, Hà Nội. Sau khi nhập ngũ, ông công tác tại E1, F330, Quân khu 9, sau đó về Nhà văn hóa QK9, tham gia dàn dựng, sáng tác và biểu diễn từ năm 1982. Ra Hà Nội học sáng tác âm nhạc 1985 tại trường nghệ thuật Quân đội,1987 tại nhạc viện Hà Nội. Năm 1991 ông tốt nghiệp đại học sáng tác âm nhạc, cao học sáng tác âm nhạc (1997) tại Học viện âm nhạc quốc gia Việt Nam.

Từ năm 1990, ông trở thành cộng tác viên của Ban Văn nghệ, Đài Truyền hình Việt Nam.giảng viên Đại học VHNT QĐ, Đồng thời, ông còn giảng dạy sáng tác âm nhạc tại Học viện âm nhạc Quốc gia.2009-2017 là hiệu trưởng Đại học Văn hóa Nghệ thuật Quân đội. Ông được nhà nước Việt Nam phong tặng danh hiệu Nhà giáo Ưu tú năm 2010, Giải thưởng Nhà nước năm 2012. Ông được thăng quân hàm Thiếu tướng năm 2012.[1][2]

Trước khi trở thành Chủ tịch Hội nhạc sĩ Việt Nam từ tháng 1 năm 2022 (khóa X nhiệm kỳ 2020-2025), Đức Trịnh từng giữ chức Phó chủ tịnh thường trực các khoá VIII-IX.',
            'avatar' => 'img/exam_avatar_profile.svg',
            'status' => 'active',
            'library' => [
                [
                    'name' => 'Tượng Đài vô danh',
                    'singer' => '',
                    'img' => '',
                    'state' => 'Công khai',
                    'license' => '',
                    'publish_date' => '',
                    'views' => rand(10, 1000),
                    'comments' => rand(10, 1000),
                    'update_date' => '',
                ],
                [
                    'name' => 'Không đề',
                    'singer' => '',
                    'img' => '',
                    'state' => 'Công khai',
                    'license' => '',
                    'publish_date' => '',
                    'views' => rand(10, 1000),
                    'comments' => rand(10, 1000),
                    'update_date' => '',
                ],
                [
                    'name' => 'Tứ tấu đàn dây',
                    'singer' => '',
                    'img' => '',
                    'state' => 'Công khai',
                    'license' => '',
                    'publish_date' => '',
                    'views' => rand(10, 1000),
                    'comments' => rand(10, 1000),
                    'update_date' => '',
                ],
            ],
            'data' => [
                1 => [
                    'date' => 'Tháng Bảy 25,2023',
                    'content' => 'Kỷ niệm 75 năm thành lập Liên hiệp các Hội Văn học Nghệ thuật Việt Nam',
                    'title' => 'TIN HỘI',
                    'img' => 'img/van_cao-1.png',
                ],
                2 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Hội Nhạc sĩ Việt Nam tặng thưởng cho các tiết mục xuất sắc Cuộc thi độc tấu và hòa tấu nhạc cụ dân tộc 2023',
                    'title' => 'TIN HỘI',
                    'img' => 'img/van_cao-2.png',
                ],
                3 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Người đã lặng lẽ tỏa sáng sau những ngôi sao',
                    'title' => 'TIN CHUNG',
                    'img' => 'img/nguyen_duc_trinh-3.png',
                ],
                4 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Festival Dân ca ví, giặm Nghệ Tĩnh sẽ được tổ chức từ ngày 26/7 đến ngày 5/8/2023',
                    'title' => 'TIN CHUNG',
                    'img' => 'img/nguyen_duc_trinh-4.png',
                ],
                5 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Nhạc sĩ Đức Trịnh: Đưa ký ức vào âm nhạc một cách tự nhiên',
                    'title' => 'NGHỆ SĨ',
                    'img' => 'img/nguyen_duc_trinh-5.png',
                ],
                6 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Nhạc sĩ Đức Trịnh: "Sao Mai đang gần hơn với công chúng"',
                    'title' => 'NGHỆ SĨ',
                    'img' => 'img/nguyen_duc_trinh-6.png',
                ],
                7 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Nhạc sĩ Đức Trịnh giữ chức Chủ tịch Hội Nhạc sĩ Việt Nam',
                    'title' => 'TIN HỘI',
                    'img' => 'img/nguyen_duc_trinh-7.png',
                ],
                8 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Tọa đàm “Nghệ thuật sử dụng âm nhạc dân gian trong sáng tác hiện nay”',
                    'title' => 'TIN HỘI',
                    'img' => 'img/van_cao-8.png',
                ],
            ],
        ],
        'do_hong_quan' => [
            'name' => 'Đỗ Hồng Quân',
            'public_name' => 'NS. Đỗ Hồng Quân',
            'position' => '',
            'categories' => [],
            'featured_works' => 22,
            'musical_instruments' => 12,
            'prizes' => [],
            'opera' => 6,
            'story' => 'Đỗ Hồng Quân (sinh ngày 1 tháng 8 năm 1956) là một nhạc sĩ, phó giáo sư, tiến sĩ khoa học, diễn viên người Việt Nam. Ông hiện là Chủ tịch Ủy ban Liên hiệp các hội Văn học nghệ thuật Việt Nam, nguyên Chủ tịch Hội nhạc sĩ Việt Nam, nguyên là Quyền Trưởng phòng Nghệ thuật Nhà hát Nhạc Vũ Kịch Việt Nam, Phó Giám đốc Nhà hát Tuổi Trẻ, Phó Chủ nhiệm Khoa Lý luận – Sáng tác – Chỉ huy Nhạc viện Hà Nội, Ủy viên Ban Chấp hành Hội Nhạc sĩ Việt Nam khóa V, Phó Tổng Thư ký Hội Nhạc sĩ Việt Nam khóa VI, Trưởng ban Biên tập Âm nhạc Đài Tiếng nói Việt Nam, Đại biểu Quốc hội khóa XI. Ông còn là hội viên Hội Điện ảnh, Hội Nhà báo, Phó Chủ tịch Hội Hữu nghị Việt Nam – Campuchia. Chủ tịch Hội Nhạc sĩ Việt Nam khóa VII.

            Từ nhỏ ông đã được học nhạc do thân phụ là nhạc sĩ Đỗ Nhuận truyền dạy. Từ năm 8 tuổi, dưới sự hướng dẫn của nhà sư phạm âm nhạc Thái Thị Liên, ông học piano. Tốt nghiệp Trung cấp Piano và Sáng tác, ông lại tiếp tục học hệ Đại học tại Nhạc viện Moskva dưới sự hướng dẫn của Giáo sư A. Leman từ năm 1976 đến năm 1981. Ông tốt nghiệp bằng đỏ với bản Concerto cho violon và dàn nhạc giao hưởng. Là một trong không nhiều nhạc sĩ Việt Nam được đề nghị chuyển thẳng lên hệ nghiên cứu sinh (1982-1985). Trong thời gian này, ông đã hoàn thành chương trình nghiên cứu sinh là bậc học cao nhất về chuyên ngành Sáng tác, đồng thời theo học lớp Chỉ huy Dàn nhạc Giao hưởng với Giáo sư L. Nikolaev.

            Ông được tặng Giải thưởng Nhà nước về Văn học – Nghệ thuật năm 2012.
            Giải thưởng Hội Nhạc sĩ Việt Nam: 1993, 1994, 1995; 2008; nhiều lần được Giải thưởng Âm nhạc Liên hoan Phim toàn quốc; Giải Nhất cuộc thi sáng tác về Môi trường do Tổ chức UNEF (UNESCO) phát động (2001) với ca khúc Mái nhà chung màu xanh.

            Hiện nay, Nhạc sĩ Đỗ Hồng Quân là uỷ viên Đảng Đoàn, Phó Bí thư Đảng uỷ, Phó Chủ tịch Ủy ban Toàn quốc Liên hiệp các Hội Văn học Nghệ thuật Việt Nam, Chủ tịch Hội Nhạc sĩ Việt Nam, Ủy viên Hội đồng Lý luận phê bình Văn học Nghệ trung ương.
            ',
            'avatar' => 'img/do_hong_quan.svg',
            'status' => 'active',
            'library' => [],
            'data' => [],
        ],
        'tran_nhat_duong' => [
            'name' => 'Trần Nhật Dương',
            'public_name' => 'NS. Trần Nhật Dương',
            'categories' => ['Khí nhạc', 'Thanh nhạc', 'Nhạc không lời'],
            'position' => '',
            'featured_works' => 2,
            'musical_instruments' => 6,
            'prizes' => [
                'Giải Nhì: Tứ tấu đàn dây "Vũ điệu lửa" năm 2000',
                'Giải Ba: Tổ khúc viết cho Piano "Nhịp điệu chiêng cồng" năm 2001',
                'Giải Nhì: Dou viết cho đàn Cello, Piano "Khúc suy tưởng" năm 2003',
                'Giải Nhì: Bản hùng ca một thời kiêu hãnh (Thơ Trần Nhật Minh) năm 2013',
                'Giải Nhì: Người đàn bà ngược nắng 2015',
                'Giải Nhì: Em gái Tây Nguyên ở Trường Sa (Thơ Uông Ngọc Dậu) năm 2016',
                'Giải Nhì cuộc thi sáng tác bảo vệ môi trường: Khát vọng màu xanh',
                'Giải Khuyến Khích cuộc thi sáng tác về tuổi trẻ và tình yêu: Những đứa con sinh từ đường phố',
                'Giải thưởng nhà nước về văn học nghệ thuật năm 2022',
            ],
            'opera' => 2,
            'story' => 'Chuyên ngành sáng tác

Nhạc sĩ Trần Nhật Dương sinh ngày 27 tháng 7 năm 1960 tại Hà Nội, nguyên Phó Trưởng ban biên tập Âm nhạc Đài Tiếng nói Việt Nam. Ủy viên thường vụ Hội nhạc sĩ Việt Nam khóa VIII. Trưởng ban kiểm tra.

Trần Nhật Dương học chuyên ngành Sáng tác bậc Trung cấp và Đại học tại Nhạc viện Hà Nội (1986-1993), trước đó đã từng làm việc tại Hội Nhạc sĩ Việt Nam (1985-1986) và tham gia Quân đội.

Nhiều tác phẩm của nhạc sĩ Trần Nhật Dương đã được phát sóng trên Đài Tiếng nói Việt Nam và Đài Truyền hình Hà Nội, trong đó có các ca khúc:
Khát vọng màu xanh
- Giải Nhì cuộc thi sáng tác bảo vệ môi trường;
Những đứa con sinh từ đường phố
- Giải Khuyến khích cuộc thi sáng tác về tuổi trẻ và tình yêu;
Em mùa xuân
– Giải Khuyến khích Hội Nhạc sĩ Việt Nam năm 2005.
Nhạc sĩ Trần Nhật Dương được trao tặng giải thưởng Nhà nước về Văn học Nghệ thuật cho cụm tác phẩm: “Bản hùng ca một thời kiêu hãnh” lt Trần Nhật Minh , “Người đàn bà ngược nắng” “Tổ khúc piano Nhịp điệu chiêng cồng” “Sonatine Khúc suy tưởng”.

- Giải thưởng nhà nước về văn học nghệ thuật năm 2022',
            'avatar' => 'img/tran_nhat_duong.svg',
            'status' => 'active',
            'library' => [],
            'data' => [],
        ],
        'van_cao' => [
            'name' => 'Văn Cao',
            'public_name' => 'NS. Văn Cao',
            'position' => '',
            'categories' => ['Nhạc tiền chiến', 'Nhạc cách mạng'],
            'featured_works' => 42,
            'musical_instruments' => 12,
            'prizes' => [
                'Huân chương Hồ Chí Minh Huân chương Hồ Chí Minh',
                'Huân chương Kháng chiến Huân chương Kháng chiến hạng Nhất',
                'Huân chương Độc lập Huân chương Độc lập hạng Nhất',
                'Huân chương Độc lập Huân chương Độc lập hạng Ba',
            ],
            'opera' => 10,
            'story' => 'Văn Cao (tên đầy đủ là Nguyễn Văn Cao, sinh ngày 15 tháng 11 năm 1923 tại Hải Phòng – mất ngày 10 tháng 7 năm 1995) là một nhạc sĩ, họa sĩ,[3][4][5] nhà thơ,[6][7][8][9] chiến sĩ biệt động ái quốc[1][10][11][12] người Việt Nam. Ông là tác giả của ca khúc Tiến quân ca, quốc ca chính thức của nước Việt Nam Dân chủ Cộng hòa (nay là nước Cộng hòa xã hội chủ nghĩa Việt Nam), đồng thời ông cũng là một trong những nhạc sĩ có sức ảnh hưởng lớn nhất của nền Tân nhạc Việt Nam. Ông được giới chuyên môn và công chúng yêu nhạc đánh giá một cách rộng rãi là một trong ba nhạc sĩ nổi bật nhất của nền âm nhạc hiện đại Việt Nam trong thế kỷ XX, cùng với Phạm Duy và Trịnh Công Sơn.

Thuộc thế hệ nhạc sĩ tiên phong, Văn Cao tham gia nhóm Đồng Vọng, sáng tác các ca khúc trữ tình lãng mạn, đáng chú ý nhất là Bến xuân, Suối mơ, Thiên Thai và Trương Chi. Ông nhanh chóng trở thành một trong những gương mặt tiên phong, nổi bật nhất của trào lưu lãng mạn trong lịch sử âm nhạc Việt Nam, đặc biệt là để lại những dấu ấn mang tính khai phá của ông trong tân nhạc Việt. Sau khi gia nhập Việt Minh, Văn Cao chủ yếu viết về nhiều ca khúc mang âm hưởng hào hùng như Tiến quân ca, Trường ca Sông Lô, Tiến về Hà Nội,... vì vậy ông đã trở thành một nhạc sĩ tiêu biểu của dòng nhạc kháng chiến. Sau sự kiện Nhân văn – Giai phẩm, Văn Cao phải đi học tập chính trị. Trừ Tiến quân ca, tất cả những ca khúc của ông cũng giống như các nhạc phẩm tiền chiến khác không được lưu hành ở miền Bắc. Đến cuối thập niên 1980, những nhạc phẩm này mới được lưu hành trở lại.

Được nhiều người xem là một hình mẫu thiên tài trong lịch sử văn nghệ Việt Nam,[1][13][14] tài năng nghệ thuật đa dạng mang tính tổng hợp cao giữa văn chương (thi ca) - âm nhạc - hội họa của Văn Cao đã sớm có những thành tựu đột khởi ngay từ độ tuổi mười tám đôi mươi.[15][16][17] Không được đào tạo một cách thực sự chính quy, chuyên sâu cả về âm nhạc và hội họa, những thành tựu của Văn Cao trong hai lĩnh vực này có thể nói là bắt nguồn chủ yếu từ thiên năng nghệ thuật sẵn có của ông (nói theo lời của nhà nghiên cứu âm nhạc Nguyễn Thụy Kha thì "Văn Cao là trời cho"). Ông được nhiều người xem là một hiện tượng hiếm có trong lịch sử phát triển của văn hóa Việt Nam – ở nơi "dòng chảy" của sáng tạo cá nhân một con người có sự "hợp lưu" xuyên suốt của ba nhánh nhạc-họa-thơ trong gần như toàn bộ những sáng tác đa dạng của ông. Nhận định về sự nghiệp văn nghệ của Văn Cao, nhiều người thường nhắc đến ông như một nghệ sĩ đa tài, thích "lãng du" qua những "địa hạt" (lĩnh vực) nghệ thuật khác nhau. Dù không gắn bó liên tục quá lâu với một địa hạt nào trong số đó nhưng đối với những "miền" nào ông đã bước qua thì Văn Cao cũng đều lưu dấu không ít sáng tạo mang tính khai phá - mở lối dành cho những người đến sau ông. Như nhạc sĩ Phạm Duy sinh thời đã nhiều lần xác nhận, sự nghiệp sáng tác của ông chịu một ảnh hưởng lớn từ những khai mở (về chuyên môn) và khích lệ (về tinh thần) từ Văn Cao, với tư cách là một người bạn văn nghệ tri kỷ của Phạm Duy. Nhà nghiên cứu văn học sử Việt Nam hiện đại Thụy Khuê cũng lưu ý về thế giới nghệ thuật phong phú đa diện của Văn Cao, tưởng như khó gặp sự trùng lặp hay vay mượn ý tưởng lẫn nhau giữa hai địa hạt rất gần là âm nhạc và thơ ca: "Nếu nhạc của Văn Cao đưa con người vào cõi mộng, thì thơ Văn Cao xoáy vào thực tại cuộc đời: phần đời thực với Chiếc xe xác qua phường Dạ Lạc, Ngoại ô mùa đông 1946, Những người trên cửa biển và phần nội tâm sâu xé của con người mất tự do, trong các bài thơ ngắn, cô đọng và đau thương, như những giọt nước mắt không rơi ngoài tim mình như lời thơ Thanh Tâm Tuyền... Cúi xuống những lầm than của kiếp người, Văn Cao là người duy nhất để lại những hình ảnh kinh hoàng của trận đói tháng 3 năm Ất Dậu. Nếu không có Chiếc xe xác qua phường Dạ Lạc, thì chúng ta không thể hình dung cảnh xe xác lăn trong xóm cô đầu của một Hà Nội..."[18]

Dù những sáng tác của Văn Cao (đặc biệt là về âm nhạc và thơ ca) nói chung không thực dồi dào về số lượng nhưng về mặt chất lượng chúng có ảnh hưởng mang tính định hướng và đặt nền cho sự phát triển của đời sống văn nghệ Việt Nam hiện đại. Một số ví dụ điển hình là vai trò đặc biệt quan trọng của ông trong sự định hình của thể loại tình ca, hùng ca (trong đó nổi bật là dòng nhạc cách mạng) và trường ca trong âm nhạc cũng như thể loại trường ca trong thơ hiện đại Việt Nam. Tuy nhiên những đóng góp về thơ ca và hội họa của Văn Cao vì nhiều lý do khác nhau mà ít được nhắc tới hơn rất nhiều so với những thành tựu trong âm nhạc của ông. Là một người tài hoa vào loại bậc nhất trong lịch sử văn nghệ Việt Nam, nhưng ngay từ thời còn niên thiếu ở Hải Phòng ông đã là một người có thiên hướng khép kín, trầm tư, ít bộc lộ bản thân trước đám đông. Sau biến cố Nhân văn – Giai phẩm cuối thập niên 1950, ông lại càng có xu hướng sống khép kín và cô độc hơn mặc dù luôn có gia đình (đặc biệt là vợ ông) và một số bạn văn nghệ thân quen làm chỗ dựa cho đến những năm cuối đời. Khác với quan niệm truyền thống xưa nay về tài tử và giai nhân, cuộc đời của Văn Cao ít có những tiếp xúc mang tính lãng mạn với phái nữ vì như ông từng bộc bạch trong một cuốn phim tài liệu về mình rằng, "Tôi là một cái người luôn luôn thất bại về tình yêu, cái thất bại này là bởi vì tôi là người không giỏi về cách tôi giao lưu với những người đàn bà, mà lại đối với những người đẹp tôi lại càng bối rối, tôi không bao giờ nói được với người ta, thì tôi bèn nói trong thơ thôi." Lê Thiếu Nhơn trong một bài viết đăng trên báo Báo Công an nhân dân có tổng kết: "Cuộc đời 72 năm của Văn Cao gắn bó trọn vẹn với Việt Nam thế kỷ 20 nhiều biến động, để lại cho thế hệ sau không ít câu hỏi không dễ trả lời. Câu hỏi rộn ràng về cống hiến nhọc nhằn, câu hỏi cồn cào về thế sự ngổn ngang, về mệnh kiếp lênh đênh. Một Văn Cao đa tài không thể che chở một Văn Cao lận đận. Một Văn Cao danh vọng không thể bênh vực một Văn Cao cay đắng. Một Văn Cao hào hoa không thể an ủi một Văn Cao cô độc. Những ngày tháng Văn Cao đã sống, cứ đổ cái bóng gầy hắt hiu và trắc ẩn vào lòng công chúng, mà những bài hát của ông không lý giải được, những bức tranh của ông cũng không lý giải được. Chỉ còn lại thơ, xoa dịu và tỏ bày giùm Văn Cao."[6]

Năm 1996, một năm sau khi mất, Văn Cao được tặng Giải thưởng Hồ Chí Minh trong đợt trao giải đầu tiên. Ông cũng đã được Nhà nước Việt Nam trao tặng Huân chương Kháng chiến hạng nhất, Huân chương Độc lập hạng ba, Huân chương Độc lập hạng nhất, Huân chương Hồ Chí Minh.[19] Tên ông cũng được đặt cho nhiều con phố đẹp ở Hà Nội, Thành phố Hồ Chí Minh, Hải Phòng, Huế, Đà Nẵng, Nam Định,...
Dấu ấn và di sản văn nghệ
Trong lĩnh vực âm nhạc, Văn Cao là người có công khai phá và giúp hoàn thiện một số thể loại của tân nhạc Việt Nam như nhạc trữ tình (nhạc tiền chiến),[42] hùng ca (nhạc cách mạng, nhạc kháng chiến),[43] và trường ca.[44] Trong lĩnh vực thi ca, ông cũng là một trong ít người không ngừng đi tiên phong với những cách tân mang tính đột phá-sáng tạo trong thơ Việt Nam hiện đại.[45][46][47] Đã có những quan điểm chuyên môn xem ông là một trong những người đi khai phá, mở đầu cho sự phát triển của thể loại trường ca thơ hiện đại Việt Nam, đặc biệt kể từ nửa cuối thập niên 1950 trở đi.[48][49][50][51][52] Tuy nhiên, những đóng góp của ông cho thơ ca và hội họa[5][53][54] dân tộc ít khi được nhắc tới so với những cống hiến to lớn về âm nhạc của ông. Văn Cao được xem là một hiện tượng hiếm có trong lịch sử phát triển của văn hóa Việt Nam – một con người mà sự kết hợp nhạc-họa-thơ là xuyên suốt trong gần như toàn bộ những sáng tác đa dạng của ông. Trong địa hạt âm nhạc của ông, ngoài những nét đẹp về giai điệu, ca từ cũng mang nhiều tính thơ và họa. Còn trong địa hạt thơ của ông, họa tính là rất đặc trưng.[55]

Ở Văn Cao, tầm vóc không phải là thứ lượng hóa, tức là tính bằng con số những sáng tác. Bởi xét về số lượng, những sáng tác của Văn Cao (đặc biệt trong lĩnh vực nhạc và thơ) còn ít hơn đáng kể ngay cả so với nhiều nhạc sĩ hoặc thi sĩ ở tầm trung tại Việt Nam. Đánh giá Văn Cao cần nhìn xuyên suốt tư tưởng của ông trong cả ba lĩnh vực là nhạc-họa-thơ. Xét về nhiều phương diện, Văn Cao là mẫu nghệ sĩ hiếm có bởi lịch sử Việt Nam không có khuynh hướng tạo ra những nghệ sỹ có tinh thần dám khai phá sáng tạo như ông. Mẫu người trí thức hoặc nghệ sĩ điển hình trong xã hội Việt Nam (từ chế độ phong kiến, tới phong kiến nửa thực dân, rồi thời phân chia quốc cộng) thường là con người biết nương theo hoàn cảnh, trở thành viên chức tận tụy phục vụ chế độ chính trị anh ta đang sống. Văn Cao chưa bao giờ nuôi tham vọng chính trị. Ông tham gia Việt Minh chỉ vì lòng yêu nước. Ông luôn là người nghệ sĩ có tinh thần tự do sáng tạo. Ông là người nghệ sỹ độc lập, phi chính trị. Đây cũng là nguyên nhân khiến ông trở thành nạn nhân trong sự kiện đàn áp phong trào Nhân văn Giai phẩm khiến một thời gian dài ông không thể sáng tác. Đây có thể xem là một đặc tính ít mang tính truyền thống hơn cả trong con người của Văn Cao. Có thể nó có ảnh hưởng ít nhiều từ văn hóa phương Tây, cái mà ông có thể tiếp nhận từ hệ thống giáo dục thuộc địa của Pháp. Mặc dù là đôi bạn văn nghệ tri kỷ, nhưng về nhiều phương diện Văn Cao trái ngược với Phạm Duy. Văn Cao là người đi tiên phong, đặt nền móng, gợi mở nhiều hướng phát triển mới cho nhạc và thơ Việt hiện đại nhưng ông chưa bao giờ thực sự thăng hoa về mặt lượng (so với sự dồi dào về mặt chất) ở cả hai lĩnh vực. Còn Phạm Duy là người kế thừa nhiều khai phá từ Văn Cao và phát triển chúng đến độ phì nhiêu.

Văn Cao đã được nhiều người coi là một trong những danh nhân văn hóa tiêu biểu của Việt Nam thời hiện đại.[56][57][58] Là một bậc thầy của nghệ thuật sử dụng ngôn từ phong phú và biến hóa trong các sáng tác nhạc và thơ của ông, cống hiến của Văn Cao cho riêng tiếng Việt - với tư cách một ngôn ngữ có khả năng chuyên chở đầy đủ những sắc thái cảm xúc và tư tưởng của người nghệ sĩ - đã thậm chí được so sánh với cống hiến của Nguyễn Du cho riêng ngôn ngữ thi ca dân tộc. Là người tài hoa được thừa nhận trên nhiều lĩnh vực như nhạc-họa-thơ[17] nhưng cuộc đời và sự nghiệp của Văn Cao cũng được xem là một điển hình của định mệnh "tài"[59] và "tai"[60] trong lịch sử văn hóa của Việt Nam. Ông không có những quãng thời gian đủ dài và suôn sẻ trong sáng tạo nghệ thuật so với những tên tuổi như Phạm Duy hay Trịnh Công Sơn bởi bối cảnh chính trị, văn hóa đặc thù của miền Bắc so với miền Nam Việt Nam những năm chiến tranh chia cắt. Đánh giá về Văn Cao, trong nhiều bài viết các tác giả không ngần ngại gắn cho ông mỹ từ thiên tài, trong đó có Phạm Duy (2007), Thụy Khuê (2010), Đỗ Ngọc Thạch (2013), hay Trần Mạnh Hảo (2013). Đây mặc định có thể xem là đánh giá ở mức độ cao nhất đối với bất cứ ai hoạt động trong lĩnh vực văn hóa nghệ thuật ở Việt Nam. Trong văn học nghệ thuật của dân tộc, trước Văn Cao có lẽ chỉ có Nguyễn Du trong thi ca là thường được gắn với mỹ từ thiên tài nhiều hơn cả. Việc Phạm Duy dùng mỹ từ đó cũng cho thấy sự trân trọng ông dành cho Văn Cao lớn thế nào, bởi Phạm Duy với lòng tự tôn của một cây đại thụ hàng đầu tân nhạc Việt không phải người dễ dãi trong đánh giá thành tựu của đồng nghiệp. Với những kiến thức phong phú về nhạc lý và văn hóa dân tộc, Phạm Duy hơn ai hết có đầy đủ thẩm quyền đánh giá về tài năng của Văn Cao.

Nhiều người nghiên cứu sâu về Văn Cao (trong đó có bạn vong niên của ông là nhà nghiên cứu âm nhạc Nguyễn Thụy Kha và con trai trưởng của Văn Cao là họa sĩ Văn Thao) thường nhắc tới khả năng đưa ra những tiên tri hay dự đoán đến mức chính xác đáng kinh ngạc trong những sáng tác âm nhạc của ông. Nhiều sự kiện đã xảy ra trong các tác phẩm của Văn Cao trước khi chúng được ghi nhận trong thực tế lịch sử Việt Nam thế kỷ ông đã sống.[61] Một số tác phẩm điển hình là Không quân Việt Nam và Tiến về Hà Nội.[62]',
            'avatar' => 'img/van-cao.png',
            'status' => 'inactive',
            'library' => [
                [
                    'name' => 'Tiến quân ca',
                    'singer' => '',
                    'img' => '',
                    'state' => '',
                    'license' => '',
                    'publish_date' => '',
                    'views' => rand(10, 1000),
                    'comments' => rand(10, 1000),
                    'update_date' => '',
                ],
            ],
            'data' => [
                1 => [
                    'date' => 'Tháng Bảy 25,2023',
                    'content' => 'Kỷ niệm 75 năm thành lập Liên hiệp các Hội Văn học Nghệ thuật Việt Nam',
                    'title' => 'TIN HỘI',
                    'img' => 'img/van_cao-1.png',
                ],
                2 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Hội Nhạc sĩ Việt Nam tặng thưởng cho các tiết mục xuất sắc Cuộc thi độc tấu và hòa tấu nhạc cụ dân tộc 2023',
                    'title' => 'TIN HỘI',
                    'img' => 'img/van_cao-2.png',
                ],
                3 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'VĂN CAO - "Ông hoàng âm nhạc"',
                    'title' => 'NGHỆ SĨ',
                    'img' => 'img/van_cao-3.png',
                ],
                4 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Nhạc sĩ Văn Cao và chuyện kể bên giường bệnh',
                    'title' => 'NGHỆ SĨ',
                    'img' => 'img/van_cao-4.png',
                ],
                5 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Trịnh Công Sơn với Văn Cao',
                    'title' => 'NGHỆ SĨ',
                    'img' => 'img/van_cao-5.png',
                ],
                6 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Nhạc sĩ Văn Cao - "Cây cổ thụ 3 ngọn" của nền nghệ thuật Việt Nam',
                    'title' => 'TIN CHUNG',
                    'img' => 'img/van_cao-6.png',
                ],
                7 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Hội Nhạc sĩ Việt Nam họp Ban tổ chức các hoạt động kỷ niệm 100 năm ngày sinh nhạc sĩ Văn Cao',
                    'title' => 'TIN HỘI',
                    'img' => 'img/van_cao-7.png',
                ],
                8 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Tọa đàm “Nghệ thuật sử dụng âm nhạc dân gian trong sáng tác hiện nay”',
                    'title' => 'TIN HỘI',
                    'img' => 'img/van_cao-8.png',
                ],
            ],
        ],
        'do_nhuan' => [
            'name' => 'Đỗ Nhuận',
            'public_name' => 'NS. Đỗ Nhuận',
            'position' => '',
            'categories' => ['Nhạc tiền chiến', 'Nhạc đỏ'],
            'featured_works' => 32,
            'musical_instruments' => 12,
            'prizes' => [
                'Huân chương Độc lập hạng Nhì',
                'Giải thưởng Hồ Chí Minh',
                'Huân chương Chiến sĩ hạng Nhì',
            ],
            'opera' => 9,
            'story' => 'Đỗ Nhuận (1922 – 1991) là một nhạc sĩ Việt Nam. Ông là Tổng thư ký đầu tiên của Hội nhạc sĩ Việt Nam khóa I và II từ 1958 đến 1983, một trong những nhạc sĩ tiên phong của âm nhạc cách mạng. Đỗ Nhuận còn là nhạc sĩ Việt Nam đầu tiên viết opera với vở Cô Sao, cũng là tác giả của bản "Du kích sông Thao" nổi tiếng.
Đỗ Nhuận sinh ngày 10 tháng 12 năm 1922, quê ở thôn Hoạch Trạch, xã Thái Học, huyện Bình Giang, tỉnh Hải Dương. Rời Cẩm Bình từ rất nhỏ, Đỗ Nhuận từng sống nhiều năm ở thành phố cảng Hải Phòng, nơi cha ông phục vụ trong đội quân nhạc với vai trò "lính kèn Tây".[2]

Hải Phòng những năm cuối thập niên 1930 là một trong những cái nôi của tân nhạc với những Văn Cao, Lê Thương, Hoàng Quý... Năm 14 tuổi, Đỗ Nhuận tham gia hướng đạo sinh, hát những ca khúc Pháp và châu Âu. Ông cũng tự học âm nhạc dân tộc và biết chơi sáo trúc, tiêu, đàn nguyệt, đàn tứ, đàn bầu. Sau đó, khi âm nhạc cải cách bước đầu nhen nhóm, Đỗ Nhuận cũng bắt đầu tiếp xúc với tân nhạc, học đàn guitar, banjo, kèn harmonica và ghi âm. Sau ông còn học thêm violon, baian với các nhạc công người Nga lưu vong ở Hà Nội.

Năm 1939, Đỗ Nhuận sáng tác ca khúc đầu tay vào tuổi 17, bản "Trưng Vương", nhân ngày kỷ niệm Hai Bà Trưng ở tỉnh Hải Dương.[2] "Trưng Vương" được phổ biến rộng rãi và đã xuất bản ngay trong năm đó. Tiếp theo, từ cảm hứng lịch sử, ông soạn nhiều ca khúc như: "Chim than", "Lời cha già", "Đường lên ải Bắc"... là cơ sở soạn nên vở ca cảnh Nguyễn Trãi - Phi Khanh gồm 3 ca khúc "Chim than", "Lời cha già", "Đường lên ải Bắc" được ông viết trong hai năm 1940, 1941.

Thời gian đó Đỗ Nhuận cũng bắt đầu tham gia hoạt động cách mạng. Năm 1943, vì in và rải truyền đơn tuyên truyền cho cách mạng nên ông bị bắt giam vào nhà tù Hải Dương, rồi đưa lên Hỏa Lò và sau bị đày lên Sơn La.[2] Thời gian trong tù, Đỗ Nhuận đã viết nhiều bài hát cách mạng như: "Chiều tù", "Côn Đảo", "Hận Sơn La", "Tiếng gọi tù nhân", "Viếng mồ tử sĩ", "Du kích ca"...

Sau khi được trả tự do, Đỗ Nhuận tiếp tục sáng tác và hoạt động cách mạng. Ông viết nhiều bài hát và được khá phổ biến thời bấy giờ: "Nhớ chiến khu", "Đường trường vô Nam", "Tiếng súng Nam Bộ", "Bé yêu Bác Hồ", "Ngày Quốc hội"... Trong thời gian chiến tranh, ông có những ca khúc về du kích cùng nhiều nhạc phẩm khác: "Du kích ca", "Đoàn lữ nhạc", "Hành quân xa", "Trên đồi Him Lam", "Chiến thắng Điện Biên", "Tình Việt Bắc", "Lửa rừng", "Tiếng hát đầu quân", "Áo mùa đông", "Đèo bông lau"... Trong số đó phải kể đến "Hành quân xa" với câu hát nổi tiếng "Đời chúng ta đâu có giặc là ta cứ đi" và "Đoàn lữ nhạc" cùng trường ca bất hủ "Du kích sông Thao" vẫn được các ca sĩ nổi tiếng của Sài Gòn về sau trình bày.

Thời kỳ này, có thể nói Đỗ Nhuận đã ảnh hưởng nhiều nhạc sĩ cách mạng khác như Trần Quý, Lê Lan, Doãn Nho,Nguyên Nhung... Nǎm 1955, chùm ca khúc Điện Biên Phủ của ông đã được trao giải nhất của Hội Vǎn nghệ Việt Nam. Cho đến nay, giai điệu của bài "Chiến thắng Điện Biên" là một trong những nhạc hiệu quen thuộc của đài phát thanh và đài truyền hình.

Sau hòa bình 1954 Đỗ Nhuận tiếp tục sáng tác và có mặt trong lĩnh vực khí nhạc Việt Nam qua các tác phẩm: khúc biến tấu trên chủ đề dân ca cho flute và piano Mùa xuân trên rừng (1963), tứ tấu đàn dây Tây Nguyên (1964), ba biến tấu cho violon và piano (1964), tổ khúc giao hưởng Điện Biện (1965), giao hưởng thơ Đimit\'rov (1981)... Ngoài ra, còn phải kể đến kịch múa rối Giấc mơ bé Rồng (1968), kịch múa Mở biển (1973) và nhạc nền trong các phim tài liệu và phim truyện: Chiến thắng Điện Biên (1954), Nguyễn Vǎn Trỗi (1965), Mở đường Trường Sơn (1972), Lǎng Bác Hồ (1975).

Đỗ Nhuận cũng là nhạc sĩ duy nhất trong thế hệ đầu của tân nhạc được đào tạo bài bản, ông đi học tại đại học tại Nhạc viện Tchaikovsky từ năm 1960[2] đến 1962. Ông là một trong những người đặt nền móng cho thể loại nhạc kịch theo truyền thống của opera phương Tây. Những thể nghiệm đầu tiên của ông xuất hiện từ những nǎm 1950 là các ca kịch ngắn: Cả nhà thi đua, Sóng cả không ngã tay chèo, Anh Pǎn về bản, Hòn đá. Những năm 1970, 1980, Đỗ Nhuận viết các vở nhạc kịch: Chú Tễu, Ai đẹp hơn ai, Trước giờ cưới, Quả dưa đỏ... Đỗ Nhuận là nhạc sĩ Việt Nam đầu viết opera với vở Cô Sao (1965), rồi sau đó là Người tạc tượng (1971). Đỗ Nhuận còn có những tác phẩm khí nhạc như Vũ khúc Tây Nguyên cho violon và dàn nhạc... Nhưng tên tuổi ông vẫn gắn bó với những ca khúc như "Việt Nam quê hương tôi", "Tôi thích thể thao" (một bài hát vui, bắt đầu bằng toàn chữ T), "Em là thợ quét vôi", "Đường bốn mùa xuân"...

Ngoài sáng tác, Đỗ Nhuận còn viết báo, tham gia phê bình. Nổi bật trong số đó là bài báo tấn công nặng nề nhóm Nhân Văn - Giai Phẩm, cụ thể là Trần Dần năm 1958[3], không lâu sau khi ông nhận chức Tổng thư ký Hội nhạc sĩ.

Đỗ Nhuận mất vào ngày 18 tháng 5 nǎm 1991 tại Hà Nội.',
            'avatar' => 'img/do-nhuan.png',
            'status' => 'inactive',
            'library' => [],
            'data' => [
                1 => [
                    'date' => 'Tháng Bảy 25,2023',
                    'content' => 'Kỷ niệm 75 năm thành lập Liên hiệp các Hội Văn học Nghệ thuật Việt Nam',
                    'title' => 'TIN HỘI',
                    'img' => 'img/van_cao-1.png',
                ],
                2 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Hội Nhạc sĩ Việt Nam tặng thưởng cho các tiết mục xuất sắc Cuộc thi độc tấu và hòa tấu nhạc cụ dân tộc 2023',
                    'title' => 'TIN HỘI',
                    'img' => 'img/van_cao-2.png',
                ],
                3 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Tôn vinh nhạc sĩ Đỗ Nhuận bằng đêm nghệ thuật đặc biệt"',
                    'title' => 'NGHỆ SĨ',
                    'img' => 'img/do_thuan-3.png',
                ],
                4 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Bài hát Đỗ Nhuận: Những sáng tạo độc đáo từ khai thác âm nhạc dân gian truyền thống',
                    'title' => 'NGHỆ SĨ',
                    'img' => 'img/do_thuan-4.png',
                ],
                5 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Nhạc sĩ Đỗ Nhuận - Cây đại thụ của âm nhạc cách mạng Việt Nam',
                    'title' => 'NGHỆ SĨ',
                    'img' => 'img/do_thuan-5.png',
                ],
                6 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Nhạc sĩ Đỗ Nhuận - Người nâng tầm nhạc Việt',
                    'title' => 'TIN CHUNG',
                    'img' => 'img/do_thuan-6.png',
                ],
                7 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Nhạc sĩ Đỗ Nhuận - Người nâng tầm nhạc Việt',
                    'title' => 'TIN HỘI',
                    'img' => 'img/do_thuan-7.png',
                ],
                8 => [
                    'date' => 'Tháng Bảy 2,2023',
                    'content' => 'Tọa đàm “Nghệ thuật sử dụng âm nhạc dân gian trong sáng tác hiện nay”',
                    'title' => 'TIN HỘI',
                    'img' => 'img/van_cao-8.png',
                ],
            ],
        ],
    ],
];
