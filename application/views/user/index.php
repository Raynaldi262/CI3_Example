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
                <th scope="col">created_at</th>
                <th scope="col">deleted_at</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user) : ?>
            <tr>
                <td><?php echo $user->id ?></td>
                <td><?php echo $user->name ?></td>
                <td><?php echo $user->created_at ?></td>
                <td><?php echo $user->deleted_at ?></td>
                <td><button type="submit" class="btn btn-primary"><?php echo anchor($uri = base_url('/detail/'.$user->id)) ?></button></td> 
                <!-- <td><button type="submit" class="btn btn-primary"><?php echo anchor($uri = base_url('/user/detail/'.$user->id)) ?></button></td>  ini tanpa router --> 
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <?php echo validation_errors(); 
    $hidden = array('created_at' => time()); ?>

    <?php echo form_open('user/create' , '', $hidden); ?>
        <label for="name">Name</label>
        <input type="text" name="name" /><br />     
        <input type="submit" name="submit" value="add user" />
    </form>
</body>
</html>