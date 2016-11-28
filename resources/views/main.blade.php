<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('common.head')
</head>
<body>

<header class="row">@include('common.header')</header>
<div class="container-fluid" style="background-color: #2aabd2">
    <div class="row vcenter">
        <div class="col-sm-4 ">
            <h3>Column 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4" id="map">
            <img src="{{URL::asset('/image/map.jpg')}}" id="warMap" alt="Problem loading image..." height="400" width="400">
            <h3>Column 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4" id="orders">
            <label id="commandPostLabel" for="commandPost">Commandpost</label>
            <textarea id="commandPost" name="commandPost" rows="20" cols="25" ><?php $len = count($userGameData); $counter = 1;
                foreach($userGameData as $item)
                {
                    if($counter == $len) echo trim($item->command);
                    else echo trim($item->command) . ",\r\n";

                    $counter++;
                }
                ?></textarea>
            <button id="commandSubmit" name="commandSubmit">Submit commmands</button>
        </div>
    </div>
</div>

This is  body
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>