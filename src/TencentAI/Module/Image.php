<?php

declare(strict_types=1);

namespace TencentAI\Module;

use Is\Is;
use TencentAI\Exception\TencentAIException;
use TencentAI\Kernel\Request;

trait Image
{
    private static $file_type_array = ['jpg', 'png', 'bmp'];

    private static $scene_array = [
        0 => '机场',
        60 => '肉店',
        120 => '栽培',
        180 => '垃圾填埋',
        240 => '索桥',
        1 => '机舱',
        61 => '巴特',
        121 => '野生的',
        181 => '降落甲板',
        241 => '废墟',
        2 => '机场航站楼',
        62 => '小屋内',
        122 => '场路',
        182 => '草坪',
        242 => '沙盒',
        3 => '胡同',
        63 => '自助餐厅',
        123 => '火灾逃生',
        183 => '图书馆室内',
        243 => '桑拿',
        4 => '游乐场',
        64 => '营地',
        124 => '消防站',
        184 => '灯塔',
        244 => '服务器机房',
        5 => '游乐园',
        65 => '校园',
        125 => '鱼塘',
        185 => '客厅',
        245 => '鞋店',
        6 => '公寓大楼外',
        66 => '自然的',
        126 => '室内跳蚤市场',
        186 => '大堂',
        246 => '大商场室内',
        7 => '水族馆',
        67 => '城市的',
        127 => '室内花店',
        187 => '更衣室',
        247 => '淋浴',
        8 => '渡槽',
        68 => '糖果店',
        128 => '美食广场',
        188 => '商店外面',
        248 => '滑雪度假村',
        9 => '游乐中心',
        69 => '峡谷',
        129 => '足球场',
        189 => '商店里面',
        249 => '天空',
        10 => '考古发掘',
        70 => '汽车内饰',
        130 => '阔叶',
        190 => '沼泽',
        250 => '摩天大楼',
        11 => '档案文件',
        71 => '旋转木马',
        131 => '森林的小路',
        191 => '武术馆',
        251 => '雪地',
        12 => '曲棍球',
        72 => '城堡',
        132 => '林道',
        192 => '水',
        252 => '足球场',
        13 => '性能',
        73 => '地下墓穴',
        133 => '正式的花园',
        193 => '清真寺外面',
        253 => '稳定的',
        14 => '牛仔竞技比赛',
        74 => ' 墓地 ',
        134 => '喷泉',
        194 => '山',
        254 => '棒球',
        15 => '陆军基地',
        75 => '化学实验室',
        135 => '厨房',
        195 => '山间小道 ',
        255 => '足球',
        16 => '艺术画廊',
        76 => '孩子的房间',
        136 => '车库内',
        196 => '山上的雪',
        256 => '室内舞台',
        17 => '艺术学校',
        77 => '礼堂内',
        137 => '车库外',
        197 => '电影院室内',
        257 => '户外舞台',
        18 => '艺术工作室',
        78 => '礼堂外',
        138 => '加油站',
        198 => '博物馆室内',
        258 => '楼梯',
        19 => '装配线',
        79 => '教室',
        139 => '外部',
        199 => '音乐工作室',
        259 => '街道',
        20 => '户外田径场地',
        80 => '悬崖',
        140 => '杂货店内',
        200 => '自然历史博物馆',
        260 => '地铁站台',
        21 => '阁楼',
        81 => '衣柜',
        141 => '礼品店',
        201 => '婴儿室',
        261 => '超市',
        22 => '大礼堂',
        82 => '服装店',
        142 => '冰川',
        202 => '海洋',
        262 => '寿司店',
        23 => '汽车厂',
        83 => '海岸',
        143 => '高尔夫球场',
        203 => '办公室',
        263 => '沼泽',
        24 => '汽车展厅',
        84 => '驾驶舱',
        144 => '温室内',
        204 => '办公隔间',
        264 => '游泳池',
        25 => '荒地',
        85 => '咖啡店',
        145 => '温室外',
        205 => '石油钻台',
        265 => '室内游泳池',
        26 => '商店',
        86 => '电脑室',
        146 => '石窟',
        206 => '操作室',
        266 => '户外游泳池',
        27 => '外部',
        87 => '会议室',
        147 => '体育馆内',
        207 => '果园',
        267 => '电视演播室',
        28 => '内部',
        88 => '施工现场',
        148 => '飞机棚内',
        208 => '乐池',
        268 => '亚洲',
        29 => '球坑',
        89 => '玉米田',
        149 => '飞机棚外',
        209 => '宝塔',
        269 => '王座室',
        30 => '舞厅',
        90 => '畜栏',
        150 => '港',
        210 => '宫殿',
        270 => '售票厅',
        31 => '竹林',
        91 => '走廊',
        151 => '五金店',
        211 => '食品贮藏室',
        271 => '修剪花园',
        32 => '银行金库',
        92 => '庭院',
        152 => '海菲尔德',
        212 => '公园',
        272 => '塔',
        33 => '宴会厅',
        93 => '小溪',
        153 => '直升机场',
        213 => '室内停车场',
        273 => '玩具店',
        34 => '酒吧',
        94 => '决口',
        154 => '公路',
        214 => '停车场',
        274 => '列车内部',
        35 => '棒球场 ',
        95 => '人行横道',
        155 => '家庭办公室',
        215 => '牧场',
        275 => '火车站台',
        36 => '地下室',
        96 => '水坝',
        156 => '医院的房间',
        216 => '亭阁',
        276 => '林场',
        37 => '室内篮球场',
        97 => '熟食店',
        157 => '温泉',
        217 => '宠物店',
        277 => '树屋',
        38 => '浴室',
        98 => '百货商店',
        158 => '酒店外',
        218 => '药房',
        278 => '沟槽',
        39 => '室内市场',
        99 => '沙',
        159 => '酒店房间',
        219 => '电话亭',
        279 => '苔原',
        40 => '户外市场',
        100 => '植被',
        160 => '房子',
        220 => '码头',
        280 => '海洋的深处',
        41 => '海滩',
        101 => '沙漠公路',
        161 => '冰淇淋店',
        221 => '比萨店',
        281 => '实用的房间',
        42 => '美容院',
        102 => '路边小饭店',
        162 => '浮冰',
        222 => '操场',
        282 => '山谷',
        43 => '卧室',
        103 => '餐厅 ',
        163 => ' 冰架',
        223 => '广场',
        283 => '植物园',
        44 => '泊位',
        104 => '餐厅',
        164 => '室内溜冰场',
        224 => '池塘',
        284 => '兽医办公室',
        45 => '生物学实验室',
        105 => '迪斯科舞厅',
        165 => '室外溜冰场',
        225 => '酒馆内',
        285 => '高架桥',
        46 => '木板路',
        106 => '宿舍',
        166 => '冰山',
        226 => '赛马场',
        286 => '村庄',
        47 => '船的甲板上',
        107 => '市中心',
        167 => '工业区',
        227 => '滚道',
        287 => '葡萄园',
        48 => '船屋',
        108 => '更衣室',
        168 => '胰岛',
        228 => '筏',
        288 => '火山',
        49 => '书店 ',
        109 => '车道',
        169 => '浴缸里',
        229 => '铁路轨道 ',
        289 => '户外排球场',
        50 => '公用电话亭里面',
        110 => '药店 ',
        170 => '监狱 ',
        230 => '雨林',
        290 => '水上公园',
        51 => '植物园 ',
        111 => '门 ',
        171 => '日本花园',
        231 => '接待',
        291 => '水塔',
        52 => '室内的弓形窗',
        112 => '电梯大堂 ',
        172 => '珠宝店',
        232 => '娱乐室',
        292 => '瀑布',
        53 => '保龄球馆',
        113 => '电梯井',
        173 => '垃圾场',
        233 => '修理店',
        293 => '浇水洞',
        54 => '拳击台 ',
        114 => '发动机室',
        174 => '城堡',
        234 => '餐厅',
        294 => '波动',
        55 => '桥 ',
        115 => '室内自动扶梯',
        175 => '狗屋外面 ',
        235 => '餐厅厨房',
        295 => '小麦田',
        56 => '建筑立面',
        116 => '开挖 ',
        176 => '幼儿园的教室',
        236 => '餐厅的露台',
        296 => '风电场',
        57 => '斗牛场 ',
        117 => '布艺店',
        177 => '厨房 ',
        237 => '稻田',
        297 => '院子',
        58 => '车内',
        118 => '农场',
        178 => '泻湖',
        238 => '河',
        298 => '禅园',
        59 => '公交车站内',
        119 => '快餐店',
        179 => '自然的',
        239 => '岩拱',
    ];

    private static $object_array = [];

    /**
     * 图片公共方法.
     *
     * @param string $image image file path OR image file content OR image url
     * @param bool   $isUrl image is url
     *
     * @throws TencentAIException
     *
     * @return mixed
     */
    private static function image(string $url, string $image, bool $isUrl = false)
    {
        if ($isUrl) {
            $data = [
                'image_url' => $image,
            ];
        } else {
            $data = [
                'image' => self::encode($image),
            ];
        }

        return Request::exec($url, $data);
    }

    /**
     * 对图片文件进行 base64 编码
     *
     * 传入本地路径或文件内容
     *
     * @param mixed $image
     *
     * @throws TencentAIException
     *
     * @return string
     */
    private static function encode($image)
    {
        // 网址 ?

        // 本地路径 ? is_file file_exists()

        // base64 编码 ? not support

        // 文件内容 ?

        // 资源 ? is_resource

        // SplFileInfo ? instanceof SplFileInfo

        $content = Is::is_image($image, null, true);

        if ($content) {
            return $content;
        } else {
            throw new TencentAIException(90301);
        }
    }
}
