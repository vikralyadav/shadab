<?php

include 'moduls/header.php';
echo "<h2>Errors? Suggestion? Ideas? Tell Us!</h2><form name='form' method='post' action='smail.php'>
<table width='400' border='0' cellspacing='2' cellpadding='2'>
  <tr>
    <td width='200' valign='top' align='right'>Your Name: </td>
    <td width='200' valign='top' align='left'>
      <input type='text' name='name' size='25' maxlength='200' />
    </td>
  </tr><tr>
    <td width='200' valign='top' align='right'>Your Email: </td>
    <td width='200' valign='top' align='left'>
      <input type='text' name='email' size='25' maxlength='100' />
    </td>
  </tr><tr>
    <td width='200' valign='top' align='right'>Your Comments: </td>
    <td width='200' valign='top' align='left'>
      <textarea name='msg' cols='25' rows='4'></textarea>
    </td>
  </tr><tr>
    <td width='200' valign='top'> </td>
    <td width='200' valign='top' align='left'>
      
      <input type='submit' name='Submit' value='Submit' />
<input type='reset' name='Reset' value='Reset' />
    </td>
  </tr>
</table>
</form>


</body>
</html>";
?>