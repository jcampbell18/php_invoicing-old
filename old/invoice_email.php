<?
   	include("common/author.php");
    
    $sql = "SELECT * FROM invoice WHERE id='{$_GET['id']}'";
    $sql = mysqli_query($connection, $sql);
	extract(mysqli_fetch_assoc($sql));
    
    if ($id >= 10) {
		      if ($id <= 99) {
	       		  $inv = '00'.$id;		          
		      } else {
		          $inv = '0'.$id;
		      }
		} else if ($id <= 9) {
			$inv = '000'.$id;
        }
        
    $date_start = explode("-", $date_start);
    $sdate = $date_start[1].'-'.$date_start[2].'-'.$date_start[0];
    
    $sqlA = "SELECT c.contact_name,c.business_name,c.address,c.city,c.state,c.zipcode,c.phone,p.address,p.city,p.state,p.zipcode,s.name,t.name FROM client c, project_site p, sku s, terms t WHERE p.id='$project_id' AND c.id='$client_id' AND s.id='$sku_id' AND t.id='$term_id'";
    $sqlA = mysqli_query($connection, $sqlA);
	list($c_contact_name,$c_business_name,$c_address,$c_city,$c_state,$c_zipcode,$c_phone,$p_address,$p_city,$p_state,$p_zipcode,$s_name,$t_name) = mysqli_fetch_row($sqlA);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
  <title>DocJas | www.docjas.com</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link href="global.css" rel="stylesheet" type="text/css">
</head>

<body style="background: #ffffff; color: #000000;">

    <table style="width: 700px;">
        <tr>
            <td colspan="2" style="padding: 0px 24px 0px 0px; vertical-align: middle; text-align: right;">
                <input type="button" onclick="window.print()" value="PRINT"/>
            </td>
        </tr>
        <tr>
            <td style="padding: 24px 24px 48px 0px; vertical-align: middle; text-align: left;">
                <?= $c_contact_name ?> w/<br />
                <b><?= $c_business_name ?></b><br />
                <?= $c_address ?><br />
                <?= $c_city.', '.$c_state.', '.$c_zipcode ?><br />
                <?= $c_phone ?>
            </td>
            <td style="padding: 24px 24px 48px 0px; vertical-align: middle; text-align: right;">
                Jason L Campbell<br />
                7925 N Scott Rd.<br />
                Spokane, WA 99216<br />
                (509) 217-8893<br />
                jcryuu@gmail.com
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: left;">
                <b>Invoice #:</b>&nbsp;
                <?= $inv ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: left;">
                <b>Date:</b>&nbsp;
                <?= $sdate ?>
            </td>
        </tr>
        <tr>
<?
    if ($paid == 0) {
?>
            <td colspan="2" style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: left;">
                <b>Location:</b><br />
                <blockquote>
                    <?= $p_address ?><br />    
                    <?= $p_city.', '.$p_state.', '.$p_zipcode ?>
                </blockquote>
            </td>
<?
    } else {
?>
            <td style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: left;">
                <b>Location:</b><br />
                <blockquote>
                    <?= $p_address ?><br />    
                    <?= $p_city.', '.$p_state.', '.$p_zipcode ?>
                </blockquote>
            </td>
            <td style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: middle; color: #FF0000; font-size: 28px; font-weight: bold;">
                <table style="border: 3px #FF0000 solid;">
                    <tr>
                        <td style="padding: 4px;">PAID</td>
                    </tr>
                </table>
            </td>
<?
    }
?>
        </tr>
        <tr>
            <td colspan="2" style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: left;">
                <b>Type of Work Performed:</b>&nbsp;
                <blockquote>
                    <?= $s_name ?>
                </blockquote>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: left;">
                <b>Work details:</b><br />
                <blockquote>
                    <?= $description ?>
                </blockquote>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: right;">
                <b>Total:</b>&nbsp;
                $<?= $amount ?>
            </td>
        </tr>
<? /*  */ ?>
        <tr>
            <td colspan="2" style="padding: 20px 24px 12px 0px; vertical-align: middle; text-align: left; font-size: 10px;">
                <b>Terms:</b>&nbsp;
                <?= $t_name ?>
            </td>
        </tr>

    </table>

</body>
</html>