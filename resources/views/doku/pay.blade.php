<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript">
        function postPay() {
            document.forms["pay"].submit();
        }
    </script>
</head>
<body onload="postPay()">
    <form action="https://staging.doku.com/Suite/Receive" method="POST" name="pay">
        <input type="text" name="MALLID" value="{{ $params['MALLID'] }}">
        <input type="text" name="CHAINMERCHANT" value="{{ $params['CHAINMERCHANT'] }}">
        <input type="text" name="AMOUNT" value="{{ $params['AMOUNT'] }}">
        <input type="text" name="PURCHASEAMOUNT" value="{{ $params['PURCHASEAMOUNT'] }}">
        <input type="text" name="TRANSIDMERCHANT" value="{{ $params['TRANSIDMERCHANT'] }}">
        <input type="text" name="WORDS" value="{{ $params['WORDS'] }}">
        <input type="text" name="REQUESTDATETIME" value="{{ $params['REQUESTDATETIME'] }}">
        <input type="text" name="CURRENCY" value="{{ $params['CURRENCY'] }}">
        <input type="text" name="PURCHASECURRENCY" value="{{ $params['PURCHASECURRENCY'] }}">
        <input type="text" name="SESSIONID" value="{{ $params['SESSIONID'] }}">
        <input type="text" name="NAME" value="{{ $params['NAME'] }}">
        <input type="text" name="EMAIL" value="{{ $params['EMAIL'] }}">
        <input type="text" name="BASKET" value="{{ $params['BASKET'] }}">
    </form>
</body>
</html>