<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relay 1</title>
    <style>
        /* Reset and base styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Arial", sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 90vw;
            max-width: 600px;
            height: 90vh;
            position: relative;
            padding: 20px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: linear-gradient(90deg, #5936B4 0%, #362A84 100%);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(0.95);
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            z-index: -1;
        }

        .main-text {
            font-size: 3rem;
            font-weight: bold;
            margin: 0;
            text-align: center;
        }

        .info {
            display: flex;
            justify-content: space-between;
            font-size: 1.2rem;
            margin-top: auto;
        }

        .text-gray {
            color: rgba(235, 235, 245, 0.60);
            margin: 0;
            font-size: 0.9rem;
        }

        .text-gray span {
            font-weight: bold;
        }

        .info-left {
            display: flex;
            flex-direction: column;
        }

        .info-right {
            align-self: flex-end;
            font-weight: bold;
        }
    </style>
</head>
<body data-relay="{{ $isFirstRelayValue }}">
    <form action="/first-relay" method="POST" style="position: relative;">
        @csrf
        <button type="submit" style="display: none;"></button>

        <div class="card {{ $isFirstRelayValue == 1 ? 'light-background' : '' }}" onclick="this.closest('form').submit()">
            <div class="background-image" style="background-image: url('{{ $isFirstRelayValue == 1 ? asset('images/bulb_on.gif') : asset('images/bulb_off.gif') }}');"></div>
            <p class="main-text">{{ $isFirstRelayValue == 1 ? 'HIGH' : 'LOW' }}</p>
            <div class="info">
                <div class="info-left">
                    <p class="text-gray">Relay 1 is <span>{{ $isFirstRelayValue == 1 ? 'ON' : 'OFF' }}</span></p>
                    <p>1 / 8 Channel Relay</p>
                </div>
                <p class="info-right">Baral Smart Home Controller</p>
            </div>
        </div>
    </form>
</body>
</html>
