<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">

</head>
<body>
<section id="form"><!--form-->
	
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				<table width="100%" border="1">
<?php

$data = simplexml_load_file("data.xml");

foreach ($data->user as $user) {
?>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Имя</th>
    <td width="90%"><b><?php printf($user->name) ?></b></td>
   
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Логин</th>
    <td colspan="2"><?php printf($user->login)?><br><br></td>
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Пароль</th>
    <td colspan="2"><?php printf($user->pass) ?><br><br></td>
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Доступ</th>
    <td colspan="2"><?php printf($user->access) ?><br><br></td>
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Возраст</th>
    <td colspan="2"><?php printf($user->age)?><br><br></td>
</tr>
<?php
};
foreach ($data->material as $material) {
?>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Название</th>
    <td width="90%"><b><?php printf($material->title) ?></b></td>
   
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Дата создания</th>
    <td colspan="2"><?php printf($material->date_create)?><br><br></td>
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Контент</th>
    <td colspan="2"><?php printf($material->content) ?><br><br></td>
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Пользователь</th>
    <td colspan="2"><?php printf($material->user) ?><br><br></td>
</tr>

<?php
};
?>
</div>
						
				</div>
				
			</div>
		
	</section>
</body>
</html>