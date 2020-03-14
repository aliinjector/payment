<?php

function limitString($string){
  $string = strip_tags($string);
  if (strlen($string) > 40) {

  $stringCut = substr($string, 0, 40);
  $endPoint = strrpos($stringCut, ' ');

  $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
  $string .= '...';
  }
  return $string;
}




function visitor_city($city)
{


    if (strpos($city, 'Tehr') !== FALSE) {
        $name = "تهران";
    }

    switch ($city) {

        case 'Tabriz':
            $name = 'تبریز';
            break;

        case 'Tehran':
            $name = 'تهران';
            break;



        case 'Mashhad':
            $name = 'مشهد';
            break;


        case 'Tehran (Dowlat Abad)':
            $name = 'دولت آباد (تهران)';
            break;


        case 'Khorramabad':
            $name = 'خرم آباد';
            break;


        case 'Ost?n-e Lorest?n':
            $name = 'لرستان';
            break;


        case 'Omidiyeh':
            $name = 'امدیدیه';
            break;


        case 'Sari':
            $name = 'ساری';
            break;


        case 'Qom':
            $name = 'قم';
            break;


        case 'Arak':
            $name = 'اراک';
            break;


        case 'Birjand':
            $name = 'بیرجند';
            break;


        case 'Sanandij':
            $name = 'سنندج';
            break;


        case 'Tehran (Iran)':
            $name = 'تهران';
            break;


        case 'Urmia':
            $name = 'ارومیه';
            break;


        case 'Isfahan':
            $name = 'اصفهان';
            break;


        case 'Bojnourd':
            $name = 'بجنورد';
            break;


        case 'Yazd':
            $name = 'یزد';
            break;


        case 'Shiraz':
            $name = 'شیراز';
            break;


        case 'Salm?s':
            $name = 'سماس';
            break;


        case 'Ahv?z (K??np?rs)':
            $name = 'کیانپارس (اهواز)';
            break;


        case 'Karaj':
            $name = 'کرج';
            break;


        case 'Tehran (Shahrak-e Shah?d Fak?r?)':
            $name = 'تهران (شهرک شهید فکوری)';
            break;


        case 'Tehran (Behjat Abad)':
            $name = 'بهجت آباد (تهران)';
            break;


        case 'قزوین':
            $name = 'test';
            break;


        case 'Kish':
            $name = 'کیش';
            break;


        case 'Ahv?z':
            $name = 'اهواز';
            break;


        case 'Bandar B?shehr':
            $name = 'بوشهر';
            break;


        case 'Kerman':
            $name = 'کرمان';
            break;


        case 'Sarbandar':
            $name = 'سربندر';
            break;


        case 'Rasht':
            $name = 'رشت';
            break;


        case 'Kermanshah':
            $name = 'کرمانشاه';
            break;


        case 'Babol':
            $name = 'بابل';
            break;


        case 'Mar?gheh':
            $name = 'مراغه';
            break;


        case 'Osk?':
            $name = 'اسکو';
            break;


        case 'Tehran (???? ????)':
            $name = 'تهران';
            break;


        case 'Hamadan':
            $name = 'همدان';
            break;


        case 'G?r?n':
            $name = '	';
            break;


        case 'Arak (Central Province Police Headquarters)':
            $name = 'اراک (اداره پلیس)';
            break;


        case 'Tehr?n (Saadat abad - north)':
            $name = 'سعادت آباد (تهران)';
            break;


        case 'Zanjan':
            $name = 'زنجان';
            break;


        case 'Nourabad':
            $name = 'نورآباد';
            break;


        case 'Tehran (District 11)':
            $name = 'منطقه ۱۱ (تهران)';
            break;


        case 'Yasuj':
            $name = 'یاسوج';
            break;


        case 'Ahvaz':
            $name = 'اهواز';
            break;


        case 'L?h?j?n':
            $name = 'لاهیجان';
            break;


        case 'Khvoy':
            $name = 'خوی';
            break;


        case 'Bor?jerd':
            $name = 'بروجرد';
            break;


        case 'Bandar Abbas':
            $name = 'بندر عباس';
            break;


        case 'Zahedan':
            $name = 'زاهدان';
            break;


        case 'Tabriz (Mokhaberat)':
            $name = 'تبریز';
            break;


        case 'Khowrm?j':
            $name = ' ';
            break;


        case 'Chabahar':
            $name = 'چابهار';
            break;


        case 'Gorgan':
            $name = 'گرگان';
            break;


        case 'Alvand':
            $name = 'الوند';
            break;


        case 'Ardabil':
            $name = 'اردبیل';
            break;


        case 'Shahriar':
            $name = 'شهریار';
            break;


        case 'Mehr?n':
            $name = 'مهران';
            break;


        case 'Bastak':
            $name = 'بستاک';
            break;


        case 'Tehr?n (Shahrak-e Qods)':
            $name = 'شهرک قدس (تهران)';
            break;


        case 'Vazv?n':
            $name = ' ';
            break;


        case 'Gachsaran (Iran Bastar Park)':
            $name = 'گچساران';
            break;


        case 'Jam':
            $name = 'جم';
            break;


        case 'Shahr-e Qods':
            $name = 'شهر قدس';
            break;


        case 'Sedeh Lanj?n':
            $name = ' ';
            break;


        case 'Shahrest?n-e Bandar-e M?hshahr':
            $name = 'بندر ماهشهر';
            break;


        case 'Maragheh':
            $name = 'مزاغه';
            break;


        case 'Malayer':
            $name = 'ملایر';
            break;


        case 'Kerman (Sabz Building)':
            $name = 'کرمان';
            break;


        case 'Shahr-e Kord':
            $name = 'شهرکرد';
            break;


        case 'Semn?n':
            $name = 'سمنان';
            break;


        case 'Tehr?n (Makran)':
            $name = 'مکران (تهران)';
            break;


        case 'Takestan':
            $name = 'تاکستان';
            break;


        case 'Tonek?bon':
            $name = 'تنکابن';
            break;


        case 'Khvoy (????? 1)':
            $name = 'خوی';
            break;


        case '?l?m (Sh?d?b?d)':
            $name = 'شادآباد';
            break;


        case 'Hashtgerd':
            $name = 'هشتگرد';
            break;


        case 'K?zer?n':
            $name = 'کاظرون';
            break;


        case 'Yazdanshahr':
            $name = 'یزدانشهر';
            break;


        case 'Rafsanj?n':
            $name = 'رفسنجان';
            break;


        case 'Ferdows':
            $name = 'فردوس';
            break;


        case 'Abadan':
            $name = 'آبادان';
            break;


        case 'Khorram?b?d':
            $name = 'خرم آباد';
            break;


        case 'Tomb?n':
            $name = '';
            break;


        case 'Shahrest?n-e Zanj?n':
            $name = 'زنجان';
            break;


        case 'Tehr?n (Jannat?b?d-e Shom?l?)':
            $name = 'جنت آباد شمالی (تهران)';
            break;


        case 'Aligoodarz':
            $name = 'علیگودرز';
            break;


        case 'Sh?hr?d':
            $name = ' ';
            break;


        case 'Mahabad':
            $name = 'مهاباد';
            break;


        case 'Ilam':
            $name = 'ایلام';
            break;


        case 'Neyshabur':
            $name = 'نیشابور';
            break;


        case 'S?rj?n':
            $name = 'سیرجان';
            break;


        case 'Karaj (Jah?n Shahr)':
            $name = 'جهانشهر (کرج)';
            break;


        case 'Semnan':
            $name = 'سمنان';
            break;


        case 'Ch?deg?n':
            $name = 'چادگان';
            break;


        case 'Shadegan':
            $name = 'شادگان';
            break;


        case 'Sarakhs':
            $name = 'سرخس';
            break;


        case 'Shirvan':
            $name = 'شیروان';
            break;


        case '?b?d?n (???? ????)':
            $name = 'آبادان';
            break;


        case 'Tehr?n (Shahrak-e-Mahallati)':
            $name = 'شهرک شهید محلاتی (تهران)';
            break;


        case 'Qaemshahr':
            $name = 'قایمشهر';
            break;


        case 'Saqqez':
            $name = 'سقز';
            break;


        case 'Shal':
            $name = ' ';
            break;


        case 'Sabzaw?r':
            $name = 'سبزوار';
            break;


        case 'Tonekabon':
            $name = 'تنکابن';
            break;


        case 'Varamin':
            $name = 'ورامین';
            break;


        case 'Bah?rest?n':
            $name = 'بهارستان';
            break;


        case 'Amol':
            $name = 'آمل';
            break;


        case 'Tombān':
            $name = ' ';
            break;


        case 'Bandar Būshehr':
            $name = 'بوشهر';
            break;


        case 'Isfahan (Sepāhān Shahr)':
            $name = 'سپاهان شهر (اصفهان)';
            break;


        case 'Bandar Abbas (فرودگاه قدیم)':
            $name = 'فرودگاه قدیم بندرعباس';
            break;


        case 'Salmās':
            $name = 'سلماس';
            break;


        case 'Oskū':
            $name = 'اسکو';
            break;


        case 'Lāhījān':
            $name = 'لاهیجان';
            break;


        case 'Torbat-e Ḩeydarīyeh':
            $name = 'تربت حیدریه';
            break;


        case 'Borūjerd':
            $name = 'بروجرد';
            break;


        case 'Rāvar':
            $name = 'راور';
            break;


        case 'Dolatabad':
            $name = 'دولت آباد';
            break;


        case 'Rafsanjān':
            $name = 'رفسنجان';
            break;


        case 'Shāhrūd':
            $name = 'شاهرود';
            break;


        case 'Īlām (Shādābād)':
            $name = 'شادآباد ایلام';
            break;


        case 'Isfahan (Parvin)':
            $name = 'اصفهان (پروین)';
            break;


        case 'Gachsaran':
            $name = 'گچساران';
            break;


        case 'Gūrān':
            $name = 'گوران';
            break;


        case 'Shiraz (Moali\'Abad Blvd)':
            $name = 'مولی آباد (شیراز)';
            break;


        case 'Ahvāz (Kīānpārs)':
            $name = 'گیانپارس (اهواز)';
            break;


        case 'Bandar-e Māhshahr':
            $name = 'ماهشهر';
            break;


        case 'Fars':
            $name = 'شیراز';
            break;


        case 'Ostān-e Lorestān':
            $name = 'لرستان';
            break;


        case 'Qarchak':
            $name = 'قرچک';
            break;


        case 'Lāmerd':
            $name = 'لامرد';
            break;


        case 'Bam':
            $name = 'بم';
            break;


        case 'Jahrom (شهرک فاطمیه)':
            $name = 'شهرک فاطمیه (جهرم)';
            break;


        case 'Shahrestān-e Bandar-e Māhshahr':
            $name = 'بندر ماهشهر';
            break;


        case 'Rasht (Golsar)':
            $name = 'رشت';
            break;


        case 'Sīrjān':
            $name = 'سیرجان';
            break;


        case 'Munich':
            $name = ' ';
            break;


        case 'Shāhīn Shahr':
            $name = 'شاهین شهر';
            break;


        case 'Māhdāsht':
            $name = 'ماهدشت';
            break;


        case 'Perm':
            $name = 'پرم';
            break;


        case 'Vazvān':
            $name = 'وازوان';
            break;


        case 'Bahārestān':
            $name = 'بهارستان';
            break;


        case 'Kharkiv':
            $name = 'خارکیو';
            break;


        case 'Ploieşti':
            $name = ' ';
            break;

        case 'Najafābād':
            $name = 'نجف آباد';
            break;

        case 'Dezful':
            $name = 'دزفول';
            break;


        case 'Tehrān':
            $name = 'تهران';
            break;


        case 'Krasnoyarsk':
            $name = 'تهران';
            break;


        default:
            $name = $city;


    }


    return $name;


}



