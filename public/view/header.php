<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Joan&family=Montserrat:wght@200&family=Noto+Sans&display=swap" rel="stylesheet"> 
    <title>NuNu' Kitchen and Lifestyle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

  <body class="font-serif bg-local bg-[#E2E1DC] " >  
  <nav class=" p-1 lg:p-2  bg-[#353434] shadow lg:flex lg:items-center lg:justify-between w-full ">
        <div class="flex justify-between items-center ">
          <span class="text-2xl font-[Poppins] cursor-pointer text-white">
            <a href="home.php"><img class="h-10 lg:h-12 xl:h-14 "
              src="public/images/logo.png"></a>
           
          </span>
    
          <span class=" text-4xl xl:text-5xl cursor-pointer mx-2 lg:hidden lg:block">
            <span class="iconify text-[#00adb6]" onclick="Menu(this)" data-icon="fa6-solid:burger"></span>
            <!-- <ion-icon name="menu" onclick="Menu(this)"></ion-icon> -->
          </span>
        </div>
    
        <ul class=" text-white bg-black -mt-8 lg:bg-[#353434] lg:flex lg:items-center   lg:z-auto lg:static absolute text-white w-full left-0 lg:w-auto lg:py-0 py-4 lg:pl-0 pl-7 lg:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500  ">
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
    
          <li class=" bg-[#27b4ae] w-[100px] md:text-md text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-2 hover:bg-[#ffafd7] hover:text-black rounded-full "><a href="signup.php"> 
        Register</a>
</li>
      <li class="bg-[#27b4ae] w-[100px] md:text-md text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-2 hover:bg-[#ffafd7] hover:text-black rounded-full "><a href="login.php">
        Log in </a>
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
  