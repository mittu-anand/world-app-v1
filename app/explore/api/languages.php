<?php
$pdo = new PDO('mysql:host=mysql;dbname=world;charset=utf8', 'root', 'root');

$stmt = $pdo->prepare("
select countrylanguage.Language,country.Name as Country,countrylanguage.Percentage
    from countrylanguage
    left join country on countrylanguage.CountryCode = country.Code
    order by Percentage desc
    limit 10
");
$stmt->execute();
$languages= $stmt->fetchAll(PDO::FETCH_ASSOC);
$html="<h2>List of languages in the world</h2><span> Fetched from common microservice interface</span>";
$html.="  <table class='table-responsive table table-striped' style='margin-top:20px'>
    <thead>
        <tr>
            <th>Country</th>
            <th>Language</th>
            <th>Percentage</th>
        </tr>
    </thead><tbody>";
foreach($languages as $country){
	$html.="<tr> <td>".$country['Country']."</td><td>".$country['Language']."</td><td>".$country['Percentage']."</td></td>";
}
$html.="</tbody>
	</table>";
echo $html;
?>
