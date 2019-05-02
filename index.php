<?php 
  
$method = $_SERVER['REQUEST_METHOD'];
  
// Process only when method is POST
if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);
  
  	$serviceH = $json->queryResult->parameters->services_entitiesH;
	$serviceC = $json->queryResult->parameters->services_entitiesC;
  
    $serviceQ = $json->queryResult->parameters->services_entities;
	$service= $serviceC . $serviceH . $serviceQ ;
	
    $city = $json->queryResult->parameters->cities;
    $lang = $json->queryResult->parameters->language;
	    $help = $json->result->parameters->HelpEntities;
if ($lang=="0"){
	
	
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
if ($service==null){
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
    $response->text = $eResult;
    $response->text = $speech;
    $response->webhookSource = "webhook";
    $u= json_encode($response);
	echo $u;
}
else{
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
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
    
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $ch = curl_init(); 
//curl_setopt($ch, CURLOPT_URL, 'http://88.247.29.227/test.php?link=https://admin-turkey.servicesadvisor.org/en/api/v1.0/service_location?fields=serviceName%26filter[id]='.$text); 
curl_setopt($ch, CURLOPT_URL, 'http://88.247.29.227/test.php?link=https://admin-turkey.servicesadvisor.org/en/api/v1.0/service_location?fields=serviceName,locationAlternate,hotlinePhone,publicAddress%26filter[region]='.$city.'%26filter[servicesProvided]='.$service); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
$vars = json_decode($result, true);
////////////////////////////////////////Checking Date////////////////
$varsDate = json_decode($result, true);
/////////////////////////////////////////////////////////////////////
//$speech = $result;
$items = array();
foreach ($vars['data'] as $vars)
{
/////////////////////Checking Date//////////////////////////////////	
$date = array();
foreach ($varsDate['data'] as $varsDate)
{
$date[] = $varsDate['endDate'];
}
//echo $date[0];
$snDate = explode('-', $date[0]);
if(snDate[0]!='2017'){
	
///////////////////////////////////////////////////////	
	
$items[] = $vars['serviceName'].'; '.$vars['publicAddress'].'; '.$vars['locationAlternate']['coordinates'][1].' '.$vars['locationAlternate']['coordinates'][0].'; '.$vars['hotlinePhone'];
$items=str_replace(",","-",$items);
$items=str_replace(", ","--",$items);
}
}
$e= join(', ', $items);
if($e!= null){
//$c= 'We have '.(count($items)).' Services and they are listed below : ';
$sn = explode(':', $items[0]);
//$c= 'We have '.(count($items)).' '.$sn[0].' Services and they are listed here , ';
$c= 'We have '.(count($items)).' '.$sn[0].' Services , ';
$speech = $c.$e;
/////////////////////////////////////////////////EXTRA///////////////////////////////////////////////
$extra = $json->result->parameters->services_entities1;
if ($extra != null){
 $ch = curl_init(); 
//curl_setopt($ch, CURLOPT_URL, 'http://88.247.29.227/test.php?link=https://admin-turkey.servicesadvisor.org/en/api/v1.0/service_location?fields=serviceName%26filter[id]='.$text); 
curl_setopt($ch, CURLOPT_URL, 'http://88.247.29.227/test.php?link=https://admin-turkey.servicesadvisor.org/en/api/v1.0/service_location?fields=serviceName,locationAlternate,hotlinePhone,publicAddress%26filter[region]='.$city.'%26filter[servicesProvided]='.$extra); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
$vars = json_decode($result, true);
//$speech = $result;
$items2 = array();
foreach ($vars['data'] as $vars)
{
$items2[] = $vars['serviceName'].'; '.$vars['publicAddress'].'; '.$vars['locationAlternate']['coordinates'][1].' '.$vars['locationAlternate']['coordinates'][0].'; '.$vars['hotlinePhone'];
$items=str_replace(",","-",$items);
$items=str_replace(", ","--",$items);
}
$eExtra= join(', ', $items);
$eeExtra= join(', ', $items2);
//$eExtra=','.eExtra;
$eeExtra=','.$eeExtra;
$cExtra= 'We have '.(count($items)).' '.$sn[0].' services';
$sn = explode(':', $items2[0]);
$c= ' and '.(count($items2)).' '.$sn[0].' Services and they are listed below : ,';
if ($eResult!=null){
$speech=$cExtra.$c.$eExtra.' '.$eeExtra.' and here is some explainations '.$eResult;
}
}
else
{
if ($eResult!=null){
$speech = $c.$e.' and here is some explainations '.$eResult;
}
else{
$speech = $speech=$cExtra.$c.$eExtra.' '.$eeExtra;
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
}
////////////////gfgsdgdfgfdgfdgdfgdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdf///////////////////////////////////////////////
if($e!=null && $eeExtra !=null && $eResult==null)
{
$speech=$cExtra.$c.$eExtra.' '.$eeExtra;
}
else if ($e!=null && $eeExtra ==null && $eResult==null)
{
$speech = $c.$e;
}
/////////////////////////////////////////////////////////////////////////////////////////
else
{
if ($eResult!=null){
$e=$eResult;
}
else{
    $e= "We don't have this service in this city";
$speech = $e;
}
}
//$speech = $e;
     
    ///////////////////////////////////////////////////////
     
  
    $response = new \stdClass();
    $response->fulfillmentMessages = $speech;
    $response->text = $speech;
    $response->webhookSource = "webhook";
    $u= json_encode($response);
echo $u;
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////STARTARABIC CODE/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////STARTARABIC CODE/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////STARTARABIC CODE/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////STARTARABIC CODE/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////STARTARABIC CODE/////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($lang=="1"){
	
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
if ($service==null){
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
    $response->text = $eResult;
    $response->text = $speech;
    $response->webhookSource = "webhook";
    $u= json_encode($response);
	echo $u;
}
else{
////////////////////////////////////////////////////////////////////////////////////ONLY Resettle//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
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
    
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $ch = curl_init(); 
//curl_setopt($ch, CURLOPT_URL, 'http://88.247.29.227/test.php?link=https://admin-turkey.servicesadvisor.org/en/api/v1.0/service_location?fields=serviceName%26filter[id]='.$text); 
curl_setopt($ch, CURLOPT_URL, 'http://88.247.29.227/test.php?link=https://admin-turkey.servicesadvisor.org/ar/api/v1.0/service_location?fields=serviceName,locationAlternate,hotlinePhone,publicAddress%26filter[region]='.$city.'%26filter[servicesProvided]='.$service); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
$vars = json_decode($result, true);
////////////////////////////////////////Checking Date////////////////
$varsDate = json_decode($result, true);
/////////////////////////////////////////////////////////////////////
//$speech = $result;
$items = array();
foreach ($vars['data'] as $vars)
{
/////////////////////Checking Date//////////////////////////////////	
$date = array();
foreach ($varsDate['data'] as $varsDate)
{
$date[] = $varsDate['endDate'];
}
//echo $date[0];
$snDate = explode('-', $date[0]);
if(snDate[0]!='2017'){
	
///////////////////////////////////////////////////////	
	
$items[] = $vars['serviceName'].'; '.$vars['publicAddress'].'; '.$vars['locationAlternate']['coordinates'][1].' '.$vars['locationAlternate']['coordinates'][0].'; '.$vars['hotlinePhone'];
$items=str_replace(",","-",$items);
$items=str_replace(", ","--",$items);
}
}
$e= join(', ', $items);
if($e!= null){
//$c= 'We have '.(count($items)).' Services and they are listed below : ';
$sn = explode(':', $items[0]);
$c= '????? '.(count($items)).' ????? '.$sn[0].' ??? ?????? ?? ??????? ?????, ';
$speech = $c.$e;
/////////////////////////////////////////////////EXTRA///////////////////////////////////////////////
$extra = $json->result->parameters->services_entities1;
if ($extra != null){
 $ch = curl_init(); 
//curl_setopt($ch, CURLOPT_URL, 'http://88.247.29.227/test.php?link=https://admin-turkey.servicesadvisor.org/en/api/v1.0/service_location?fields=serviceName%26filter[id]='.$text); 
curl_setopt($ch, CURLOPT_URL, 'http://88.247.29.227/test.php?link=https://admin-turkey.servicesadvisor.org/ar/api/v1.0/service_location?fields=serviceName,locationAlternate,hotlinePhone,publicAddress%26filter[region]='.$city.'%26filter[servicesProvided]='.$extra); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
$vars = json_decode($result, true);
//$speech = $result;
$items2 = array();
foreach ($vars['data'] as $vars)
{
$items2[] = $vars['serviceName'].'; '.$vars['publicAddress'].'; '.$vars['locationAlternate']['coordinates'][1].' '.$vars['locationAlternate']['coordinates'][0].'; '.$vars['hotlinePhone'];
$items=str_replace(",","-",$items);
$items=str_replace(", ","--",$items);
}
$eExtra= join(', ', $items);
$eeExtra= join(', ', $items2);
//$eExtra=','.eExtra;
$eeExtra=','.$eeExtra;
$cExtra= 'We have '.(count($items)).' '.$sn[0].' services';
$sn = explode(':', $items2[0]);
$c= ' and '.(count($items2)).' '.$sn[0].' Services and they are listed below : ,';
if ($eResult!=null){
$speech=$cExtra.$c.$eExtra.' '.$eeExtra.' and here is some explainations '.$eResult;
}
}
else
{
if ($eResult!=null){
$speech = $c.$e.' and here is some explainations '.$eResult;
}
else{
$speech = $speech=$cExtra.$c.$eExtra.' '.$eeExtra;
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
}
////////////////gfgsdgdfgfdgfdgdfgdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdf///////////////////////////////////////////////
if($e!=null && $eeExtra !=null && $eResult==null)
{
$speech=$cExtra.$c.$eExtra.' '.$eeExtra;
}
else if ($e!=null && $eeExtra ==null && $eResult==null)
{
$speech = $c.$e;
}
/////////////////////////////////////////////////////////////////////////////////////////
else
{
if ($eResult!=null){
$e=$eResult;
}
else{
    $e= "We don't have this service in this city";
$speech = $e;
}
}
//$speech = $e;
     
    ///////////////////////////////////////////////////////
     
  
    $response = new \stdClass();
    $response->text = $speech;
    $response->text = $speech;
    $response->webhookSource = "webhook";
    $u= json_encode($response);
echo $u;
}
}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////END OF ARABIC CODE/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////END OF ARABIC CODE/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////END OF ARABIC CODE/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////END OF ARABIC CODE/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////END OF ARABIC CODE/////////////////////////////////////////////////////////////////////////////////////////////////////////////
else
{
    echo "Method not allowed";
}
  
?>
