
<style>
     .dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */

.mean-bar{margin-top:-61px}
#headnavbar{width:107%}
/* .mean-bar{display:none} */



.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

#contests:hover #contestsDown{display: block; z-index: 20;}
#songs:hover #songsDown{display: block;}
#login:hover #loginDown{display: block;}


.dropdown:hover .dropbtn {background-color: #3e8e41;}
 </style>
 

<section class="pt-3" style="background-color: #1b191e;">
  <div class="text-center d-flex justify-content-center align-self-center">
    <img src="assets/image/logokb.png" class="mt-2 mr-3" style="height:36px !important" alt="Image"> 
    <h1 class="text-light"> <?=$home_title?></h1>
  </div>
</section>

<nav class="navbar navbar-expand-lg navbar-dark pb-2" style="background-color: #1b191e;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" id="contests">
        <a class="nav-link" href="#">Contests</a>
        <div class="dropdown-content" id="contestsDown">
          <a href="contest-page?action=ongoing">Ongoing</a>
          <a href="contest-page?action=upcoming">Upcoming</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about">About</a>
      </li>
      <?php
        if(isset($_SESSION['signed_in']))
        {
        ?>
            
            <li class="nav-item" id="songs"><a href="#" class="nav-link">Songs</a>
                
                <div class="dropdown-content" id="songsDown">
                  <a href="allsongs">All songs</a>
                  <a href="yoursongs">My songs</a>
                </div>
            </li>
        <?php
        }
        else
        {
        ?>
            <li class="nav-item"><a href="allsongs" class="nav-link">Songs</a></li>
        <?php
        }
        ?>
      <li class="nav-item">
        <a class="nav-link" href="blog_home">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact">Contact&nbsp;Us</a>
      </li>

      <?php
        if(isset($_SESSION['signed_in']))
        {
        ?>
            
            <li class="nav-item" id="login"><a href="#" class="btn btn-danger nav-link" style="background-color: <?=$websiteBackgroudColor?>;color:white">Welcome! <?=$_SESSION['name']?><i class="fa fa-angle-down"></i></a>
                <div class="dropdown-content" id="loginDown">
                  <a href="my_contests">My Contests</a>
                  <a href="logout">Log Out</a>
                </div>
            </li>
        <?php
        }
        else
        {
        ?>
            <!-- <li> <a href="registration" class="btn btn-danger"  style="background-color:<?=$websiteBackgroudColor?>;color:white">Login</a></li> -->
            <li class="nav-item">
              <a class="nav-link" href="registration">Login</a>
            </li>
        <?php
        }
        ?>

    </ul>
    
  </div>
</nav>
