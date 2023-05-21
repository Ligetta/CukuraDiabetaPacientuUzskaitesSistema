@extends('layout')
@section('content')
<style> 
    .container2 {
        display: flex;
        align-items: center;
        justify-content: center; 
        flex-direction: column;
        background-image: url({{ asset('images/card2.jpg') }});
        background-size: cover;
        background-position: center; 
        height: 100vh;
        width: 100%;
        color: black; 
    }

    .card-text{
        font-size: 20px;
        margin: 10px;
    }

    .btn-primary2 {
        font-size: 1rem;
        border-radius: 40px;
        padding: 10px 20px ;
        font-color: black;
    }

    .text {
        font-size: 20px;
        margin: 10px;
        padding: 8px;
        border-radius: 10px;
        border: none;
    }

</style>
<body>
    <div class="container2">
        <h2 style="padding-bottom:20px;">Insulīna devu kaulkulators</h2>
        <h4>Ogļhidrātu daudzums 100g:</h3>
        <input type="text" id="num1" class="text">
        <h4>Cik grami tiks apēsti?</h3>
        <input type="text" id="num2" class="text">
        <h4>Insulīna jūtības faktors uz 1 MV:</h3>
        <input type="text" id="num3" class="text">
        <button onclick="calculate()" class=" btn btn-primary2">Aprēķināt</button>
        <h3 style="padding-top:20px;">Jums ir jāpotējas: <span id="result"></span> vienības</h3>
    </div>

    <script>
        function calculate() {
            var num1 = parseFloat(document.getElementById('num1').value);
            var num2 = parseFloat(document.getElementById('num2').value);
            var num3 = parseFloat(document.getElementById('num3').value);

            var result = ((num1 * num2)/100)/12 * num3; 
            result = result.toFixed(2);

            document.getElementById('result').textContent = result;
        }
    </script>
</body>
@endsection