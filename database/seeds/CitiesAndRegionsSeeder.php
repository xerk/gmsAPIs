<?php
use App\Region;
use Illuminate\Database\Seeder;
use App\City;
class CitiesAndRegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            'الشيخ عتمان',
            'أم خنان',
            'الحرانية',
            'المناوات',
            'ترسا',
            'زاوية أبو مسلم',
            'شبرامنت',
            'طموه',
            'منيل شيحة',
            'ميت شماس',
            'ميت قادوس',
            'نزلة الاشطر',
            'بنى سويف',
            'أبو رجوان البحرى',
            'أبو رجوان القبلى',
            'أبو صير',
            'الشنباب',
            'الشوبك الغربى',
            'الطرفاية',
            'العزيزية',
            'المرازيق',
            'دهشور',
            'زاوية دهشور',
            'زهران وجابر',
            'صقارة',
            'قلعة المرازيق',
            'مزغونة',
            'منشأة دهشور',
            'منشأة كاسب',
            'ميت رهينة',
            'نزلة الشوبك',
            'أسكر',
            'الاخصاص',
            'الاقواز',
            'الجزيرة الشقراء',
            'الحى',
            'الديسمى',
            'الشرفا',
            'الشوبك الشرقى',
            'الفهميين',
            'المنيا',
            'الودى',
            'عرب الحصار',
            'عرب العبايدة',
            'غمازة الصغرى',
            'غمازة الكبرى',
            'كفر طرخان',
            'نجوع العرب',
            'نزلة عليان',
            'عرب القميعى',
            'عرب الحصار البحرية',
            'أبو العباس',
            'أبو رويش',
            'البرغوتى',
            'البليدة',
            'الجملة',
            'الدناوية',
            'الرقة الغربية',
            'السعودية',
            'العامرية',
            'العطف',
            'القطورى',
            'اللشت',
            'المتانية',
            'المساندة',
            'المقاطفية',
            'الناصرية',
            'باجة الشيخ',
            'بدسه',
            'برنشت',
            'بمها',
            'بهبيت',
            'بيدف',
            'جرزة',
            'زاوية أبو سويلم',
            'طهما',
            'كفر الرفاعى',
            'كفر الضبعى',
            'كفر بركات',
            'كفر تركى',
            'كفر جرزه',
            'كفر حميد',
            'كفر شحاته',
            'كفر عمار',
            'كفر قاسم',
            'منشاة أبو العباس',
            'منشاة عبد السيد',
            'منشية فاضل',
            'ميت القايد',
            'كفر طرخان',
            'أبو غالب',
            'أتريس',
            'الاخصاص',
            'الجلاتمة',
            'الحاجر',
            'الحسانيين',
            'الرهاوى',
            'السبيل',
            'القطا',
            'المناشى',
            'المنصورية',
            'أم دينار',
            'برقاش',
            'بنى سلامه',
            'بهرمس',
            'جزاية',
            'ذات الكوم',
            'كفر حجازى',
            'كفر أبو حديد',
            'منشية القناطر',
            'منشية رضوان',
            'محمود عبد الصمد',
            'نكلة',
            'وردان',
            'البرمبل',
            'الحلف',
            'الحلف الغربى',
            'الخرمان',
            'الرقة البحرية',
            'الرقة القبلية',
            'الصالحية',
            'القبابات',
            'الكداية',
            'الكريمات',
            'بنى صالح',
            'جزيرة الكريمات',
            'دير الميمون',
            'صول',
            'كفر الواصلين',
            'كفر حلاوة',
            'كفر قنديل',
            'مسجد موسى',
            'منشأة سليمان',
            'منية الرقة',
            'منيل السلطان',
            'نزلة ترجم',
            'البراجيل',
            'الزيدية',
            'القيراطيين',
            'الكوم الاحمر',
            'برطس',
            'زاوية ثابت',
            'سقيل',
            'شنبارى',
            'صيدة',
            'ابورواش',
            'المعتمدية',
            'برك الخيام',
            'بنى مجدول',
            'صفط اللبن',
            'كرداسة',
            'كفر حكيم',
            'كومبرة',
            'ناهيا',
            'ارض اللواء',
        ]);
        City::create(['city' => 'جيزة']);
        City::create(['city' => 'القاهرة']);
        $city = City::where('city', 'جيزة')->first();
        $collection->each(function ($item, $key) use($city){
            // create permissions for each collection item
            Region::create([
                'city_id' => $city->id,
                'region' => $item]);
        });
    }
}