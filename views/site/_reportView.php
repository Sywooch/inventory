<?php

use mcms\cart\Cart;

$cart = new Cart();

use app\models\Inventorydetail;
use app\models\Inventory;
use app\models\Budget;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>

    </style>
    <body>
        <div class="container" style="padding-left: 50px; font-size:15pt;">
            <div>
                <img src="images/icons/k.jpg" width="75" height="71" class="pull-left" style="margin-top: 1px;">
                <div style="margin-left: 200px;">
                    <strong style="font-size:21pt;  ">บันทึกข้อความ</strong>
                </div>
            </div>
            <div>
                <strong>ส่วนราชการ</strong>&nbsp;&nbsp;โรงพยาบาลพรเจริญ<br>
                <strong>ที่</strong>&nbsp;&nbsp;บก.0032.303 (04)&nbsp;/217 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;

                <span>วันที่ 9 กุมภาพันธ์ 2558</span>

                <br>
                <strong>เรื่อง</strong>&nbsp;&nbsp;ขออนุมัติจัดซื้อเวชภัณฑ์ยา/ไม่ใช่ยา<br>
                <strong>เรียน</strong>&nbsp;&nbsp;ผู้ว่าราชการจังหวัดบึงกาฬ
                <div style="padding-left: 37px;">ด้วยกลุ่ม/ฝ่ายงานเภสัชกรรม&nbsp;&nbsp;โรงพยาบาลพรเขริญ&nbsp;&nbsp;มีความประส่งค์จะขออนุมัติซื้อเวชภัณฑ์ยา/มิใช่ยา</div>
                <div>จำนวนรายการ&nbsp;&nbsp;<?= Inventorydetail::find()->where(['inventory_id' => $model->id])->count() ?>&nbsp;&nbsp;เป็นเงิน&nbsp;&nbsp;<?= $cart->format_number(1800); ?>&nbsp;&nbsp;บาท&nbsp;&nbsp;(&nbsp;&nbsp;หนึ่งพันแปดร้อยบาทถ้วน&nbsp;&nbsp;)</div>
                <p>โดยใช้เงิน&nbsp;&nbsp;<?= $model->budget->name ?>&nbsp;&nbsp;เป็นเงิน&nbsp;&nbsp;งบประมาณ&nbsp;&nbsp;2558&nbsp;&nbsp;
                    โดยวิธี&nbsp;[/]&nbsp;ตกลงราคา&nbsp;[ ]&nbsp;วิธีกรณีพิเศษ&nbsp;ตามระเบียบสำนักนายกรัฐมนตรี<br>
                    ว่าด้วยการพัสดุ&nbsp;ฉบับบที่&nbsp;2&nbsp;พ.ศ.2538&nbsp;ข้อ19&nbsp;จาก&nbsp;&nbsp;&nbsp;&nbsp;<strong><?= $model->partner->name; ?></strong>
                    ดังรายการต่อไปนี้
                </p>
                <table class="table" style="font-size:15pt; ">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td><strong>ชื่อเวชภัณฑ์</strong></td>
                            <td><strong>อัตราการใช้ต่อเดือน</strong></td>
                            <td><strong>คงเหลือ</strong></td>
                            <td><strong>จำนวนซื้อ</strong></td>
                            <td><strong>ราคา</strong></td>
                            <td><strong>รวม</strong></td>
                            <td><strong>ราคาเดิม</strong></td>
                            <td><strong>ราคากลาง</strong></td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach (Inventorydetail::find()->where(['inventory_id' => $model->id])->all() as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->product->name; ?></td>
                                <td>#</td>
                                <td><?= $row->product->qty; ?></td>
                                <td><?= $row->qty; ?></td>
                                <td><?= $row->price; ?></td>
                                <td><?= $cart->format_number($row->qty * $row->price); ?></td>
                                <td>#</td>
                                <td>#</td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <table class="table">
                    <tr>
                        <td>
                            <p style="font-size:10pt;">รายการที่มีท้ายชื่อ * หมายถึงยาในบัญชีหลักแห่งชาติ</p>
                        </td>
                        <td align="right"> 

                            <strong><div style="font-size:15pt;">รวมราคา <?= $cart->format_number(Inventorydetail::find()->where(['inventory_id' => $model->id])->sum('price * qty')); ?> บาท</div></strong>

                        </td>

                </table>
                และขออนุมัติแต่งตั้งคณะกรรมการตรวจรับพัสดุ&nbsp;ประกอบด้วย
                <table class="table" style="font-size:15pt;">
                    <tr>
                        <td width="100" align="right">1</td>
                        <td>นางสาวxxxx&nbsp;&nbsp;xxxx</td>
                        <td>พยาบาลวิชาชีพ ชำนาญการ</td>
                        <td>ประธานกรรมการ</td>
                    </tr>
                    <tr>
                        <td width="100" align="right">2</td>
                        <td>นางสาวxxxx&nbsp;&nbsp;xxxx</td>
                        <td>พยาบาลวิชาชีพ ชำนาญการ</td>
                        <td>ประธานกรรมการ</td>
                    </tr>
                </table>
                <table class="table table-bordered" style="font-size:15pt;">
                    <tr align="center">
                        <td align="center">ยอดเงินที่ได้รับจัดสรร</td>
                        <td align="center">ยอดเงินที่จัดสรรแล้ว</td>
                        <td align="center">ยอดเงินที่จัดสรรครั้งนี้</td>
                        <td align="center">ยอดเงินคงเหลือ</td>
                    </tr>
                    <tr>
                        <td align="center"><?= $cart->format_number(Budget::find()->where(['id' => $model->budget_id])->one()->name) ?></td>
                        <td align="center"><?= $cart->format_number(Inventorydetail::find()->sum('price')); ?></td>
                        <td align="center"><?= $cart->format_number(1800) ?></td>
                        <td align="center"><?= $cart->format_number(1800) ?></td>
                    </tr>
                </table>
                จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ<br><br>
                <table class="table" style="font-size:15pt;">
                    <tr>
                        <td width="350"></td>
                        <td style="padding-left:100px;">นางสาวพิมพ์ภาพ แกามาจร</td>  
                    </tr>
                    <tr>
                        <td width="350">เรียนายแพทย์ชำนาญการพิเศษ รักษาการในตำแหน่ง</td>
                        <td style="padding-left:140px;">เจ้าหน้าที่พัสดุ</td>
                    </tr>
                    <tr>
                        <td style="padding-left:120px;">โปรพิจารณาอนุมัติ</td>
                        <td style="padding-left:160px;">อนุมัติ</td>

                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td style="padding-left:100px;">นายประเสริฐศักดิ์ ปัดมะริด</td>
                        <td style="padding-left:110px;">( นายแพทย์ภมร ดรุณ )</td>

                    </tr>
                    <tr>
                        <td style="padding-left:110px;">หัวหน้าเจ้าหน้าที่พัสดุ</td>
                        <td style="padding-left:30px;">( นายแพทย์ชำนาญการพิเศษ รักษาการในตำแหน่ง )</td>
                    </tr>
                    <tr>
                        <td></td>

                        <td style="padding-left:60px;">ปฎิบัติการแทนผู้ว่าราชการจังหวัดบึงกาฬ</td>
                    </tr>
                </table>

            </div>
        </div>


    </body>
</html>
