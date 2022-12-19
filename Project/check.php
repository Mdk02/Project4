<?

// ob_end_clean();
require('connectDB.php');

// подключаем шрифты
define('FPDF_FONTPATH', "fpdf/font/");

// подключаем библиотеку
require('fpdf/fpdf.php');

// создаем PDF документ
$pdf = new FPDF();
// устанавливаем заголовок документа
$pdf->SetTitle("check");

// создаем страницу
$pdf->AddPage('P');
// $pdf->SetDisplayMode(real,'default');

// добавляем шрифт ариал
$pdf->AddFont('Arial', '', 'arial.php');
// устанавливаем шрифт Ариал
$pdf->SetFont('Arial');
// устанавливаем цвет шрифта
$pdf->SetTextColor(0, 0, 0);
// устанавливаем размер шрифта
$pdf->SetFontSize(14);

$pdf->Cell(0, 12, iconv('utf-8', 'windows-1251', ""), 0, 1, 'lol', false);







// запросы
$orderID = $_GET['id_order'];

$query_o = "SELECT o.*, u.* 
    FROM `order` as o, `users` as u 
    WHERE o.IdOrder = $orderID AND o.IdUser = u.IdUsers";
$result_o = mysqli_query($db, $query_o);
$order = mysqli_fetch_array($result_o);

$query_op_p = "SELECT p.IdProduct, p.NameProduct, p.PriceProduct, op.Count 
    FROM `order_product` as op, `product` as p 
    WHERE op.IdProduct = p.IdProduct AND op.IdOrder = " . $orderID . "";
$result_op_p = mysqli_query($db, $query_op_p);

// данные



// $pdf->Cell(0, 12, iconv('utf-8', 'windows-1251', "PROJECT4"), 0, 1, 'C', false);
// $pdf->Cell(0, 12, "", 0, 1, '', false);

$pdf->Image('images/logo/logo2.png',10, 16, 11, 11 );
$pdf->Write(0, iconv('utf-8', 'windows-1251', "         PROJECT4"));
$pdf->Cell(0, 8, "", 0, 1, '', false);
$pdf->Cell(0, 0, "", 1, 1, '', false); // просто линия
$pdf->Cell(0, 12, "", 0, 1, '', false);

$pdf->SetTextColor(96, 96, 96);
$pdf->Write(0, iconv('utf-8', 'windows-1251', "Номер квитанции: "));
$pdf->SetTextColor(0, 0, 0);
$pdf->Write(0, iconv('utf-8', 'windows-1251', $order[0]));
$pdf->Cell(0, 12, "", 0, 1, '', false);

$pdf->SetTextColor(96, 96, 96);
$pdf->Write(0, iconv('utf-8', 'windows-1251', "Дата платежа: "));
$pdf->SetTextColor(0, 0, 0);
$pdf->Write(0, iconv('utf-8', 'windows-1251', $order[3]));
$pdf->Cell(0, 12, "", 0, 1, '', false);

$pdf->SetTextColor(96, 96, 96);
$pdf->Write(0, iconv('utf-8', 'windows-1251', "Получатель: "));
$pdf->SetTextColor(0, 0, 0);
$pdf->Write(0, iconv('utf-8', 'windows-1251', $order[7] . " " . $order[8] . " " . $order[9]));
$pdf->Cell(0, 12, "", 0, 1, '', false);

$pdf->SetTextColor(96, 96, 96);
$pdf->Cell(0, 12, iconv('utf-8', 'windows-1251', "Товары"), 0, 0, '', false);
$pdf->Cell(0, 12, "", 0, 1, '', false);
$pdf->SetTextColor(0, 0, 0);

$pdf->Cell(150, 12, iconv('utf-8', 'windows-1251', "Название"), 1, 0, 'C', false);
$pdf->Cell(40, 12, iconv('utf-8', 'windows-1251', "Цена"), 1, 0, 'C', false);
$pdf->Cell(0, 12, "", 0, 1, '', false);

// таблица
$i = 1;
while ($row = mysqli_fetch_array($result_op_p)) {
    $pdf->Cell(150, 12, iconv('utf-8', 'windows-1251', "  " . $row[1]), 1, 0, 'L', false);
    $pdf->Cell(40, 12, iconv('utf-8', 'windows-1251', "  " . $row[2]), 1, 1, 'C', false);
    $i++;
}

$pdf->Cell(150, 12, iconv('utf-8', 'windows-1251', "  " . "Итого  "), 0, 0, 'L', false);
$pdf->Cell(40, 12, iconv('utf-8', 'windows-1251', $order[2]), 1, 1, 'C', false);
$pdf->Cell(0, 12, "", 0, 1, '', false);

$pdf->SetTextColor(96, 96, 96);
$pdf->Write(0, iconv('utf-8', 'windows-1251', "Статус: "));
$pdf->SetTextColor(0, 0, 0);
$pdf->Write(0, iconv('utf-8', 'windows-1251', $order[5]));
$pdf->Cell(0, 12, "", 0, 1, '', false);

// var_dump($order);

// return the generated output
$pdf->Output();
