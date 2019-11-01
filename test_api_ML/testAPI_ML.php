<html>
<head>
   <title>Consultas a API mercado libre</title>
</head>

<body>

<?php

site_id=(MLA)
seller_id=(81644614)
ACCESS_TOKEN=(APP_USR-538722316634464-090515-8cc4448aac10098706474e135355a8321-8035443)
for seller_id in ${seller_id[*]}
do
curl=$(curl -X GET https://api.mercadolibre.com//sites/$site_id/search?seller_id=$seller_id&attributes={id,title,category_id,}&access_token=$ACCESS_TOKEN)  
echo "$seller_id: $curl"
$curl = json_decode($curl,true);

$id_sell = $curl['id'];
$titulo = $curl['title'];
$categoria = $curl['category_id'];

include "Log.class.php";
 $log = new Log("log", "./logs/");
 echo $log->insert('id', 'title', 'category_id');

?>
</body>
</html>