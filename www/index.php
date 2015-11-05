<style type="text/css">
.text-process {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #FFF;
}
.footer-text {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
	color: #666;
}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #000;
}
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="31" align="center" valign="top" bgcolor="#000000"><p><br />      
        <br />
        <img src="logo.png" width="318" height="111" /></p>
      <p><br />
        <br />
    </p></td>
  </tr>
  <tr>
    <td height="69"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      
     
      <tr>
        <td height="45" align="center" valign="middle"><table width="100%" border="0" align="center" cellpadding="15" cellspacing="0" bgcolor="#111111">
          
          <tr>
            <td width="9%" align="left" valign="middle"><img src="1.png" width="100%"/></td>
            <td width="27%" align="left" valign="middle" class="text-process"><p>- Open Excel File.<br />
              - Insert Image URL in First Column. <br />
              - Save &amp; Close Excel.</p></td>
            <td width="9%" align="left" valign="middle"><img src="2.png" width="100%" /></td>
            <td width="27%" class="text-process"><p>- Click On 'Downlaod' Button. <br />
              - Wait till Complete Message.</p></td>
            <td width="9%" align="left" valign="middle"><img src="3.png" width="100%" /></td>
            <td width="27%" align="left" valign="middle" class="text-process"><p>- Open Image Folder<br />
              - Copy Downloaded Images.</p></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="147" align="center" valign="middle" bgcolor="#000000">
        
        
        <?php
if(isset($_GET['act'])!="")
{
$act=$_GET['act'];

ini_set('max_execution_time', 3600);

//ini_set("display_errors",1);
require_once 'excel_reader2.php';
//require_once 'db.php';

$data = new Spreadsheet_Excel_Reader("example.xls");



echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";

$html="<table border='1'>";
for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{	
	if(count($data->sheets[$i][cells])>0) // checking sheet not empty
	{
		echo "Sheet $i:<br /><br />Total rows in sheet $i  ".count($data->sheets[$i][cells])."<br />";
		for($j=1;$j<=count($data->sheets[$i][cells]);$j++) // loop used to get each row of the sheet
		{ 
			$html.="<tr>";
			for($k=1;$k<=count($data->sheets[$i][cells][$j]);$k++) // This loop is created to get data in a table format.
			{
				$html.="<td>";
				$html.=$data->sheets[$i][cells][$j][$k];
				$html.="</td>";
			}
			$data->sheets[$i][cells][$j][1];
			
			$name = $data->sheets[$i][cells][$j][1];
	
			$filenameIn  = $name;
$filenameOut = __DIR__ . '/images/' . basename($name);

$contentOrFalseOnFailure   = file_get_contents($filenameIn);
$byteCountOrFalseOnFailure = file_put_contents($filenameOut, $contentOrFalseOnFailure);




			$html.="</tr>";
		}
		
	}
	
}

$html.="</table>";
echo $html;
echo "<br />Data Downloaded!";



} // main If Close Here
?>
        
        
        
        
        </td>
      </tr>
      <tr>
        <td height="32" align="center" valign="middle" bgcolor="#000000"><form id="form1" name="form1" method="post" action="index.php?act=download">
          <input type="image" name="submit" src="/download.png" border="0" alt="Submit" />
        </form></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="64" bgcolor="#000000"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="50" align="right" valign="middle" bgcolor="#141414" class="footer-text">Developed by: Vipul Rai ( Comic Con India )&nbsp;&nbsp;</td>
  </tr>
</table>
