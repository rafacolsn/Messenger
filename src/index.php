<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html>
<html class=''>

<head>
   <link rel="stylesheet" href="./style.css">
   <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
   <script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
   <script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>
   <meta charset='UTF-8'>
   <meta name="robots" content="noindex">
   <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
   <link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg"
      color="#111" />
   <link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
   <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

   <script src="https://use.typekit.net/hoy3lrg.js"></script>
   <script>try{Typekit.load({ async: true });}catch(e){}</script>
   <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
   <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
</head>

<body class="cp-pen-styles">
   <!-- 

A concept for a chat interface. 

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->

   <div id="frame">
      <div id="sidepanel">
         <div id="profile">
            <div class="wrap">
               <img id="profile-img" src="https://avatars1.githubusercontent.com/u/42454363?s=400&u=1acfd527896d6fcd3a6f3aa2ab2a1e0be01a162f&v=4"
                  class="online" alt="" />
               <p>Youssef El Hirech</p>
               <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
               <div id="status-options">
                  <ul>
                     <li id="status-online" class="active"><span class="status-circle"></span>
                        <p>Online</p>
                     </li>
                     <li id="status-away"><span class="status-circle"></span>
                        <p>Away</p>
                     </li>
                     <li id="status-busy"><span class="status-circle"></span>
                        <p>Busy</p>
                     </li>
                     <li id="status-offline"><span class="status-circle"></span>
                        <p>Offline</p>
                     </li>
                  </ul>
               </div>
               <div id="expanded">
                  <label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
                  <input name="twitter" type="text" value="mikeross" />
                  <label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
                  <input name="twitter" type="text" value="ross81" />
                  <label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
                  <input name="twitter" type="text" value="mike.ross" />
               </div>
            </div>
         </div>
         <div id="search">
            <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
            <input type="text" placeholder="Search contacts..." />
         </div>
         <div id="contacts">
            <ul>
               <li class="contact">
                  <div class="wrap">
                     <span class="contact-status busy"></span>
                     <img src="https://contattafiles.s3.us-west-1.amazonaws.com/tnt14094/avatars/users/CNNWLMU9pl4nPQj/1606125-140x140.png?v=20181016172005"
                        alt="" />
                     <div class="meta">
                        <p class="name">Steve Piron</p>
                        <p class="preview">Boushaba ?</p>
                     </div>
                  </div>
               </li>
               <li class="contact">
                  <div class="wrap">
                     <span class="contact-status"></span>
                     <img src="https://contattafiles.s3.us-west-1.amazonaws.com/tnt14094/avatars/users/iKmYN_2ZWEaaH32/1606124-140x140.png?v=20181018144540"
                        alt="" />
                     <div class="meta">
                        <p class="name">Andy Kraus</p>
                        <p class="preview">Heyyyy</p>
                     </div>
                  </div>
               </li>
               <li class="contact">
                  <div class="wrap">
                     <span class="contact-status"></span>
                     <img src="https://contattafiles.s3.us-west-1.amazonaws.com/tnt14094/avatars/users/frOB4AfvpGnBJIb/1606087-140x140.png?v=20181017090125"
                        alt="" />
                     <div class="meta">
                        <p class="name">Raphaël Colson</p>
                        <p class="preview"><span>You:</span> Base de donnée ?</p>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         <div id="bottom-bar">
            <div class="dropup">
               <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="true">
                  Add Contact
                  <span class="caret"></span>
               </button>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><input type="text" placeholder="Enter Contact Email..." /></li>
               </ul>
            </div>

            <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
         </div>
      </div>
      <div class="content">
         <div class="contact-profile">
            <img src="https://contattafiles.s3.us-west-1.amazonaws.com/tnt14094/avatars/users/9wCPVsPmq1RCYdU/1587398-140x140.png?v=20180825071221"
               alt="" />
            <p>Leny Delnatte</p>
            <div class="social-media">
               <i class="fa fa-facebook" aria-hidden="true"></i>
               <i class="fa fa-twitter" aria-hidden="true"></i>
               <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>
         </div>
         <div class="messages">
            <ul>

               <li class="replies">
                  <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                  <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
               </li>
            </ul>
         </div>
         <div class="message-input">
            <div class="wrap">
               <input type="text" placeholder="Write your message..." />
               <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
               <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
         </div>
      </div>
   </div>
   <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
   <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
   <script src="./script.js"></script>
</body>

</html>