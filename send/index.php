<start>
<?php

//if(!isset($_SESSION) ||
//    empty($_SESSION) ||
//    session_status() == PHP_SESSION_NONE ||
//    session_id() == '') die();

?>

<table style="width: 100%">
<tr><td style="width: 100%; border-style: groove">


<form action="send_submit.php">

    <div id="main">
        <input type="button" id="btAdd" value="Add Element" class="bt" />
        <input type="button" id="btRemove" value="Remove Element" class="bt" />

	<input type="button" id="btRemoveAll" value="Remove All" class="bt" />

	<input type="submit" value=" Send ">

    </div>



<div id="sex">

 <h1>#1</h1>

	<table style="width: 100%; border: 0"><tr><td style="vertical-align: top"><tr><td>

				<table style="width: 100%; border: 0">

					<tr>
						<td style="padding: 10px"><label for="payto" style="all: revert">Pay To:</label></td>
						<td><nobr><input type="text" id="payto" name="payto" style="all: revert; width: 92%"><input type="button" id="use_avail_balance" value="O" class="use_avail_balance" /><input type="button" id="use_avail_balance" value="+" class="use_avail_balance" /><input type="button" id="use_avail_balance" value="x" class="use_avail_balance" /></nobr></td>


					</tr>
					<tr>
						<td style="padding: 10px"><label for="label" style="all: revert">Label:</label></td>
						<td><input type="text" id="label" name="label" style="all: revert; width: 100%"></td>
					</tr>
					<tr>
						<td style="padding: 10px"><label for="label" style="all: revert">Amount:</label></td>
						<td><input type="text" id="label" name="label" style="all: revert"> <select name="denom_coin" id="denom_coin">
															<option value="1">Satoshi (sat)</option>
															<option value="2">uBTC (bits)</option>
															<option value="3">mBTC</option>
															<option value="4">BTC</option>
														</select>
		<nobr><input type="checkbox" id="subtract_fee" name="subtract_fee" value="subtract_fee" style="all: revert">
		<label for="subtract_fee" style="all: revert"> Subtract fee from amount</label><span style="margin-left: 100px"><input type="button" id="use_avail_balance" value="Use available balance" class="use_avail_balance" /></span></nobr>
				</td>
					</tr>
				</table>

	</td></tr></table>

</div>

</td></tr>


	<tr><td style="width: 100%; border-style: groove">

		<p><b>Transaction Fee:</b></p>

		<table>
		<tr><td style="vertical-align: top">
		<input type="radio" id="recommended" name="fees" value="recommended" style="all: revert">
		<label for="recommended"  style="all: revert">Recommended</label>
		</td><td style="padding-bottom: 10px">

			<p>1009 sat/kB Estimated begin confirmation within 6 blocks.</p>
			<p>Confirmation time target:
							<select name="confirmation_time_target" id="confirmation_time_target">
							<option value="20">20 minutes (2 blocks)</option>
							<option value="40">40 minutes (4 blocks)</option>
							<option value="60">60 minutes (6 blocks)</option>
							<option value="2">2 hours (12 blocks)</option>
							<option value="4">4 hours (24 blocks)</option>
							<option value="8">8 hours (48 blocks)</option>
							<option value="24">24 hours (144 bocks)</option>
							<option value="3">3 days (504 blocks)</option>
							<option value="7">7 days (1008 blocks)</option>
							</select>
			</p>

		</td></tr>
		<tr><td style="width: 200px; vertical-align: top">
  		<input type="radio" id="custom" name="fees" value="customer" style="all: revert">
  		<label for="custom" style="all: revert">Custom:</label><br>
		</td><td>

			<p><label for="per_kilobyte" style="all: revert">per kilobyte </label><input type="number" id="per_kilobyte" name="per_kilobyte" min="1000" max="9999999999999999"> <select name="fee_denom" id="fee_denom">
							<option value="1">Satoshi (sat)</option>
							<option value="2">uBTC (bits)</option>
							<option value="3">mBTC</option>
							<option value="4">BTC</option>
							</select></p>
			<p style="font-size: 12px">A too low fee may result in a never confirming transaction. When there is less transaction volume than space in the blocks, miners as well as relaying nodes may enforce a minimum fee. Paying only this minimum fee is just fine, but be aware that this can result in a never confirming transaction once there is more demand for bitcoin transactions that the network can process.</p>


		</td></tr>
		<tr><td>
		<input type="checkbox" id="replace_by_fee" name="replace_by_fee" value="replace_by_fee" style="all: revert">
		<label for="replace_by_fee" style="all: revert"> Enable Replace-By-Fee</label><br>
		</td></tr>
		</table>

	</td></tr>
</table>

  <input type="submit" value="Double Check Send">
</form>


<!--
<h1>Trusted Users</h1>

Vicinity Payments, automatic and manual payments over wifi or bluetooth, not by scanning cards but over a device.

Enter the Username and public key of freqent user and the payment will automatically occur. Such as with supermarkets. The payment data is sent to terminals, terminas looks up to see if the person is a trusted user and makes the payment automatically.

When your phone gets close to a trusted user, within bluetooth range or wifi range and a request is sent to your phone the payment automatically occurs.

Basically a chat application, with send and recieve.

Parties recieve an approved notification.

No QR code is needed. It works by the protocol and the pre-approved creditials you have specified.

<h1>Untrusted Users</h1>

Manually verification of payment, one off payees and other users that may not refund if an error occurs. The payee must manually send and the payer must mannually approve. The two parties must speak and verify each others creditals such as a temporary pin.

<h1>Scheduled Payments</h1>

Automatic payments.
-->
