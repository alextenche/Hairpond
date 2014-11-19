<?php 

// database connection
$link = mysqli_connect('localhost', 'root', '', 'hairpond');

// 1. the current page number ($current_page)
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

// 2. records per page ($per_page)
$per_page = !empty($_GET['per_page']) ? (int)$_GET['per_page'] : 10 ;

// 3. total record count ($total_count)

$total_count= mysqli_query($link, "SELECT COUNT(*) FROM clienti");


print_r($total_count);		


	
$pagination = new Pagination($page, $per_page, $total_count);
	
// Instead of finding all records, just find the records for this page
$sql = "SELECT * FROM produse LIMIT {$per_page} OFFSET {$pagination->offset()}";
$produse = Produs::find_by_sql($sql);
	
// Need to add ?page=$page to all links we want to 
// maintain the current page (or store $page in $session)	
?>

<!doctype html>
<html>
<head>
	<title>List of products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery1.min.js"></script>
	<!-- start menu -->
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<script src="js/jquery.easydropdown.js"></script>
</head>

<body>
<?php include("staff_header.php"); ?>
<br />
<?php echo output_message($message); ?>
<br />
<table class="bordered" border=2px style="margin-left:30px;">
	<tr>
		<th>Bi</th>
		<th>Nume</th>
		<th>Cod</th>
		<th>Brand</th>
		<th>Poza1</th>
		<th>Poza2</th>
		<th>Poza3</th>
		<th>Poza4</th>
		<th>Pret</th>
		<th>Pret Vechi</th>
		<th>Cat</th>
		<th>SubCat</th>
		<th></th>
	</tr>

	<?php foreach($produse as $product) { ?>
	<tr>
		<td><?php echo $product->bi; ?></td>
		<td><?php echo $product->prodname; ?></td>
		<td><?php echo $product->cod; ?></td>
		<td><?php echo $product->brand; ?></td>
		<td><img src="<?php if(!empty($product->prodpic1)) {
							echo 'images/' . $product->cat .'/'. $product->bi .'/'. $product->prodpic1;
						} else { 
							echo 'images/poza1.png';}?>" alt="prodpic1" width="45" height="45"/>
		</td>
		<td><img src="<?php if(!empty($product->prodpic2)) {
							echo 'images/' . $product->cat .'/'. $product->bi .'/'. $product->prodpic2;
						} else { 
							echo 'images/poza2.png';}?>" alt="prodpic2" width="45" height="45"/>
		</td>						
		<td><img src="<?php if(!empty($product->prodpic3)) {
							echo 'images/' . $product->cat .'/'. $product->bi .'/'. $product->prodpic3;
						} else { 
							echo 'images/poza3.png';}?>" alt="prodpic3" width="45" height="45"/>
		</td>
		<td><img src="<?php if(!empty($product->prodpic4)) {
							echo 'images/' . $product->cat .'/'. $product->bi .'/'. $product->prodpic4;
						} else { 
							echo 'images/poza4.png';}?>" alt="prodpic4" width="45" height="45"/>
		</td>
								
		<td><?php echo $product->pret; ?></td>
		<td><?php echo $product->oldpret; ?></td>
		<td  style="text-align:justify; size:5px;"><?php echo $product->cat; ?></td>
		<td><?php echo $product->subcat; ?></td>
		<td><a href="edit_product.php?bi=<?php echo $product->bi; ?>">Edit</a></td>
		<td><a href="delete_product.php?bi=<?php echo $product->bi; ?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>

<div id="pagination" style="clear: both; margin-left:30px;">
<?php
	if($pagination->total_pages() > 1) {
		
		if($pagination->has_previous_page()) { 
			echo "<a href=\"list_products.php?page=";
			echo $pagination->previous_page();
			echo "\">&laquo; Previous</a> "; 
		}

		for($i=1; $i <= $pagination->total_pages(); $i++) {
			if($i == $page) {
				echo " <span class=\"selected\">{$i}</span> ";
			} else {
				echo " <a href=\"list_products.php?page={$i}\">{$i}</a> "; 
			}
		}

		if($pagination->has_next_page()) { 
			echo " <a href=\"list_products.php?page=";
			echo $pagination->next_page();
			echo "\">Next &raquo;</a> "; 
		}
	}
?>
</div>


<br>
<a href="new_product.php" style="margin-left:30px">Add a new product</a>
<br><br>
<a href="staff.php" style="margin-left:30px">Back to staff area</a>
<br><br>
<?php include("staff_footer.php");
mysqli_close(); ?>
</body>
</html>
