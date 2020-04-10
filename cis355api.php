<?php

main();

function main () {
	
	$apiCall = 'https://api.covid19api.com/summary';
 
	//$json_string = curl_get_contents($apiCall);
	//manual top ten countries to work on program
	$json_string = '{"Global":{"NewConfirmed":84178,"TotalConfirmed":1594124,"NewDeaths":7117,"TotalDeaths":95434,"NewRecovered":25346,"TotalRecovered":353291},
	"Countries":[
	{"Country":"ALA Aland Islands","CountryCode":"AX","Slug":"ala-aland-islands","NewConfirmed":0,"TotalConfirmed":0,"NewDeaths":0,"TotalDeaths":0,"NewRecovered":0,"TotalRecovered":0,"Date":"2020-04-10T00:43:16Z"},
	{"Country":"Afghanistan","CountryCode":"AF","Slug":"afghanistan","NewConfirmed":40,"TotalConfirmed":484,"NewDeaths":1,"TotalDeaths":15,"NewRecovered":3,"TotalRecovered":32,"Date":"2020-04-10T00:43:16Z"},
	{"Country":"Albania","CountryCode":"AL","Slug":"albania","NewConfirmed":9,"TotalConfirmed":409,"NewDeaths":1,"TotalDeaths":23,"NewRecovered":11,"TotalRecovered":165,"Date":"2020-04-10T00:43:16Z"},
	{"Country":"Algeria","CountryCode":"DZ","Slug":"algeria","NewConfirmed":94,"TotalConfirmed":1666,"NewDeaths":30,"TotalDeaths":235,"NewRecovered":110,"TotalRecovered":347,"Date":"2020-04-10T00:43:16Z"},
	{"Country":"American Samoa","CountryCode":"AS","Slug":"american-samoa","NewConfirmed":0,"TotalConfirmed":0,"NewDeaths":0,"TotalDeaths":0,"NewRecovered":0,"TotalRecovered":0,"Date":"2020-04-10T00:43:16Z"},
	{"Country":"Andorra","CountryCode":"AD","Slug":"andorra","NewConfirmed":19,"TotalConfirmed":583,"NewDeaths":2,"TotalDeaths":25,"NewRecovered":6,"TotalRecovered":58,"Date":"2020-04-10T00:43:16Z"},
	{"Country":"Angola","CountryCode":"AO","Slug":"angola","NewConfirmed":0,"TotalConfirmed":19,"NewDeaths":0,"TotalDeaths":2,"NewRecovered":0,"TotalRecovered":2,"Date":"2020-04-10T00:43:16Z"},
	{"Country":"Anguilla","CountryCode":"AI","Slug":"anguilla","NewConfirmed":0,"TotalConfirmed":0,"NewDeaths":0,"TotalDeaths":0,"NewRecovered":0,"TotalRecovered":0,"Date":"2020-04-10T00:43:16Z"},
	{"Country":"Antarctica","CountryCode":"AQ","Slug":"antarctica","NewConfirmed":0,"TotalConfirmed":0,"NewDeaths":0,"TotalDeaths":0,"NewRecovered":0,"TotalRecovered":0,"Date":"2020-04-10T00:43:16Z"},
	{"Country":"Antigua and Barbuda","CountryCode":"AG","Slug":"antigua-and-barbuda","NewConfirmed":0,"TotalConfirmed":19,"NewDeaths":0,"TotalDeaths":2,"NewRecovered":0,"TotalRecovered":0,"Date":"2020-04-10T00:43:16Z"}]}';
	$obj = json_decode($json_string);
	 
	//create array of top ten countries
	for($i=0;$i<10;$i++){
	    $count = $i+1;
	    ${"C$count"} = $obj->Countries[$i]->Country;
	    $countryArray[${"C$count"}] = $obj->Countries[$i]->TotalConfirmed;
	}
	//sort array
	arsort($countryArray);

	// echo html head section
	echo '<html>';
	echo '<head>';
	echo '	';
	echo '</head>';
	
	// open html body section
	echo '<body onload="loadDoc()">';
	echo '<table style="width:25%">';
    echo'<tr>';
    echo '<th>Country Name</th>';
    echo '<th>Total Cases</th>';
    echo '</tr>';
    foreach($countryArray as $name => $name_value){
	    echo '<tr>';
	    echo '<td>';
	    echo $name;
	    echo '</td>';
	    echo '<td>';
	    echo $name_value;
	    echo '</td>';
	    echo '</tr>';
	}
    
	echo '</table>';
	
	
	
	
	echo '<div id="demo">';
	echo '</div>';
	// close html body section
	echo '</body>';
	echo '</html>';
}

// read data from a URL into a string
function curl_get_contents($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
?>

