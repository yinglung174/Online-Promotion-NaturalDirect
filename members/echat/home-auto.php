<html>
    <head>
    </head>
    <body>
        <?php include_once '../../includes/db_connection.php'; ?>
        <?php
        include("connect.php");

        $show = mysql_query("SELECT user.name,chattb.chatbody,chattb.chatdate,user.userID,user.username,chattb.date FROM user INNER JOIN chattb ON user.userID = chattb.userID ORDER BY chattb.chatid ASC LIMIT 50");

        $cur_bg = "skyblue";
        $cur_txt = "white";

        while ($row = mysql_fetch_array($show)) {

            $No = $row[3];


            //$getclr = mysql_query("SELECT colortb.colorbg,colortb.colortxt FROM colortb INNER JOIN userstb ON colortb.username = colortb.username WHERE userstb.username = '$cur_user' ORDER BY colortb.colorid DESC");
            $getclr = mysql_query("SELECT colortb.colorbg,colortb.colortxt FROM colortb WHERE colortb.userID = '$No' ");

            while ($val = mysql_fetch_array($getclr)) {
                $cur_bg = $val[0];
                $cur_txt = $val[1];
            }

            if ($row[0] == $name) {
                echo "
						<br/>
						<table style='margin-top:-20px; width:80%;' align='right'>
							<tr>
								<td width='10%' style='text-align:left; font-size:9px;'>" . $row[2] . "<br>" . $row[5] . "</td>
								<td width='75%'><div class='item-x' style='font-family:Comic Sans MS; color:" . $cur_txt . "; background: " . "$cur_bg" . "'><p>" . $row[1] . "</p></div></td>
								<td class='names' width='15%' style='text-align:left; font-family:Comic Sans MS; color:" . $cur_txt . "; '>" . $row[0] . "</td>
							</tr>
						</table>
						";
            } else {

                echo "
						
						<table style='margin-top:-20px; width:80%;' align='left'>
							<tr>
								<td class='names' width='15%' style='text-align:right; font-family:Comic Sans MS; color:" . $cur_txt . "; '>" . $row[0] . ":</td>
								<td width='75%'><div class='item' style='font-family:Comic Sans MS; color:" . $cur_txt . "; background: " . $cur_bg . "'>&nbsp;" . $row[1] . "</div></td>
								<td width='10%' style='text-align:right; font-size:9px;'>" . $row[2] . "<br>" . $row[5] . "</td>
							</tr>
						</table>
						";
            }
        }
        ?>

    </body>
</html>

<style>
    .names
    {
        padding-top:5px;
    }

    body
    {
        background:black;
        color:white;
    }

    .item
    {

        text-align:left;

        max-width:95%;
        min-width:95%;
        min-height:30px;
        margin-top:17px;
        padding:5px;
        padding-top:-10px;
        border-radius:5px;
    }

    .item-x
    {

        text-align:right;
        position:right;
        max-width:95%;
        min-width:95%;
        min-height:30px;
        margin-top:17px;
        padding:5px;
        padding-top:-10px;
        border-radius:5px;
    }

    .item2
    {
        color:white;
        text-align:left;
        background:purple;
        max-width:95%;
        min-width:95%;
        min-height:30px;
        margin-top:17px;
        padding:5px;
        border-radius:5px;
    }
</style>