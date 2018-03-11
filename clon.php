<html>
<head>
  
  
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
 </head>
<body>
<section id="form"><!--form-->
	
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				
							
							
							
<?php
echo "<link rel='stylesheet' href='style.css'>";
$orgdoc = new DOMDocument;
$orgdoc->load("data.xml");


$node = $orgdoc->getElementsByTagName("user")->item(1);


// Создание нового документа
$newdoc = new DOMDocument;
$newdoc->formatOutput = true;


// Добавление разметки
$newdoc->load("data.xml");

echo "<b>Документ перед добавлением в него узла:</b>\n";
echo $newdoc->saveXML();

// Импорт узла и всех его потомков в документ
$node = $newdoc->importNode($node, true);
// И затем добавление узла в корень элемента
$newdoc->documentElement->appendChild($node);
echo "\n<b>Новый документ после добавления в него второго узла:</b>\n";
echo $newdoc->saveXML();
echo 'Записано: ' . $newdoc->save("test22.xml") . ' байт'; 

?>

</div>
						
				</div>
				
			</div>
		
	</section>
</body>
</html>