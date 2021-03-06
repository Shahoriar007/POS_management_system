<!DOCTYPE html>
<html>
<head>
    <title>Convert Table to PDF using JavaScript</title>
    <style>
        table
        {
            width: 300px;
            font: 17px Calibri;
        }
        table, th, td 
        {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="tab">
        <table> 
            <tr>
                <th>Name</th>
                    <th>Age</th>
                        <th>Job</th>
            </tr>
            <tr>
                <td>Brian</td>
                    <td>41</td>
                        <td>Blogger</td>
            </tr>
            <tr>
                <td>Matt</td>
                    <td>25</td>
                        <td>Programmer</td>
            </tr>
            <tr>
                <td>Arun</td>
                    <td>39</td>
                        <td>Writter</td>
            </tr>
        </table>
    </div>

    <p>
        <input type="button" value="Create PDF" 
            id="btPrint" onclick="createPDF()" />
    </p>
</body>
<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
</html>
