<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
    <h1> <?php echo $title ?> </h1> 
    <table>
        <thead>            
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">qty</th>
                <th scope="col">brand</th>
                <th scope="col">created_at</th>  
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product) : ?>
            <tr>
                <td><?php echo $product->id ?></td>
                <td><?php echo $product->name ?></td>
                <td><?php echo $product->qty ?></td>
                <td><?php echo $product->brand ?></td>
                <td><?php echo date("j-n-Y",$product->created_at) ?></td>
               
			</tr>
            <?php endforeach;?>
        </tbody>
    </table>
 
    <?php $hidden = array('created_at' => time()); ?>

    <?php echo form_open_multipart('product/add_product', "", $hidden ); ?>
        <label for="name">Name</label>
        <?php echo form_error('name'); ?>
        <input type="text" name="name" value="<?php echo set_value('name'); ?> "/><br />   

        <?php echo form_error('qty'); ?>
        <label for="qty">Qty</label>
        <input type="number" name="qty" value="<?php echo set_value('qty'); ?>" /><br />   

        <?php echo form_error('brand'); ?>
        <label for="brand">Brand</label>
        <input type="text" name="brand" value="<?php echo set_value('brand'); ?>" /><br />     

        <?php echo form_error('img'); ?>
        <label for="img">Img</label>
        <input type="file" name="img" size="200" /><br />     
        <input type="submit" name="submit" value="add product" />
    </form>
</body>
</html>
