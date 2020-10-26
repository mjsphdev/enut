<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
    .message-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .25);
        font-size: 17px;
        line-height: 25px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #2a2a2b;
        background: #ffffff;
    }
    
    .message-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .message-box table td {
        padding: 6px;
        vertical-align: top;
    }
    
    .message-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .message-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .message-box table tr.top table td.title {
        font-size: 35px;
        line-height: 20px;
        color: #27ae60;
        border-bottom: 1px solid #27ae60;;
        
    }
    
    .message-box table tr.information table td {
        padding-bottom: 20px;
        color: #2a2a2b;
    }
    
    .message-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        color: #2a2a2b;
        
    }
    
    .message-box table tr.details td {
        padding-bottom: 20px;
        font-size: 14px;
        font-weight: normal;
    }
    
    @media only screen and (max-width: 600px) {
        .message-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .message-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    </style>
</head>

<body>
    <div class="message-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                            <strong>E-NUTRITION</strong>
                            </td>                                                            
                       </tr>
                    </table>
                </td>
            </tr>           
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                               <strong> Received a message from : {{ $name }}</strong><br>
                                Date and time : {{ date('m-d-Y H:i:s') }}<br>                               
                                Reply : {{ $email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="details">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    <strong>Message </strong><br>                               
                                    {{ $user_message }}<br><br><hr>
                                    <strong style="color:#27ae60;">
                                    &copy; E-NUTRITION
                                    </strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
        </table>
    </div>
</body>
</html>