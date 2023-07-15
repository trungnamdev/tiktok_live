<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/live.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <title>LIVE</title>
</head>

<body>
    <div id="main">
        {{-- <div class="player">
            <div class="avt"></div>
            <div class="namepl">TrungNam71201</div>

        </div> --}}
    </div>
</body>
<script>
    // Enable pusher logging - don't include this in production
    var haveWinner = false;
    Pusher.logToConsole = true;

    var pusher = new Pusher('42375e2af4934505ef75', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('DuckRace');
    channel.bind('moveduck', function(data) {
            arrPlayer[data.name].score += 1;
            $(`#${data.name}`).animate({
                left: `${arrPlayer[data.name].score * 5}%`
            }, 1000);
            if (arrPlayer[data.name].score == 20) {
               haveWinner = true;
               alert('winner')
            }
    });


    var arrPlayer = {
        'nam1': {
            name: 'nam1',
            score: 0
        },
        'nam2': {
            name: 'nam2',
            score: 0
        },
        'nam3': {
            name: 'nam3',
            score: 0
        },
        'nam4': {
            name: 'nam4',
            score: 0
        },
        'nam5': {
            name: 'nam5',
            score: 0
        },
        'nam6': {
            name: 'nam6',
            score: 0
        },
        'nam7': {
            name: 'nam7',
            score: 0
        },
        'nam8': {
            name: 'nam8',
            score: 0
        },
        'nam9': {
            name: 'nam9',
            score: 0
        },
        'nam10': {
            name: 'nam10',
            score: 0
        }
    };

    const renderPlayer = () => {
        // for (let index = 0; index < 10; index++) {
        for (let name in arrPlayer) {
            $("#main").append(`<div class="player">
            <div class="avt" id="${arrPlayer[name].name}"></div>
            <div class="namepl">${arrPlayer[name].name}</div>
        </div>`);
        };
        // }
    }
    const pushPlayer = () => {
        const rndInt = Math.random();
        arrPlayer.push(rndInt);
        $("#main").append(`<div class="player">
            <div class="avt"></div>
            <div class="namepl">${rndInt}</div>
        </div>`);
    }
    $(document).ready(function() {

        renderPlayer();
    });
</script>

</html>
