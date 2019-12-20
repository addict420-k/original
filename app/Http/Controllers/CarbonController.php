<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

 
class CarbonController extends Controller
{
    public function getIndex()
    {
        
        
        // 現在の日時
        $now = Carbon::now();
        echo '現在: ' . $now . '<br>';
        // 昨日
        $yesterday = Carbon::yesterday();
        echo '昨日: ' . $yesterday . '<br>';
        // 今日
        $today = Carbon::today();
        echo '今日: ' . $today . '<br>';
        // 明日
        $tomorrow = Carbon::tomorrow();
        echo '明日: ' . $tomorrow . '<br><br>';
 
        // 5年進める
        echo '5年進める: ' . $now->addYears(5) . '<br>';
        // 10年戻る
        echo '10年戻る: ' . $now->subYears(10) . '<br>';
        // 1ヶ月進む
        echo '1ヶ月進む: ' . $now->addMonth() . '<br>';
        // 15日進む
        echo '15日進む: ' . $now->addDays(15) . '<br>';
        // 8時間戻る
        echo '8時間戻る: ' . $now->subHours(8) . '<br>';
        // 平日で2日進む
        echo '平日で2日進む: ' . $now->addWeekdays(2) . '<br>';
        // 2週間進む
        echo '2週間進む: ' . $now->addWeeks(2) . '<br><br>';
 
        // 1990年2月4日
        $createDate = Carbon::createFromDate(1990, 2, 4);
        echo '1990年2月4日: ' . $createDate . '<br>'; // 指定していない時間は現在のものになる
        // 22時22分22秒
        $createTime = Carbon::createFromTime(22, 22, 22);
        echo '22時22分22秒: ' . $createTime . '<br>'; // 指定していない年月日は現在のものになる
        // 1984年2月27日22時11分00秒
        $create = Carbon::create(1994, 2, 27, 22, 11, 00);
        echo '1984年2月27日22時11分00秒: ' . $create . '<br>';
        // 今年のクリスマス
        $xmasThisYear = Carbon::createFromDate(null, 12, 25);
        echo '今年のクリスマス: ' . $xmasThisYear . '<br>'; // 指定していない年と時間は現在のものになる
        // 年齢
        $birth = Carbon::createFromDate(1991, 5, 29);
        echo '年齢: ' . $birth->age . '<br><br>';
 
        // 日時から各値取得
        $dt = Carbon::parse('2016-12-25 22:11:00.123456');
        echo $dt . '<br>';
        echo 'year: ' . $dt->year . '<br>';
        echo 'month: ' . $dt->month . '<br>';
        echo 'day: ' . $dt->day . '<br>';
        echo 'hour: ' . $dt->hour . '<br>';
        echo 'minute: ' . $dt->minute . '<br>';
        echo 'second: ' . $dt->second . '<br>';
        echo 'micro: ' . $dt->micro . '<br>';
        echo 'dayOfWeek: ' . $dt->dayOfWeek . '<br>';
        echo 'dayOfYear: ' . $dt->dayOfYear . '<br>';
        echo 'weekOfMonth: ' . $dt->weekOfMonth . '<br>';
        echo 'weekOfYear: ' . $dt->weekOfYear . '<br>';
        echo 'daysInMonth: ' . $dt->daysInMonth . '<br>';
        echo 'timestamp: ' . $dt->timestamp . '<br>';
        echo 'quarter: ' . $dt->quarter . '<br>';
    }
}