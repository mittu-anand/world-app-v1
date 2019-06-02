<?php
 header("Access-Control-Allow-Origin: *");
$pdo = new PDO('mysql:host=mysql;dbname=popular_culture;charset=utf8', 'root', 'root');

$stmt = $pdo->prepare("
select name,country,description,area_expertise,continent from popular_culture limit 0,25
");
$stmt->execute();
$foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
$html="<h2>List of popular cultures in the world</h2><span> Fetched from cultures-api microservice interface</span>";
$html.="  <table class='table-responsive table table-striped' style='margin-top:20px'>
    <thead>
        <tr>
            <th>Culture</th>
            <th>Country</th>
            <th>Description</th>
            <th>Category</th>
        </tr>
    </thead><tbody>";
foreach($foods as $data){
        $html.="<tr> <td>".$data['name']."</td><td>".$data['country']."</td><td>".$data['description']."</td><td>".$data['area_expertise']."</td></tr>";
}
$html.="</tbody>
        </table>";
echo $html;
?>
