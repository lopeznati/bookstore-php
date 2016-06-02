
	
<?php 

$soapclient = new SoapClient('http://www.webservicex.net/globalweather.asmx?WSDL');

$params = array(
			
			'CityName' => 'Rosario',
			'CountryName' => 'Argentina'
		);
$response = $soapclient->GetWeather($params);



echo $response->GetWeatherResult;

?>

