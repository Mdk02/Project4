<?

ob_end_clean();
require('connectDB.php');
require('fpdf.php');

// Instantiate and use the FPDF class 
$pdf = new FPDF();

//Add a new page
$pdf->AddPage();

// Set the font for the text
$pdf->SetFont('Arial', 'B', 14);

// Prints a cell with given text 

$orderID = $_GET['id_order'];

$query_o = "SELECT o.* 
    FROM `order` as o 
    WHERE o.IdOrder = $orderID";
$result_o = mysqli_query($db, $query_o);
$order = mysqli_fetch_array($result_o);


$pdf->Cell(0, 12, "id = " . $order[0], 0, 1, 'lol', false);

$query_op_p = "SELECT p.IdProduct, p.NameProduct, op.Count 
    FROM `order_product` as op, `product` as p 
    WHERE op.IdProduct = p.IdProduct AND op.IdOrder = " . $orderID . "";
$result_op_p = mysqli_query($db, $query_op_p);
while ($row = mysqli_fetch_array($result_op_p)) {
    $pdf->Cell(0, 12, "name = " . $row[1], 0, 1, 'lol', false);
}



$pdf->Cell(0, 12, "sum = " . $order[2], 0, 2, 'lol', false);
$pdf->Cell(0, 12, "date order = " . $order[3], 0, 2, 'lol', false);
$pdf->Cell(0, 12, "arrival date = " . $order[4], 0, 2, 'lol', false);
$pdf->Cell(0, 12, "status = " . $order[5], 0, 2, 'lol', false);



// var_dump($order);

// return the generated output
$pdf->Output();
