


<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

<?php
global $wpdb;
global $table_prifix;
$table=$table_prifix.'form_data';

$sql = "SELECT * FROM `wordpress-project`.$table ";
$result=$wpdb->get_results($sql);
// print_r($result);
?>

<table id="customers">
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>FATHER NAME</th>
    <th>MOTHER NAME</th>
    <th>ADDRESS</th>
  </tr>

  <tr>
  <?php
       foreach($result as $list){
           ?>
           <tr>
               <td><?php echo $list->id ?></td>
               <td><?php echo $list->name ?></td>
               <td><?php echo $list->email ?></td>
               <td><?php echo $list->father ?></td>
               <td><?php echo $list->mother ?></td>
               <td><?php echo $list->address ?></td>
           </tr>
           
           <?php
       }
    ?>
  </tr>
  
</table>