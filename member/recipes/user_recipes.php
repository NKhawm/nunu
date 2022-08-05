<?php
session_start();
include('../../public/model/connection.php');
global $con;
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

  <body class="font-serif bg-local bg-black " > 
  
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

        <!-- Myanmar cuisine collection-->
        <section class="my-16 mx-2 flex flex-col">
            <div >
                <h2 class="text-center  leading-relaxed text-gray-300 text-2xl md:text-xl lg:text-2xl font-bold  mb-5 relative">Myanmar Cuisine Collection (မြန်မာအစားစာ ချက်နည်းပြုတ်နည်းများ)</h2>
                <p class=" text-center px-6 text-md md:text-md md:w-[1000px] md:mx-auto lg:w-[1000px] lg:mx-auto   text-gray-300 lg:leading-loose">မြန်မာပြည်က အစားအစာများကို နိုင်ငံခြားရောက်မြန်မာ
                    များအနေဖြင့် လွမ်းစွတ်တမ်းတ နေမြဲဖြစ်ပါတယ်။ ဒီနေရာလေးမှာတော့ နိုင်ငံခြားမှာ
                    ရရှိနိုင်တဲ့ အရာများဖြင့် မြန်မာပြည်အစားအစာ များကို ချက်ပြုတ်လုပ်စားခြင်းကို ဦးစား
                    ပေး ဖေါ်ပြပေးသွားမှာ ဖြစ်ပါတယ်။</p>
            </div>
        

    
            <!-- grid -->
            <!-- <section class="relative"> -->
    
               
    
                <!-- grid -->
                <div class="container my-28 grid__wrapper grid grid-cols-[repeat(auto-fit,_minmax(300px,_1fr))] gap-16">
                    <!-- Fish noodle soup -->
                    <figure class="recipe-group mx-auto">
                        <img class="rounded-t-2xl object-cover w-[25rem] h-[22rem]" src="../../public/images/mohinga-gde3f2ed3a_640.jpg"
                            alt="mohingar" srcset="">
                            <button type="button" class="collapsible text-center text-white cursor-pointer p-[18px] w-full text-left  outline-0 bg-[#27b4ae]  active:bg-[#27b4ae] hover:bg[#27b4ae] ">မုန့်ဟင်းခါး (Fish Noodle Soup) + </button>
                                   <div class="content py-0 px-[18px] hidden bg-[#353434] ">
                                   <p class="py-4 text-gray-300 ">
                                       <span>Serve : 6 </span><br>
                                       <span>Preparation time : 1 hour </span><br>
                                       <span>Cooking time :1 hour </span><br>
                                       <!-- Modal -->
            <!-- Button trigger modal -->
<a href="mohinga.php"><button type="button" id="modal" class="btn btn-info " data-toggle="modal" data-target="#exampleModal">
  Click here for full recipe
</button> </a>                       
</figure>

                    <figure class="recipe-group mx-auto">
                      <a href=""><img class="rounded-t-2xl object-cover w-[25rem] h-[22rem]" src="../../public/images/IMG_1468.JPG"
                          alt="" srcset=""></a>
                          <button type="button" class="collapsible text-center text-white cursor-pointer p-[18px] w-full text-left  outline-0 bg-[#27b4ae]  active:bg-[#27b4ae] hover:bg[#27b4ae] ">လက်ဖက်သုပ် (Pickle Tea Salad) + </button>
                                 <div class="content py-0 px-[18px] hidden bg-[#353434] ">
                                 <p class="py-4 text-gray-300 ">
                                     <span>Serve : 6 </span><br>
                                     <span>Preparation time : 1 hour </span><br>
                                     <span>Cooking time :30 mins </span><br>
                              
                  </figure>

                  <figure class="recipe-group mx-auto">
                    <a href=""><img class="rounded-t-2xl object-cover w-[25rem] h-[22rem]" src="../../public/images/cocunutnoodle.jpg"
                        alt="Coconut noodle" srcset=""></a>
                        <button type="button" class="collapsible text-center text-white cursor-pointer p-[18px] w-full text-left  outline-0 bg-[#27b4ae]  active:bg-[#27b4ae] hover:bg[#27b4ae] ">အုန်းနို့ခေါက်ဆွဲ (Chicken Coconut Noodle) + </button>
                               <div class="content py-0 px-[18px] hidden bg-[#353434] ">
                               <p class="py-4 text-gray-300 ">
                                   <span>Serve : 6 </span><br>
                                   <span>Preparation time : 45 mins </span><br>
                                   <span>Cooking time :30 mins </span><br>
                </figure>

                <figure class="recipe-group mx-auto">
                  <a href=""><img class="rounded-t-2xl object-cover w-[25rem] h-[22rem]" src="../../public/images/beef curry.jpg"
                      alt="beef stew" srcset=""></a>
                      <button type="button" class="collapsible text-center text-white cursor-pointer p-[18px] w-full text-left  outline-0 bg-[#27b4ae]  active:bg-[#27b4ae] hover:bg[#27b4ae] ">အမဲနှပ် (Burmese Beef Stew) + </button>
                             <div class="content py-0 px-[18px] hidden bg-[#353434] ">
                             <p class="py-4 text-gray-300 ">
                                 <span>Serve : 6 </span><br>
                                 <span>Preparation time : 30 mins, (marinate overnight) </span><br>
                                 <span>Cooking time :1 hour </span><br>
                                 
              </figure>

              <figure class="recipe_group mx-auto">
                <a href=""><img class="rounded-t-2xl object-cover w-[25rem] h-[22rem]" src="../../public/images/reyvenshots-a0deAnzlgY4-unsplash.jpg"
                    alt="pork potato" srcset=""></a>
                    <button type="button" class="collapsible text-center text-white cursor-pointer p-[18px] w-full text-left  outline-0 bg-[#27b4ae]  active:bg-[#27b4ae] hover:bg[#27b4ae] ">ဝက်သားအာလူးချက်ကြော် (Pork and Potato)) + </button>
                           <div class="content py-0 px-[18px] hidden bg-[#353434] ">
                           <p class="py-4 text-gray-300 ">
                               <span>Serve : 6 </span><br>
                               <span>Preparation time :20 mins </span><br>
                               <span>Cooking time :1 hour </span><br>
                                               
            </figure>

            <figure class="recipe_group mx-auto">
              <a href=""><img class="rounded-t-2xl object-cover w-[25rem] h-[22rem]" src="../../public/images/jie-wang-XciY4hwqnNk-unsplash.jpg"
                  alt="egg fried rice" srcset=""></a>
                  <button type="button" class="collapsible text-center text-white cursor-pointer p-[18px] w-full text-left  outline-0 bg-[#27b4ae]  active:bg-[#27b4ae] hover:bg[#27b4ae] ">ကြက်ဥ ထမင်းကြော် (Egg fried rice) + </button>
                         <div class="content py-0 px-[18px] hidden bg-[#353434] ">
                         <p class="py-4 text-gray-300 ">
                             <span>Serve : 6 </span><br>
                             <span>Preparation time : 20 mins </span><br>
                             <span>Cooking time : 10 mins </span><br>
                             
          </figure>

          <figure class="recipe_group mx-auto">
            <a href=""><img class="rounded-t-2xl object-cover w-[25rem] h-[22rem]" src="../../public/images/steam whole yellow peas.jpg"
                alt="steamed peas" srcset=""></a>
                <button type="button" class="collapsible text-center text-white cursor-pointer p-[18px] w-full text-left  outline-0 bg-[#27b4ae]  active:bg-[#27b4ae] hover:bg[#27b4ae] ">ပဲပြုတ် (Steamed Whole Yellow Peas) + </button>
                       <div class="content py-0 px-[18px] hidden bg-[#353434] ">
                       <p class="py-4 text-gray-300 ">
                           <span>Serve : 6 </span><br>
                           <span>Preparation time : 3days </span><br>
                           <span>Cooking time :30 mins </span><br>
                           <!-- Modal -->
          <!-- Button trigger modal -->
