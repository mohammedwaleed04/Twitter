<!DOCTYPE html>
<html>
    <head>
        <style>
            #demo {
                display: none;
                position: absolute;
                box-shadow: rgba(255, 255, 255, 0.2) 0px 0px 15px, rgba(255, 255, 255, 0.15) 0px 0px 3px 1px; 
                background-color: wheat; 
                border-radius: 8px;
            }
            .night #demo {
                background-color: rgb(0, 0, 0);
            }
            .search-text {
                color: #777;
                font-family: inherit;
                font-weight: 400;
                font-size: 22px;
            }
            .search-area {
                padding-top: 30px;
                margin-left: 30px;
                margin-right: 30px;
                margin-bottom: 30px;
                align-items: center;
                text-align: center;
            }
        </style>
        <link rel='stylesheet' href='<?php echo BASE_URL;?>views/assets/css/darkMode.css' />
        <link rel='stylesheet' href='<?php echo BASE_URL;?>views/assets/css/style.css' />
        <link rel = 'stylesheet' href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css'/>
    </head>
    <body>
<div class="right_sidebar">
    <div class="search-container" id="my-popupS">
        <a href="" class="search-btn">
            <i class="fa fa-search"></i>
        </a>
        <input onclick="myFunction()" type="text" name="search" placeholder="search" class="search-input search" autocomplete="on">
    </div>
    <div class='nav-right-down-wrap' id="demo">
        <div class="search-area">    
            <span class="search-text">Try searching for people</span>
        </div>
    </div>
    <div class='search-result'></div>
    <?php $getFromT->trends();?>            
    <?php $getFromF->whoToFollow( $user_id, $user_id );?>
    <script>
        function myFunction() { 
            document.getElementById("demo").style = 'display: block;'
        }
    </script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>views/assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>views/assets/js/close.js"></script>

</div>
    </body>
</html>