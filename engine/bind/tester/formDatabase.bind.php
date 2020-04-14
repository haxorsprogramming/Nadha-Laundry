<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database Builder</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div>
    Buat tabel di database
    <table>
    <tr>
    <td>Nama Field <input type='text' id='txtField'><td>
    <td> Tipe Data
    <select id='txtTipeData'>
    <option value='int'>Int</option>
    <option value='varchar'>Varchar</option>
    <option value='text'>Text</option>
    </select>
    </td>
    <td><button id='btnTemp'>Tambah</button></td>
    </tr>
    </table>
    <div id='queryTemp'>
    </div>
    <button id='btnBuat'>Buat Tabel</button>
    </div>
</body>
<script>
$(document).ready(function(){
    var queryTemp = "";

    $('#btnTemp').click(function(){
        var namaField = $('#txtField').val();
        var tipeData = $('#txtTipeData').val();
        queryTemp = queryTemp + namaField + " " + tipeData +"(100), ";
        console.log(queryTemp);
    });

    $('#btnBuat').click(function(){

        window.alert("Data");
    });
});
</script>
</html>