<button type="button" id="modal" class="btn btn-info " data-toggle="modal" data-target="#exampleModal">
Click here for full recipe
</button>
            
        </figure>

        <figure class="recipe_group mx-auto">
          <a href=""><img class="rounded-t-2xl object-cover w-[25rem] h-[22rem]" src="../../public/images/noodles-gcadbd3e42_640.jpg"
              alt="kyayoo" srcset=""></a>
              <button type="button" class="collapsible text-center text-white cursor-pointer p-[18px] w-full text-left  outline-0 bg-[#27b4ae]  active:bg-[#27b4ae] hover:bg[#27b4ae] ">ကြေးအိုး ဆီချက် (Kyi OO) + </button>
                     <div class="content py-0 px-[18px] hidden bg-[#353434] ">
                     <p class="py-4 text-gray-300 ">
                         <span>Serve : 6 </span><br>
                         <span>Preparation time : 45 mins </span><br>
                         <span>Cooking time :1 hour </span><br>
                         
          
      </figure>

    
                    
        </section>
    
    
        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;
            
            for (i = 0; i < coll.length; i++) {
              coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                  content.style.display = "none";
                } else {
                  content.style.display = "block";
                }
              });
            }
            </script>
</section>

  <div class="text-3xl text-center pb-24">
    <p class="text-gray-300  "> more recipes coming soon .....</p>
  </div>

            









<footer class="w-full bg-[#27b4ae] h-auto ">
    <div class="footer__wrapper flex flex-col mt-4 z-10 relative ">
        <div class="flex flex-wrap flex-col text-center my-20">
            <h3 class=" text-2xl md:text-4xl font-bold text-gray-700 md:leading-loose">မေးစရာ၊ အကြံပြုစရာ </h3>
            <p class=" text-lg md:text-xl mb-16">များရှိရင် ဆက်သွယ်နိုင်ပါသည်။</p>
            <button class="w-48 h-12 text-xl text-gray-700 font-semibold
            bg-[#ffafd7] m-auto rounded-full hover:bg-[#ffc331] "> <a href="#"></a> ဆက်သွယ်ရန်</button>
        </div>

        <div class="flex flex-wrap flex-col text-center -pt-[180px] ">
            <p class="font-bold">Follow us on social media:</p>
            <div class="icon-wrapper mt-2">
                <button class="btn mr-4	w-7">
                    <ion-icon class="text-2xl  text-[#ffafd7] " name="logo-instagram"><a href="https://www.facebook.com/Nu-Nu-Kitchen-မေမေ့-မီးဖိုချောင်-104741924420555/?ref=pages_you_manage"></ion-icon></a></button>
                <button class="btn mr-4  w-7">
                    <ion-icon class="text-2xl  text-[#ffafd7] " name="logo-youtube"></ion-icon></button>
                <button class="btn mr-4 w-7">
                    <ion-icon class="text-2xl  text-[#ffafd7] "name="logo-facebook"></ion-icon></button>
                <button class="btn mr-4  w-7">
                    <ion-icon class="text-2xl  text-[#ffafd7] " name="logo-tiktok"></ion-icon></button>
                
            </div>
        </div>  <br><br>
        <p class="mx-auto text-sm">Own and Created by Niang Khawm Huai.</p>
   
</footer>




</body>

</html>