function visitor_country($country)
{

    switch ($country) {

        case 'IR':
            $name = 'ایران';
            break;


        case 'AF':
            $name = 'افغانستان';
            break;

        case 'YE':
            $name = 'یمن';
            break;

        case 'US':
            $name = 'امریکا';
            break;


        case 'GB':
            $name = 'انگلستان';
            break;


        case 'AE':
            $name = 'دوبی';
            break;


        case 'UA':
            $name = 'اوکراین';
            break;

        case 'UZ':
            $name = 'ازبکستان';
            break;

        case 'YE':
            $name = 'یمن';
            break;


        case 'TN':
            $name = 'تونس';
            break;

        case 'TR':
            $name = 'ترکیه';
            break;

        case 'TM':
            $name = 'ترکمنستان';
            break;


        case 'TH':
            $name = 'تایلند';
            break;

        case 'TJ':
            $name = 'تاجیکستان';
            break;
        case 'CH':
            $name = 'سوئیس';
            break;


        case 'ES':
            $name = 'اسپانیا';
            break;

        case 'SA':
            $name = 'عربستان';
            break;


        case 'RO':
            $name = 'رومانی';
            break;

        case 'RU':
            $name = 'روسیه';
            break;


        case 'PL':
            $name = 'هلند';
            break;


        case 'NL':
            $name = 'هلند';
            break;


        case 'JP':
            $name = 'ژاپن';
            break;


        case 'IQ':
            $name = 'عراق';
            break;


        case 'DE':
            $name = 'آلمان';
            break;

        case 'FI':
            $name = 'فنلاند';
            break;

        case 'FR':
            $name = 'فرانسه';
            break;


        case 'CN':
            $name = 'چین';
            break;


        case 'CA':
            $name = 'کانادا';
            break;


        case 'AZ':
            $name = 'آذربایجان';
            break;

        case 'AT':
            $name = 'اتریش';
            break;


        case 'AU':
            $name = 'استرالیا';
            break;

        case 'AM':
            $name = 'ارمنستان';
            break;


        case 'AL':
            $name = 'آلبانی';
            break;


        case 'DZ':
            $name = 'الجزایر';
            break;

        case 'AS':
            $name = 'ساموآ';
            break;

        case 'AD':
            $name = 'آندورا';
            break;

        case 'AO':
            $name = 'آنگولا';
            break;

        case 'AI':
            $name = 'آنگویلا';
            break;

        case 'AQ':
            $name = 'قطب جنوب';
            break;

        case 'AG':
            $name = 'قطب جنوب';
            break;

        case 'AR':
            $name = 'آرژانتین';
            break;

        case 'AW':
            $name = 'آروبا';
            break;


        case 'BS':
            $name = 'باهاما';
            break;

        case 'BH':
            $name = 'بحرین';
            break;

        case 'BD':
            $name = 'بنگلادش';
            break;

        case 'BB':
            $name = 'باربادوس';
            break;

        case 'BY':
            $name = 'بلاروس';
            break;

        case 'BE':
            $name = 'بلژیک';
            break;

        case 'BZ':
            $name = 'بلیز';
            break;

        case 'BJ':
            $name = 'بنین';
            break;

        case 'BM':
            $name = 'برمودا';
            break;

        case 'BT':
            $name = 'بوتان';
            break;

        case 'BO':
            $name = 'بولیوی';
            break;

        case 'BA':
            $name = 'بوسنی';
            break;

        case 'BW':
            $name = 'بوتسوانا';
            break;

        case 'BV':
            $name = 'جزیره بووت';
            break;

        case 'BR':
            $name = 'برزیل';
            break;

        case 'IO':
            $name = 'قلمرو اقیانوس هند بریتانیا';
            break;

        case 'BN':
            $name = 'برونئی';
            break;

        case 'BG':
            $name = 'بلغارستان';
            break;

        case 'BF':
            $name = 'بورکینافاسو';
            break;

        case 'BI':
            $name = 'بوروندی';
            break;

        case 'KH':
            $name = 'کامبوج';
            break;

        case 'CM':
            $name = 'کامرون';
            break;

        case 'CV':
            $name = 'کیپ ورد';
            break;

        case 'CY':
            $name = 'جزایر کیمن';
            break;

        case 'CF':
            $name = 'جمهوری آفریقای مرکزی';
            break;

        case 'TD':
            $name = 'چاد';
            break;

        case 'CL':
            $name = 'شیلی';
            break;
        case 'CX':
            $name = 'جزیره کریسمس';
            break;

        case 'CC':
            $name = 'جزایر کوکوس (کیلینگ)';
            break;

        case 'CO':
            $name = 'کلمبیا';
            break;

        case 'KM':
            $name = 'کومور';
            break;

        case 'CG':
            $name = 'کنگو';
            break;

        case 'CD':
            $name = 'کنگو';
            break;

        case 'CK':
            $name = 'جزایر کوک';
            break;

        case 'CR':
            $name = 'کاستاریکا';
            break;

        case 'CI':
            $name = 'ساحل عاج';
            break;

        case 'HR':
            $name = 'کرواسی';
            break;

        case 'CU':
            $name = 'کوبا';
            break;

        case 'CY':
            $name = 'قبرس';
            break;

        case 'CZ':
            $name = 'جمهوری چک';
            break;

        case 'DK':
            $name = 'دانمارک';
            break;

        case 'DJ':
            $name = 'جیبوتی';
            break;

        case 'DM':
            $name = 'دومینیکا';
            break;

        case 'DO':
            $name = 'دومینیکا';
            break;

        case 'TP':
            $name = 'تیمور شرقی';
            break;

        case 'EC':
            $name = 'اکوادور';
            break;

        case 'EG':
            $name = 'مصر';
            break;

        case 'SV':
            $name = 'السالوادور';
            break;

        case 'GQ':
            $name = 'گینه استوایی';
            break;

        case 'ER':
            $name = 'اریتره';
            break;

        case 'EE':
            $name = 'استونی';
            break;

        case 'ET':
            $name = 'اتیوپی';
            break;

        case 'FK':
            $name = 'جزایر فالکلند (مالویناس))';
            break;

        case 'FO':
            $name = 'جزایر فارو';
            break;

        case 'FJ':
            $name = 'فیجی';
            break;

        case 'FX':
            $name = 'فرانسه، متروپولیتن';
            break;

        case 'GF':
            $name = 'گویان فرانسه';
            break;

        case 'PF':
            $name = 'پلینزی فرانسه';
            break;

        case 'TF':
            $name = 'مناطق جنوبی فرانسه';
            break;

        case 'GA':
            $name = 'گابن';
            break;

        case 'GM':
            $name = 'گامبیا';
            break;

        case 'GE':
            $name = 'جورجیا';
            break;


        case 'GH':
            $name = 'غنا';
            break;

        case 'GI':
            $name = 'جبل الطارق';
            break;

        case 'GR':
            $name = 'یونان';
            break;

        case 'GL':
            $name = 'گرینلند';
            break;

        case 'GD':
            $name = 'گرانادا';
            break;

        case 'GP':
            $name = 'گوادلوپ';
            break;

        case 'GU':
            $name = 'گوام';
            break;

        case 'GT':
            $name = 'گواتمالا';
            break;

        case 'GN':
            $name = 'گینه';
            break;

        case 'GW':
            $name = 'گینه بیسائو';
            break;

        case 'GY':
            $name = 'گایانا';
            break;

        case 'HT':
            $name = 'هاییتی';
            break;

        case 'HM':
            $name = 'جزایر هرد و مکدونالد';
            break;

        case 'VA':
            $name = 'مقدس (ایالت واتیکان)';
            break;

        case 'HN':
            $name = 'هندوراس';
            break;

        case 'HK':
            $name = 'هنگ کنگ';
            break;

        case 'HU':
            $name = 'مجارستان';
            break;

        case 'IS':
            $name = 'آیس لند';
            break;

        case 'IN':
            $name = 'هند';
            break;

        case 'ID':
            $name = 'اندونزی';
            break;


        case 'IE':
            $name = 'ایرلند';
            break;

        case 'IL':
            $name = 'اسراییل';
            break;

        case 'IT':
            $name = 'ایتالیا';
            break;

        case 'JM':
            $name = 'جامائیکا';
            break;


        case 'JO':
            $name = 'اردن';
            break;

        case 'KZ':
            $name = 'قزاقستان';
            break;

        case 'KE':
            $name = 'کنیا';
            break;

        case 'KI':
            $name = 'کیریباتی';
            break;

        case 'KP':
            $name = 'کره';
            break;

        case 'KR':
            $name = 'کره';
            break;

        case 'KW':
            $name = 'کویت';
            break;

        case 'KG':
            $name = 'قرقیزستان';
            break;

        case 'LA':
            $name = 'لائوس';
            break;

        case 'LV':
            $name = 'لتونی';
            break;

        case 'LB':
            $name = 'لبنان';
            break;

        case 'LS':
            $name = 'لسوتو';
            break;

        case 'LR':
            $name = 'لیبریا';
            break;

        case 'LY':
            $name = 'لیبی';
            break;

        case 'LI':
            $name = 'لیختن اشتاین';
            break;

        case 'LT':
            $name = 'لیتوانی';
            break;

        case 'LU':
            $name = 'لوکزامبورگ';
            break;

        case 'MO':
            $name = 'ماکائو';
            break;

        case 'MK':
            $name = 'مقدونیه';
            break;

        case 'MG':
            $name = 'ماداگاسکار';
            break;

        case 'MW':
            $name = 'مالاوی';
            break;

        case 'MY':
            $name = 'مالزی';
            break;

        case 'MV':
            $name = 'مالدیو';
            break;

        case 'ML':
            $name = 'مالی';
            break;

        case 'MT':
            $name = 'مالت';
            break;

        case 'MH':
            $name = 'جزایر مارشال';
            break;

        case 'MQ':
            $name = 'مارتینیک';
            break;

        case 'MR':
            $name = 'موریتانی';
            break;

        case 'MU':
            $name = 'موریس';
            break;

        case 'YT':
            $name = 'مایوت';
            break;

        case 'MX':
            $name = 'مکزیک';
            break;

        case 'FM':
            $name = 'میکرونزی';
            break;

        case 'MD':
            $name = 'مولدووا';
            break;

        case 'MC':
            $name = 'موناکو';
            break;

        case 'MN':
            $name = 'مغولستان';
            break;

        case 'MS':
            $name = 'مونتسرات';
            break;

        case 'MA':
            $name = 'مراکش';
            break;

        case 'MZ':
            $name = 'موزامبیک';
            break;

        case 'MM':
            $name = 'میانمار';
            break;

        case 'NA':
            $name = 'نامیبیا';
            break;

        case 'NR':
            $name = 'نائورو';
            break;

        case 'NP':
            $name = 'نپال';
            break;

        case 'AN':
            $name = 'آنتیل هلند';
            break;

        case 'NC':
            $name = 'کالدونیای';
            break;

        case 'NZ':
            $name = 'نیوزیلند';
            break;

        case 'NI':
            $name = 'نیکاراگوئه';
            break;

        case 'NE':
            $name = 'نیجر';
            break;

        case 'NG':
            $name = 'نیجریه';
            break;

        case 'NU':
            $name = 'نایو';
            break;

        case 'NF':
            $name = 'جزیره نورفولک';
            break;

        case 'MP':
            $name = 'جزایر ماریانای شمالی';
            break;

        case 'NO':
            $name = 'نروژ';
            break;

        case 'OM':
            $name = 'عمان';
            break;

        case 'PK':
            $name = 'پاکستان';
            break;

        case 'PW':
            $name = 'پالائو';
            break;

        case 'PA':
            $name = 'پاناما';
            break;

        case 'PG':
            $name = 'پاپوآ گینه نو';
            break;

        case 'PY':
            $name = 'پاراگوئه';
            break;

        case 'PE':
            $name = 'پرو';
            break;

        case 'PH':
            $name = 'فیلیپین';
            break;

        case 'PN':
            $name = 'پیتکرن';
            break;

        case 'PT':
            $name = 'پرتقال';
            break;

        case 'PR':
            $name = 'پورتوریکو';
            break;

        case 'QA':
            $name = 'قطر';
            break;

        case 'RE':
            $name = 'جزیره رونیو';
            break;

        case 'RW':
            $name = 'رواندا';
            break;

        case 'KN':
            $name = 'سنت کیتس و نویس';
            break;

        case 'LC':
            $name = 'سنت لوسیا';
            break;

        case 'VC':
            $name = 'سنت وینسنت و گرنادین';
            break;

        case 'WS':
            $name = 'ساموآ';
            break;

        case 'SM':
            $name = 'سان مارینو';
            break;

        case 'ST':
            $name = 'سائوتومه و پرنسیپه';
            break;


        case 'SN':
            $name = 'سنگال';
            break;

        case 'SC':
            $name = 'سیشل';
            break;

        case 'SL':
            $name = 'سیرا لئون';
            break;

        case 'SK':
            $name = 'اسلواکی';
            break;

        case 'SL':
            $name = 'اسلوانی';
            break;

        case 'SB':
            $name = 'جزایر سلیمان';
            break;

        case 'SO':
            $name = 'سومالی';
            break;

        case 'ZA':
            $name = 'آفریقای جنوبی';
            break;

        case 'GS':
            $name = 'جنوب گرجستان و جزایر ساندویچ جنوبی';
            break;


        case 'LK':
            $name = 'سریلانکا';
            break;

        case 'SH':
            $name = 'هلن';
            break;

        case 'PM':
            $name = 'پیر و میکلون';
            break;

        case 'SD':
            $name = 'سودان';
            break;

        case 'SR':
            $name = 'سورینام';
            break;

        case 'SJ':
            $name = 'جزایر اسلوبرد و جین ماین';
            break;

        case 'SZ':
            $name = 'سوازیلند';
            break;

        case 'SE':
            $name = 'سودان';
            break;

        case 'SY':
            $name = 'سوریه';
            break;

        case 'TW':
            $name = 'تایوان';
            break;


        case 'TZ':
            $name = 'تانزانیا';
            break;


        case 'TG':
            $name = 'توگو';
            break;

        case 'TK':
            $name = 'توکلئو';
            break;

        case 'TO':
            $name = 'تونگا';
            break;

        case 'TT':
            $name = 'ترینیداد و توباگو';
            break;
        case 'TC':
            $name = 'جزایر ترکس و کایکوس';
            break;

        case 'TV':
            $name = 'توووالو';
            break;

        case 'UG':
            $name = 'اوگاندا';
            break;


        case 'UM':
            $name = 'جزایر کوچک حاشیه های ایالات متحده';
            break;

        case 'UY':
            $name = 'اروگوئه';
            break;


        case 'VU':
            $name = 'وانواتو';
            break;

        case 'VE':
            $name = 'ونزوئلا';
            break;

        case 'VN':
            $name = 'ویتنام';
            break;

        case 'VG':
            $name = 'جزایر ویرجین)';
            break;

        case 'VI':
            $name = 'جزایر ویرجین (امریکا)';
            break;

        case 'WF':
            $name = 'جزایر والیس و فونتانا';
            break;

        case 'EH':
            $name = 'صحرای غربی';
            break;


        case 'YU':
            $name = 'یوگسلاوی';
            break;

        case 'ZM':
            $name = 'زامبیا';
            break;

        case 'ZW':
            $name = 'زیمبابوه';
            break;


        default:
            $name = $country;

    }

    return  $name;


}


