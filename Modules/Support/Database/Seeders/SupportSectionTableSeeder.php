<?php

namespace Modules\Support\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Support\Entities\SupportSection;

class SupportSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'en_name' => 'Financial Department',
                'ar_name' => 'القسم المالي',
                'en_description' => 'In this section, you can communicate with the support team about all problems related to financial matters, such as withdrawals, deposits, payment of task costs, or receipt of them.',
                'ar_description' => 'يمكنك في هذا القسم التواصل مع فريق الدعم بكل ما يخص المشاكل التي تتعلق بالأمور المالية من عمليات سحب وإيداع ودفع تكاليف المهام أو استلامها',

            ], [
                'en_name' => 'Technical Section',
                'ar_name' => 'القسم الفني',
                'en_description' => 'In this section, you can contact the support team with everything related to technical problems related to your personal account on the platform, such as forgetting the password or e-mail, inquiring about the reason for stopping your activity, or requesting the lifting of the ban on the account and other technical matters.',
                'ar_description' => 'يمكنك في هذا القسم التواصل مع فريق الدعم بكل ما يتعلق بالمشاكل الفنية الخاصة بحسابك الشخصي على المنصة كنسيان كلمة المرور أو البريد الإلكتروني أو الإستفسار عن سبب إيقاف نشاطك أو المطالبة برفع الحظر عن الحساب وباقي الأمور الفنية الأخرى',

            ], [
                'en_name' => 'Task section',
                'ar_name' => 'قسم المهام',
                'en_description' => 'In this section, you can communicate with the support team regarding all issues related to tasks, their creation, the mechanism for their implementation and display, or even to request the addition of another platform to implement tasks that are not present in the current platforms and the rest of the resources related to creating and executing tasks',
                'ar_description' => 'في هذا القسم يمكنك التواصل مع فريق الدعم بكل ما يخص المشاكل المتعلقة بالمهام وإنشاؤها وآلية تنفيذها وعرضها، أو حتى لطلب إضافة منصة إخرى لتنفيذ المهام غير موجودة في المنصات الحالية وباقي الموارد المتعلقة بإنشاء المهام وتنفيذها',

            ], [
                'en_name' => 'Administrative section',
                'ar_name' => 'قسم الإدارة',
                'en_description' => 'Through this section, you can communicate directly with the administration to inform them of a special problem unless the support team can solve it. You can also provide us with a proposal or point of view that may help us develop our platform for the better, or you may like to raise an issue that may help you become our partner.',
                'ar_description' => 'يمكنك عبر هذا القسم التواصل مع الإدارة بشكل مباشر لإطلاعهم على مشكلة خاصة ما لم يتمكن فريق الدعم من حلها، كما يمكنك تزودينا بمقترح أو وجهة نظر ما قد تسعدنا على تطوير منصتنا للأفضل، أو ربما أحببت طرح مسألة ما قد تساعدك في أن تصبح شريكاً لنا',

            ],

        ];
        foreach ($sections as $section){
            SupportSection::create($section);
        }
    }
}
