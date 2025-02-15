<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <style>
        .cover{
            background-image: url("../../../logo.png");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }
        .mail-head{
            background-color: hsl(240, 61%, 9%);
            padding: 8px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            color: white;
        }
        .outer{
            background-color:rgba(240, 248, 255, 0.781);
            padding: 12px;
        }
        .mail_body{
            padding: 12px;
        }
    </style>
</head>
<body>
    <div class="wapper">
        <div class="cover">
            <div class="outer">
                <div class="mail-head">{{$title}}</div>
                <div class="mail_body">
                    {{$messageBody}}
                </div>
                <p><b>Best Regards </b></p>
                <p>CodeCrafter</p>

            </div>
        </div>
    </div>
</body>
</html>