<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/BaiKiemTra/app/asset/css/form.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
 

    
    <form method="post" action="http://localhost/BaiKiemTra/home/update">
        <?php var_dump($data["items"]);
        $items = $data["items"];
        
        ?>
        <input type="hidden" value="<?php echo$items["id"]?>" name="id"/>
        <label for ="Item Code">Item Code</label>
        <input type="text" placeholder="Enter your item code" name="item_code" value="<?php echo $items["item_code"]?>">
        <label for="Item Name">Item Name</label>
        <input type="text" placeholder="Enter your item name" name="item_name" value="<?php echo $items["item_name"]?>">
        <label for="Item Quantity" name="quantity">Quantity:</label>
        <input type="number" min="0" name="quantity" value="<?php echo $items["quantity"]?>">
        <label for="Expired Date" name="expired_date">Expired Date:</label>
        <input type="date" name="expired_date" value="<?php echo $items["expired_date"]?>">
        <label for="Note" >Note:</label>
        <input type="text" placeholder="Enter your note" name="note" value="<?php echo $items["note"]?>">
        <button type="submit" name="submit">Submit</button>
   
    </form>
</body>
</html>