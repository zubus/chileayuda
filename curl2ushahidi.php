<?php

$csvFile = file('acopio.csv');
$data = [];

foreach ($csvFile as $line) {
    $data[] = str_getcsv($line);
}

foreach ($data as $fila) {
    	
	$array = explode(';', $fila[0]);

	$data_json = '{"title":"'. utf8_encode($array[0]) .'","content":"Acopio","locale":"en_US","values":{"8ac236a2-1205-49df-8288-da375d84df83":["'. utf8_encode($array[1]) .'"],"c94f44a0-8d0e-4088-80ca-dc6549551159":["'. utf8_encode($array[2]) .'"],"314f0725-6ade-4a67-aba3-2a962780a03f":["'. utf8_encode($array[3]) .'"],"b5f7191f-4857-4a85-8f15-c6dd1335e387":["'. utf8_encode($array[4]) .'"],"65fe27fe-4f7b-4088-9651-16feecc7edf9":["Centro de acopio de cosas varias para personas."],"e9b4093b-4150-462b-b9cf-625cfb877912":["'. utf8_encode($array[6]) .'"],"1a7083cf-04c6-4163-83cf-39e322300b8c":["'. utf8_encode($array[7]) .'"],"d5f878f0-07f2-40bb-a726-bb29c6ca149a":["'. utf8_encode($array[8]) .'"],"a356073f-82db-42ec-8583-93468787d593":["'. utf8_encode($array[9]) .'"],"bb27c8cd-3dbc-4428-81e7-2efc18e788e3":["'. utf8_encode($array[10]) .'"],"1ca59cdb-a0a4-4ea7-ab10-0985883e3d8f":[{"lat":'. utf8_encode($array[12]) .',"lon":'. utf8_encode($array[11]) .'}],"1fe2c015-4eef-4902-b023-e791a284ad04":["'. utf8_encode($array[13]) .'"],"542b010b-9dfb-4f58-b488-b8b802503001":["'. utf8_encode($array[14]) .'"],"c1ab0484-20fc-4a38-8a1d-335349390310":[""]},"completed_stages":[],"published_to":[],"post_date":"2017-01-30T18:01:17.992Z","form":{"id":11,"url":"https://chileayuda.api.ushahidi.io/api/v3/forms/11","parent_id":null,"name":"Centros de acopio","description":"Â¡La labor es gigantesta!. Necesitamos un mapeo masivo a nivel nacional, con informaciÃ³n certera, veraz y actualizada.\\n\\nSÃ³lo podemos realizarlo entre todos, sumando esfuerzos.\\n\\nAgradecemos todas las colaboraciones.","color":"#5BAA00","type":"report","disabled":false,"created":"2017-01-30T03:24:00+00:00","updated":"2017-01-30T16:05:03+00:00","require_approval":true,"everyone_can_create":true,"can_create":[],"allowed_privileges":["read","create","update","delete","search"]},"allowed_privileges":["read","create","update","delete","search","change_status"]}';

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"https://chileayuda.api.ushahidi.io/api/v3/posts?order=desc&orderby=post_date");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer /* TOKEN */', 'charset=UTF-8'));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$server_output = curl_exec ($ch);

	var_dump($server_output);

	echo curl_error($ch);
	curl_close ($ch);
}

?>