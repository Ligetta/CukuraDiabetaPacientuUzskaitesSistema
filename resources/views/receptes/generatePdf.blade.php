<!DOCTYPE html>
<html>
<head>
    <title>Zaļu recepte
    </title>
    <style>
        /* Add your custom styles here */
        /* Example styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #FCEFF1;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .recepte {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .recepte h2 {
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 40px;
            text-align: left;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>Recepte zalem</h1>

        <div class="recepte">
            <h2>Pacienta vards un uzvards: {{ $recepte->pacvards }}</h2>
            <p>Zalu nosaukums: {{ $recepte->zalnos }}</p>
            <p>Zalu daudzums: {{ $recepte->zaldaudz }}</p>
        </div>


    <div class="footer">
        <h3>Receptes izrakstitajs: {{ $currentUserName }}</h3>
        <h3>Receptes izrakstisanas datums: {{ now()->format('Y-m-d H:i:s') }}</h3>
    </div>
</body>
</html>
