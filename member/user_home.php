<?php
session_start();
//include("public/view/header.php");
include("../public/model/connection.php");
global $con;
//include("public/control/function.php");
// $user_data = check_login($con);

?>
<!-- header -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles.css">
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
  <nav class=" p-1 lg:px-2 lg:py-0 bg-[#353434] shadow lg:flex lg:items-center lg:justify-between w-full ">
        <div class="flex justify-between items-center ">
          <span class="text-2xl font-[Poppins] cursor-pointer text-white">
            <a href="home.php"><img class="h-10 lg:h-12 xl:h-14 "
              src="../public/images/logo.png"></a>
           
          </span>
    
          <span class=" text-4xl xl:text-5xl cursor-pointer mx-2 lg:hidden lg:block">
            <span class="iconify text-[#00adb6]" onclick="Menu(this)" data-icon="fa6-solid:burger"></span>
            <!-- <ion-icon name="menu" onclick="Menu(this)"></ion-icon> -->
          </span>
        </div>
    
        <ul class=" text-white bg-black -mt-8 lg:bg-[#353434] lg:flex lg:items-center lg:inline-block lg:align-middle  lg:z-auto lg:static absolute text-white w-full left-0 lg:w-auto lg:pt-10 py-4 lg:pl-0 pl-7 lg:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500  ">
          <li class="mx-2 my-1 lg:my-0">
            <a href="home.php" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="home">
              </ion-icon>Home (အိမ်)</a>
            
          </li>

          <li class="mx-2 my-1 lg:my-0">
            <a href="recipes/user_recipes.php" class="  md:text-md hover:text-[#ffd230] duration-500">
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
            <a href="mailto:nunu.kitchen2020@gmail.com" class="md:text-md hover:text-[#ffd230] duration-500">
              <ion-icon class="text-lg text-[#27b4ae] mr-1" name="chatbubbles">
              </ion-icon>Contact (ဆက်သွယ်ရန်)</a>
          </li>
    
          <li class=" bg-[#27b4ae] w-[90px] md:text-md text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-2 hover:bg-[#ffafd7] hover:text-black rounded-full "><a class="text-center" href="../admin/admin_home.php"> Account
        
