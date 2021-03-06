<?php
   include('session.php');
?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>UMBC Diet Tracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/DT_style.css" />
    <link rel="stylesheet" href="./css/external/odometer-theme-train-station.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/external/odometer.js"></script>
    <script type="text/javascript" src="./js/DTbehavior.js"></script>
    <script type="text/javascript" src="./js/DTsearch.js"></script>
</head>

<body>    
    <!-- The overlays for the favorites that will launch the respective app when clicked -->
    <div id="DietTrackerNav" class="overlay">

      <!-- Button to close the overlay navigation -->
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav('DietTrackerNav')">&times;</a>

      <!-- Overlay content -->
      <div class="overlay-content">
        <img class="overlay-chicklet" src="res/diet_tracker_chicklet.png" alt="Diet Tracker"/>
        <h1>Diet Tracker</h1>
        <form action="" onsubmit="" id="dietTrackerForm" method="post">
          <table class="app-table">
            <tr>
              <td>Search Food Details: <input class="form-control" type="text" name="food-search" id="foodSearch" size="100%"/></td>              
            </tr>             
          </table>

          <ul class="list-group" id="foodSearchResults"></ul>

          <!--A submit button and a reset button. The submit button submits all the input data.
          The reset button clears all text fields and initializes everything back to the default state.-->
          <p class="submission-area">            
            <input class="round_button" type="reset" value="Clear" onclick="hideNutritionStats()" />       
          </p>

          <table id="nutritionFacts" class="nutrition-facts">
            <tr>
              <td>Calories: <input class="form-control" type="text" name="calor" id="calor" size="50%"/></td>
              <td>Portion Amount: <input class="form-control" type="text" name="Portion_Amount" id="Portion_Amount" size="50%"/></td>
            </tr>            
            <tr>
              <td>Grains: <input class="form-control" type="text" name="Grains" id="Grains" size="50%"/></td>
              <td>Whole Grains: <input class="form-control" type="text" name="Whole_Grains" id="Whole_Grains" size="50%"/></td>
            </tr>            
            <tr>
              <td>Vegetables: <input class="form-control" type="text" name="Vegetables" id="Vegetables" size="50%"/></td>
              <td>Orange Vegetables: <input class="form-control" type="text" name="Orange_Vegetables" id="Orange_Vegetables" size="50%"/></td>
            </tr>            
            <tr>
              <td>Drkgreen Vegetables: <input class="form-control" type="text" name="Drkgreen_Vegetables" id="Drkgreen_Vegetables" size="50%"/></td>
              <td>Starchy Vegetables: <input class="form-control" type="text" name="Starchy_vegetables" id="Starchy_vegetables" size="50%"/></td>
            </tr>            
            <tr>
              <td>Other Vegetables: <input class="form-control" type="text" name="Other_Vegetables" id="Other_Vegetables" size="50%"/></td>
              <td>Fruits: <input class="form-control" type="text" name="Fruits" id="Fruits" size="50%"/></td>
            </tr>            
            <tr>
              <td>Milk: <input class="form-control" type="text" name="Milk" id="Milk" size="50%"/></td>
              <td>Meats: <input class="form-control" type="text" name="Meats" id="Meats" size="50%"/></td>
            </tr>            
            <tr>
              <td>Soy: <input class="form-control" type="text" name="Soy" id="Soy" size="50%"/></td>
              <td>Drybeans Peas: <input class="form-control" type="text" name="Drybeans_Peas" id="Drybeans_Peas" size="50%"/></td>
            </tr>            
            <tr>
              <td>Oils: <input class="form-control" type="text" name="Oils" id="Oils" size="50%"/></td>
              <td>Solid Fats: <input class="form-control" type="text" name="Solid_Fats" id="Solid_Fats" size="50%"/></td>
            </tr>            
            <tr>
              <td>Added Sugars: <input class="form-control" type="text" name="Added_Sugars" id="Added_Sugars" size="50%"/></td>
              <td>Alcohol: <input class="form-control" type="text" name="Alcohol" id="Alcohol" size="50%"/></td>
            </tr>            
            <tr>
              <td>Saturated Fats: <input class="form-control" type="text" name="Saturated_Fats" id="Saturated_Fats" size="50%"/></td>
              <td></td>
            </tr> 
          </table>
        </form> 
      </div>

    </div>
    
    <div id="BMRCalcNav" class="overlay">

      <!-- Button to close the overlay navigation -->
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav('BMRCalcNav')">&times;</a>

      <!-- Overlay content -->
      <div class="overlay-content">
        <img class="overlay-chicklet" src="res/bmr_calculator_icon2.png" alt="BMR Calc"/>
        <h1>BMR Calculator</h1>

        <!-- Harris-Benedict Formula
          1. Calculate your BMR (basal metabolic rate):

          Women: BMR = 655 + ( 4.35 x weight in pounds ) + ( 4.7 x height in inches ) - ( 4.7 x age in years )
          Men: BMR = 66 + ( 6.23 x weight in pounds ) + ( 12.7 x height in inches ) - ( 6.8 x age in years )
          2. Multiply your BMR by the appropriate activity factor, as follows:

             Sedentary (little or no exercise): BMR x 1.2
             Lightly active (light exercise/sports 1-3 days/week): BMR x 1.375
             Moderately active (moderate exercise/sports 3-5 days/week): BMR x 1.55
             Very active (hard exercise/sports 6-7 days a week): BMR x 1.725
             Extra active (very hard exercise/sports & physical job or 2x training): BMR x 1.9
          3. Your final number is the approximate number of calories you need each day to maintain your weight. -->

        
      </div>

    </div>

    <div id="FoodPlanNav" class="overlay">

      <!-- Button to close the overlay navigation -->
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav('FoodPlanNav')">&times;</a>

      <!-- Overlay content -->
      <div class="overlay-content">
        <img class="overlay-chicklet" src="res/food_plan_icon.png" alt="Food Plan"/>
        <h1>Food Plan</h1>
      </div>

    </div>

    <div id="MapsNav" class="overlay">

      <!-- Button to close the overlay navigation -->
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav('MapsNav')">&times;</a>

      <!-- Overlay content -->
      <div class="overlay-content">
        <img class="overlay-chicklet" src="res/maps_icon.png" alt="maps"/>
        <h1>Maps</h1>        

         <object width="100%" height="800px">
            <param name="movie" value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3815.0459394830386!2d-76.71316378435398!3d39.25561703335346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c81db59abc4bcb%3A0x7119b4daadb403d!2sUniversity+of+Maryland+-+Baltimore+County!5e1!3m2!1sen!2sus!4v1525710721890"></param>
            <param name="allowFullScreen" value="true"></param>
         </object>
      </div>

    </div>

    <div id="BMICalcNav" class="overlay">

      <!-- Button to close the overlay navigation -->
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav('BMICalcNav')">&times;</a>

      <!-- Overlay content -->
      <div class="overlay-content">       
        <img class="overlay-chicklet" src="res/bmi_calculator_icon.png" alt="BMI Calc"/>
        <h1>BMI Calculator</h1>
        <form action="" onsubmit="" id="bmiForm" method="post">
          <table class="app-table">
            <tr>  
              <th>Height:</th>
            </tr>
            <tr>
              <td>Feet: <input class="form-control" type="text" name="height-feet" id="heightFeet" size="50%" maxlength="2"/></td>
              <td>Inches: <input class="form-control" type="text" name="height-inches" id="heightInches" size="50%" maxlength="2"/></td>
            </tr>

            <tr>
              <th>Weight:</th>
            </tr>
            <tr>
              <td>Pounds: <input class="form-control" type="text" name="weight-pounds" id="weightPounds" size="50%" maxlength="3"/></td>
            </tr>
          </table>

          <div class="odometer-container">
            <h3>Your BMI</h3>
            <div class="odometer">0</div>
          </div>
          
          <!--A submit button and a reset button. The submit button submits all the input data.
          The reset button clears all text fields and initializes everything back to the default state.-->
          <p class="submission-area">
            <input class="round_button" type="button" value="Calculate" onclick="calculateBMI()" />
            <input class="round_button" type="reset" value="Reset" onclick="clearBMICalculation()" />       
          </p>
        </form> 
      </div>

    </div>

    <div id="AddFavNav" class="overlay">

      <!-- Button to close the overlay navigation -->
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav('AddFavNav')">&times;</a>

      <!-- Overlay content -->
      <div class="overlay-content">
        <!-- content here -->
      </div>

    </div>

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
                <li class="float-right"><input class="search" type="text" name="search"/></li>
            </ul>
        </div>      

        <div class="favorites">
            <h1>Applications</h1>

            <div class="scrollable">
                <table>
                    <tr>
                        <td class="favorite-item">
                            <img src="res/diet_tracker_chicklet.png" onclick="openNav('DietTrackerNav')" alt="Diet Tracker"/>
                            <span class="caption">Diet Tracker</span>
                        </td>

                        <td class="favorite-item">
                            <img src="res/bmr_calculator_icon2.png" onclick="openNav('BMRCalcNav')"  alt="BMR Calc"/>
                            <span class="caption" >BMR Calculator</span>
                        </td>

                        <td class="favorite-item">
                            <img src="res/food_plan_icon.png" onclick="openNav('FoodPlanNav')" alt="Food Plan"/>
                            <span class="caption">Food Plan</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="favorite-item">
                            <img src="res/bmi_calculator_icon.png" onclick="openNav('BMICalcNav')" alt="BMI Calc"/>
                            <span class="caption">BMI Calculator</span>
                        </td>

                        <td class="favorite-item">
                            <img src="res/maps_icon.png" onclick="openNav('MapsNav')" alt="maps"/>
                            <span class="caption">Maps</span>
                        </td>

                        <td class="favorite-item">
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="video-main">
            <object width="100%" height="315px">
                <param name="movie" value="https://www.youtube.com/embed/-mW55jAeBOE?autoplay=0"></param>
                <param name="allowFullScreen" value="true"></param>
             </object>
        </div>

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
</body>

</html>