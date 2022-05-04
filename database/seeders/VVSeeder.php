<?php

namespace Database\Seeders;

use App\Models\Backend\About\VV;
use Illuminate\Database\Seeder;

class VVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VV::create([

            'vv' => ['en' => 'VISION
HFMEC are committed to become the pre-eminent regional multidisciplinary full-service design, engineering, construction management and supervision consultancy. HFMEC will remain renowned for exceptional client service, safeguarding the environment and improving the design of the country’s infrastructure and buildings.

To achieve our vision, we will unerringly focus on our Client’s needs and continue to deliver innovative and technically excellent solutions while setting the standard for exceptional quality, value and service. We will become the employer of choice by undertaking challenging projects and providing superior and equal opportunities for the best talent in the industry. A full-service firm that is financially strong and growing through the business integrity, ethics, technical ability and performance of its people. Our goals are far reaching and ambitious, but through constant hard work, endeavour and teamwork, we will realize our vision.

VALUES
In all we do we are guided by our values that define the approach and attitude to our work which leads to our Clients successes. Our values are specific and succinct, namely: delivering on our promises; focusing on quality; exceeding expectations; can-do attitude; building and maintaining trust; ensuring safety; unwavering business integrity; uncompromising ethics; rewarding good performance; and profitable sustainable growth. ' ,

                'ar'=>'رؤية
تلتزم HFMEC بأن تصبح الشركة الإقليمية البارزة متعددة التخصصات في مجال التصميم والخدمات الهندسية وإدارة الإنشاءات والاستشارات الإشرافية. ستظل HFMEC مشهورة بخدمة العملاء الاستثنائية ، وحماية البيئة وتحسين تصميم البنية التحتية والمباني في الدولة.

لتحقيق رؤيتنا ، سنركز بشكل ثابت على احتياجات عملائنا وسنواصل تقديم حلول مبتكرة وممتازة تقنيًا مع وضع معايير الجودة والقيمة والخدمة الاستثنائية. سنصبح صاحب العمل المفضل من خلال تنفيذ المشاريع الصعبة وتوفير فرص متفوقة ومتساوية لأفضل المواهب في الصناعة. شركة متكاملة الخدمات قوية ماليًا وتنمو من خلال نزاهة العمل والأخلاق والقدرة التقنية وأداء موظفيها. أهدافنا بعيدة المدى وطموحة ، ولكن من خلال العمل الجاد المستمر والسعي والعمل الجماعي ، سنحقق رؤيتنا.

القيم
في كل ما نقوم به ، نسترشد بقيمنا التي تحدد النهج والموقف من عملنا الذي يؤدي إلى نجاحات عملائنا. قيمنا محددة وموجزة ، وهي: الوفاء بوعودنا ؛ التركيز على الجودة يفوق التوقعات؛ يمكن أن تفعل الموقف بناء الثقة والحفاظ عليها ؛ ضمان السلامة ؛ نزاهة العمل التي لا تتزعزع ؛ أخلاق لا هوادة فيها ؛ مكافأة الأداء الجيد ؛ والنمو المستدام المربح.'],
            'image' => 'vv.png',
        ]);
    }
}