function visitor_isp($isp)
{

    switch ($isp) {

        case 'Information Technology Company':
            $name = 'مخابرات';
            break;

        case 'Information Technology Company (ITC)':
            $name = 'مخابرات';
            break;

        case 'ITC':
            $name = 'ارتباطات زیرساخت';
            break;

        case 'Respina Networks & Beyond PJSC':
            $name = 'رسپینا';
            break;


        case 'Dadeh Gostar Asr Novin P.J.S. Co.':
            $name = 'داده گستر عصر نوین';
            break;


        case 'Iran Cell Service and Communication Company':
            $name = 'ایرانسل';
            break;


        case 'Irancell':
            $name = 'ایرانسل';
            break;


        case 'Rightel Communication Service Company PJS':
            $name = 'رایتل';
            break;


        case 'Rightel':
            $name = 'رایتل';
            break;


        case 'Mobile Communication Company of Iran PLC':
            $name = 'همراه اول';
            break;


        case 'Mobin Net Communication Company (Private Joint Sto"':
            $name = 'مبین نت';
            break;


        case 'Iran Telecommunication Company PJS':
            $name = 'مخابرات';
            break;


        case 'Parsonline':
            $name = 'پارس آنلاین';
            break;


        case 'Pars Online PJS':
            $name = 'پارس آنلاین';
            break;


        case 'Asiatech Data Transfer Inc PLC':
            $name = 'آسیاتک';
            break;


        case 'University of Tehran':
            $name = 'دانشگاه تهران';
            break;


        case 'Ariya Net Abazar Pjsc':
            $name = 'آریا نت ابزار';
            break;


        case 'Aria Shatel Company Ltd':
            $name = 'شاتل';
            break;


        case 'Mihan Communication Systems Co.,ltd':
            $name = 'میهن';
            break;


        case 'Parsun Network Solutions Pty Ltd':
            $name = 'پارسون';
            break;


        case 'Notrino':
            $name = 'همراه اول';
            break;


        case 'Neda Gostar Saba Data Transfer Company Private Joi':
            $name = 'صبانت';
            break;


        case 'Asiatech Data Transfer Inc. PLC':
            $name = 'آسیاتک';
            break;


        case 'LTE expansion':
            $name = 'نسل چهارم';
            break;


        case 'Sari System Bandarabas Company':
            $name = 'ساری سیستم بندرعباس';
            break;


        case 'Pishgaman Toseeh Ertebatat Company (Private Joint':
            $name = 'پیشگامان';
            break;


        case 'Iran Telecommunication Company PJS':
            $name = 'مخابرات';
            break;


        case 'DATAK Internet Engineering, Inc':
            $name = 'داتک';
            break;


        case 'LTE':
            $name = 'نسل چهارم';
            break;


        case 'Sindad Netwok Technology Ltd.':
            $name = 'سینداد';
            break;


        case 'Fanavaran Paidir Company LTD':
            $name = 'فناوران پایدار';
            break;


        case 'PJSC Fars Telecommunication Company':
            $name = 'فارس';
            break;


        case 'Research Center of Theoretical Physics & Mathemati':
            $name = 'مرکز تحقیقات فیزیک نظری و ریاضیات';
            break;


        case 'Farahoosh Dena':
            $name = 'فراهوش دنا';
            break;


        case 'Asre Enteghal Dadeha':
            $name = 'عصر انتقال داده ها';
            break;


        case 'Hesabgar Pardaz Gharb Company (Private Joint Stock':
            $name = 'حسابگر پرداز غرب';
            break;


        case 'Raya Sepehr Vira Data Processing Company Ltd.':
            $name = 'رایا سپر ویرا';
            break;


        case 'Aria Web Development LLC':
            $name = 'آریا';
            break;


        case 'Esfahan Telecommunication Company (P.J.S.)':
            $name = 'مخابرات اصفهان';
            break;


        case 'GOSTARESH-E-ERTEBATAT-E MABNA COMPANY (Private Joi':
            $name = 'گسترش ارتباط مبنا';
            break;


        case 'Shahrad Net Company Ltd.':
            $name = 'شهراد';
            break;


        case 'Fanava Group':
            $name = 'فناوا';
            break;


        case 'Notrino expansion':
            $name = 'همراه اول';
            break;


        case 'TCE':
            $name = 'مخابرات اصفهان';
            break;


        case 'Boomerang Rayaneh':
            $name = 'بومرنگ رایانه';
            break;


        case 'Afranet':
            $name = 'افرانت';
            break;


        case 'Laser Company Ltd':
            $name = 'لیزر';
            break;


        case 'khalij fars Ettela Resan Company J.S.':
            $name = 'خلیج فارس';
            break;


        case 'EGRK-Ertebat Gostaran Rangin Kaman Ltd':
            $name = 'ارتباط گستران رنگین کرمان';
            break;


        case 'PJSC Badr Rayan Jonoob':
            $name = 'بدر رایان جنوب';
            break;


        case 'Bozorg Net-e Aria':
            $name = 'بزرگ نت آریا';
            break;


        case 'Netmihan Communication Company Ltd':
            $name = 'نت میهن';
            break;


        case 'Soroush Rasanheh Company Ltd':
            $name = 'شرکت سروش رسانه';
            break;


        case 'Shabakeh Gostar Dorna Cooperative Co.':
            $name = 'شبکه گستر دنا';
            break;


        case 'Hamara System Tabriz Engineering Company':
            $name = 'همراه سیستم تبریز';
            break;


        case 'Andishe Sabz Khazar Co. P.j.s.':
            $name = 'اندیشه سبز خزر';
            break;


        case 'Rahanet Zanjan Co. (Private Joint-Stock)':
            $name = 'رهانت زنجان';
            break;


        case 'Sepanta Communication Development Co. Ltd':
            $name = 'سپنتا';
            break;


        case 'Raad Bushehr PJSC':
            $name = 'راد بوشهر';
            break;


        case 'Telecommunications of Esfahan (TCE)':
            $name = 'مخابرات اصفهان';
            break;


        case 'Noavaran Shabakeh Sabz Mehregan Company Limited':
            $name = 'نوآوران شبکه سبز مهرگان';
            break;


        case 'Ariana Gostar Spadana (PJSC)':
            $name = 'سپنتا';
            break;


        case 'Rased Maral Ava Jonoob JSC':
            $name = 'راسد مارال آوا جنوب';
            break;


        case 'Fars Province University of Medical Science and He':
            $name = 'دانشگاه فارس';
            break;


        case 'Roshangaran Ertebatat Rayaneh':
            $name = 'روشنگران ارتباطات رایانه';
            break;


        case 'Didehban Net Company PJS':
            $name = 'دیدهبان';
            break;


        case 'Respina Networks':
            $name = 'رسپینا';
            break;


        case 'Moj Bahman Company PJS':
            $name = 'موج بهمن';
            break;


        case 'Dadeh Pardazi Arta Cooperative Company':
            $name = 'داده پردازی آرتا';
            break;


        case 'Telecommunications Company of Golestan province PJ':
            $name = 'مخابرات گلستان';
            break;


        case 'Arya Sepehr Ettelarasan Tehran PLC':
            $name = 'آریا سپهر اطلاع رسان تهران';
            break;


        case 'Isfahan University of Technology':
            $name = 'دانشگاه اصفهان';
            break;


        case 'Tosee Resan Pasargad Co. P.J.S':
            $name = 'توسعه رسان پاسارگاد';
            break;


        case 'Shabakeh Gostar Shahriyar Co. (Ltd.)':
            $name = 'شبکه گستر شهریار';
            break;


        case 'Dourbord Fars Telecommunication Engineering PJSC':
            $name = 'دوربرد فارس';
            break;


        case 'Rasaneh Esfahan Net':
            $name = 'رسانه اصفهان';
            break;


        case 'Apadana Rayaneh Kimia Ltd.':
            $name = 'آپادانا رایانه کیمیا';
            break;


        case 'Fara Negar Pardaz Noor Khuzestan Co.JSP':
            $name = 'فارس نگار پرداز نور خوزستان';
            break;


        case 'Ayandeh Gostar Bastak Co. (Private Joint Stock)':
            $name = 'آینده گستر بستاک';
            break;


        case 'Tehran Municipality ICT Organization':
            $name = 'سازمان شهرداری تهران';
            break;


        case 'Farhang Azma Communications Company LTD':
            $name = 'فرهنگ آزما';
            break;


        case 'Securities and Exchange Organization':
            $name = 'سازمان بورس و اوراق بهادار';
            break;


        case 'National Iranian Oil Company':
            $name = 'شرکت ملی نفت ایران';
            break;


        case 'Organization of Statistics and Information and Com':
            $name = 'مرکز آمار ایران';
            break;


        case 'Toloe Rayaneh Loghman Educational and Cultural Co.':
            $name = 'شرکت آموزشی و فرهنگی طلوع رایانه لقمان';
            break;


        case 'Pouya shabakeh Asr Co. (LTD.)':
            $name = 'پویا شبکه عصر';
            break;


        case 'Pishgaman Tejarat Sayar Company (Private Joint Sto':
            $name = 'پیشگامان';
            break;


        case 'Razavi Information and communication technology co':
            $name = 'رضوی';
            break;


        case 'Ahang Rayan Malayer Co. LTD':
            $name = 'آهنگ رایان ملایر';
            break;


        case 'IsIran':
            $name = 'انستیتو ایزیران';
            break;


        case 'Sari System-e Jonoub Co (Ltd.)':
            $name = 'سازی سیستم جنوب';
            break;


        case 'Pishgaman Kavir Yazd Cooperative':
            $name = 'پیشگامان';
            break;


        case 'Aftab Internet Service Provider':
            $name = 'آفتاب';
            break;


        case 'Pardaz Gostar Ertebatat Berelian Limited Liability':
            $name = 'پرواز گستر ارتباط برلیان';
            break;


        case 'Petiak System':
            $name = 'پتیاک سیستم';
            break;


        case 'IRIB (Islamic Republic of Iran Broadcasting)':
            $name = 'صداوسیما جمهوری اسلامی ایران';
            break;


        case 'Yazd University':
            $name = 'دانشگاه یزد';
            break;


        case 'Azarakhsh Ava-e Ahvaz Co. (Joint Stock Company)':
            $name = 'آذرخش آوا اهواز';
            break;


        case 'Shabdiz Telecom Network JSC':
            $name = 'شبدیز تلکام';
            break;


        case 'Pardazeshgar Rayazma Ltd.':
            $name = 'پردازشگر رای آزما';
            break;


        case 'Google':
            $name = 'گوگل';
            break;


        case 'test':
            $name = 'test';
            break;


        case 'Pishgaman Toseeh Fanavari Etelaat Va Ertebatat Jon':
            $name = 'پیشگامان';
            break;


        case 'Rayaneh Pardazan Baran Co. Ltd.':
            $name = 'رایانه پردازان باران';
            break;


        case 'Shabakeh Gostar Payamavaran Kavir Company (Private':
            $name = 'شبکه گستر پیاموران کویر';
            break;


        case 'Aidin System Booshehr Co.PJS':
            $name = 'آیدین سیستم بوشهر';
            break;


        case 'Asmanfaraz Sepahan Isdp (pjs)':
            $name = 'آسمان فراز سپاهان';
            break;


        case 'Shiraz Hamyar Co.':
            $name = 'شیراز همیار';
            break;


        case 'Gostaresh Dade AKO Fanavaran Co LLC':
            $name = 'گسترش داده فناوران';
            break;


        case 'Iranian Information Technology Company PLC':
            $name = 'شرکت فناوری اطلاعات ایران';
            break;


        case 'Kavoshgar Novin Karamad PJSC':
            $name = 'کاوشگر نوین کارآمد';
            break;


        case 'Rayan Ravesh Sena Ltd':
            $name = 'رایان روش';
            break;


        case 'SC Terra Romania Utilaje de Constructii SRL':
            $name = 'رومینا';
            break;


        case 'Statistics and IT Organization Of Tabriz Municiapl':
            $name = 'مرکز آمار ایران';
            break;


        case 'Irik Gostar Technology Development PJSC':
            $name = 'ایریک گستر';
            break;


        case 'Gilass Rayaneh Sirjan Co (PJS)':
            $name = 'گیلاس رایانه سیرجان';
            break;


        case 'Rayan Hamrah Almas Co. Ltd':
            $name = 'رایان همراه الماس';
            break;


        case 'Sindad LLC':
            $name = 'سینداد';
            break;


        case 'Satiari Ertebat Engineering Company Ltd':
            $name = 'ستیاری';
            break;


        case 'Pishgaman Rasaneh Va Agahi Zobdeh Co-op':
            $name = 'پیشگامان';
            break;


        case 'Pooyan Pishro Larestan Technical Engineering Compa':
            $name = 'پویان پیشرو لارستان';
            break;


        case 'Mehregan Ertebatat Novin Asia Co.':
            $name = 'مهرگان';
            break;


        case 'Jahrom Univesity Of Medical Sciences':
            $name = 'دانشگاه جهرم';
            break;


        case 'AVAGOSTAR':
            $name = 'آوا گستر';
            break;


        case 'Enteghal Dadeh Mahan LTD':
            $name = 'انتقال داده ماهان';
            break;


        case 'Padidar Technology Co':
            $name = 'پدیدار';
            break;


        case 'Moasese Gostaresh Etelaat Va Ertebatat Farhangi Ne':
            $name = 'موسسه گسترش اطلاعات و ارتباطات';
            break;


        case 'Pardazesh Rayaneh Bita Co.Ltd':
            $name = 'پردازش رایانه';
            break;


        case 'Imam Khomeini International University of Qazvin':
            $name = 'دانشگاه امام خمینی قزوین';
            break;


        case 'Caspian Applied Systems Services Supplying Company':
            $name = 'کاسپین';
            break;


        case 'Telecommunication Infrastructure Company':
            $name = 'شرکت ارتباطات زیرساخت';
            break;


        case 'Isfahan University of Medical Science and Health S':
            $name = 'داشنگاه اصفهان';
            break;


        case 'Samaneh Sama Pishro Persian':
            $name = 'سامانه سما پیشرو';
            break;


        case 'Iran Meteorological Organization':
            $name = 'سازمان هواشناسی ایران';
            break;


        case 'Data Pardaz Afraz Private Private Joint Stock Comp':
            $name = 'دیتاپرداز افزار';
            break;


        case 'Fadak Rayaneh Hormozgan Co. Ltd':
            $name = 'فدک زایانه هرمزگان';
            break;


        case 'Shiraz University Internet Clients':
            $name = 'دانشگاه شیراز';
            break;


        case 'Payamavaran Javan Company Ltd.':
            $name = 'پیاموران جواب';
            break;


        case 'Rasaneh Avabarid Private Joint Stock Company':
            $name = 'رسانه آوابرید';
            break;


        case 'Pooya Parto Qeshm Cooperative Company':
            $name = 'پویا پرتو قشم';
            break;


        case 'PartPayam Shahin Shahr ISP':
            $name = 'پارت پیام شاهین شهر';
            break;


        case 'Shabdiz Telecom Network':
            $name = 'شبدیز';
            break;


        case 'Rayaneh Gostar Farzanegan Ahwaz Company LTD.':
            $name = 'رایانه گستر فرزانگان اهواز';
            break;


        case 'METANET SEPAHAN Technology Co.':
            $name = 'متانت سپاهان';
            break;


        case 'City Telecom Co. LTD.':
            $name = 'شهر';
            break;


        case 'SINA ATINET Company (Ltd)':
            $name = 'سینا آتینت';
            break;


        case 'Sepehr Ava Data Processing Company (LTD)':
            $name = 'سپهر آوا پردازش';
            break;


        case 'Bertina Technology Company PJSC':
            $name = 'برتینا';
            break;


        case 'Faraso Samaneh Pasargad Ltd.':
            $name = 'فراسو سامانه پاسارگاد';
            break;


        case 'Information Technology ArmanNet PLC':
            $name = 'آرمان نت';
            break;


        case 'E-Money Net Developers 24 Company Private Joint St':
            $name = 'توسعه دهنگان پول الکترونیک';
            break;


        case 'Communication and information technology network A':
            $name = 'شرکت فناوری اطلاعات';
            break;


        case 'Sadad Informatics Corp. Dadehvarzi Sadad Co. PJSC':
            $name = 'سداد';
            break;


        case 'Lesun communication furtherance engineers Co, (Ltd':
            $name = 'لسون';
            break;


        case 'Fanavari Server Pars Argham Company Gostar Ltd.':
            $name = 'فناوری سرور پارس ارقام گستر';
            break;


        case 'Toos-Ashena Pjsc':
            $name = 'توسعه آشنا';
            break;


        case 'Soshiant Fara Dadeh Co. Ltd':
            $name = 'فرا داده';
            break;


        case 'Tarahan Shabake Sharif LTD':
            $name = 'طراحان شبکه شریف';
            break;


        case 'Sepid Gostar Sorena Eng. Co. (Private Joint Stock)':
            $name = 'سپید گستر سورنا';
            break;


        case 'Raveshyab Service Co. of Jiroft PJS':
            $name = 'روشیاب سرویس';
            break;


        case 'Ertebat Gostaran Bina':
            $name = 'ارتباط گستران بینا';
            break;


        case 'The Islamic Propagation Office of Qom Seminary':
            $name = 'دفتر انتشارات اسلامى معارف قم';
            break;


        case 'Homa Idea Process Co':
            $name = 'هما ایده';
            break;


        case 'Hamadan University of Medical Sciences':
            $name = 'دانشگاه همدان';
            break;


        case 'Pardazeshgaran Etelat Zaban Layeha Co Ltd':
            $name = 'پردازشگران اطلاعات زبان لایه ها';
            break;


        case 'Chapar Rasaneh':
            $name = 'چاپار رسانه';
            break;


        case 'Tapash Rayane Ahvaz Co. (Private)':
            $name = 'تپش رایانه اهواز';
            break;


        case 'Qeshm Dehkadeh Ertebatat Coopertive':
            $name = 'قشم داده ارتباطات';
            break;


        case 'Kish Iran Credit Card Corporation (Public Corporat':
            $name = 'شرکت کارت اعتباری کیش';
            break;


        case 'Samaneh Sama Pishro Persian Communications and Inf':
            $name = 'سامانه سما پیشرو';
            break;


        default:
            $name = $isp;


    }

    if (strpos($isp, 'Mobin') !== FALSE) {
        $name = "مبین نت";
    }

    return $name;


}





