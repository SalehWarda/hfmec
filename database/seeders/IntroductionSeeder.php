<?php

namespace Database\Seeders;

use App\Models\Backend\About\Introduction;
use Illuminate\Database\Seeder;

class IntroductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Introduction::create([

            'description' => ['en' => 'HFMEC was founded in 2001 and has developed and grown over the years and now has the resources, skills, capability and experience to provide integrated and comprehensive Design, Project Management and Construction Supervision Services. In-house design services include Architectural, Structural, Civil, Mechanical and Electrical Engineering, Instrumentation, Telecommunications, Landscape, Interiors, 3D Graphics and Quantity Surveying. In addition, we undertake Project Management and Site Supervision Services covering sites such as healthcare, residential and commercial buildings and primary and secondary infrastructure.


HFMEC is a medium sized practice with an ability to mobilize resources and coordinate complex professional team structures, giving us the capacity to tackle projects of any scale and complexity. We are continually looking for ways to expand the traditional role of the consultant in meeting the needs of our Clients with excellence and within fast-track time frames. We strive to deliver projects which reflect a balance of appropriate design philosophy, technical competence, effective project and cost management, and intimate Client involvement. We advocate continuous training and updating in global leading design methodologies and technological advancements, while acknowledging contextual appropriateness and the importance of individual requirements.


With currently over 205 employees in Saudi Arabia, HFMEC is an equal opportunities employer and enjoys platinum employment status with employees emanating from some fifteen different countries. The extremely competent and experienced discipline technical teams work harmoniously together with our project management, quality assurance, planning, control, health and environment specialists as coherent integrated teams in a seamless manner to deliver outstanding cost effective and innovative solutions to meet our Clients greatest challenges.' ,
                'ar'=>'تأسست HFMEC في عام 2001 وتطورت ونمت على مر السنين ولديها الآن الموارد والمهارات والقدرات والخبرة لتقديم خدمات التصميم وإدارة المشاريع والإشراف على البناء المتكاملة والشاملة. تشمل خدمات التصميم الداخلي الهندسة المعمارية والهيكلية والمدنية والميكانيكية والكهربائية ، والأجهزة ، والاتصالات السلكية واللاسلكية ، والمناظر الطبيعية ، والديكورات الداخلية ، والرسومات ثلاثية الأبعاد ، ومسح الكميات. بالإضافة إلى ذلك ، نتعهد بإدارة المشروع وخدمات الإشراف على الموقع التي تغطي مواقع مثل الرعاية الصحية والمباني السكنية والتجارية والبنية التحتية الأولية والثانوية.


HFMEC هي ممارسة متوسطة الحجم لها القدرة على تعبئة الموارد وتنسيق هياكل الفريق المهنية المعقدة ، مما يمنحنا القدرة على معالجة المشاريع من أي نطاق وتعقيد. نحن نبحث باستمرار عن طرق لتوسيع الدور التقليدي للمستشار في تلبية احتياجات عملائنا بامتياز وضمن أطر زمنية سريعة المسار. نحن نسعى جاهدين لتقديم المشاريع التي تعكس التوازن بين فلسفة التصميم المناسبة ، والكفاءة الفنية ، وإدارة المشروع والتكلفة الفعالة ، ومشاركة العميل الحميمة. نحن ندعو إلى التدريب المستمر والتحديث في منهجيات التصميم الرائدة عالميًا والتقدم التكنولوجي ، مع الاعتراف بملاءمة السياق وأهمية المتطلبات الفردية.


مع حاليا أكثر من 205 موظف في المملكة العربية السعودية ، HFMEC هو صاحب فرص عمل متكافئ ويتمتع بوضع التوظيف البلاتيني مع موظفين ينحدرون من حوالي خمسة عشر دولة مختلفة. تعمل الفرق الفنية المتخصصة وذات الخبرة العالية بانسجام مع متخصصينا في إدارة المشاريع ، وضمان الجودة ، والتخطيط ، والمراقبة ، والصحة والبيئة كفرق متكاملة متماسكة بطريقة سلسة لتقديم حلول رائعة وفعالة من حيث التكلفة ومبتكرة لمواجهة أكبر تحديات عملائنا.'],
            'image' => 'introduction.png',
        ]);
    }
}
