<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
</head>
<?php

$user = array();                                
$blog = null;                            
$index = null;          
                     
function saxStartElement($parser,$name,$attrs)
{
    global $blog,$index;
    switch($name)
    {
        case 'blog':

            $user = array();
            break;
			
        case 'user':

            $blog = array();
            break;
        default:

            $index = $name;
            break;
    };
}

function saxEndElement($parser,$name)
{
    global $user,$blog,$index;

    if ((is_array($blog)) && ($name=='user'))
    {
        $user[] = $blog;
        $blog = null;
    };
    $index = null;
}

function saxCharacterData($parser,$data)
{
    global $blog,$index;


    if ((is_array($blog)) && ($index))
        $blog[$index] = $data;
}


$parser = xml_parser_create();
xml_set_element_handler($parser,'saxStartElement','saxEndElement');

xml_set_character_data_handler($parser,'saxCharacterData');

xml_parser_set_option($parser,XML_OPTION_CASE_FOLDING,false);

$xml = join('',file('sax.xml'));

if (!xml_parse($parser,$xml,true))
    die(sprintf('Ошибка XML: %s в строке %d',
        xml_error_string(xml_get_error_code($parser)),
        xml_get_current_line_number($parser)));
		
		?>
		<html>
<head>
    <title>An21</title>
</head>
<body>
<section id="form"><!--form-->
	
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
<table width="100%" border="1">
<?php
foreach($user as $n)
{
?>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Имя</th>
    <td width="90%"><b><?php echo $n['name']; ?></b></td>
   
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Логин</th>
    <td colspan="2"><?php echo $n['login']; ?><br><br></td>
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Пароль</th>
    <td colspan="2"><?php echo $n['pass']; ?><br><br></td>
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Доступ</th>
    <td colspan="2"><?php echo $n['access']; ?><br><br></td>
</tr>
<tr>
<th style="text-align: left;    border-bottom: 2px solid #000000;">Возраст</th>
    <td colspan="2"><?php echo $n['age']; ?><br><br></td>
</tr>
<?php
};
?>
</div>
						
				</div>
				
			</div>
		
	</section>

</table>
</body>
</html>
<?php

xml_parser_free($parser);

?>