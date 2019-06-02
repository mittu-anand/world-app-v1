<?php
$pdo = new PDO('mysql:host=mysql;dbname=world;charset=utf8', 'root', 'root');

$stmt = $pdo->prepare("
    select city.Name, city.District, country.Name as Country, city.Population
    from city
    left join country on city.CountryCode = country.Code
    order by Population desc
    limit 10
");
$stmt->execute();
$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
$html="<h2>List of cities in the world</h2><span> Fetched from common microservice interface</span>";
$html.="  <table class='table-responsive table table-striped' style='margin-top:20px'>
    <thead>
        <tr>
            <th>City</th>
            <th>Country</th>
            <th>Population</th>
        </tr>
    </thead><tbody>";
foreach($cities as $country){
	$html.="<tr> <td>".$country['Name']."</td><td>".$country['Country']."</td><td>".$country['Population']."</td></tr>";
}
$html.="</tbody>
	</table>";
echo $html;
?>
