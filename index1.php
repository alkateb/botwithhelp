<?php 
   
$method = $_SERVER['REQUEST_METHOD'];
   
// Process only when method is POST
if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);
   
    $service = $json->result->parameters->services_entities;
    $city = $json->result->parameters->cities;
    $help = $json->result->parameters->HelpEntities;
 
 
     
     
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 

 
$ch = curl_init(); 
//curl_setopt($ch, CURLOPT_URL, 'http://88.247.29.227/test.php?link=https://admin-turkey.servicesadvisor.org/en/api/v1.0/service_location?fields=serviceName,endDate%26filter[region]=464%26filter[servicesProvided]='.$_GET['link']); 
curl_setopt($ch, CURLOPT_URL, 'http://help.unhcr.org/turkey/wp-json/wp/v2/pages/'.$help); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
 
$vars = json_decode($result, true);
$vars1 = json_decode($result);
$varsDate = json_decode($result, true);
 
//echo $vars1->content->rendered;
$eResult= $vars1->content->rendered;
 
$response = new \stdClass();
    $response->speech = $eResult;
    $response->displayText = $speech;
    $response->source = "webhook";
    $u= json_encode($response);
    echo $u;
 


} 
else
{
    echo "Method not allowed";
}
   
?>
