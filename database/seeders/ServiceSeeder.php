<?php

namespace Database\Seeders;

use App\Models\Backend\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Architectural_Design = Service::create(['name' => ['en'=>'Architectural Design','ar'=>'التصميم المعماري'],
            'image'=>'ad.png','status'=>true,
            'description'=>['en'=>'With a vision of “modern and sustainable architecture supporting human health and buildings promoting healthy habits,” our architecture and design portfolio includes projects of various scales ranging from very small to the very large commissions as required by our clients in the Kingdom.  Every project is treated individually with a uniquely tailored response after we achieve a deep understanding of the client’s mission, goals and business aspirations as well as the site’s environmental, physical and cultural context.  Each project designed by FAEC reflects a deep commitment to industry leadership toward a built environment that reflects the Kingdom Vision 2030 challenge and pushes the boundaries of architectural practice toward a net-positive future.'
                             ,'ar' => '"مع رؤية" العمارة الحديثة والمستدامة التي تدعم صحة الإنسان والمباني التي تعزز العادات الصحية "، تشتمل محفظة الهندسة المعمارية والتصميم لدينا على مشاريع بمقاييس مختلفة تتراوح من العمولات الصغيرة جدًا إلى العمولات الكبيرة جدًا كما هو مطلوب من قبل عملائنا في المملكة. يتم التعامل مع كل مشروع على حدة مع استجابة مصممة بشكل فريد بعد أن نحقق فهمًا عميقًا لمهمة العميل وأهدافه وتطلعاته التجارية بالإضافة إلى السياق البيئي والمادي والثقافي للموقع. يعكس كل مشروع صممه FAEC التزامًا عميقًا بقيادة الصناعة نحو بيئة مبنية تعكس تحدي رؤية المملكة 2030 وتدفع حدود الممارسة المعمارية نحو مستقبل إيجابي صافي.]']]);


        $Landscape_Architecture = Service::create(['name' =>['en'=> 'Landscape Architecture','ar'=>'هندسة المناظر الطبيعية'],'image'=>'la.png','status'=>true,
            'description'=>['en'=>'The FAEC Landscape Team’s aim is to build sustainable and outstanding landscaping features in the natural and built asset environment.  Our goal and passion are to envisage and design sustainable solutions to improve the quality of people’s lives in the community to the satisfaction of our clients.',
                            'ar'=> 'يهدف فريق FAEC المناظر الطبيعية إلى بناء ميزات المناظر الطبيعية المستدامة والمتميزة في بيئة الأصول الطبيعية والمبنية. هدفنا وشغفنا هو تصور وتصميم حلول مستدامة لتحسين نوعية حياة الناس في المجتمع بما يرضي عملائنا.']]);


        $Interior_Design = Service::create(['name' => ['en'=>'Interior Design','ar' => 'تصميم داخلي'],'image'=>'id.png','status'=>true,
            'description'=>['en' => 'The FAEC interior design team, with the support of the architectural team,  has the capability to work with clients in the corporate, educational, healthcare, hospitality, municipal, residential and real estate markets. The team continually strives to incorporate environmentally conscious solutions through specific product choices that enhance indoor air quality, increase the use of natural light, and use recyclable materials where possible to create sustainable  spaces that are environmentally friendly.',
                            'ar' => 'يتمتع فريق التصميم الداخلي التابع لـ FAEC ، بدعم من الفريق المعماري ، بالقدرة على العمل مع العملاء في أسواق الشركات والتعليم والرعاية الصحية والضيافة والبلديات والسكن والعقارات. يسعى الفريق باستمرار لدمج الحلول الواعية بالبيئة من خلال خيارات المنتجات المحددة التي تعزز جودة الهواء الداخلي ، وتزيد من استخدام الضوء الطبيعي ، وتستخدم المواد القابلة لإعادة التدوير حيثما أمكن لإنشاء مساحات مستدامة صديقة للبيئة.']]);

        $Graphics_and_Visualization= Service::create(['name' => ['en'=>'Graphics and Visualization','ar'=>'الرسومات والتصور'],'image'=>'gav.jpg','status'=>true,
            'description'=>['en' => 'Standalone or in support of architecture, interiors, landscaping and engineering commissions, FAEC provide an array of 3D visualisation and graphic design services ranging from high-resolution computer-generated 3D and graphics presentations to marketing materials for the client. The graphics team works with the support of architectural, civil, interior, and landscape teams to produce a high quality relevant visual representation of the project that includes sketches, coloured plans (site, floor, elevations), interior and exterior 3D modelling and renderings, flythrough and walkthrough 3D animations, 360 panoramic images, and virtual reality.',
                            'ar' => 'تقدم FAEC بشكل مستقل أو لدعم الهندسة المعمارية والديكورات الداخلية والمناظر الطبيعية واللجان الهندسية ، مجموعة من التصور ثلاثي الأبعاد وخدمات التصميم الجرافيكي التي تتراوح من العروض التقديمية ثلاثية الأبعاد والرسومات عالية الدقة التي يتم إنشاؤها بواسطة الكمبيوتر إلى مواد التسويق للعميل. يعمل فريق الرسومات بدعم من فرق الهندسة المعمارية والمدنية والداخلية والمناظر الطبيعية لإنتاج تمثيل مرئي عالي الجودة للمشروع يتضمن الرسومات والخطط الملونة (الموقع والأرض والارتفاعات) والنمذجة والعروض ثلاثية الأبعاد الداخلية والخارجية ، يطير من خلال الرسوم المتحركة ثلاثية الأبعاد ، والصور البانورامية 360 ، والواقع الافتراضي.']]);

    }
}