</a></li>
      <li class="bg-[#27b4ae] w-[85px] md:text-md text-gray-700 font-[Poppins] pointer-cursor duration-500 px-4 py-2 mx-2 hover:bg-[#ffafd7] hover:text-black rounded-full "><a class="text-center" href="../logout.php">
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
  
 <section class="pt-[80px] md:pt-[120px] h-[30vh] md:pt-8">
        <div class="content px-6 md:w-full m-auto ">
            <!-- <h1 class="text-center text-5xl font-semibold mb-2 ">"မင်္ဂလာပါ"</h1> -->
            <h2 class="text-center text-xl md:text-xl font-bold  md:mb-2"> မင်္ဂလာပါ <?php if (isset($_SESSION['user_name'])) {echo $_SESSION['user_name'];} ?> <br> NuNu' Kitchen and Lifestyle ကနေကြိုဆိုပါတယ်..</h2><br>
            <p class="text-center text-md md:text-md md:mx-auto lg:w-[1000px] md:leading-loose">မိတ်ဆွေများ အားလုံး ကိုယ်စိတ်နှစ်ဖြာ ကျမ်းမာပါစေကြောင်း ဆုတောင်းပေးလိုက်ပါတယ်။ ဒီနေရာလေးမှာ မိခင်များအတွက်
                ရည်ရွယ်လျက် အသိပညာများ၊ ကလေး လူကြီး များအတွက် ချက်နည်းပြုတ်နည်းများ၊ မုန့်မျိုးစုံလုပ်နည်းများနှင့် တခြားသော ဗဟုသုတများ တတ်နိုင်သမျှ ဝေမျှပေးမှာ ဖြစ်ပါတယ်၊၊</p>
        </div>
    </section>



    <section class="bg-[#E2E1DC] ">

        <!-- Girl with coffee for animation mobile -->
        <svg class=" mx-auto mt-[100px]  md:w-[697] md:h-[523] md:mx-auto md:mt-[50px] " width="393" height="289" viewBox="0 0 393 289" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="undraw_walking_outside_re_56xo 1" clip-path="url(#clip0_1_2)">
                <g id="left-leg">
                    <path id="Vector" d="M150.366 283.181L154.392 283.163L156.353 268.146L150.411 268.173L150.366 283.181Z" fill="#FFB8B8" />
                    <path id="Vector_2" d="M149.342 281.915L157.271 281.88L157.272 281.88C158.612 281.874 159.895 282.383 160.84 283.294C161.785 284.206 162.313 285.446 162.309 286.741L162.309 286.9L149.327 286.957L149.342 281.915Z" fill="#2F2E41" />
                    <path id="Vector_3" d="M149.197 257.382L149.058 279.27L157.268 279.177L158.818 258.529L149.197 257.382Z" fill="#2F2E41" />
                </g>
                <g id="right_leg">
                    <path id="Vector_4" d="M165.314 283.501L169.335 283.321L170.41 268.242L164.477 268.508L165.314 283.501Z" fill="#FFB8B8" />
                    <path id="Vector_5" d="M164.218 282.278L172.135 281.923L172.135 281.923C173.473 281.864 174.785 282.32 175.783 283.193C176.78 284.065 177.381 285.282 177.453 286.576L177.462 286.735L164.5 287.315L164.218 282.278Z" fill="#2F2E41" />
                    <path id="Vector_6" d="M163.316 258.471L163.001 278.957L172.004 277.709L171.935 258.433L163.316 258.471Z" fill="#2F2E41" />
                </g>
                <g id="head">
                    <path id="Vector_7" d="M162.922 190.092H147.058C146.732 190.091 146.419 189.966 146.188 189.744C145.958 189.521 145.828 189.22 145.827 188.905V182.312C145.832 179.971 146.8 177.729 148.517 176.075C150.235 174.422 152.563 173.494 154.99 173.494C157.417 173.494 159.745 174.422 161.462 176.075C163.18 177.729 164.148 179.971 164.152 182.312V188.905C164.152 189.22 164.022 189.521 163.791 189.744C163.561 189.966 163.248 190.091 162.922 190.092V190.092Z" fill="#2F2E41" />
                    <path id="Vector_8" d="M156.741 189.695C160.451 189.695 163.459 186.794 163.459 183.217C163.459 179.64 160.451 176.739 156.741 176.739C153.031 176.739 150.024 179.64 150.024 183.217C150.024 186.794 153.031 189.695 156.741 189.695Z" fill="#FFB8B8" />
                    <path id="Vector_9" d="M166.32 182.971H156.62L156.52 181.628L156.023 182.971H154.53L154.332 180.309L153.347 182.971H150.457V182.839C150.459 180.986 151.223 179.21 152.582 177.899C153.941 176.589 155.783 175.852 157.704 175.85H159.072C160.994 175.852 162.836 176.589 164.195 177.899C165.554 179.21 166.318 180.986 166.32 182.839V182.971Z" fill="#2F2E41" />
                    <path id="Vector_10" d="M156.541 191.322C156.468 191.322 156.395 191.316 156.323 191.304L149.22 190.095V178.776H157.039L156.845 178.994C154.152 182.023 156.181 186.934 157.63 189.592C157.737 189.786 157.785 190.006 157.768 190.226C157.751 190.445 157.669 190.656 157.534 190.833C157.42 190.985 157.271 191.108 157.098 191.193C156.926 191.278 156.734 191.322 156.541 191.322V191.322Z" fill="#2F2E41" />
                </g>
                <path id="Vector_11" d="M160.281 264.722C155.018 264.699 149.767 264.232 144.589 263.327L144.457 263.301V258.466L141.452 258.144L143.798 250.066C142.704 237.622 144.258 221.863 144.76 217.327C144.876 216.263 144.951 215.666 144.951 215.666L147.588 194.051L152.001 190.124L154.006 191.381L157.724 194.967C162.046 205.224 165.476 214.88 165.497 215.5L179.992 260.289L179.894 260.356C174.861 263.782 167.189 264.722 160.281 264.722Z" fill="#3F3D56" />
                <g id="coffee">
                    <path id="Vector_12" opacity="0.2" d="M152.994 202.173L152.516 208.336L159.59 210.484L152.994 202.173Z" fill="black" />
                    <path id="Vector_13" d="M173.849 215.53L169.969 215.854C169.845 215.865 169.721 215.83 169.622 215.757C169.522 215.685 169.455 215.578 169.433 215.46L167.986 207.85L174.414 207.313L174.309 215.052C174.307 215.173 174.26 215.289 174.174 215.377C174.089 215.465 173.973 215.52 173.849 215.53V215.53Z" fill="#00BFA6" />
                    <path id="Vector_14" d="M174.488 208.28L168.08 208.815C167.947 208.826 167.816 208.786 167.714 208.703C167.612 208.62 167.549 208.502 167.537 208.374L167.436 207.215C167.425 207.087 167.467 206.96 167.553 206.862C167.639 206.764 167.762 206.702 167.894 206.691L174.303 206.155C174.435 206.145 174.567 206.185 174.669 206.267C174.771 206.35 174.834 206.468 174.846 206.596L174.947 207.755C174.958 207.883 174.916 208.01 174.83 208.108C174.744 208.207 174.621 208.268 174.488 208.28V208.28Z" fill="#2F2E41" />
                    <path id="Vector_15" opacity="0.2" d="M149.688 214.222C151.643 216.062 154.179 217.222 156.895 217.52C159.612 217.817 162.357 217.235 164.698 215.866L166.094 215.049L149.688 214.222Z" fill="black" />
                    <path id="Vector_16" d="M172.849 210.791C172.522 210.492 172.131 210.267 171.704 210.13C171.276 209.993 170.823 209.948 170.375 209.999C169.927 210.049 169.496 210.194 169.112 210.422C168.728 210.651 168.401 210.958 168.153 211.321L161.235 210.056L159.403 213.925L169.199 215.579C169.858 215.939 170.633 216.053 171.375 215.899C172.117 215.745 172.775 215.334 173.225 214.744C173.675 214.153 173.885 213.425 173.816 212.696C173.747 211.968 173.402 211.29 172.849 210.791V210.791Z" fill="#FFB8B8" />
                    <path id="Vector_17" d="M157.08 216.232C153.867 216.5 149.361 215.047 143.892 211.96C143.588 211.792 143.323 211.564 143.115 211.292C142.906 211.02 142.759 210.709 142.682 210.379C142.098 208.085 144.176 204.745 144.38 204.424L146.28 197.669C146.3 197.56 146.849 194.66 148.761 193.485C149.164 193.242 149.617 193.085 150.088 193.026C150.56 192.967 151.038 193.007 151.492 193.144C155.419 194.163 153.347 204.745 153.057 206.134L158.306 208.004L161.685 209.707L166.115 209.783L165.388 215.203L158.732 215.904C158.197 216.079 157.642 216.189 157.08 216.232V216.232Z" fill="#3F3D56" />
                </g>
                <g id="sun">
                    <path id="Vector_18" d="M334.884 73.3808C355.899 73.3808 372.935 56.9539 372.935 36.6904C372.935 16.4268 355.899 -1.52588e-05 334.884 -1.52588e-05C313.87 -1.52588e-05 296.834 16.4268 296.834 36.6904C296.834 56.9539 313.87 73.3808 334.884 73.3808Z" fill="#FF6584" />
                </g>
                <path id="Vector_19" d="M223.724 281.308C225.283 281.308 226.547 280.089 226.547 278.586C226.547 277.082 225.283 275.863 223.724 275.863C222.165 275.863 220.901 277.082 220.901 278.586C220.901 280.089 222.165 281.308 223.724 281.308Z" fill="#00BFA6" />
                <path id="Vector_20" d="M224.062 283.169H223.265V288.548H224.062V283.169Z" fill="#3F3D56" />
                <path id="Vector_21" d="M28.4325 282.401H27.6357V287.78H28.4325V282.401Z" fill="#3F3D56" />
                <g id="big_tree">
                    <path id="Vector_22" d="M108.676 153.6C150.793 153.6 184.936 120.678 184.936 80.0658C184.936 39.4538 150.793 6.53127 108.676 6.53127C66.5594 6.53127 32.4168 39.4538 32.4168 80.0658C32.4168 120.678 66.5594 153.6 108.676 153.6Z" fill="#00BFA6" />
                    <path id="Vector_23" opacity="0.2" d="M52.3688 30.9505C45.2555 46.9952 44.2905 64.9561 49.6463 81.6237C55.0021 98.2913 66.3297 112.579 81.6049 121.935C96.8801 131.291 115.108 135.104 133.03 132.693C150.953 130.283 167.402 121.806 179.44 108.777C175.094 118.58 168.591 127.354 160.38 134.493C152.168 141.631 142.446 146.963 131.886 150.118C121.325 153.274 110.18 154.177 99.2213 152.767C88.2628 151.357 77.7533 147.666 68.421 141.95C59.0887 136.234 51.1567 128.63 45.1746 119.665C39.1924 110.7 35.3031 100.588 33.7762 90.0295C32.2493 79.4711 33.1212 68.7187 36.3316 58.5175C39.542 48.3163 45.0141 38.91 52.3688 30.9505V30.9505Z" fill="black" />
                    <path id="Vector_24" d="M108.886 80.0657H109.096L112.867 288.548H104.905L108.886 80.0657Z" fill="#3F3D56" />
                    <path id="Vector_25" d="M121.015 190.407L108.409 196.807L110.165 200.025L122.771 193.625L121.015 190.407Z" fill="#3F3D56" />
                    <path id="Vector_26" d="M29.6887 285.83C29.6887 285.83 29.9638 280.27 35.6042 280.917Z" fill="#3F3D56" />
                    <path id="Vector_27" d="M28.095 280.539C29.6541 280.539 30.918 279.321 30.918 277.817C30.918 276.314 29.6541 275.095 28.095 275.095C26.5359 275.095 25.272 276.314 25.272 277.817C25.272 279.321 26.5359 280.539 28.095 280.539Z" fill="#00BFA6" />
                    <path id="Vector_28" d="M75.9066 286.214C75.9066 286.214 76.1818 280.655 81.8222 281.301Z" fill="#3F3D56" />
                    <path id="Vector_29" d="M74.3129 280.924C75.872 280.924 77.1359 279.705 77.1359 278.201C77.1359 276.698 75.872 275.479 74.3129 275.479C72.7538 275.479 71.4899 276.698 71.4899 278.201C71.4899 279.705 72.7538 280.924 74.3129 280.924Z" fill="#00BFA6" />
                </g>
                <path id="Vector_30" d="M74.6504 282.785H73.8535V288.164H74.6504V282.785Z" fill="#3F3D56" />
                <g id="bird_two">
                    <path id="Vector_31" d="M198.82 35.5479L204.483 31.1807C200.084 30.7128 198.277 33.0261 197.537 34.8572C194.1 33.4812 190.359 35.2845 190.359 35.2845L201.689 39.2507C201.117 37.7786 200.122 36.4941 198.82 35.5479V35.5479Z" fill="#3F3D56" />
                </g>
                <g id="bird_one">
                    <path id="Vector_32" d="M284.937 80.0331L290.6 75.666C286.201 75.198 284.393 77.5114 283.653 79.3425C280.217 77.9664 276.475 79.7698 276.475 79.7698L287.805 83.7359C287.234 82.2638 286.239 80.9794 284.937 80.0331V80.0331Z" fill="#3F3D56" />
                </g>
                <g id="bird_three">
                    <path id="Vector_33" d="M192.054 117.994L197.717 113.627C193.318 113.159 191.51 115.472 190.771 117.303C187.334 115.927 183.593 117.731 183.593 117.731L194.922 121.697C194.351 120.225 193.356 118.94 192.054 117.994Z" fill="#3F3D56" />
                </g>
                <path id="Vector_34" d="M56.3339 288.616C56.3339 288.616 56.609 283.057 62.2494 283.703Z" fill="#3F3D56" />
                <path id="Vector_35" d="M326.469 288.616C326.469 288.616 326.745 283.057 332.385 283.703Z" fill="#3F3D56" />
                <path id="Vector_36" d="M315.313 288.616C315.313 288.616 315.589 283.057 321.229 283.703Z" fill="#3F3D56" />
                <path id="Vector_37" d="M200.662 288.616C200.662 288.616 200.386 283.057 194.746 283.703Z" fill="#3F3D56" />
                <path id="Vector_38" d="M124.561 288.616C124.561 288.616 124.286 283.057 118.646 283.703Z" fill="#3F3D56" />
                <path id="Vector_39" d="M43.68 288.616C43.68 288.616 43.4049 283.057 37.7645 283.703Z" fill="#3F3D56" />
                <path id="Vector_40" d="M350.471 288.616C350.471 288.616 350.196 283.057 344.556 283.703Z" fill="#3F3D56" />
                <g id="small_tree">
                    <path id="Vector_41" d="M305.442 168.792C305.439 162.553 303.996 156.392 301.218 150.756C298.44 145.121 294.397 140.151 289.382 136.209C284.366 132.266 278.504 129.448 272.22 127.96C265.936 126.472 259.387 126.35 253.048 127.603C246.709 128.857 240.739 131.455 235.57 135.208C230.4 138.962 226.162 143.777 223.161 149.305C220.16 154.833 218.472 160.936 218.219 167.171C217.966 173.406 219.155 179.617 221.699 185.354C221.656 185.309 221.612 185.264 221.57 185.218C223.508 189.573 226.194 193.582 229.516 197.074C229.526 197.085 229.536 197.095 229.546 197.106C229.814 197.387 230.083 197.668 230.359 197.942C234.346 201.952 239.119 205.158 244.402 207.374C249.684 209.591 255.37 210.773 261.131 210.853L259.656 288.065H264.211L263.289 237.104L269.878 233.759L268.873 231.919L263.247 234.774L262.814 210.849C274.209 210.597 285.049 206.056 293.015 198.196C300.981 190.336 305.442 179.782 305.442 168.792V168.792Z" fill="#009985" />
                    <path id="Vector_42" d="M225.318 286.598C225.318 286.598 225.593 281.039 231.233 281.685Z" fill="#3F3D56" />
                    <path id="Vector_43" d="M302.564 288.616C302.564 288.616 302.839 283.057 308.479 283.703Z" fill="#3F3D56" />
                    <path id="Vector_44" d="M249.572 288.616C249.572 288.616 249.848 283.057 255.488 283.703Z" fill="#3F3D56" />
                    <path id="Vector_45" d="M292.3 288.616C292.3 288.616 292.025 283.057 286.385 283.703Z" fill="#3F3D56" />
                    <path id="Vector_46" d="M316.206 289C316.206 289 315.931 283.441 310.291 284.087Z" fill="#3F3D56" />
                </g>
            </g>
            <defs>
                <clipPath id="clip0_1_2">
                    <rect width="393" height="289" fill="white" />
                </clipPath>
            </defs>
        </svg>







        <!-- <p class="bubble speech">မင်္ဂလာပါ</p> -->

        <hr>


    </section>







<?php include("../public/view/footer.php");?>
