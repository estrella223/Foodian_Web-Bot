<!DOCTYPE html>
<html>
    <head>
        <title>Display MySQL Images</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        $mysqli = new mysqli('localhost:3306','root','dudgns9101','images') or die($mysqli->connect_error);
        $table = 'samyang_ramyeon';
        $table2 = 'nutrient_syr';
        
        $result = $mysqli->query("SELECT * FROM $table left join $table2 on $table.nutrient_id = $table2.id") or die($mysqli->error);
        
        while ($data = $result->fetch_assoc()){
            echo "<h2>{$data['name']}</h2>";
            echo "<img src='{$data['img_dir']}' width='40%' height='40%'>";
            echo "<h3>용량: {$data['amount']}</h3>";
            echo "<h3>칼로리: {$data['calories']}</h3>";
            echo "<h3>단백질: {$data['protein']}</h3>";
            echo "<h3>지방: {$data['fat']}</h3>";
            echo "<h3>탄수화물: {$data['carbohydrate']}</h3>";
            echo "<h3>당: {$data['sugars']}</h3>";
            echo "<h3>나트륨: {$data['natrium']}</h3>";
            echo "<h3>지방산: {$data['fatty_acid']}</h3>";
            echo "<h3>트렌스지방산: {$data['trans_fatty_acid']}</h3>";
        }
        
        ?>
    </body>

