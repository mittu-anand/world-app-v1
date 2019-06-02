<?php
$pdo = new PDO('mysql:host=mysql;dbname=world;charset=utf8', 'root', 'root');

$stmt = $pdo->prepare("
select Name,Continent,Region,Population from country limit 0,25
");
$stmt->execute();
$countries = $stmt->fetchAll(PDO::FETCH_ASSOC);
$html="<h2>List of countries in the world</h2><span> Fetched from common microservice interface</span>";
$html.="  <table class='table-responsive table table-striped' style='margin-top:20px'>
    <thead>
        <tr>
            <th>Country</th>
            <th>Continent</th>
            <th>Region</th>
            <th>Population</th>
        </tr>
    </thead><tbody>";
foreach($countries as $country){
	$html.="<tr> <td>".$country['Name']."</td><td>".$country['Continent']."</td><td>".$country['Region']."</td><td>".$country['Population']."</td></tr>";
}
$html.="</tbody>
	</table>";
echo $html;
?>
