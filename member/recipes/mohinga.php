<?php
session_start();
include('../../public/model/connection.php');
global $con;
//include('../user_header.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/public/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Joan&family=Montserrat:wght@200&family=Noto+Sans&display=swap" rel="stylesheet"> 
<title>NuNu' Kitchen and Lifestyle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script> 
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="https://kit.fontawesome.com/9346465f4f.js" crossorigin="anonymous"></script> -->
</head>

  <body class="font-serif bg-local bg-white text-black " > 
  
  <nav class=" p-1 lg:p-2  bg-[#353434] shadow lg:flex lg:items-center lg:justify-between w-full ">
        <div class="flex justify-between items-center ">
          <span class="text-2xl font-[Poppins] cursor-pointer text-white">
            <a href="../user_home.php"><img class="h-10 lg:h-12 xl:h-14 "
              src="../../public/images/logo.png"></a>
           
          </span>
    
          <span class=" text-4xl xl:text-5xl cursor-pointer mx-2 lg:hidden lg:block">
            <span class="iconify text-[#00adb6]" onclick="Menu(this)" data-icon="fa6-solid:burger"></span>
            <!-- <ion-icon name="menu" onclick="Menu(this)"></ion-icon> -->
          </span>
        </div>
    
        <ul class=" text-white bg-black -mt-8 lg:bg-[#353434] lg:flex lg:items-center lg:inline-block lg:align-middle  lg:z-auto lg:static absolute text-white w-full left-0 lg:w-auto lg:py-0 py-4 lg:pl-0 pl-7 lg:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500  ">
          <li class="mx-2 my-1 lg:my-0">
            <a href="home.php" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="home">
              </ion-icon>Home (အိမ်)</a>
            
          </li>

          <li class="mx-2 my-1 lg:my-0">
            <a href="recipes.php" class="  md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="receipt">
              </ion-icon>Recipes (ချက်ပြုတ်နည်းများ)</a>
          </li>

          <li class="mx-2 my-1 lg:my-0">
            <a href="#" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="videocam">
              </ion-icon>Videos (ဗီဒီယိုများ)</a>
          </li>

          <li class="mx-2 my-1 lg:my-0">
            <a href="#" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="reader">
              </ion-icon>Blogs (ဘလော့ဂ်များ)</a>
          </li>

          <li class="mx-2 mt-1 mb-3 lg:my-0">
            <a href="#" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="chatbubbles">
              </ion-icon>Contact (ဆက်သွယ်ရန်)</a>
          </li>
    
          <li class=" bg-[#27b4ae] w-[100px] md:text-md text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-2 hover:bg-[#ffafd7] hover:text-black rounded-full "> Account
        
</li>
      <li class="bg-[#27b4ae] w-[100px] md:text-md text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-2 hover:bg-[#ffafd7] hover:text-black rounded-full "><a href="../../logout.php">
        Log out </a>
