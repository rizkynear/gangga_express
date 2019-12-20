<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('doku.notify') }}" method="GET">
        <input type="text" name="RESPONSECODE" value="0000">
        <input type="text" name="RESULTMSG" value="SUCCESS">
        <input type="text" name="TRANSIDMERCHANT" value="2">
        <input type="text" name="AMOUNT" value="100000.00">
        <input type="text" name="WORDS" value="938dc97c71571737303aa14bca61eb84a96550c6">
        <input type="submit">
    </form>
</body>
</html>