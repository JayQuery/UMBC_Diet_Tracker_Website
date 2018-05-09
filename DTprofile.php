<?php
   include('session.php');
?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title><?php echo $login_fname ?></title>
    <script src="/lib/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <script src="/lib/jquery.plugin.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/DT_profile.css" />
    <link rel="stylesheet" type="text/css" href="./css/DT_progress.css" />
    <link rel="stylesheet" type="text/css" href="./css/DT_style.css" />
    <script type="text/javascript" src="./js/DTmemberSearch.js"></script>
    <script type = "text/javascript"  src = "food_asynch.js" ></script>
    <style >
        <style>
     #circ-cont {
                display: block;
                width: 300px;
                height: 300px;
                margin: 0 auto;
                border-radius: 100%;
                position: relative;
                margin-top: 30px;
                transition: all 0.3s ease-out;

                #svg {
                    transform: rotate(-90deg);
                    left: 0;
                    right: 0;
                    margin: auto;
                    position: absolute;
                    
                    #circle {
                        stroke-dashoffset: 0;
                        stroke: #ebebeb;
                        stroke-width: 15px;

                    }

                    #bar {
                        stroke: #ebebeb;
                        stroke-width: 15px;
                    }
                }
                
                .shadow {
                    position: absolute;
                    top: 175px;
                    left: 0;
                    right: 10px;
                    margin: auto;
                    opacity: 0.8;
                    
                }
                
                .section {
                    text-transform: uppercase;
                    position: absolute;
                    left: 0;
                    right: 0;
                    margin: auto;
                    text-align: center;
                    bottom: 70px;
                    font-size: 18px;
                    font-family: Arial, sans-serif;
                    
                }
                
            }
        </style>
    </style>
</head>

<body>
    <!--This page will describe who I am and Student role at UMBC -->
    <div class="container">
        <div class="header">
            <p><img src="res/diettrackerbanner.png" width="100%" height="225" alt="banner" /></p>
        </div>

        <div id="nav">
            <ul>
                <li><a href="DTprofile.php" title="Signed In">Hi, <?php echo $login_fname; ?></a></li>
                <li><a href="index.php" title="homepage">Home</a></li>
                <li><a href="DTcontactus.php" title="contact us page">Contact Us</a></li>
                <li><a href="DTaboutus.php" title="About us page">About Us</a></li>
                <li><a href ="logout.php">Sign Out</a></li>
                <li class="float-right">
                    <div class="autocomplete">
                        <input id="DTm-search" class="search" type="text" name="search" />  
                    </div></li>
            </ul>
        </div>

    <form method ="post" action="" >
        <div class="prof-container">

            <h2>Welcome <?php echo $login_session; ?> !</h2>

            <img src="./res/blank-profile-picture-973460_960_720.png" alt="personal image" style="width: 300px; height: 335px;" />
            <p><input style="border: none;outline: none;background-color: transparent;font-family: inherit; font-size: inherit;" type="text" name="quote" id="quote" placeholder="Favorite quote.." onkeyup="showResult(this.value)"></p>
            <p><div id="typearea"></div></p>
            <p><img class="headericon" src="./res/open-letter.png" alt="email image" />&nbsp;&nbsp;<?php echo $login_email; ?></p>

            <p><img class="headericon" src="./res/briefcase.png" alt="work img" />&nbsp;&nbsp;<?php echo $login_occupation; ?></p>

            <p><img class="headericon" src="./res/map.png" alt="map image" />&nbsp;&nbsp; <?php echo $login_city;?> <?php echo $login_state ?></p>

            <h2>Diet Tracking Progress</h2>
            <p><label>Daily Progress</label></p>
            <div id="circ-cont" data-pct="100">
                <svg id="svg" width="300" height="300" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <circle r="120" cx="150" cy="150" fill="transparent" stroke-dashoffset="0"></circle>
                    <circle id="bar" r="120" cx="150" cy="150" fill="transparent" stroke-dasharray="753.98"  stroke-dashoffset="0" style="stroke:#E85151"></circle>
                </svg>
            </div>
            <p><label>Weekly Progress</label></p>
            <div id="circ-cont" data-pct="100">
                <svg id="svg1" width="300" height="300" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <circle r="120" cx="150" cy="150" fill="transparent" stroke-dashoffset="0"></circle>
                    <circle id="bar1" r="120" cx="150" cy="150" fill="transparent" stroke-dasharray="753.98"  stroke-dashoffset="0" style="stroke:#E85151"></circle>
                </svg>
            </div>
            <p><label>Overall Progress</label></p>
            <div id="circ-cont" data-pct="100">
                <svg id="svg2" width="300" height="300" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <circle r="120" cx="150" cy="150" fill="transparent" stroke-dashoffset="0"></circle>
                    <circle id="bar2" r="120" cx="150" cy="150" fill="transparent" stroke-dasharray="753.98"  stroke-dashoffset="0" style="stroke:#E85151"></circle>
                </svg>
            </div>
        </div>
    </form>



        <div class="footer">Copyright &copy;&nbsp;AlphaTech.com
            <div class="toolbar2">
                <p>
                    <a href="index.html" title="homepage">Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="DTtermsofuse.html" title="terms of use">Terms of Use</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href ="DTaboutus.html" title ="About us">About Us</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="DTcontactus.html" title="contact us page">Contact Us</a>
                </p>
                
                <a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com">
                    <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                </a>
                <a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons">
                    <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                </a>
                <a href="https://plus.google.com/share?url=https://simplesharebuttons.com">
                    <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
                </a>
                
            </div>
        </div>
    </div>
    <script>

        var val = Math.floor((Math.random() * 100) + 1);
        var weekly = val * 5/7;
        var overall = val * 2/3;
        var $circle = $('#svg #bar');
        var $circle1 = $('#svg1 #bar1');
        var $circle2 = $('#svg2 #bar2');

        var radius = $circle.attr('r');
        var radius1 = $circle1.attr('r');
        var radius2 = $circle2.attr('r');
        var circumference = Math.PI*(radius*2);
        var circumference1 = Math.PI*(radius1*2);
        var circumference2 = Math.PI*(radius2*2);

        $circle.css({ strokeDashoffset: circumference});
        $circle1.css({ strokeDashoffset: circumference1});
        $circle2.css({ strokeDashoffset: circumference2});

        var pct = (val/100)*circumference;
        var pct1 = (weekly/100)*circumference1;
        var pct2 = (overall/100)*circumference2;

        var obj = {
            pct: 0
        };

        var obj1 = {
            pct1: 0
        };

        var obj2 = {
            pct2: 0
        };

        TweenLite.to(obj, .7, {
            pct: -pct,
            delay: 1,
            onUpdate: function () {
                $circle.css({ strokeDashoffset: obj.pct-circumference});
            }
        });

        TweenLite.to(obj1, .7, {
            pct1: -pct1,
            delay: 1,
            onUpdate: function () {
                $circle1.css({ strokeDashoffset: obj1.pct1-circumference1});
            }
        });

        TweenLite.to(obj2, .7, {
            pct2: -pct2,
            delay: 1,
            onUpdate: function () {
                $circle2.css({ strokeDashoffset: obj2.pct2-circumference2});
            }
        });
        
        
        
        

    </script>
</body>
</html>
