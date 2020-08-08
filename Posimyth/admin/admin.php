<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>

<table class="table" id="table">
  <thead>
    <tr>
      <th scope="col">Select</th>
      <th scope="col">SL.NO</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Email</th>
      <th scope="col">Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        global $wpdb;
        $data = $wpdb->prefix.'posimyth';
        $result = $wpdb->get_results("SELECT * FROM $data");
        foreach ( $result as $print ) {
    ?>
    <tr class="">
      <th scope="row"><input type="checkbox" class="check" id="check" name="" value="<?php echo $print->id; ?>"></th>
      <td><?php echo $print->id; ?></td>
      <td><?php echo $print->First_name; ?></td>
      <td><?php echo $print->Last_name; ?></td>
      <td><?php echo $print->Email; ?></td>
      <td><?php echo $print->Number; ?></td>
      <td><button class="Edit_button btn btn-secondary" id="Edit_button" value="<?php echo $print->id; ?>">Edit</button>
          <button class="btn btn-secondary save" id="save" value="<?php echo $print->id; ?>">Save</button></td>
    </tr>
    <tr class="tr<?php echo $print->id; ?>" id="tr<?php echo $print->id; ?>" style="display:none;">
    <td></td><td></td>
    <td><input type="text" id="fname<?php echo $print->id; ?>" class="<?php echo $print->id; ?>"></td>
    <td><input type="text" id="last<?php echo $print->id; ?>" class="<?php echo $print->id; ?>"></td>
    <td><input type="text" id="email<?php echo $print->id; ?>" class="<?php echo $print->id; ?>"> </td>
    <td><input type="number" id="number<?php echo $print->id; ?>" class="<?php echo $print->id; ?>"></td>
    <td></td>
    </tr>
        <?php } ?>
  </tbody>
</table>

<button class="btn btn-danger" name="delete" id="delete">Delete</button>
    <div class="container mt-3">
    <div class="row">
        <div class="col-sm-2 col-md-2">
        <input type="text" name="fname" id="fname" placeholder="FirstName" maxlength="10">
        </div>
        <div class="col-sm-2 col-md-2">
            <input type="text" name="lname" id="lname" placeholder="LastName" maxlength="30">
        </div>
        <div class="col-sm-2 col-md-2">
            <input type="text" name="email" id="email" placeholder="Email" maxlength="50">
        </div>
        <div class="col-sm-2 col-md-2">
            <input type="number" name="num" id="num" placeholder="Number">
        </div>
        <div class="col-sm-4 col-md-4 print">
        </div>
    </div>
    <div class="row mt-3">
        <button class="btn btn-primary" id="addrow">ADD ROW</button>
    </div>
    </div>
