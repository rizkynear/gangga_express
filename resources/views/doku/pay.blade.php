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
        <input type="hidden" name="MALLID" value="{{ $params['MALLID'] }}">
        <input type="hidden" name="CHAINMERCHANT" value="{{ $params['CHAINMERCHANT'] }}">
        <input type="hidden" name="AMOUNT" value="{{ $params['AMOUNT'] }}">
        <input type="hidden" name="PURCHASEAMOUNT" value="{{ $params['PURCHASEAMOUNT'] }}">
        <input type="hidden" name="TRANSIDMERCHANT" value="{{ $params['TRANSIDMERCHANT'] }}">
        <input type="hidden" name="WORDS" value="{{ $params['WORDS'] }}">
        <input type="hidden" name="REQUESTDATETIME" value="{{ $params['REQUESTDATETIME'] }}">
        <input type="hidden" name="CURRENCY" value="{{ $params['CURRENCY'] }}">
        <input type="hidden" name="PURCHASECURRENCY" value="{{ $params['PURCHASECURRENCY'] }}">
        <input type="hidden" name="SESSIONID" value="{{ $params['SESSIONID'] }}">
        <input type="hidden" name="NAME" value="{{ $params['NAME'] }}">
        <input type="hidden" name="EMAIL" value="{{ $params['EMAIL'] }}">
        <input type="hidden" name="BASKET" value="{{ $params['BASKET'] }}">
    </form>
</body>
</html>