<?php
 header("Access-Control-Allow-Origin: *");
$pdo = new PDO('mysql:host=mysql;dbname=food;charset=utf8', 'root', 'root');

$stmt = $pdo->prepare("
select name,country,description,image from popular_foods limit 0,25
");
$stmt->execute();
$foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
$html="<h2>List of popular foods in the world</h2><span> Fetched from foods-api microservice interface</span>";
$html.="  <table class='table-responsive table table-striped' style='margin-top:20px'>
    <thead>
        <tr>
            <th>Dish</th>
            <th>Country</th>
            <th>Description</th>
            <th>Image</th>
        </tr>
    </thead><tbody>";
foreach($foods as $data){
        $html.="<tr> <td>".$data['name']."</td><td>".$data['country']."</td><td>".$data['description']."</td><td>".$data['image']."</td></tr>";
}
$html.="</tbody>
        </table>";
echo $html;
?>