</li>
<!-- <button class="flex flex-col justify-center border" >
<span class="iconify text-3xl text-[#27b4ae] mx-auto" data-icon="line-md:account"></span>
<span>My Account</span> 
</button> -->
        </ul>
      </nav>
    
    
      <script>
        function Menu(e){
          let list = document.querySelector('ul');
          e.name === 'menu' ? (e.name = "close",
          list.classList.add('top-[80px]') , 
          list.classList.add('opacity-100')) :( e.name = "menu" ,
          list.classList.remove('top-[80px]'),
          list.classList.remove('opacity-100'))
        }
      </script>
  

      <!-- sub nav -->
      
      <ul class="nav nav-pills bg-gray-900 ">
        <li class="nav-item">
          <a class="nav-link active bg-info text-sm " href="#">မြန်မာအစားစာ</a>
        </li>
        <li class="nav-item text-light">
          <a class="nav-link text-sm  " href="#">အနောက်တိုင်းအစားအစာ</a>
        </li>
        <li class="nav-item text-light ">
          <a class="nav-link text-sm " href="#">ကိတ်မုန့်မျိုးစုံ</a>
        </li>
        <li class="nav-item text-light">
          <a class="nav-link text-sm " href="#">အချိုပွဲ</a>
        </li>
        <li class="nav-item text-light">
          <a class="nav-link text-sm " href="#">ကလေးအစားအစာများ</a>
        </li>
        <li class="nav-item text-light">
          <a class="nav-link text-sm " href="#">သောက်ဖွယ်ရာများ</a>
        </li>
        <!-- <li class="nav-itemtext-light ">
          <a class="nav-link disabled" href="#">သောက်ဖွယ်</a>
        </li> -->
      </ul>

      <section>
          <h1 class="text-xl  mt-8 text-center mx-auto ">မုန့်ဟင်းခါး (Fish Noodle Soup)</h1>
          <div class=" p-4 w-[500px] md:w-[700px] text-center mx-auto"><img class="border-[#27b4ae]"src="../../public/images/mohinga-gde3f2ed3a_640.jpg" alt="fish noodle soup"></div>
          <div class="md:grid md:grid-flow-col "> 
          <div class="mx-12 md:mx-28 ">
              <h3 class="text-2xl mx-12  md:text-3xl">Ingredients</h3>
             
              
              <p class="text-lg md:text-xl">1 tbsp gram(chickpea) flour</p>
              <p class="text-lg md:text-xl">2 tbsp rice flour</p>
              <p class="text-lg md:text-xl">1 lemongrass stalks,trimmed and finely chopped</p>
              <p class="text-lg md:text-xl">2 whole dried red chillies</p>
              <p class="text-lg md:text-xl">1 large onion, finely chopped</p>
              <p class="text-lg md:text-xl">4 garlic cloves, crushed</p>
              <p class="text-lg md:text-xl">2.5cm piece fresh ginger, grated</p>
              <p class="text-lg md:text-xl">4 tbsp groundnut or vegetable oil</p>
              <p class="text-lg md:text-xl">1 tsp ground turmeric</p>
              <p class="text-lg md:text-xl">1 tsp ground paprika</p>
              <p class="text-lg md:text-xl">2 x 110g tins mackerel fillets in brine (undrained)</p>
              <p class="text-lg md:text-xl">4 tbsp fish sauce, plus extra to serve</p>
              <p class="text-lg md:text-xl">8 small shallots, peeled</p>
              <p class="text-lg md:text-xl">400g rice vermicelli noodles</p>
          </div> <br>
          <div class="mx-12 md:mx-28 ">
              <p class="text-lg md:text-xl"><strong>to serve...</strong></p>
              <p class="text-lg md:text-xl">100g fresh coriander, chopped</p>
              <p class="text-lg md:text-xl">3 duck eggs or 6 hen’s eggs, hard-boiled and sliced or halved</p>
              <p class="text-lg md:text-xl">1 red onion, finely sliced</p>
              <p class="text-lg md:text-xl">3 limes, cut into wedges</p>
            </div>
            </div>
            <br>
            <h1  class=" text-2xl mx-12 md:mx-28 md:text-3xl ">Method</h1>
            
            <hr class="w-3/4  ml-12 md:ml-28 ">
            <br>
            <div class="mx-12 md:mx-28 ">
                <ol>
                    <li class="text-lg md:text-xl"><span class="text-5xl mr-12">1</span>
                    Toast the gram flour over a low heat in a dry frying pan, stirring often, until it turns golden – keep watch of it so it doesn’t burn. Set aside, then toast the ground rice or rice flour in the same way. </li><br>
                    <li class="text-lg md:text-xl"><span class="text-5xl mr-12">2</span>
                    In a large pestle and mortar, pound the lemongrass, chillies,,onion, garlic and ginger to a paste (or use a mini food processor).

                    </li><br>
                    <li class="text-lg md:text-xl"><span class="text-5xl mr-12">3</span>
                    Heat the oil in a large deep saucepan over a medium heat. Add the turmeric, paprika and the lemongrass/chilli paste, then fry for 5-7 minutes until the onion in the paste starts to caramelise.
                    </li><br>
                    <li class="text-lg md:text-xl"><span class="text-5xl mr-12">4</span>
                    Stir in the mackerel (with the brine), then cook for 5 minutes more, ensuring all the mackerel is coated with the paste.

                    </li><br>
                    <li class="text-lg md:text-xl"><span class="text-5xl mr-12">5</span>
                    Add the toasted gram and rice flours and keep stirring until the paste thickens.

                    </li><br>
                    <li class="text-lg md:text-xl"><span class="text-5xl mr-12">6</span>
                    Pour in 1.5 litres water and add the fish sauce. Bring the soup up to the boil, then reduce the heat and simmer for 15 minutes.
                    </li><br>
                    <li class="text-lg md:text-xl"><span class="text-5xl mr-12">7</span>
                    Add the whole shallots and a pinch of pepper to the soup, then simmer gently for 30 minutes more (see Make Ahead).

                    </li><br>
                    <li class="text-lg md:text-xl"><span class="text-5xl mr-12">8</span>
                    Meanwhile, put the vermicelli in a separate large heatproof bowl and pour over boiling water from the kettle. Leave to soak for 7 minutes (or until the noodles are soft), then drain.
                    </li><br>
                    <li class="text-lg md:text-xl"><span class="text-5xl mr-12">9</span>
                    To serve, divide the vermicelli noodles among 6 bowls. Ladle over the fish soup (leaving behind the whole shallots), then garnish with coriander, halved eggs, red onion, fresh lime wedges, extra fish sauce, crispy onions and chilli flakes.

                    </li><br>
                </ol>
            </div>

      </section>













<?php include('../../public/view/footer.php');?>
