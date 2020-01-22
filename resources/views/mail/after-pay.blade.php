<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!--meta link-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- title -->
    <title></title>

</head>

<body style="font-family: 'Quicksand' , Helvetica;font-size: 14px;background-color: #fff;color:#444444;margin:0;padding:0;">
    <!-- BODY -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 20px 0 30px;">
                <!-- MAIN -->
                <!--[if mso]>
            <center>
             <table><tr><td width="600">
          <![endif]-->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" style="max-width:600px;border-collapse: collapse;border:1px solid #ccc;">
                    <!--  MAIN-CONTENT -->
                    <tr>
                        <td style="padding:20px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#fff">
                                <tr>
                                    <td style="padding-bottom:5px;">
                                        Hi <b>{{ $booking->contact->name }}</b>,
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br>
                                        Your payment was successfull
                                        <br />
                                        This is your booking ticket details :
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px 30px;">
                            <table style="background-color: #005396;width: 100%; padding: 10px">
                                <tr>
                                    <td colspan="2"><b style="color: #fff">Booking Details</b><br></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom:20px;">
                                        <table border="0" cellpadding="0" cellspaci`ng="0" width="100%">
                                            <tr>
                                                <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Booking Code</th>
                                                <td style="padding-bottom:15px;vertical-align:top;">{{ $booking->code }}</td>
                                            </tr>
                                            <tr>
                                                <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Booking Type</th>
                                                <td style="padding-bottom:15px;vertical-align:top;">{{ $booking->type }}</td>
                                            </tr>
                                            <tr>
                                                <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Paid At</th>
                                                <td style="padding-bottom:15px;vertical-align:top;">{{ $booking->paid_at->format('Y M D H:i:s') }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px 30px;">
                            <table style="background-color: #005396;width: 100%; padding: 10px">
                                <tr>
                                    <td colspan="2"><b style="color: #fff">Contact Details</b><br></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom:20px;">
                                        <table border="0" cellpadding="0" cellspaci`ng="0" width="100%">
                                            <tr>
                                                <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Name</th>
                                                <td style="padding-bottom:15px;vertical-align:top;">{{ $booking->contact->name }}</td>
                                            </tr>
                                            <tr>
                                                <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Phone</th>
                                                <td style="padding-bottom:15px;vertical-align:top;">{{ $booking->contact->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Email</th>
                                                <td style="padding-bottom:15px;vertical-align:top;">{{ $booking->contact->email }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @foreach ($booking->schedules as $schedule)
                        @if ($schedule->type == 'departure')
                            <tr>
                                <td style="padding:0px 30px;">
                                    <table style="background-color: #005396;width: 100%; padding: 10px">
                                        <tr>
                                            <td colspan="2"><b style="color: #fff">Departure Schedules</b><br></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:20px 30px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center" style="padding-bottom:20px;">
                                                <table border="0" cellpadding="0" cellspaci`ng="0" width="100%">
                                                    <tr>
                                                        <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Date</th>
                                                        <td style="padding-bottom:15px;vertical-align:top;">{{ $schedule->date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Route</th>
                                                        <td style="padding-bottom:15px;vertical-align:top;">{{ $schedule->departure_port }} - {{ $schedule->arrival_port }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Departure Time</th>
                                                        <td style="padding-bottom:15px;vertical-align:top;">{{ $schedule->departure }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Arrival Time (estimasi)</th>
                                                        <td style="padding-bottom:15px;vertical-align:top;">{{ $schedule->arrival }}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @endif
                        @if ($schedule->type == 'return')
                            <tr>
                                <td style="padding:0px 30px;">
                                    <table style="background-color: #005396;width: 100%; padding: 10px">
                                        <tr>
                                            <td colspan="2"><b style="color: #fff">Return Sechedules</b><br></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:20px 30px;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center" style="padding-bottom:20px;">
                                                <table border="0" cellpadding="0" cellspaci`ng="0" width="100%">
                                                    <tr>
                                                        <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Date</th>
                                                        <td style="padding-bottom:15px;vertical-align:top;">{{ $schedule->date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Route</th>
                                                        <td style="padding-bottom:15px;vertical-align:top;">{{ $schedule->departure_port }} - {{ $schedule->arrival_port }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Departure Time</th>
                                                        <td style="padding-bottom:15px;vertical-align:top;">{{ $schedule->departure }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-bottom:15px;text-align:left;vertical-align:top;">Arrival Time (estimasi)</th>
                                                        <td style="padding-bottom:15px;vertical-align:top;">{{ $schedule->arrival }}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td style="padding:0px 30px;">
                            <table style="background-color: #005396;width: 100%; padding: 10px">
                                <tr>
                                    <td colspan="2"><b style="color: #fff">Passenger Details</b><br></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom:20px;">
                                        <table border="0" cellpadding="0" cellspaci`ng="0" width="100%">
                                            @foreach ($booking->details as $detail)
                                            <tr>
                                                <th style="padding:10px 0px;text-align:left;vertical-align:top;">
                                                    {{ $detail->name }} ({{ $detail->category }} | {{ $detail->nationality }} | Age : {{ $detail->age }}) <br>
                                                    Address : {{ $detail->address }}
                                                    <hr>
                                                </th>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:0px 30px;">
                            <table style="background-color: #005396;width: 100%; padding: 10px; margin-bottom: 30px">
                                <td colspan="2"><b style="color: #fff">Total</b><br></td>
                                <td>
                                    <b style="color: #fff">RP. {{ number_format($booking->price,0,',','.') }}</b>
                                </td>
                            </table>
                        </td>
                    </tr>
                    <!-- MAIN-CONTENT END -->
                    <!-- FOOTER -->
                    <tr>
                        <td style="padding: 0px 30px;border-top:1px solid #ccc;text-align: center;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center">
                                        <!-- please decide the image ratio using max-width or max-height style -->
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- FOOTER END -->
                    <!-- COPYRIGHT -->
                    <tr>
                        <td align="center" style="padding: 10px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
                                <tr>
                                    <td align="center">
                                        © Piramid. All right reserved.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- COPYRIGHT END -->
                </table>
                <!-- MAIN END -->
                <!--[if mso]>
           </td></tr></table>
          </center>
          <![endif]-->
            </td>
        </tr>
    </table>
    <!-- BODY END -->

</body>

</html>