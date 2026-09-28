<!DOCTYPE html>
<html lang="en">
<head>
    <title>From Biodata</title>
</head>
<body>
    <h2>Input Data</h2>
    <from action="/prosesmahasiswa" method="post">
        @csrf
        <label>Nim:</label>
        <input type="text"= name="nim"<br><br>

        <label>nama:</label>
        <input type="text"= name="nama"<br><br>

        <label>program studi:</label>
        <textarea name= "program_studi"></textarea><br><br>

        <label> semester:</label>
        <input type="number" name="semester"><br><br>

        <button type="sumbit">Kirim</button>

    </from>
</body>
</html>