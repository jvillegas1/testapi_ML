<html>
<head>
   <title>Consultas a API mercado libre</title>
</head>

<body>

<?php

site_id=(MLA)
seller_id=(256189964)
ACCESS_TOKEN=(APP_USR-538722316634464-090515-8cc4448aac10098706474e135355a8321-8035443)
for seller_id in ${seller_id[*]}
do
curl=$(curl -X GET https://api.mercadolibre.com//sites/$site_id/search?seller_id=$seller_id&attributes={id,title,category_id,}&access_token=$ACCESS_TOKEN)  
echo "$seller_id: $curl"
$curl = json_decode($curl,true);

     
$id_sell = $curl->results->id;
$titulo = $curl->results->title;
$categoria = $curl->results->category_id;
$categoria_name = $curl->available_filters->name->values;
include "Log.class.php";
 $log = new Log("log", "./logs/");
 echo $log->insert('id:'+$id_sell, 'title:'+$titulo, 'category_id:'+$categoria, 'name:'+$categoria_name,);

?>
</body>
</html>
