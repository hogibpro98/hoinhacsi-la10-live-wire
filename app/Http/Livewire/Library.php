<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Library extends Component
{
    public $swiper1 = [
        1 => 'img/music_1.png',
        2 => 'img/music_2.png',
        3 => 'img/music_3.png',
        4 => 'img/music_1.png',
        5 => 'img/music_2.png',
        6 => 'img/music_3.png',
        7 => 'img/music_1.png',
        8 => 'img/music_2.png',
        9 => 'img/music_3.png',
    ];

    public $listOutStanding = [
        1 => [
            'img' => 'img/Chờ Thêm Một Đời.png',
            'name' => 'Chờ Thêm Một Đời',
            'author' => 'Gigi Hương Giang',
        ],
        2 => [
            'img' => 'img/Trao Em Trọn Tình Yêu.png',
            'name' => 'Trao Em Trọn Tình Yêu',
            'author' => 'Bằng Kiều',
        ],
        3 => [
            'img' => 'img/Kiếp Ve Sầu.png',
            'name' => 'Kiếp Ve Sầu',
            'author' => 'Đan Trường',
        ],
        4 => [
            'img' => 'img/Chia Xa.png',
            'name' => 'Chia Xa',
            'author' => 'Tuấn Hưng',
        ],
        5 => [
            'img' => 'img/Dẫu Có Lỗi Lầm.png',
            'name' => 'Dẫu Có Lỗi Lầm',
            'author' => 'Hiền Thục',
        ],
        6 => [
            'img' => 'img/Ánh Sáng Đời Tôi.png',
            'name' => 'Ánh Sáng Đời Tôi',
            'author' => 'Thu Minh',
        ],
        7 => [
            'img' => 'img/Người Ta Nói.png',
            'name' => 'Người Ta Nói',
            'author' => 'Ưng Hoàng Phúc',
        ],
        8 => [
            'img' => 'img/Dù Khóc Một Dòng Sông.png',
            'name' => 'Dù Khóc Một Dòng Sông',
            'author' => 'Mai Tiến Dũng',
        ],
        9 => [
            'img' => 'img/Tình Thôi Xót Xa.png',
            'name' => 'Tình Thôi Xót Xa',
            'author' => 'Lam Trường',
        ],
    ];

    public $ranking = [
        'outstanding' => [
            1 => [
                'img' => 'img/Đức Trịnh.png',
                'name' => 'Đức Trịnh',
                'des' => 'Nhạc sĩ, Thiếu tướng Quân đội',
                'startus' => 'up',
            ],
            2 => [
                'img' => 'img/tran_nhat_duong.svg',
                'name' => 'Trần Nhật Dương',
                'des' => 'Nhạc sĩ',
                'startus' => 'up',
            ],
            3 => [
                'img' => 'img/tran_xuan_tien.png',
                'name' => 'Trần Xuân Tiên',
                'des' => 'Nhạc sĩ',
                'startus' => 'up',
            ],
            4 => [
                'img' => 'img/pham_ngoc_khoi.png',
                'name' => 'Phạm Ngọc Khôi',
                'des' => 'Nhạc trưởng',
                'startus' => 'down',
            ],
            5 => [
                'img' => 'img/tran_van_thach.png',
                'name' => 'Trần Vương Thạch',
                'des' => 'Nhạc trưởng, Nghệ sĩ Violin',
                'startus' => 'down',
            ],
        ],
        'mostFamous' => [
            1 => [
                'img' => 'img/van-cao.png',
                'name' => 'Văn Cao',
                'des' => 'Nhạc sĩ, Thi sĩ, Hoạ sĩ',
                'startus' => 'up',
            ],
            2 => [
                'img' => 'img/do-nhuan.png',
                'name' => 'Đỗ Nhuận',
                'des' => 'Nhạc sĩ',
                'startus' => 'down',
            ],
            3 => [
                'img' => 'img/Huy Du.png',
                'name' => 'Huy Du',
                'des' => 'Nhạc sĩ',
                'startus' => 'up',
            ],
            4 => [
                'img' => 'img/Trọng Loan.png',
                'name' => 'Trọng Loan',
                'des' => 'Nhạc sĩ, Đại tá Quân đội',
                'startus' => 'down',
            ],
            5 => [
                'img' => 'img/do_hong_quan.svg',
                'name' => 'Đỗ Hồng Quân',
                'des' => 'Nhạc sĩ, Tiến sĩ, Diễn viên',
                'startus' => 'down',
            ],
        ],
        'song' => [
            1 => [
                'img' => 'img/Chờ Thêm Một Đời.png',
                'name' => 'Chờ Thêm Một Đời',
                'des' => 'Gigi Hương Giang',
                'startus' => 'up',
            ],
            2 => [
                'img' => 'img/Riêng Một Góc Trời.png',
                'name' => 'Riêng Một Góc Trời',
                'des' => 'Tuấn Ngọc',
                'startus' => 'up',
            ],
            3 => [
                'img' => 'img/Dù Khóc Một Dòng Sông.png',
                'name' => 'Dù Khóc Một Dòng Sông',
                'des' => 'Mai Tiến Dũng',
                'startus' => 'up',
            ],
            4 => [
                'img' => 'img/Diễm Xưa.png',
                'name' => 'Diễm Xưa',
                'des' => 'Khánh Ly',
                'startus' => 'down',
            ],
            5 => [
                'img' => 'img/Có Phải Em Mùa Thu Hà Nội.png',
                'name' => 'Có Phải Em Mùa Thu Hà Nội',
                'des' => 'Hồng Nhung',
                'startus' => 'down',
            ],
        ],
    ];

    public $musicTheme = [
        'musicWithoutLyrics' => [
            1 => [
                'img' => 'img/omg.png',
                'name' => 'Nhạc Thiền Phật Giáo',
                'des' => 'Bảo Bảo',
            ],
            2 => [
                'img' => 'img/piano.png',
                'name' => 'Piano Sonata',
                'des' => 'Beethoven',
            ],
            3 => [
                'img' => 'img/perfect.png',
                'name' => 'Perfect',
                'des' => '2Cellos',
            ],
            4 => [
                'img' => 'img/kiss.png',
                'name' => 'Kiss The Rain',
                'des' => 'Yiruma',
            ],
            5 => [
                'img' => 'img/omg.png',
                'name' => 'Nhạc Thiền Phật Giáo',
                'des' => 'Bảo Bảo',
            ],
            6 => [
                'img' => 'img/piano.png',
                'name' => 'Piano Sonata',
                'des' => 'Beethoven',
            ],
            7 => [
                'img' => 'img/perfect.png',
                'name' => 'Perfect',
                'des' => '2Cellos',
            ],
            8 => [
                'img' => 'img/kiss.png',
                'name' => 'Kiss The Rain',
                'des' => 'Yiruma',
            ],
            9 => [
                'img' => 'img/omg.png',
                'name' => 'Nhạc Thiền Phật Giáo',
                'des' => 'Bảo Bảo',
            ],
            10 => [
                'img' => 'img/piano.png',
                'name' => 'Piano Sonata',
                'des' => 'Beethoven',
            ],
            11 => [
                'img' => 'img/perfect.png',
                'name' => 'Perfect',
                'des' => '2Cellos',
            ],
            12 => [
                'img' => 'img/kiss.png',
                'name' => 'Kiss The Rain',
                'des' => 'Yiruma',
            ],

        ],
        'period' => [
            1 => [
                'img' => 'img/cach_mang.png',
                'name' => 'Nhạc Cách Mạng',
                'des' => '23 bài hát',
            ],
            2 => [
                'img' => 'img/lang_mang.png',
                'name' => 'Nhạc Lãng Mạn',
                'des' => '30 bài hát',
            ],
            3 => [
                'img' => 'img/co_dien.png',
                'name' => 'Nhạc Cổ Điển',
                'des' => '25 bài hát',
            ],
            4 => [
                'img' => 'img/duong_dai.png',
                'name' => 'Nhạc Đương Đại',
                'des' => '36 bài hát',
            ],
            5 => [
                'img' => 'img/cach_mang.png',
                'name' => 'Nhạc Cách Mạng',
                'des' => '23 bài hát',
            ],
            6 => [
                'img' => 'img/lang_mang.png',
                'name' => 'Nhạc Lãng Mạn',
                'des' => '30 bài hát',
            ],
            7 => [
                'img' => 'img/co_dien.png',
                'name' => 'Nhạc Cổ Điển',
                'des' => '25 bài hát',
            ],
            8 => [
                'img' => 'img/duong_dai.png',
                'name' => 'Nhạc Đương Đại',
                'des' => '36 bài hát',
            ],
            9 => [
                'img' => 'img/cach_mang.png',
                'name' => 'Nhạc Cách Mạng',
                'des' => '23 bài hát',
            ],
            10 => [
                'img' => 'img/lang_mang.png',
                'name' => 'Nhạc Lãng Mạn',
                'des' => '30 bài hát',
            ],
            11 => [
                'img' => 'img/co_dien.png',
                'name' => 'Nhạc Cổ Điển',
                'des' => '25 bài hát',
            ],
            12 => [
                'img' => 'img/duong_dai.png',
                'name' => 'Nhạc Đương Đại',
                'des' => '36 bài hát',
            ],
        ],
        'regions' => [
            1 => [
                'img' => 'img/tay_bac_bo.png',
                'name' => 'Tây Bắc Bộ',
                'des' => '25 bài hát',
            ],
            2 => [
                'img' => 'img/tay_nam_bo.png',
                'name' => 'Tây Nam Bộ',
                'des' => '30 bài hát',
            ],
            3 => [
                'img' => 'img/tay_nguyen.png',
                'name' => 'Tây Nguyên',
                'des' => '25 bài hát',
            ],
            4 => [
                'img' => 'img/co_truyen.png',
                'name' => 'Âm nhạc cổ truyền',
                'des' => '54 bài hát',
            ],
            5 => [
                'img' => 'img/tay_bac_bo.png',
                'name' => 'Tây Bắc Bộ',
                'des' => '25 bài hát',
            ],
            6 => [
                'img' => 'img/tay_nam_bo.png',
                'name' => 'Tây Nam Bộ',
                'des' => '30 bài hát',
            ],
            7 => [
                'img' => 'img/tay_nguyen.png',
                'name' => 'Tây Nguyên',
                'des' => '25 bài hát',
            ],
            8 => [
                'img' => 'img/co_truyen.png',
                'name' => 'Âm nhạc cổ truyền',
                'des' => '54 bài hát',
            ],
            9 => [
                'img' => 'img/tay_bac_bo.png',
                'name' => 'Tây Bắc Bộ',
                'des' => '25 bài hát',
            ],
            10 => [
                'img' => 'img/tay_nam_bo.png',
                'name' => 'Tây Nam Bộ',
                'des' => '30 bài hát',
            ],
            11 => [
                'img' => 'img/tay_nguyen.png',
                'name' => 'Tây Nguyên',
                'des' => '25 bài hát',
            ],
            12 => [
                'img' => 'img/co_truyen.png',
                'name' => 'Âm nhạc cổ truyền',
                'des' => '54 bài hát',
            ],
        ],
        'type' => [
            1 => [
                'img' => 'img/hoa_tau.png',
                'name' => 'Hòa Tấu',
                'des' => '23 bài hát',
            ],
            2 => [
                'img' => 'img/thinh_nhac.png',
                'name' => 'Thính Nhạc',
                'des' => '30 bài hát',
            ],
            3 => [
                'img' => 'img/bolero.png',
                'name' => 'Bolero',
                'des' => '40 bài hát',
            ],
            4 => [
                'img' => 'img/NONSTOP.png',
                'name' => 'NONSTOP',
                'des' => '38 bài hát',
            ],
            5 => [
                'img' => 'img/hoa_tau.png',
                'name' => 'Hòa Tấu',
                'des' => '23 bài hát',
            ],
            6 => [
                'img' => 'img/thinh_nhac.png',
                'name' => 'Thính Nhạc',
                'des' => '30 bài hát',
            ],
            7 => [
                'img' => 'img/bolero.png',
                'name' => 'Bolero',
                'des' => '40 bài hát',
            ],
            8 => [
                'img' => 'img/NONSTOP.png',
                'name' => 'NONSTOP',
                'des' => '38 bài hát',
            ],
            9 => [
                'img' => 'img/hoa_tau.png',
                'name' => 'Hòa Tấu',
                'des' => '23 bài hát',
            ],
            10 => [
                'img' => 'img/thinh_nhac.png',
                'name' => 'Thính Nhạc',
                'des' => '30 bài hát',
            ],
            11 => [
                'img' => 'img/bolero.png',
                'name' => 'Bolero',
                'des' => '40 bài hát',
            ],
            12 => [
                'img' => 'img/NONSTOP.png',
                'name' => 'NONSTOP',
                'des' => '38 bài hát',
            ],
        ],
    ];

    public $musicLove = [
        1 => [
            'img' => 'img/Xin chào Việt Nam.png',
            'name' => 'Xin chào Việt Nam',
            'des' => 'Thuỳ Dung',
        ],
        2 => [
            'img' => 'img/Việt Nam quê hương tôi.png',
            'name' => 'Việt Nam quê hương tôi',
            'des' => 'Trọng Tấn',
        ],
        3 => [
            'img' => 'img/Lá Cờ.png',
            'name' => 'Lá Cờ',
            'des' => 'Tạ Quang Thắng',
        ],
        4 => [
            'img' => 'img/Quê Hương.png',
            'name' => 'Quê Hương',
            'des' => 'Trọng Tấn',
        ],
        5 => [
            'img' => 'img/Xin chào Việt Nam.png',
            'name' => 'Xin chào Việt Nam',
            'des' => 'Thuỳ Dung',
        ],
        6 => [
            'img' => 'img/Việt Nam quê hương tôi.png',
            'name' => 'Việt Nam quê hương tôi',
            'des' => 'Trọng Tấn',
        ],
        7 => [
            'img' => 'img/Lá Cờ.png',
            'name' => 'Lá Cờ',
            'des' => 'Tạ Quang Thắng',
        ],
        8 => [
            'img' => 'img/Quê Hương.png',
            'name' => 'Quê Hương',
            'des' => 'Trọng Tấn',
        ],
        9 => [
            'img' => 'img/Xin chào Việt Nam.png',
            'name' => 'Xin chào Việt Nam',
            'des' => 'Thuỳ Dung',
        ],
        10 => [
            'img' => 'img/Việt Nam quê hương tôi.png',
            'name' => 'Việt Nam quê hương tôi',
            'des' => 'Trọng Tấn',
        ],
        11 => [
            'img' => 'img/Lá Cờ.png',
            'name' => 'Lá Cờ',
            'des' => 'Tạ Quang Thắng',
        ],
        12 => [
            'img' => 'img/Quê Hương.png',
            'name' => 'Quê Hương',
            'des' => 'Trọng Tấn',
        ],
    ];

    public $myMusic = [
        1 => [
            'img' => 'img/Office Music.png',
            'name' => 'Office Music',
            'des' => '16 bài hát',
        ],
        2 => [
            'img' => 'img/Thư Giãn.png',
            'name' => 'Thư Giãn',
            'des' => '20 bài hát',
        ],
        3 => [
            'img' => 'img/Quê Hương.png',
            'name' => 'Summer 2023',
            'des' => '26 bài hát',
        ],
        4 => [
            'img' => 'img/Study Music.png',
            'name' => 'Study Music',
            'des' => ' 17 bài hát',
        ],
        5 => [
            'img' => 'img/Office Music.png',
            'name' => 'Office Music',
            'des' => '16 bài hát',
        ],
        6 => [
            'img' => 'img/Thư Giãn.png',
            'name' => 'Thư Giãn',
            'des' => '20 bài hát',
        ],
        7 => [
            'img' => 'img/Quê Hương.png',
            'name' => 'Summer 2023',
            'des' => '26 bài hát',
        ],
        8 => [
            'img' => 'img/Study Music.png',
            'name' => 'Study Music',
            'des' => ' 17 bài hát',
        ],
        9 => [
            'img' => 'img/Office Music.png',
            'name' => 'Office Music',
            'des' => '16 bài hát',
        ],
        10 => [
            'img' => 'img/Thư Giãn.png',
            'name' => 'Thư Giãn',
            'des' => '20 bài hát',
        ],
        11 => [
            'img' => 'img/Quê Hương.png',
            'name' => 'Summer 2023',
            'des' => '26 bài hát',
        ],
        12 => [
            'img' => 'img/Study Music.png',
            'name' => 'Study Music',
            'des' => ' 17 bài hát',
        ],
    ];

    public $author = [
        1 => [
            'img' => 'img/Đức Trịnh.png',
            'name' => 'Đức Trịnh',
            'des' => 'Nhạc sĩ, Thiếu tướng Quân đội',
        ],
        2 => [
            'img' => 'img/Đỗ Hồng Quân.png',
            'name' => 'Đỗ Hồng Quân',
            'des' => 'Nhạc sĩ, Tiến sĩ, Diễn viên',
        ],
        3 => [
            'img' => 'img/Trọng Loan.png',
            'name' => 'Trọng Loan',
            'des' => 'Nhạc sĩ, Đại tá Quân đội',
        ],
        4 => [
            'img' => 'img/Huy Du.png',
            'name' => 'Huy Du',
            'des' => ' Nhạc sĩ',
        ],
        5 => [
            'img' => 'img/Trọng Bằng.png',
            'name' => 'Trọng Bằng',
            'des' => 'Nhạc sĩ, Nhạc trưởng',
        ],
        6 => [
            'img' => 'img/Đức Trịnh.png',
            'name' => 'Đức Trịnh',
            'des' => 'Nhạc sĩ, Thiếu tướng Quân đội',
        ],
        7 => [
            'img' => 'img/Đỗ Hồng Quân.png',
            'name' => 'Đỗ Hồng Quân',
            'des' => 'Nhạc sĩ, Tiến sĩ, Diễn viên',
        ],
        8 => [
            'img' => 'img/Trọng Loan.png',
            'name' => 'Trọng Loan',
            'des' => 'Nhạc sĩ, Đại tá Quân đội',
        ],
        9 => [
            'img' => 'img/Huy Du.png',
            'name' => 'Huy Du',
            'des' => ' Nhạc sĩ',
        ],
        10 => [
            'img' => 'img/Trọng Bằng.png',
            'name' => 'Trọng Bằng',
            'des' => 'Nhạc sĩ, Nhạc trưởng',
        ],
    ];

    public function render()
    {
        return view('livewire.library')
            ->layout('layouts.guest');
    }
}
