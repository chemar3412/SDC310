<?php
    require_once('../controller/products_controller.php');
    $products_arr = get_products();
?>

<style>
    table{
        border-spacing: 5px;
    }
    table, th,td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th,td{
        padding:15px;
        text-align: center;
    }
    th{
        background-color: lightskyblue;
    }
    tr:nth-child(even) {
        background-color: whitesmoke;
    }
    tr:nth-chile(odd){
        background-color: lightgray;
    }
</style>

<html>
    <head>
        <title>Week 4 Performance Assessment - Chelsea Martin</title>
        </head>
        
        <body>
            <h2>Products:</h2>
            <table>
                <tr style = "font-size: large;">
                    <th>ProductNo </th>
                    <th>Name</th>
                    <th>Type</th>
                    </tr>
                    
                    <?php foreach ($products_arr as $products):;?>
                        <tr>
                            <td><?php echo $products["ProductNo"];?></td>
                            <td><?php echo $products["Name"];?></td>
                            <td><?php echo $products["Type"];?></td>
                        </tr>
                <?php endforeach;?>
            </table>
        </body>
</html>