<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Facebook',
                'ar_title' => 'فايسبوك',
                'image' => 'Categories/Image/sam1QlUMN0hVaq0543Tp6Y4rRvIZkDAstz0CLMIt.png',
                'description' => 'متابعين وتعليقات ومراجعات حقيقية لترويج موقعك',
            ],
            [
                'title' => 'Google search',
                'ar_title' => 'البحث على غوغل',
                'image' => 'Categories/Image/pKY2czUZcbKuWR9b4VAXaCeBTCObb9tkhNyHnSUK.png',
                'description' => 'حسن ترتيب موقعك على محركات البحث',
            ],
            [
                'title' => 'Youtube',
                'ar_title' => 'يوتيوب',
                'image' => 'Categories/Image/iViXbFiFZDwh3qz98q1uPmECj1DkTLXeDduhkmXk.png',
                'description' => 'اشتراكات ومشاهدات وتعليقات وتفعيل للربح',
            ],
            [
                'title' => 'Polls',
                'ar_title' => 'استطلاعات الرأي',
                'image' => 'Categories/Image/nLU3k7k1PLFZqL9o7uhv3GgDNUJaQF7HqfrcCIzx.png',
                'description' => 'احص على إجابات سريعو وحقيقية لإستطلاع الرأي',
            ],
            [
                'title' => 'Test A Application Or Web Site',
                'ar_title' => 'إختيار موقع أو تطبيق',
                'image' => 'Categories/Image/tWMdcyRbJOoY6SxzkZjolKFKfANAMXa7xUOWJL99.png',
                'description' => 'مئات العمال جاهزون لاختيار موقعك الآن',
            ],
            [
                'title' => 'Artificial intelligence test',
                'ar_title' => 'إختبارات الذكاء الاصطناعي',
                'image' => 'Categories/Image/NWBg45FeL1PMBZm77TlXNfOEgmZHmNnR4mTuhHe7.png',
                'description' => 'اختبار مدى مرونة وذكاء روبوتك',
            ],
            [
                'title' => 'Twitter',
                'ar_title' => 'تويتر',
                'image' => 'Categories/Image/WR4EKZxT1AoUQlDJukeQf25TVoJIkmB1m6bM8JA9.png',
                'description' => 'شارك تغرديداتك مع الجميع',
            ],
            [
                'title' => 'Snapchat',
                'ar_title' => 'سناب شات',
                'image' => 'Categories/Image/SFqpkV9xPacINNt6eUzPpAzZtPGgrXBpMswu0wN0.png',
                'description' => 'قم بضم المزيد إلى بثوثك المباشرة',
            ],
            [
                'title' => 'TikTok',
                'ar_title' => 'تيك توك',
                'image' => 'Categories/Image/eri4HXyUiZSav7Z1mcJcjce2X0S69rLDphTEfIO6.png',
                'description' => 'خدمات ممزية للمنصة الأشهر عالمياً',
            ],
            [
                'title' => 'Instagram',
                'ar_title' => 'إنستاغرام',
                'image' => 'Categories/Image/wiFdkbDpmAwjAnYPPvnkTFZxXOBhfBP84jrvrKzZ.png',
                'description' => 'قم بطلب إعجابات وتعليقات لمقطاعك وصفحاتك',
            ],
            [
                'title' => 'Google Maps',
                'ar_title' => 'خرائط غوغل',
                'image' => 'Categories/Image/S9DYf5esykaFftcBYbhFNc8zG3yx6JO4TnQV6frm.png',
                'description' => 'قم بطلب تسجيل نشاطك التجاري',
            ],
//            [
//                'title' => 'Special mission',
//                'ar_title' => 'مهمة خاصة',
//                'image' => Null,
//                'description' => 'مهمة خاصة حسب متطلباتك',
//            ],

        ];
        foreach ($categories as $category){
            Category::create($category);
        }
    }
}
