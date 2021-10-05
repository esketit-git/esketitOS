<?php

//if(!isset($_SESSION) ||
//    empty($_SESSION) ||
//    session_status() == PHP_SESSION_NONE ||
//    session_id() == '') die();

?>

<table style="width: 100%">
<tr>
<td style="width: 50%; vertical-align: top">


	<table style="width: 100%; border-style: groove"><tr><td style="vertical-align: top"><tr><td>

				<table style="width: 100%">

					<tr><td style="padding: 10px">
            <select name="cars" id="cars">
              <option value="volvo">All</option>
              <option value="saab">Today</option>
              <option value="mercedes">This week</option>
              <option value="audi">This month</option>
              <option value="saab">Last month</option>
              <option value="mercedes">This week</option>
              <option value="audi">This year</option>
              <option value="audi">Range</option>
            </select>
            <select name="cars" id="cars">
              <option value="volvo">All</option>
              <option value="saab">Received with</option>
              <option value="mercedes">Sent to</option>
              <option value="audi">To yourself</option>
              <option value="mercedes">Mined</option>
              <option value="audi">Other</option>
            </select>
            <input type="text" id="search" name="search" style="width: 60%" placeholder="Enter address, transaction id, or label to search">
            <input type="text" id="search" name="search" style="width: 10%" placeholder="Min amount">
          </td></tr>

					<tr><td style="padding: 10px">Generate a table</td></tr>

				</table>

           <input type="submit" value="Export">

	</td></tr></table>
</td>
</tr>
</table>
