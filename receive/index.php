<start>
<?php
/*
if(!isset($_SESSION) ||
    empty($_SESSION) ||
    session_status() == PHP_SESSION_NONE ||
    session_id() == '') die();
*/
?>

<table style="width: 100%">
<tr>
<td style="width: 50%; vertical-align: top">

      <table style="width: 100%; border-style: groove"><tr><td style="vertical-align: top">

        <tr><td>&nbsp;</td><td><b>Use this form to request payments. All fields are <b>optional.</b></td></tr>
        <tr><td>Label:</td><td><input type="text" id="label" name="label"></td></tr>
        <tr><td>Amount:</td><td><input type="text" id="amount" name="amount">
              <input type="number" id="per_kilobyte" name="per_kilobyte" step="100000" min="100000" max="9999999999999999">
              <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">Generate native segwit (Bech32) address
          </td></tr>
        <tr><td>Message:</td><td><input type="text" id="message" name="message"></td></tr>
         <tr><td>&nbsp;</td><td><nobr><button type="button">Create a new receiving address</button>&nbsp;<button type="button">Clear</button></nobr></td></tr>


      </table>

</td>
</tr>
</table>

<table style="width: 100%">
<tr>
<td style="width: 50%; vertical-align: top">

            <table style="width: 100%; border-style: groove"><tr><td style="vertical-align: top"><tr><td>

              <p><b>Requested payments history</b></p>


                <!--Generate a table-->

                <table>
                  <tr><td>1 - generate table based on data</td><td>2</td><td>3</td><td>4</td></tr>
                </table>


          </td></tr>

          <tr><td><nobr><button type="button">Show</button>&nbsp;<button type="button">Remove</button></nobr></td></tr>


        </table>

</td>
</tr>
</table>
