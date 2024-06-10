<script type="text/javascript" src="../javascript/display.js"></script>
<form action="add.php" method="POST">
<table border="1" align="center">

	<tr>

        <td>

            username:

        </td>

        <td>  

            <label for="username"></label>

            <input name="username" type="text" id="username" maxlength="16"/>

        </td>

    </tr>

    <tr>

        <td>

            password:

		</td>

       	<td>

            <label for="password"></label>

            <input name="password" type="password" id="password" maxlength="16"/>

		</td>

    </tr>

    <tr>

        <td>

        	name of user:

        </td>

        <td>

            <label for="user_details"></label>

            <input name="user_details" type="text" id="user_details" maxlength="30"/>

        </td>

    </tr>
    
    <tr>

        <td>

        	status:

        </td>

        <td>

            <label for="status"></label>

            <input name="status" type="checkbox" id="status" value=1 enabled/> enabled

        </td>

    </tr>

    <tr>

        <td colspan="2">

            type:<input name="type" onclick="hidefirst('row1')" id="type" type="radio" value="superuser" /> superuser

            <input name="type" onclick="display('row1')" id="type" type="radio" value="user" checked/> user

        </td>

    </tr>

    <tr id="row1">
    	<td colspan="2" align="center">
        	<table border="1" align="center">
            <tr><td align=left><input type=checkbox name='view_order' id='view_order' value="1">view_order</td></tr>
            <tr><td align=left><input type=checkbox name='add_order' id='view_order' value="1">add_order</td></tr>
            <tr><td align=left><input type=checkbox name='edit_order' id='view_order' value="1">edit_order</td></tr>
            <tr><td align=left><input type=checkbox name='delete_order' id='view_order' value="1">delete_order</td></tr>
            <tr><td align=left><input type=checkbox name='add_person' id='view_order' value="1">add_person</td></tr>
            <tr><td align=left><input type=checkbox name='edit_person' id='view_order' value="1">edit_person</td></tr>
            <tr><td align=left><input type=checkbox name='delete_person' id='view_order' value="1">delete_person</td></tr></table> 

        

        </td>

    </tr>

    <tr>

        <td colspan="2" align="center">

          <input type="submit" value="add"  onClick="return confirm('Are you sure?')" />

        </td>

    </tr>

</table>
</form>