<? 
    include("fckeditor/fckeditor.php");

    $tb = 'projectsites';
    
// create invoice
    if (isset($_POST['submit']) && $_POST['submit'] == "create") {
        $sql = "INSERT INTO $tb SET address='{$_POST['address']}', city='{$_POST['city']}', state='{$_POST['state']}', zipcode='{$_POST['zipcode']}', code='{$_POST['code']}', map='{$_POST['map']}'";
        mysqli_query($connection, $sql);

// create user folder
        $folder_path = 'projectsites/' . $_POST['address'];
        $folder_pathA = 'projectsites/' . $_POST['address'] . '/Images';
        $folder_pathB = 'projectsites/' . $_POST['address'] . '/Receipts';

        mkdir("$folder_path", 0777);
        mkdir("$folder_pathA", 0777);
        mkdir("$folder_pathB", 0777);

        $status = 'Record created successfully';

//		header("Location: main.php?page=$tb");
    }

// update invoice
    if (isset($_POST['submit']) && $_POST['submit'] == "update") {
        
// need to check to make sure the address matches the folder directory before updating
        $check_dir = "SELECT address FROM $tb WHERE id='{$_GET['id']}'";
        $check_dir = mysqli_query($check_dir);
        list($old_address) = mysqli_fetch_row($check_dir);
// rename folder        
        if ($old_address != $_POST['address']) {
            $old_dir = 'project_sites/'.$old_address;
            $new_dir = 'project_sites/'.$_POST['address'];
            
            rename($old_dir, $new_dir);
        }
        
        $sql = "UPDATE $tb SET address='{$_POST['address']}', city='{$_POST['city']}', state='{$_POST['state']}', zipcode='{$_POST['zipcode']}', code='{$_POST['code']}', map='{$_POST['map']}' WHERE id='{$_GET['id']}'";        
        mysqli_query($connection ,$sql);

        $status = 'Record updated successfully';
        	    
//        header("Location: main.php?page=$tb");
	}
/*
// remove invoice
    if ($_GET['action'] == "delete") {
		$sql = "DELETE FROM $tb WHERE id='{$_GET['id']}'";
		mysqli_query($connection ,$sql);
		header("Location: main.php?page=$tb");
	}
*/
// update invoice
    if ($_GET['action'] != 'create') {                     
        $sql = "SELECT * FROM $tb WHERE id='{$_GET['id']}'";
    	$sql = mysqli_query($connection ,$sql);
    	extract(mysqli_fetch_assoc($sql));
    }
?>
                            
                            <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <form action="" method="post">
                                    <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                        <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                            <tr>
                                                <td style="background: inherit; color: #7e7878; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
<?// if ($status) { ?>
<!--                                                        <tr>-->
<!--                                                            <td colspan="4" style="background: inherit; color: #FA1706; font-weight: bold; width: 940px; height: 50px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">-->
<!--                                                                <div style="width: 940px; padding: 0px 0px 0px 0px; text-align: center;">--><?//= $status; ?><!--</div>-->
<!--                                                            </td>-->
<!--                                                        </tr>-->
<?// } ?><!--                                                        -->
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Address</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="address" value="<?= isset($address) ? $address : "" ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                            <td rowspan="5" style="background: inherit; color: inherit; width: 111px; vertical-align: middle; border: 0px; padding: 0px 0px 0px 0px; margin: 0px auto;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="submit" style="width: 80px; height: 121px;" name="submit" value="<?= $_GET['action']; ?>" id="<?= $_GET['action']; ?>">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">City</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="city" value="<?= isset($city) ? $city : "" ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">State</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="state" value="<?= isset($state) ? $state : "" ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Zipcode</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="zipcode" value="<?= isset($zipcode) ? $zipcode : "" ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">BoxCode</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="code" value="<?= isset($code) ? $code : "" ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Map Link</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="map" value="<?= isset($map) ? $map : "" ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            </td>