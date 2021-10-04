/* Generate forms for send */

  $(document).ready(function() {

        var iCnt = 0;
        /* CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.*/
        var container = $(document.createElement('div')).css({
     
        });

        $('#btAdd').click(function() {

          if (iCnt < 100) {

              iCnt = iCnt + 1;

              iCnt2 = iCnt + 1;

                  $(container).prepend(`<div id="sex` + iCnt + `"><h1>#` + iCnt2 + `</h1><table style="width: 100%; border: 0">

        <tr>
         <td style="padding: 10px"><label for="payto" style="all: revert">Pay To:</label></td>
         <td><nobr><input type="text" id="payto" name="payto" style="all: revert; width: 92%"><input type="button" id="use_avail_balance" value="O" class="use_avail_balance" /><input type="button" id="use_avail_balance" value="+" class="use_avail_balance" /><input type=button class="bt"` +
                      `onclick="RemSpec(` + iCnt + `)"` + `id=bt` + iCnt + ` ` + `value=x /></nobr></td>

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
        </table>` + '<input type=text class="input" id=tb' + iCnt + ' ' +
                  'value="Text Element ' + iCnt + '" /> <input type=button class="bt"' +
                      'onclick="RemSpec(' + iCnt + ')"' +
                          'id=bt' + iCnt + ' ' + 'value=Submit /><hr></div>');



              /* SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.*/
              if (iCnt == 1) {
                  var divSubmit = $(document.createElement('div'));
                  $(divSubmit).append('<input type=button class="bt"' +
                      'onclick="GetTextValue()"' +
                          'id=btSubmit value=Submit />');
              }

              /* ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.*/
              $('#main').after(container, divSubmit);
          }


            /* AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
               (20 IS THE LIMIT WE HAVE SET)*/
            else {
                $(container).append('<label>Reached the limit</label>');
                $('#btAdd').attr('class', 'bt-disable');
                $('#btAdd').attr('disabled', 'disabled');
            }
        });

        /* REMOVE ONE ELEMENT PER CLICK.*/
        $('#btRemove').click(function() {
            if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }

            if (iCnt == 0) {
                $(container)
                    .empty()
                    .remove();

                $('#btSubmit').remove();
                $('#btAdd')
                    .removeAttr('disabled')
                    .attr('class', 'bt');
            }
        });

        /* REMOVE ALL THE ELEMENTS IN THE CONTAINER. */
        $('#btRemoveAll').click(function() {
            $(container)
                .empty()
                .remove();

            $('#btSubmit').remove();
            iCnt = 0;

            $('#btAdd')
                .removeAttr('disabled')
                .attr('class', 'bt');
        });
});

    /* PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED. */
    var divValue, values = '';

    function GetTextValue() {
        $(divValue)
            .empty()
            .remove();

        values = '';

        $('.input').each(function() {
            divValue = $(document.createElement('div')).css({
                padding:'5px', width:'200px'
            });
            values += this.value + '<br />'
        });

        $(divValue).append('<p><b>Your selected values</b></p>' + values);
        $('body').append(divValue);
    }


/*Removes one*/
    function RemSpec(iCnt) {

        $('#tb' + iCnt).remove();
        $('#bt' + iCnt).remove();
        $('#sex' + iCnt).remove();

    }