function visitor_os($os)
{

    switch ($os) {

        case 'Windows':
            $name = 'ویندوز';
            break;

        case 'OS X':
            $name = 'مک';
            break;

        case 'Windows NT':
            $name = 'ویندوز';
            break;

        case 'Debian':
            $name = 'لینوکس';
            break;

        case 'Ubuntu':
            $name = 'لینوکس';
            break;

        case 'Macintosh':
            $name = 'مک';
            break;

        case 'Android':
            $name = 'اندروید';
            break;

        case 'AndroidOS':
            $name = 'اندروید';
            break;

        case 'WindowsMobileOs':
            $name = 'ویندوز موبایل';
            break;


        case 'OpenBSD':
            $name = 'BSD';
            break;

        case 'Linux':
            $name = 'لینوکس';
            break;

        case 'ChromeOS':
            $name = 'کروم';
            break;

        case 'CrOS':
            $name = 'کروم';
            break;

        case 'PPC':
            $name = 'مک';
            break;

        case 'Mac OS X':
            $name = 'مک';
            break;


        default:
            $name = $os;


    }


    return $name;


}






function visitor_browser($browser)
{

    switch ($browser) {


        case 'Chrome':
            $name = 'کروم';
            break;

        case 'Firefox':
            $name = 'فایرفاکس';
            break;

        case 'Safari':
            $name = 'سافاری';
            break;

        case 'Mozilla':
            $name = 'موزیلا';
            break;


        case 'Opera Mini':
            $name = 'اپرا';
            break;

        case 'Opera':
            $name = 'اپرا';
            break;

        case 'Edge':
            $name = 'اج';
            break;

        case 'UCBrowser':
            $name = 'UC';
            break;

        default:
            $name = $browser;


    }


    return $name;


}
