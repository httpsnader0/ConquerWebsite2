<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Rawilk\Settings\Facades\Settings;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Settings::set('title', [
            'ar' => 'بارتي كونكر',
            'en' => 'Party Conquer',
        ]);
        Settings::set('icon', 'images/icon.png');
        Settings::set('logo', 'images/logo.png');
        Settings::set('email', 'httpsnader@gmail.com');
        Settings::set('phone', '+201098683990');
        Settings::set('facebook', 'https://facebook.com/');
        Settings::set('instagram', 'https://instagram.com/');
        Settings::set('youtube', 'https://youtube.com/');
        Settings::set('whatsapp', 'https://whatsapp.com/');
        Settings::set('github', 'https://github.com/');
        Settings::set('twitter', 'https://twitter.com/');
        Settings::set('linkedin', 'https://linkedin.com/');

        $this->setSlider();
        $this->setAbout();
        $this->setFeature();
        $this->setDownload();
        $this->setInstallation();
    }

    public function setSlider()
    {
        Settings::set('sliders', [
            [
                'image' => 'images/headerBG1.png',
                'text' => [
                    'ar' => 'قم بتحميل لعبة <b class="text-webPrimary">بارتي كونكر</b> <br/> وإبدأ اللعب مع أصدقائك الآن',
                    'en' => 'Download <b class="text-webPrimary">Party Conquer</b> Client <br/> And Start Playing With Your Friends',
                ],
                'url' => route('website.signup.index'),
            ],
            [
                'image' => 'images/headerBG2.png',
                'text' => [
                    'ar' => 'لدينا الكثير من <b class="text-webPrimary">الفعاليات</b> للعب <br/> مع أصدقائك إنضم إلينا الآن',
                    'en' => 'We Have Alot Of <b class="text-webPrimary">Events</b> To Play <br/> With Friends Join With Us Now',
                ],
                'url' => route('website.signup.index'),
            ],
            [
                'image' => 'images/headerBG3.png',
                'text' => [
                    'ar' => 'إبقي متصل للحصول على <b class="text-webPrimary">نقاط الآونلاين</b> <br/> لإستبدالها بالكثر من العناصر المميزة',
                    'en' => 'Stay Online To Earn <b class="text-webPrimary">Online Points</b> <br/> Used To Exchange With Special Items',
                ],
                'url' => route('website.signup.index'),
            ],
        ]);
    }

    public function setAbout()
    {
        Settings::set('video', 'https://www.youtube.com/watch?v=LereGnaQmeg');
        Settings::set('abouts', [
            ['title' => ['ar' => 'موعد إفتتاح السيرفر 01/08/2024', 'en' => 'Server Lunched 01/08/2024']],
            ['title' => ['ar' => 'إصدار 6609', 'en' => 'Version 6609']],
            ['title' => ['ar' => 'سيرفر متوسط', 'en' => 'Medium Server']],
            ['title' => ['ar' => '9 شخصيات', 'en' => '9 Classes']],
            ['title' => ['ar' => 'أعلي لفل 140', 'en' => 'Max Level 140']],
            ['title' => ['ar' => 'أعلي +12', 'en' => 'Max +12']],
            ['title' => ['ar' => '2 ريبورن', 'en' => 'Max Reborn 2']],
            ['title' => ['ar' => 'وار دروب', 'en' => 'Wardrobe']],
            ['title' => ['ar' => 'جيانج', 'en' => 'Jiang Hu']],
            ['title' => ['ar' => 'إتشي', 'en' => 'Chi']],
            ['title' => ['ar' => 'برفكشن', 'en' => 'Prestige']],
            ['title' => ['ar' => 'سب كلاس', 'en' => 'Sub Class']],
            ['title' => ['ar' => 'مابات خاصه', 'en' => 'Custom Maps']],
            ['title' => ['ar' => '+30 حفله و مباراه', 'en' => '+30 Event & Tournaments']],
            ['title' => ['ar' => '+10 وحوش كل ساعه', 'en' => '+10 Monster Boos Every Hour']],
            ['title' => ['ar' => 'جيلد وار', 'en' => 'Guild War']],
            ['title' => ['ar' => 'إليت بكي', 'en' => 'Elite PK']],
            ['title' => ['ar' => 'تيم بكي', 'en' => 'Team PK']],
            ['title' => ['ar' => 'إسكيل تيم بكي', 'en' => 'Skill Team PK']],
            ['title' => ['ar' => 'حرب الأعلام', 'en' => 'Capture The Flag']],
            ['title' => ['ar' => 'حرب الشخصيات', 'en' => 'Class War']],
            ['title' => ['ar' => 'حرب الكوبلز', 'en' => 'Couple War']],
            ['title' => ['ar' => 'اخر الرجال الصامدين', 'en' => 'Last Man Standing']],
            ['title' => ['ar' => 'سباق خيول', 'en' => 'Hourse Race']],
            ['title' => ['ar' => 'حرب الاتحاد', 'en' => 'Union War']],
            ['title' => ['ar' => 'إليت جايلد وار', 'en' => 'Elite Guild War']],
            ['title' => ['ar' => 'حرب الكلان', 'en' => 'Clan War']],
            ['title' => ['ar' => 'حرب التجميد', 'en' => 'Freeze War']],
            ['title' => ['ar' => 'ويكلي بكي', 'en' => 'Weekly PK']],
            ['title' => ['ar' => 'والمزيد , اكتشفه بنفسك ...', 'en' => 'And More , Find By Yourself ...']],
        ]);
    }

    public function setFeature()
    {
        Settings::set('features', [
            [
                'image' => 'images/feature01.png',
                'title' => [
                    'ar' => 'كلينت خآص',
                    'en' => 'Custom Client',
                ],
                'description' => [
                    'ar' => 'أشرطة صحة اللاعب، ومعدل الإطارات في الثانية غير المقفل، والدقة المخصصة، والنقر مع الضغط على مفتاح Shift على العناصر التي يمكن إيداعها/بيعها من مخزونك',
                    'en' => 'Player Health Bars, Unlocked FPS, Custom Resolutions, Shift-Click Items To Deposit/Sell From Your Inventory',
                ],
            ],
            [
                'image' => 'images/feature02.png',
                'title' => [
                    'ar' => 'خرائط مخصصة جديدة',
                    'en' => 'New Custom Maps',
                ],
                'description' => [
                    'ar' => 'لدينا إصدار جديد مع خرائط مخصصة جديدة مثل Twincity و Arena و Fighting Maps ... المزيد',
                    'en' => 'We Have New Edition With New Custom Maps Like Twincity & Arena & Fighting Maps ... More',
                ],
            ],
            [
                'image' => 'images/feature03.png',
                'title' => [
                    'ar' => '+50 حدث وبطولة',
                    'en' => '+50 Event & Tournament',
                ],
                'description' => [
                    'ar' => 'في بارتي كونكر ستجد الكثير من الأحداث في الساعة للعب مع أصدقائك',
                    'en' => 'At Party Conquer You Will Find Alot Of Events Per Hour To Play With Your Friends',
                ],
            ],
            [
                'image' => 'images/feature04.png',
                'title' => [
                    'ar' => 'سرعة الإتصال',
                    'en' => 'Ping',
                ],
                'description' => [
                    'ar' => 'استضافة عالية الجودة لتزويد جميع لاعبينا من جميع أنحاء العالم بـ سرعة إتصال رائعه',
                    'en' => 'Top Quality Hosting To Provide All Our Players From All Over The World With Great Ping',
                ],
            ],
            [
                'image' => 'images/feature05.png',
                'title' => [
                    'ar' => 'دعم فني',
                    'en' => 'Dedicated Staff',
                ],
                'description' => [
                    'ar' => 'يعمل فريق العمل لدينا باستمرار على إصلاح المشكلات الموجودة في اللعبة لتحسين تجربة اللعب الخاصة بك',
                    'en' => 'Our Staff Is Constantly Fixing In-Game Issues To Improve Your Gameplay Experience',
                ],
            ],
        ]);
    }

    public function setDownload()
    {
        Settings::set('client', [
            'url' => 'https://www.facebook.com/httpsnader0',
            'size' => '1.2',
            'release_date' => '01/08/2024',
        ]);
        
        Settings::set('patch', [
            'url' => 'https://www.facebook.com/httpsnader0',
            'size' => '300',
            'release_date' => '01/08/2024',
        ]);
    }

    public function setInstallation()
    {
        Settings::set('installations', [
            [
                'title' => [
                    'ar' => 'قم بتحميل الكلينت او الباش الخاص بـ بارتي كونكر',
                    'en' => 'Download Party Conquer Client Or Full Patch',
                ],
            ],
            [
                'title' => [
                    'ar' => 'قم بفك الضغط عن الكلينت على جهازك',
                    'en' => 'Extract Client To Any Of Your Disk',
                ],
            ],
            [
                'title' => [
                    'ar' => 'قم بفتح اللعبه من ملف Play.exe الموجود داخل الكلينت',
                    'en' => 'Run The Play.exe File That\'s Inside The Client',
                ],
            ],
            [
                'title' => [
                    'ar' => 'من فضلك إنتظر حتى ينتهي الأوتو باتش من الإنتهاء',
                    'en' => 'Let The Client Auto Patch Complete',
                ],
            ],
            [
                'title' => [
                    'ar' => 'اختر الإعدادات التي تناسبك',
                    'en' => 'Choose Your Desired Settings If Needed',
                ],
            ],
            [
                'title' => [
                    'ar' => 'قم بالضغط على البدء وقم بتسجيل الدخول',
                    'en' => 'Click Start Game And Then Login',
                ],
            ],
        ]);
    }
}
