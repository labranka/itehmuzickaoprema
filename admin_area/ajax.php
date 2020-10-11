<?php
$connect = mysqli_connect("localhost", "root", "", "muzickaoprema");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM proizvodi 
	WHERE proizvod_naziv LIKE '%".$search."%'
	OR product_keywords LIKE '%".$search."%' 
	OR proizvod_opis LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM proizvodi ORDER BY proizvod_id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
                            <th> Naziv Proizvoda: </th>
                            <th> Cena: </th>
                            <th> Kljucne reci: </th>
							<th> Datum proizvoda: </th>
							<th> Opis proizvoda: </th>
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
        $pro_img1 = $row['product_img1'];
		$output .= '
			<tr>
				<td>'.$row["proizvod_naziv"].'</td>
				<td>'.$row["proizvod_cena"].'</td>
				<td>'.$row["product_keywords"].'</td>
				<td>'.$row["datum"].'</td>
				<td>'.$row["proizvod_opis"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Proizvod nije pronadjen';
}
?>