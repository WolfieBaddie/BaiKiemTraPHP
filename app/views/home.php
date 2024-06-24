<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/BaiKiemTra/app/asset/css/layout.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
    <h1>Sale Items</h1>
    <button><a href="http://localhost/BaiKiemTra/app/views/layouts/add-form.php">Add New</a></button>
    <table>
        <tbody>
            <?php $items = $data["items"];
                foreach($items as $item)
                {
            ?>
            <tr>
                <th>Id</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Expired Date</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
            <tr style="text-align: center; color: black; font-size: 14px;">
                <td><?php echo $item["id"]?></td>
                <td><?php echo $item["item_code"]?></td>
                <td><?php echo $item["item_name"]?></td>
                <td><?php echo $item["quantity"]?></td>
                <td><?php echo $item["expired_date"]?></td>
                <td><?php echo $item["note"]?></td>
                <td><a href="http://localhost/BaiKiemTra/home/edit?id=<?php echo $item["id"]?>">Edit</a>
                ||<a href="http://localhost/BaiKiemTra/home/delete?id=<?php echo $item["id"]?>">Delete</a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    
</body>
</html>