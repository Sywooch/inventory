<?php
/* @var $this yii\web\View */
$this->title = 'Dent System';



?>

<!--        <section id="service-section-home">
                    <article class="wrapper">
                        <div class="row-service">
                            <a href="http://www.tescolotus.com/service/payment">
                                <div id="r-01" class="col">
                                    <h3 class="font-dark">บริการจ่ายบิล</h3>
                                    <p>โดยมีอัตราค่าบริการ<br><span class="font-green">เพียง 7 บาทเท่านั้น</span></p>
                                </div>
                            </a>
                            <a href="http://www.tescolotus.com/service/sim">
                                <div id="r-02" class="col">
                                    <h3 class="font-dark">บริการเติมเงินและซิมมือถือ</h3>
                                    <p><span class="font-green">เติมเงินมือถือและเกมส์ออนไลน์</span><br>ได้ง่ายๆ</p>
                                </div>
                            </a>
                            <a href="http://www.tescolotus.com/service/ticket">
                                <div id="r-03" class="col">
                                    <h3 class="font-dark">บริการจองตั๋ว</h3>
                                    <p>มาที่เดียวจองได้ครบ <br><span class="font-green">รถทัวร์ เรือ กีฬา และคอนเสิร์ต</span></p>
                                </div>
                            </a>
                            <a href="http://www.tescolotus.com/service/post">
                                <div id="r-04" class="col">
                                    <h3 class="font-dark">ส่งพัสดุกับเทสโก้ โลตัส</h3>
                                    <p>ส่งง่าย ได้เร็ว ภายใน 1-3 วัน<br>ด้วย <span class="font-green">บริการรับส่งพัสดุ</span></p>
                                </div>
                            </a>
                            <a href="http://www.tescolotus.com/service/fax">
                                <div id="r-05" class="col">
                                    <h3 class="font-dark">ถ่ายเอกสาร/รับส่งแฟ็กซ์</h3>
                                    <p>สะดวก รวดเร็ว กับ <span class="font-green">บริการ<br>ถ่ายเอกสารและรับ-ส่งแฟกซ์</span></p> 
                                </div>
                                <a href="http://www.tescolotus.com/service">
                                    <div id="r-06"class="col">
                                        <h3 class="font-dark">บริการอื่นๆจากเทสโก้ โลตัส</h3>
                                        <p><span class="font-green">บัตรของขวัญ กิ๊ฟการ์ด</span><br>หรือ <span class="font-green">บริการด้านการเงิน</span></p>
                                    </div>
                                </a>
                        </div>
                    </article>
                </section>-->
<?php
$time = time();
//$time = '2015-06-03 13:25:17';
echo Yii::$app->thaiFormatter->asDate($time, 'short')."<br>";
echo Yii::$app->thaiFormatter->asDate($time, 'medium')."<br>";
echo Yii::$app->thaiFormatter->asDate($time, 'long')."<br>";
echo Yii::$app->thaiFormatter->asDate($time, 'full')."<br>";

echo Yii::$app->thaiFormatter->asDateTime($time, 'short')."<br>";
echo Yii::$app->thaiFormatter->asDateTime($time, 'medium')."<br>";
echo Yii::$app->thaiFormatter->asDateTime($time, 'long')."<br>";
echo Yii::$app->thaiFormatter->asDateTime($time, 'full')."<br>";

echo Yii::$app->thaiFormatter->asDate($time, 'php:Y-m-d');
echo Yii::$app->thaiFormatter->asDateTime($time, 'php:Y-m-d H:i:s');
?>
<br><br><br>