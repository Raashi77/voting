<style>
@charset "utf-8";
@import url('https://fonts.googleapis.com/css?family=Muli:400,600');
@import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700');
/**
*
* -----------------------------------------------------------------------------
*
* Template : Shooter HTML5 Responsive Photography and Photo Contest Template 
* Author : rs-theme
* Author URI : http://www.rstheme.com/
*
* -----------------------------------------------------------------------------
*
**/
/* Table Of Content
---------------------------------------------------------
1.General CSS
2.Header area start here
3.Slide Menu Section Start Here
4.Slider Area Start Here
4.1 Home Two Slider Area Start Here
5.About Photo Contests Start Here
6.Home Page Gellary Start Here
7.Winner Start Here
8.Home Page Banner Start Here
9.Counter up Section Start Here
10.Home Blog Start Here
11.Client Logo Area
12.Footer Area Section Start Here
13.Portfolio One Start Here
14.Inner Page Header serction start here
15.About Team Start Here
16.Winners Start Here
17.Related Winners Start Here
18.Pagination Area Start Here
19.Single Photo Contest Start Here
20.Blog Page Start Here
21.Blog Details Page start here
22.Contact Us page Start Here  
23.Error page Start Here 
24.Login and Registration start Here 
25.Photo Deatils Start Here
26.Multistep Form Start Here
27.Home Page About Us area start here
28.Testimonial Area Start Here
29.home page core services start here 
30.Slider Bottom area start  here
31.Home About Start Here  
32.Home Two Slider Button Services Start Here
33.Portfolio One Page Start Here
34.Portfolio Two Page Start Here
35.Portfolio Details Start Here
36.Shop Page Start Here
37.About Me Start Here
38.Preview Start Here
39.Shipping Area Start Here
--------------------------------------------------------*/
html,
body {
  height: 100%;
  font-size: 14px;
  color: #333333;
  font-family: 'Muli', sans-serif;
  vertical-align: baseline;
  line-height: 26px;
  font-weight: 400;
}
/* ....................................
1. General CSS
.......................................*/
.floatleft {
  float: left;
}
.floatright {
  float: right;
}
.alignleft {
  float: left;
  margin-right: 15px;
  margin-bottom: 26px;
}
.alignright {
  float: right;
  margin-left: 15px;
  margin-bottom: 26px;
}
.aligncenter {
  display: block;
  margin: 0 auto 26px;
}
a:focus {
  outline: 0px solid;
}
img {
  max-width: 100%;
  height: auto;
}
.fix {
  overflow: hidden;
}
p {
  margin: 0 0 26px;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  margin: 0 0 26px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
}
a {
  transition: all 0.5s ease 0s;
  text-decoration: none;
}
a:hover {
  color: <?=$websiteBackgroudColor?>;
  text-decoration: none;
}
a:active,
a:hover {
  outline: 0 none;
  color: #b52929;
}
ul {
  list-style: outside none none;
  margin: 0;
  padding: 0;
}
.clear {
  clear: both;
}
::-moz-selection {
  background: <?=$websiteBackgroudColor?>;
  text-shadow: none;
  color: #ffffff;
}
::selection {
  background: <?=$websiteBackgroudColor?>;
  text-shadow: none;
  color: #ffffff;
}
.browserupgrade {
  margin: 26px 0;
  background: <?=$websiteBackgroudColor?>;
  color: #333333;
  padding: 26px 0;
}
.gray-bg {
  background-color: #f5f5f5;
}
.acurate {
  margin: 0;
  padding: 0;
}
.radius-0 {
  border-radius: 0 !important;
}
.radius-30 {
  border-radius: 30px !important;
}
.padding-0 {
  padding: 0 !important;
}
.padding {
  padding: 30px;
}
.padding-top {
  padding-top: 30px;
}
.padding-bottom {
  padding-bottom: 30px;
}
.padding1 {
  padding: 60px;
}
.padding-top1 {
  padding-top: 60px;
}
.padding-bottom1 {
  padding-bottom: 60px;
}
.margin-0 {
  margin: 0 !important;
}
.sec-spacer {
  padding: 90px 0 100px;
}
.pt-100 {
  padding-top: 100px;
}
.pt-90 {
  padding-top: 90px;
}
.pb-100 {
  padding-bottom: 100px;
}
.pb-90 {
  padding-bottom: 90px;
}
.pb-70 {
  padding-bottom: 70px;
}
.mb-30 {
  margin-bottom: 30px !important;
}
.mb-50 {
  margin-bottom: 50px;
}
.mr-10 {
  margin-right: 10px;
}
.white-bg {
  background: #ffffff;
}
.sec-bg {
  background: #f8f8f8;
}
.gray-bg {
  background: #f5f5f5;
}
.mean-container .mean-nav {
  position: absolute;
  top: 100%;
}
.section-title {
  text-align: center;
}
.section-title h2 {
  font-size: 36px;
  text-transform: uppercase;
  margin-bottom: 30px;
  position: relative;
  padding-bottom: 25px;
}
.section-title h2:after {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  width: 60px;
  height: 2px;
  content: "";
  bottom: 0;
  margin: auto;
  background: <?=$websiteBackgroudColor?>;
}
.section-title h2:before {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  width: 40px;
  height: 2px;
  content: "";
  bottom: 5px;
  margin: auto;
  background: <?=$websiteBackgroudColor?>;
}
.section-title h2 span {
  color: <?=$websiteBackgroudColor?>;
  font-weight: 400;
}
.section-title img {
  margin-bottom: 50px;
  display: none;
}
.section-title p {
  padding: 0 150px;
  margin-bottom: 30px;
}
.view-more {
  display: block;
  width: 100%;
  text-align: center;
  margin: auto;
}
.view-more a {
  margin-top: 30px;
  display: inline-block;
  border: 1px solid <?=$websiteBackgroudColor?>;
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  font-size: 16px;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
  padding: 5px 25px;
}
.view-more a:hover {
  border: 1px solid #b52929;
  background: #b52929;
  color: #ffffff;
  box-shadow: none;
}
.tablate {
  display: none;
}
.owl-theme .owl-controls {
  margin: 0;
}
/* ------------------------------------
2.Header area start here 
---------------------------------------*/
.header-top-area {
  background: <?=$websiteBackgroudColor?>;
  padding: 10px 0;
}
.header-top-area .header-top-left ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.header-top-area .header-top-left ul li {
  display: inline;
  margin-right: 25px;
  color: #ffffff;
}
.header-top-area .header-top-left ul li i {
  font-weight: 600;
  font-size: 14px;
  margin-right: 10px;
  color: #ffffff;
}
.header-top-area .header-top-left ul li a {
  transition: all 0.5s ease 0s;
  color: #ffffff;
}
.header-top-area .header-top-left ul li a:hover {
  color: #e6e6e6;
}
.header-top-area .social-media-area {
  display: inline-block;
  margin-right: 25px;
}
.header-top-area .social-media-area ul li {
  display: inline-block;
  margin: 2px;
}
.header-top-area .social-media-area ul li a {
  display: block;
  width: 20px;
  height: 20px;
  line-height: 20px;
  color: #ffffff;
  transition: all 0.5s ease 0s;
  text-decoration: none;
}
.header-top-area .social-media-area ul li a:hover {
  color: #e6e6e6;
  border-radius: 50%;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
}
.header-top-area .social-media-area ul li a i {
  text-align: center;
  display: inline-block;
}
.header-top-area .social-media-area ul li:last-child {
  border-right: 1px solid #fff;
  padding-right: 30px;
}
.header-top-area .header-top-right {
  display: inline-block;
}
.header-top-area .header-top-right ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.header-top-area .header-top-right ul li {
  display: inline-block;
}
.header-top-area .header-top-right ul li a {
  color: #ffffff;
  transition: all 0.5s ease 0s;
}
.header-top-area .header-top-right ul li a:hover {
  color: #e6e6e6;
}
.header-top-area .header-top-right ul li i {
  font-weight: 600;
  font-size: 14px;
  margin-right: 10px;
  color: #ffffff;
}
.header-middle-area {
  background: #ffffff;
  position: absolute;
  left: 0;
  right: 0;
  width: 100%;
  z-index: 99;
  -webkit-transition: all 0.5s ease-out;
  -moz-transition: all 0.5s ease-out;
  -ms-transition: all 0.5s ease-out;
  -o-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
}
.header-middle-area .logo-area {
  padding: 27px 0 0;
}
.header-middle-area .logo-area a {
  font-weight: 900;
  font-size: 27px;
  color: <?=$websiteBackgroudColor?>;
  display: block;
  text-transform: lowercase;
  position: relative;
}
.header-middle-area .logo-area a img {
  display: inline-block;
}
.header-middle-area .main-menu ul {
  margin: 0;
  padding: 0;
  text-align: center;
}
.header-middle-area .main-menu ul li {
  display: inline-block;
  padding: 30px 15px;
  position: relative;
  /* Dropdown Menu area */
}
.header-middle-area .main-menu ul li a {
  display: block;
  text-transform: uppercase;
  text-decoration: none;
  color: #444444;
  font-weight: 500;
  transition: all 0.5s ease 0s;
  font-family: 'Poppins', sans-serif;
}
.header-middle-area .main-menu ul li a i {
  margin-left: 10px;
  color: #444444;
}
.header-middle-area .main-menu ul li.active a {
  color: <?=$websiteBackgroudColor?>;
}
.header-middle-area .main-menu ul li.active a i {
  margin-left: 10px;
  color: <?=$websiteBackgroudColor?>;
}
.header-middle-area .main-menu ul li.active a:hover a {
  color: <?=$websiteBackgroudColor?>;
}
.header-middle-area .main-menu ul li.active a:hover a i {
  margin-left: 10px;
  color: <?=$websiteBackgroudColor?>;
}
.header-middle-area .main-menu ul li:hover a {
  color: <?=$websiteBackgroudColor?>;
}
.header-middle-area .main-menu ul li:hover a i {
  margin-left: 10px;
  color: <?=$websiteBackgroudColor?>;
}
.header-middle-area .main-menu ul li ul {
  background: #ffffff;
  left: 0;
  opacity: 0;
  position: absolute;
  top: 100%;
  transform: scaleY(0);
  transform-origin: 0 0 0;
  transition: all 0.5s ease 0s;
  width: 200px;
  z-index: 99999 !important;
  text-align: left;
  visibility: hidden;
}
.header-middle-area .main-menu ul li ul li {
  display: block;
  border-top: 1px dashed #dddddd;
  margin: 0;
  padding: 0;
  border-right: 0px solid transparent;
}
.header-middle-area .main-menu ul li ul li:last-child {
  border-bottom: 0;
}
.header-middle-area .main-menu ul li ul li a {
  display: block;
  padding: 6px 20px;
  text-transform: none;
  transition: all 0.5s ease 0s;
  color: #444444 !important;
  font-family: 'Poppins', sans-serif;
  font-weight: 300;
}
.header-middle-area .main-menu ul li ul li a:hover {
  padding-left: 30px;
  color: <?=$websiteBackgroudColor?> !important;
}
.header-middle-area .main-menu ul li:hover ul {
  opacity: 1;
  transform: scaleY(1);
  visibility: visible;
}
.header-middle-area .cart-area {
  transition: all 0.5s ease 0s;
  margin-right: 20px;
  text-align: right;
}
.header-middle-area .cart-area a {
  padding: 30px 0;
  display: block;
  transition: all 0.5s ease 0s;
  position: relative;
}
.header-middle-area .cart-area a span {
  position: absolute;
  right: -15px;
  top: 13px;
  color: #ffffff;
  width: 30px;
  height: 30px;
  background: <?=$websiteBackgroudColor?>;
  text-align: center;
  border-radius: 50%;
}
.header-middle-area .cart-area a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.header-middle-area .cart-area a:hover i {
  color: <?=$websiteBackgroudColor?>;
}
.header-middle-area .cart-area a i {
  text-align: center;
  font-weight: bold;
  font-size: 20px;
  color: #444444;
}
.header-middle-area.stick {
  background: #ffffff;
  position: fixed !important;
  top: 0px;
  z-index: 9999;
  margin: 0 auto !important;
  padding: 0;
  left: 0;
  right: 0;
  -webkit-box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
  -webkit-animation-duration: .5s;
  animation-duration: .5s;
  -webkit-animation-name: sticky-animation;
  animation-name: sticky-animation;
  -webkit-animation-timing-function: ease-out;
  animation-timing-function: ease-out;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
.header-middle-area.stick .main-menu ul li a {
  color: #444444;
}
.header-middle-area.stick .menuright ul li a {
  color: #444444;
}
.mobile-menu-area {
  display: none;
}
@-webkit-keyframes sticky-animation {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-100%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
  }
}
@keyframes sticky-animation {
  0% {
    opacity: 0;
    transform: translateY(-100%);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
/* ------------------------------------
  3.Slide Menu Section Start Here 
---------------------------------------*/
.slide-menu-area {
  background: rgba(211, 47, 47, 0.9);
  width: 0px;
  height: 100vh;
  position: fixed;
  right: -360px;
  top: 0px;
  padding: 200px 30px;
  transition: all 0.5s ease 0s;
  opacity: 0;
  visibility: hidden;
}
.slide-menu-area .close {
  position: absolute;
  left: 0;
  top: 0;
  color: #ffffff;
  opacity: 1;
  padding: 10px;
}
.slide-menu-area .close i {
  color: #ffffff;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.5s ease 0s;
}
.slide-menu-area .close i:hover {
  color: #222222;
}
.slide-menu-area.highlight {
  right: 0;
  opacity: 1;
  width: 300px;
  visibility: visible;
  z-index: 999;
}
.slide-menu-area h3 {
  color: #ffffff;
  font-weight: 600;
  position: relative;
}
.slide-menu-area h3:after {
  position: absolute;
  content: "";
  top: 30px;
  left: 0px;
  width: 60px;
  height: 2px;
  font-style: normal;
  background: #ffffff;
}
.slide-menu-area ul {
  text-align: left;
  transition: all 0.5s ease 0s;
  margin: 0;
  padding: 0;
}
.slide-menu-area ul li {
  display: block;
  position: relative;
  font-size: 14px;
  color: #ffffff;
  margin-right: 30px;
  padding: 10px 0;
}
.slide-menu-area ul li:last-child {
  margin-right: 0;
}
.slide-menu-area ul li span {
  font-weight: 600;
  color: #ffffff;
  padding: 0 1px;
}
.slide-menu-area ul li span i {
  margin-left: 50px;
}
.slide-menu-area ul li a {
  display: block;
  color: #ffffff;
  transition: all 0.5s ease 0s;
}
.slide-menu-area ul li a:hover {
  color: #dddddd;
}
.slide-menu-area ul li i {
  color: #ffffff;
  margin-right: 10px;
  font-size: 12px;
}
.slide-menu-area .footer-social-media-area ul {
  text-align: left;
}
.slide-menu-area .footer-social-media-area ul li {
  display: inline-block;
  margin: 2px;
}
.slide-menu-area .footer-social-media-area ul li a {
  display: block;
  width: 30px;
  height: 30px;
  line-height: 28px;
  color: #dddddd;
  background: #000000;
  border: 1px solid <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
  text-decoration: none;
  text-align: right;
  border-radius: 50%;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
}
.slide-menu-area .footer-social-media-area ul li a:hover {
  background: #b52929;
  border: 1px solid #b52929;
}
.slide-menu-area .footer-social-media-area ul li a i {
  text-align: center;
  display: inline-block;
}
/* ----------------------------------
  4.Slider Area Start Here 
  -------------------------------------*/
.slider-area .carousel .carousel-indicators li {
  background: #ffffff;
  border: 1px solid <?=$websiteBackgroudColor?>;
}
.slider-area .carousel .carousel-indicators li.active {
  background: <?=$websiteBackgroudColor?>;
  border: 1px solid <?=$websiteBackgroudColor?>;
}
.slider-area .carousel .carousel-inner .item.active img {
  width: 100%;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption {
  right: 0 !important;
  padding-bottom: 0;
  top: 30%;
  position: absolute;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li {
  position: relative;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content {
  width: 600px;
  position: absolute;
  display: table;
  vertical-align: middle;
  text-align: right;
  left: 35%;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content h2 {
  font-size: 36px;
  text-transform: uppercase;
  color: #ffffff;
  font-weight: 600;
  -webkit-animation: bounceInUp 1000ms ease-in-out;
  -moz-animation: bounceInUp 1000ms ease-in-out;
  -ms-animation: bounceInUp 1000ms ease-in-out;
  animation: bounceInUp 1000ms ease-in-out;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content h2 span {
  color: #ffffff;
  font-weight: 400;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content p {
  line-height: 28px;
  -webkit-animation: zoomIn 500ms ease-in-out;
  -moz-animation: zoomIn 500ms ease-in-out;
  -ms-animation: zoomIn 500ms ease-in-out;
  animation: zoomIn 500ms ease-in-out;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content .button-area {
  -webkit-animation: bounceInDown 2500ms ease-in-out;
  -moz-animation: bounceInDown 2500ms ease-in-out;
  -ms-animation: bounceInDown 2500ms ease-in-out;
  animation: bounceInDown 2500ms ease-in-out;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content .button-area ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content .button-area ul li {
  display: inline-block;
  margin-right: 30px;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content .button-area ul li:first-child a {
  border: 1px solid <?=$websiteBackgroudColor?>;
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  -webkit-animation: bounceInDown 2500ms ease-in-out;
  -moz-animation: bounceInDown 2500ms ease-in-out;
  -ms-animation: bounceInDown 2500ms ease-in-out;
  animation: bounceInDown 2500ms ease-in-out;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content .button-area ul li:first-child a:hover {
  border: 1px solid #b52929 !important;
  background: #b52929 !important;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content .button-area ul li:last-child {
  margin-right: 0;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content .button-area ul li a {
  display: block;
  border: 1px solid #ffffff;
  background: #ffffff;
  font-size: 16px;
  color: #444444;
  transition: all 0.5s ease 0s;
  border-radius: 0px;
  padding: 10px 18px;
}
.slider-area .carousel .carousel-inner .item.active .carousel-caption ul li .slider-content .button-area ul li a:hover {
  border: 1px solid <?=$websiteBackgroudColor?>;
  background: <?=$websiteBackgroudColor?>;
  color: #444444;
}
/* ------------------------------------
4.1 Home Two Slider Area Start Here 
---------------------------------------*/
.slider-area .slider-1 h1 {
  font-size: 72px;
  color: #ffffff;
  letter-spacing: 0px;
  text-transform: capitalize;
  font-weight: 700;
}
.slider-area .slider-1 h1 span {
  font-size: 55px;
  display: block;
}
.slider-area .slider-1 h1.uppercase {
  text-transform: uppercase;
}
.slider-area .slider-1 div.title2 {
  font-size: 16px;
  color: #ffffff;
  max-width: 600px;
  margin: 0 auto;
  font-weight: normal;
  line-height: 1.6;
}
.slider-area .slider-1 div.slider-botton {
  display: block;
  margin-top: 50px;
}
.slider-area .slider-1 div.slider-botton ul li {
  display: inline-block;
  margin-right: 10px;
}
.slider-area .slider-1 div.slider-botton ul li.acitve a {
  display: block;
  padding: 17px 40px;
  color: #ffffff;
  transition: all 0.5s ease 0s;
  background: <?=$websiteBackgroudColor?>;
  border: 1px solid <?=$websiteBackgroudColor?>;
  font-weight: 700;
  text-transform: uppercase;
  -webkit-animation: bounceInDown 2500ms ease-in-out;
  -moz-animation: bounceInDown 2500ms ease-in-out;
  -ms-animation: bounceInDown 2500ms ease-in-out;
  animation: bounceInDown 2500ms ease-in-out;
}
.slider-area .slider-1 div.slider-botton ul li.acitve a i {
  margin-left: 10px;
}
.slider-area .slider-1 div.slider-botton ul li.acitve a:hover {
  border: 1px solid #b52929 !important;
  background: #b52929 !important;
}
.slider-area .slider-1 div.slider-botton ul li a {
  display: block;
  padding: 17px 40px;
  color: #444444;
  border: 1px solid #ffffff;
  transition: all 0.5s ease 0s;
  font-weight: 700;
  text-transform: uppercase;
  -webkit-border-radius: 30px;
  -moz-border-radius: 30px;
  border-radius: 30px;
  background: #ffffff;
}
.slider-area .slider-1 div.slider-botton ul li a i {
  margin-left: 10px;
}
.slider-area .slider-1 div.slider-botton ul li a:hover {
  background: <?=$websiteBackgroudColor?>;
  border: 1px solid <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.slider-area .slider-2 h1 {
  font-size: 72px;
  color: #ffffff;
  letter-spacing: 0px;
  font-weight: 700;
  text-transform: capitalize;
}
.slider-area .slider-2 h1 span {
  font-size: 55px;
  display: block;
}
.slider-area .slider-2 h1.uppercase {
  text-transform: uppercase;
}
.slider-area .slider-2 div.title2 {
  font-size: 16px;
  color: #dddddd;
  max-width: 600px;
  margin: 0 auto;
  font-weight: normal;
  line-height: 1.6;
}
.slider-area .slider-2 div.slider-botton {
  display: block;
  margin-top: 50px;
}
.slider-area .slider-2 div.slider-botton ul li {
  display: inline-block;
  margin-right: 10px;
}
.slider-area .slider-2 div.slider-botton ul li.acitve a {
  display: block;
  padding: 17px 40px;
  color: #ffffff;
  transition: all 0.5s ease 0s;
  background: <?=$websiteBackgroudColor?>;
  border: 1px solid <?=$websiteBackgroudColor?>;
  font-weight: 700;
  text-transform: uppercase;
  -webkit-animation: bounceInDown 2500ms ease-in-out;
  -moz-animation: bounceInDown 2500ms ease-in-out;
  -ms-animation: bounceInDown 2500ms ease-in-out;
  animation: bounceInDown 2500ms ease-in-out;
}
.slider-area .slider-2 div.slider-botton ul li.acitve a i {
  margin-left: 10px;
}
.slider-area .slider-2 div.slider-botton ul li.acitve a:hover {
  border: 1px solid #b52929 !important;
  background: #b52929 !important;
}
.slider-area .slider-2 div.slider-botton ul li a {
  display: block;
  padding: 17px 40px;
  color: #444444;
  border: 1px solid #ffffff;
  transition: all 0.5s ease 0s;
  font-weight: 700;
  text-transform: uppercase;
  -webkit-border-radius: 30px;
  -moz-border-radius: 30px;
  border-radius: 30px;
  background: #ffffff;
}
.slider-area .slider-2 div.slider-botton ul li a i {
  margin-left: 10px;
}
.slider-area .slider-2 div.slider-botton ul li a:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  border: 1px solid <?=$websiteBackgroudColor?>;
}
/* ------------------------------------
5.About Photo Contests Start Here 
---------------------------------------*/
.home-about-photo-contest-area h3.headding-title {
  color: #282828;
  font-size: 24px;
  margin: 28px 0 22px;
}
.home-about-photo-contest-area ul#meta-text {
  margin: 0 0 15px;
  padding: 0;
  list-style: none;
}
.home-about-photo-contest-area ul#meta-text li {
  display: inline-block;
  text-transform: uppercase;
  font-size: 14px;
  color: #666666;
  padding-right: 10px;
}
.home-about-photo-contest-area ul#meta-text li i {
  padding-right: 5px;
}
.home-about-photo-contest-area .countdown-section .time_circles {
  max-width: 530px;
}
.home-about-photo-contest-area .countdown-section .time_circles > div:nth-child(2) {
  color: <?=$websiteBackgroudColor?>;
}
.home-about-photo-contest-area .countdown-section .time_circles > div:nth-child(3) {
  color: #ad38e2;
}
.home-about-photo-contest-area .countdown-section .time_circles > div:nth-child(4) {
  color: #2cb23b;
}
.home-about-photo-contest-area .countdown-section .time_circles > div:nth-child(5) {
  color: #46ceaa;
}
.home-about-photo-contest-area .countdown-section .time_circles > div span {
  font-weight: 300;
  font-size: 30px;
  font-family: 'Roboto', sans-serif;
}
.home-about-photo-contest-area .countdown-section .time_circles > div h4 {
  font-size: 15px;
  font-weight: 400;
  text-transform: capitalize;
}
.home-about-photo-contest-area .countdown-section.full-section {
  margin-bottom: 20px;
}
.home-about-photo-contest-area p.des {
  font-size: 15px;
  color: #666666;
  margin: 10px 0 26px;
}
.home-about-photo-contest-area .link-section a.primary-btn {
  font-size: 15px;
  text-transform: uppercase;
  color: #fff;
  display: inline-block;
  text-align: center;
  background: <?=$websiteBackgroudColor?>;
  padding: 8px 25px;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  border: 1px solid <?=$websiteBackgroudColor?>;
  transition: 0.4s;
  -webkit-transition: 0.4s;
  -ms-transition: 0.4s;
}
.home-about-photo-contest-area .link-section a.primary-btn:hover {
  background: #b52929;
  border-color: #b52929;
  box-shadow: none;
}
.home-about-photo-contest-area .link-section a.primary-btn.joni-btn {
  background: transparent;
  color: <?=$websiteBackgroudColor?>;
  box-shadow: none;
}
.home-about-photo-contest-area .link-section a.primary-btn.joni-btn:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #fff;
  border-color: <?=$websiteBackgroudColor?>;
}
.home-about-photo-contest-area .join-details {
  margin-bottom: 30px;
}
.home-about-photo-contest-area .join-details p {
  margin: 0;
}
.home-about-photo-contest-area .google-add-img {
  margin-bottom: 30px;
}
.home-about-photo-contest-area .full-photocontest-area .countdown-section {
  margin-bottom: 15px;
}
.home-about-photo-contest-area .full-photocontest-area h3.headding-title {
  margin-top: 0;
}
@media screen and (max-width: 767px) {
  .home-about-photo-contest-area .full-photocontest-area h3.headding-title {
    margin-top: 28px;
  }
}
/* ------------------------------------
6.Home Page Gellary Start Here 
---------------------------------------*/
.home-gellary-area .single-gellary {
  background: #f5f5f5;
  padding: 5px;
  position: relative;
  overflow: hidden;
}
.home-gellary-area .single-gellary .image {
  position: relative;
  overflow: hidden;
  margin-bottom: 0px;
}
.home-gellary-area .single-gellary .image:hover .overley {
  opacity: 1;
  transform: scale(1);
}
.home-gellary-area .single-gellary .image a {
  display: block;
}
.home-gellary-area .single-gellary .image a img {
  width: 100%;
}
.home-gellary-area .single-gellary .image span {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 60px;
  height: 60px;
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  padding: 2px;
  text-align: center;
  z-index: 99;
}
.home-gellary-area .single-gellary .image .overley {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.8);
  top: 0;
  transform: scale(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.home-gellary-area .single-gellary .image .overley ul {
  margin: 0;
  padding: 0;
  list-style: none;
  position: relative;
  top: 45%;
  transform: rotate(0deg);
  transition: all .9s;
}
.home-gellary-area .single-gellary .image .overley ul li {
  display: inline-block;
  color: #ffffff;
  margin-right: 5px;
}
.home-gellary-area .single-gellary .image .overley ul li i {
  color: #ffffff;
  margin-right: 10px;
  font-size: 16px;
  width: 45px;
  height: 45px;
  line-height: 45px;
  border: 1px solid #ffffff;
  border-radius: 50%;
}
.home-gellary-area .single-gellary:hover img {
  opacity: .9;
}
.home-gellary-area .single-gellary:hover .gellary-informations {
  background: <?=$websiteBackgroudColor?>;
  -webkit-transition: all 0.5s ease-out;
  -moz-transition: all 0.5s ease-out;
  -ms-transition: all 0.5s ease-out;
  -o-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
}
.home-gellary-area .single-gellary:hover .gellary-informations ul li {
  color: #ffffff;
}
.home-gellary-area .single-gellary:hover .gellary-informations ul li h3 a {
  font-size: 18px;
  transition: all 0.5s ease 0s;
  color: #ffffff;
}
.home-gellary-area .single-gellary:hover .gellary-informations ul li h3 a:hover {
  color: #ffffff;
}
.home-gellary-area .single-gellary:hover .gellary-informations ul li h3 a span {
  color: #ffffff;
}
.home-gellary-area .single-gellary:hover .gellary-informations ul li i {
  color: #ffffff;
}
.home-gellary-area .single-gellary img {
  width: 100%;
  transition: all 0.5s ease 0s;
  position: relative;
  overflow: hidden;
}
.home-gellary-area .single-gellary .gellary-informations {
  padding: 15px;
  transition: all 0.5s ease 0s;
}
.home-gellary-area .single-gellary .gellary-informations ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.home-gellary-area .single-gellary .gellary-informations ul li {
  display: inline-block;
  margin-right: 10px;
}
.home-gellary-area .single-gellary .gellary-informations ul li h3 {
  margin-bottom: 15px;
}
.home-gellary-area .single-gellary .gellary-informations ul li h3 a {
  font-size: 18px;
  transition: all 0.5s ease 0s;
  color: #333333;
}
.home-gellary-area .single-gellary .gellary-informations ul li h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.home-gellary-area .single-gellary .gellary-informations ul li h3 a span {
  display: block;
  font-weight: 400;
  color: #333333;
  font-size: 12px;
  margin-top: 10px;
}
.home-gellary-area .single-gellary .gellary-informations ul li i {
  color: <?=$websiteBackgroudColor?>;
  font-weight: 600;
  margin-right: 10px;
}
/* ------------------------------------
7.Winner Start Here 
---------------------------------------*/
.winner-area {
  background: #f5f5f5;
}
.winner-area .single-winners {
  position: relative;
  overflow: hidden;
}
.winner-area .single-winners .images {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.winner-area .single-winners .images:hover h3 a {
  color: <?=$websiteBackgroudColor?>;
}
.winner-area .single-winners .images:hover .overley {
  opacity: 1;
  transform: scaleY(1);
}
.winner-area .single-winners .images a {
  display: block;
}
.winner-area .single-winners .images a img {
  transition: all 0.5s ease 0s;
}
.winner-area .single-winners .images .overley {
  position: absolute;
  left: 0;
  text-align: left;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.9);
  top: 0;
  transform: scaleY(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
  padding: 10px;
  text-align: center;
}
.winner-area .single-winners .images .overley .winners-details {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
}
.winner-area .single-winners .images .overley .winners-details h4 {
  margin-bottom: 10px;
  padding-bottom: 10px;
  color: #ffffff;
  font-size: 18px;
  position: relative;
}
.winner-area .single-winners .images .overley .winners-details span {
  margin-bottom: 5px;
  font-size: 14px;
  color: #ffffff;
  font-weight: 600;
}
.winner-area .single-winners .images .overley .winners-details p {
  margin-bottom: 5px;
  color: #ffffff;
  font-size: 12px;
}
.winner-area .single-winners .images .overley .winners-details p i {
  color: #ffffff;
  margin-right: 8px;
}
.winner-area .single-winners .images .overley .winners-details ul {
  margin: 0;
  padding: 0px;
  list-style: none;
  position: relative;
  top: 18%;
  transform: rotate(0deg);
  transition: all .9s;
  text-align: center;
}
.winner-area .single-winners .images .overley .winners-details ul li {
  display: inline-block;
  margin-bottom: 5px;
  color: #ffffff;
  margin-right: 10px;
}
.winner-area .single-winners .images .overley .winners-details ul li i {
  margin-right: 5px;
}
.winner-area .single-winners h3 {
  margin-bottom: 0;
}
.winner-area .single-winners h3 a {
  color: #333333;
  transition: all 0.5s ease 0s;
  font-size: 18px;
  text-transform: uppercase;
}
.winner-area .single-winners h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.winner-area .view-more {
  margin-top: 30px;
}
/* ------------------------------------
8.Home Page Banner Start Here 
---------------------------------------*/
.home-banner-area {
  color: #ffffff;
  background: url('images/banner/1.jpg') no-repeat;
  background-size: cover;
  background-position: center center;
}
.home-banner-area .section-title h3 {
  margin-bottom: 10px;
}
.home-banner-area .section-title img {
  margin-bottom: 20px;
}
.home-banner-area .section-title p {
  padding: 0 20%;
  margin-bottom: 10px;
}
.home-banner-area .view-more a {
  margin-top: 15px;
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  padding: 10px 20px;
  border: 1px solid <?=$websiteBackgroudColor?>;
  background: #45456;
}
/* ------------------------------------
9.Counter up Section Start Here
  ---------------------------------------*/
.project-activation-area {
  background: url(images/about/counter-up.png) no-repeat scroll 0 0;
  transition: all 0.3s ease 0s;
  background-size: cover;
  background-position: center center;
  line-height: 0;
}
.about-counter-list {
  text-align: center;
}
.about-counter-list i {
  margin-bottom: 15px;
}
.about-counter-list h1 {
  font-size: 40px;
  font-weight: 400;
  padding: 0;
  color: #ffffff;
  margin-top: 20px !important;
}
.about-counter-list p {
  color: #ffffff;
  font-weight: 400;
  letter-spacing: 2px;
  margin-bottom: 0;
  text-transform: uppercase;
  margin-left: 5px;
}
.ab-count {
  padding: 0 0 6px 0;
}
.about-counter-list .fa {
  color: <?=$websiteBackgroudColor?>;
  display: inline-block;
  font-size: 40px;
}
.about-counter-list .fa:hover {
  color: <?=$websiteBackgroudColor?>;
}
/* ----------------------------------
  10.Home Blog Start Here 
-------------------------------------*/
.home-blog-area .blog-slider .single-blog-slide {
  position: relative;
  overflow: hidden;
  width: 100% !important;
  padding: 0 15px;
}
.home-blog-area .blog-slider .single-blog-slide .images {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.home-blog-area .blog-slider .single-blog-slide .images:hover .overley {
  opacity: 1;
  transform: scale(1);
}
.home-blog-area .blog-slider .single-blog-slide .images a {
  display: block;
}
.home-blog-area .blog-slider .single-blog-slide .images a img {
  width: 100%;
}
.home-blog-area .blog-slider .single-blog-slide .images span {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 60px;
  height: 60px;
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  padding: 2px;
  text-align: center;
  z-index: 99;
}
.home-blog-area .blog-slider .single-blog-slide .images .overley {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.9);
  top: 0;
  transform: scale(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.home-blog-area .blog-slider .single-blog-slide .images .overley ul {
  margin: 0;
  padding: 0;
  list-style: none;
  position: relative;
  top: 45%;
  transform: rotate(0deg);
  transition: all .9s;
}
.home-blog-area .blog-slider .single-blog-slide .images .overley ul li {
  display: inline-block;
  color: #ffffff;
  margin-right: 5px;
}
.home-blog-area .blog-slider .single-blog-slide .images .overley ul li i {
  color: #ffffff;
  margin-right: 10px;
  font-size: 16px;
  width: 45px;
  height: 45px;
  line-height: 45px;
  border: 1px solid #ffffff;
  border-radius: 50%;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations ul {
  margin: 0 0 10px;
  padding: 0;
  list-style: none;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations ul li {
  display: inline-block;
  margin-right: 15px;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations ul li:last-child {
  margin-right: 0;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations ul li i {
  color: <?=$websiteBackgroudColor?>;
  margin-right: 5px;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations .blog-details h3 {
  margin-bottom: 20px;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations .blog-details h3 a {
  color: #333333;
  transition: all 0.5s ease 0s;
  font-size: 18px;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations .blog-details h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations .blog-details p {
  margin-bottom: 15px;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations .blog-details .read-more {
  display: block;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations .blog-details .read-more a {
  display: inline-block;
  color: #333333;
  font-size: 16px;
  transition: all 0.5s ease 0s;
  font-weight: 800;
  position: relative;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations .blog-details .read-more a:after {
  content: "\f101";
  font-family: fontawesome;
  color: <?=$websiteBackgroudColor?>;
  font-weight: 600;
  font-size: 16px;
  position: absolute;
  top: 0;
  right: 0px;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations .blog-details .read-more a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.home-blog-area .blog-slider .single-blog-slide .blog-informations .blog-details .read-more a:hover:after {
  right: -30px;
  opacity: 1;
}
.home-blog-area .blog-slider .owl-buttons div {
  opacity: 1;
  top: 30%;
  border-radius: 0px;
  background: transparent;
  width: 35px;
  height: 35px;
  border-radius: 0;
  border-radius: 50%;
  border: 1px dashed <?=$websiteBackgroudColor?>;
}
.home-blog-area .blog-slider .owl-buttons div i {
  font-size: 30px;
  line-height: 28px;
  color: <?=$websiteBackgroudColor?>;
}
.home-blog-area .blog-slider .owl-buttons div.owl-prev {
  position: absolute;
  left: -5%;
}
.home-blog-area .blog-slider .owl-buttons div.owl-prev:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.home-blog-area .blog-slider .owl-buttons div.owl-prev:hover i {
  color: #ffffff;
}
.home-blog-area .blog-slider .owl-buttons div.owl-next {
  position: absolute;
  right: -5%;
}
.home-blog-area .blog-slider .owl-buttons div.owl-next:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.home-blog-area .blog-slider .owl-buttons div.owl-next:hover i {
  color: #ffffff;
}
/* ------------------------------------
11.Client Logo Area 
---------------------------------------*/
.client-logo-area {
  border-top: 1px solid #e5e5e5;
  overflow: hidden;
}
.client-logo-area .single-logo {
  border: 1px solid #f5f5f5;
  text-align: center;
  margin: 0 5px;
}
.client-logo-area .single-logo:hover {
  border: 1px solid #dddddd;
  margin: 0 5px;
}
.client-logo-area .owl-buttons div {
  opacity: 1 !important;
  top: 23%;
  border-radius: 0px;
  background: transparent !important;
  width: 35px;
  height: 35px;
  border-radius: 0;
  border-radius: 50%;
  border: 1px dashed <?=$websiteBackgroudColor?>;
}
.client-logo-area .owl-buttons div i {
  font-size: 30px;
  line-height: 30px;
  color: <?=$websiteBackgroudColor?>;
}
.client-logo-area .owl-buttons div.owl-prev {
  position: absolute;
  left: -5%;
  opacity: 1 !important;
  margin: 0;
  padding: 0;
  top: 50%;
  transform: translateY(-50%);
}
.client-logo-area .owl-buttons div.owl-prev:hover {
  background: <?=$websiteBackgroudColor?> !important;
  color: #ffffff;
}
.client-logo-area .owl-buttons div.owl-prev:hover i {
  color: #ffffff;
}
.client-logo-area .owl-buttons div.owl-next {
  position: absolute;
  right: -5%;
  opacity: 1 !important;
  margin: 0;
  padding: 0;
  top: 50%;
  transform: translateY(-50%);
}
.client-logo-area .owl-buttons div.owl-next:hover {
  background: <?=$websiteBackgroudColor?> !important;
  color: #ffffff;
}
.client-logo-area .owl-buttons div.owl-next:hover i {
  color: #ffffff;
}
/* ------------------------------------
12.Footer Area Section Start Here 
---------------------------------------*/
.footer-top-area {
  background: #1c1c1c;
  background-size: cover;
  background-position: center center;
  padding: 80px 0;
}
.footer-top-area .single-footer h3 {
  font-size: 22px;
  color: #ffffff;
  font-weight: bold;
  line-height: 1.55;
}
.footer-top-area .single-footer p {
  color: #ffffff;
}
.footer-top-area .single-footer .footer-social-media-area ul {
  text-align: left;
}
.footer-top-area .single-footer .footer-social-media-area ul li {
  display: inline-block;
  margin: 2px;
}
.footer-top-area .single-footer .footer-social-media-area ul li a {
  display: block;
  width: 30px;
  height: 30px;
  line-height: 28px;
  color: #dddddd;
  background: #000000;
  border: 1px solid <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
  text-decoration: none;
  text-align: center;
  border-radius: 50%;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
}
.footer-top-area .single-footer .footer-social-media-area ul li a:hover {
  background: <?=$websiteBackgroudColor?>;
  border: 1px solid #c7aeae;
}
.footer-top-area .footer-two ul li {
  color: #999999;
}
.footer-top-area .footer-two ul li a {
  color: #ffffff;
  transition: all 0.5s ease 0s;
}
.footer-top-area .footer-two ul li a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.footer-top-area .footer-two ul li i {
  color: #2aacff;
  margin-right: 5px;
  display: inline-block;
}
.footer-top-area .footer-three h3 {
  margin-bottom: 33px;
}
.footer-top-area .footer-three ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.footer-top-area .footer-three ul li {
  display: inline-block;
  margin: 1px 3px;
  overflow: hidden;
  position: relative;
  width: 30%;
}
.footer-top-area .footer-three ul li a {
  display: block;
}
.footer-top-area .footer-three ul li a img {
  display: block;
  width: 100%;
  transition: all 0.3s ease-out;
}
.footer-top-area .footer-three ul li a img:hover {
  opacity: .5;
  transform: scale(1.1);
}
.footer-top-area .footer-four ul li {
  display: inline-block;
  color: #ffffff;
  margin: 0 0 15px 0;
  font-weight: 300;
}
.footer-top-area .footer-four ul li a {
  color: #ffffff;
  transition: all 0.5s ease 0s;
}
.footer-top-area .footer-four ul li a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.footer-top-area .footer-four ul li i {
  margin: 5px;
  color: <?=$websiteBackgroudColor?>;
}
.footer-bottom-area {
  background: #000000;
  padding: 20px 0;
}
.footer-bottom-area .footer-bottom p {
  text-align: center;
  color: #ffffff;
  margin: 0;
  font-weight: 300;
}
#scrollUp {
  background: <?=$websiteBackgroudColor?>;
  bottom: 100px;
  color: #ffffff !important;
  display: block;
  font-size: 26px;
  height: 46px;
  line-height: 42px;
  position: fixed;
  right: 20px;
  text-align: center;
  text-decoration: none !important;
  transition: all 0.5s cubic-bezier(0, 0, 0, 1) 0s;
  width: 46px;
  z-index: 1000;
}
.home #scrollUp,
.single-blog #scrollUp,
.photocontest-list1 #scrollUp,
.photocontest-list2 #scrollUp,
.single-contest2 #scrollUp,
.photo-details #scrollUp,
.error #scrollUp,
.gallery2 #scrollUp,
.about-me #scrollUp,
.single-portfolio #scrollUp,
.registration #scrollUp,
.cart #scrollUp,
.contact-us #scrollUp {
  border-radius: 30px;
}
#scrollUp:hover {
  background: #b52929;
}
.preview-2 .nivo-directionNav a.nivo-prevNav:before,
.preview-2 .nivo-directionNav a.nivo-nextNav:before {
  border: 1px dashed <?=$websiteBackgroudColor?> !important;
  color: #ffffff !important;
  background: transparent;
  border-radius: 50% !important;
  font-size: 20px !important;
  font-weight: 300 !important;
}
.preview-2 .nivo-directionNav a.nivo-prevNav:hover:before,
.preview-2 .nivo-directionNav a.nivo-prevNav:hover:before {
  background: <?=$websiteBackgroudColor?> !important;
}
/* ------------------------------------
13.Portfolio One Start Here 
---------------------------------------*/
#Container .mix {
  display: none;
}
.portfolio-one-area .portfolio-menu {
  text-align: center;
}
.portfolio-one-area .portfolio-menu ul {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: center;
  margin-bottom: 30px;
}
.portfolio-one-area .portfolio-menu ul li {
  display: inline-block;
  padding: 7px 0;
  margin-left: 20px;
  margin-right: 20px;
  font-size: 16px;
  font-weight: 500;
  transition: all 0.5s ease 0s;
  position: relative;
  cursor: pointer;
}
.portfolio-one-area .portfolio-menu ul li:after {
  content: "";
  position: absolute;
  left: 50%;
  width: 50px;
  height: 1px;
  background: <?=$websiteBackgroudColor?>;
  bottom: 0;
  opacity: 0;
  -webkit-transform: translateX(-50%);
  transform: translateX(-50%);
  transition: all 0.5s ease 0s;
}
.portfolio-one-area .portfolio-menu ul li:hover,
.portfolio-one-area .portfolio-menu ul li.active {
  color: <?=$websiteBackgroudColor?>;
}
.portfolio-one-area .portfolio-menu ul li:hover::after,
.portfolio-one-area .portfolio-menu ul li.active::after {
  opacity: 1;
}
.portfolio-one-area .single-portfolio {
  position: relative;
  overflow: hidden;
}
.portfolio-one-area .single-portfolio:hover .overley {
  opacity: 1;
  transform: scale(1);
}
.portfolio-one-area .single-portfolio .portfolio-image {
  overflow: hidden;
  position: relative;
}
.portfolio-one-area .single-portfolio .portfolio-image img {
  width: 100%;
}
.portfolio-one-area .single-portfolio .overley {
  position: absolute;
  content: "";
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  text-align: center;
  height: 100%;
  width: 100%;
  transition: all 0.5s ease 0s;
  opacity: 0;
  transform: scale(0);
  background: rgba(211, 47, 47, 0.8);
}
.portfolio-one-area .single-portfolio .overley .portfolio-details {
  top: 50%;
  position: relative;
  transform: translateY(-50px);
  text-align: center;
}
.portfolio-one-area .single-portfolio .overley .portfolio-details h3 {
  margin-bottom: 15px;
}
.portfolio-one-area .single-portfolio .overley .portfolio-details h3 a {
  transition: all 0.5s ease 0s;
  display: block;
  color: #ffffff;
  font-size: 16px;
  font-weight: 600;
}
.portfolio-one-area .single-portfolio .overley .portfolio-details h3 a:hover {
  color: #dddddd;
}
.portfolio-one-area .single-portfolio .overley .portfolio-details ul {
  margin: 0 0 15px;
  padding: 0;
  list-style: none;
  position: relative;
  top: 45%;
  transform: rotate(0deg);
  transition: all .9s;
}
.portfolio-one-area .single-portfolio .overley .portfolio-details ul li {
  display: inline-block;
  color: #ffffff;
  margin-right: 5px;
}
.portfolio-one-area .single-portfolio .overley .portfolio-details ul li i {
  color: #ffffff;
  margin-right: 10px;
  font-size: 16px;
  width: 45px;
  height: 45px;
  line-height: 45px;
  border: 1px solid #ffffff;
  border-radius: 50%;
}
.portfolio-one-area .single-portfolio .overley .photo-informations {
  background: <?=$websiteBackgroudColor?>;
  height: 60px;
  padding: 18px 30px;
  color: #ffffff;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
}
.portfolio-one-area .single-portfolio .overley .photo-informations ul {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: left;
}
.portfolio-one-area .single-portfolio .overley .photo-informations ul li {
  display: inline-block;
  margin-right: 10px;
  margin-bottom: 0;
}
.portfolio-one-area .single-portfolio .overley .photo-informations ul li i {
  color: #ffffff;
  font-weight: 600;
  margin-right: 5px;
}
.lightbox .lb-container {
  position: relative;
}
.lightbox .lb-container:hover .lb-prev,
.lightbox .lb-container:hover .lb-next {
  opacity: 1;
}
.lightbox .lb-data .lb-close {
  position: relative;
  background: none;
}
.lightbox .lb-data .lb-close:after {
  position: absolute;
  font-family: FontAwesome;
  content: "\f00d";
  font-size: 23px;
  top: 50%;
  left: 50%;
  color: #fff;
}
.lightbox .lb-nav .lb-prev,
.lightbox .lb-nav .lb-next {
  position: absolute;
  height: 80px;
  width: 80px;
  top: 50%;
  transform: translateY(-50%);
  background: none;
}
.lightbox .lb-nav .lb-prev:after,
.lightbox .lb-nav .lb-next:after {
  position: absolute;
  font-family: FontAwesome;
  font-size: 58px;
  top: 50%;
  left: 50%;
  transform: translateX(-50%);
  color: #fff;
}
.lightbox .lb-nav .lb-prev:after {
  content: "\f104";
}
.lightbox .lb-nav .lb-next:after {
  content: "\f105";
}
/* ------------------------------------
14.Inner Page Header serction start Here
--------------------------------------*/
.inner-page-header {
  background: url(images/banner/2.jpg) no-repeat;
  padding: 200px 0 113px 0;
  background-position: center center;
  background-size: cover;
}
.inner-page-header .header-page-title h2 {
  color: #ffffff;
  margin: 0;
  font-size: 36px;
}
.inner-page-header .header-page-locator ul {
  text-align: right;
}
.inner-page-header .header-page-locator ul li {
  display: inline-block;
  color: <?=$websiteBackgroudColor?>;
}
.inner-page-header .header-page-locator ul li a {
  color: #ffffff;
  transition: all 0.5s ease 0s;
}
.inner-page-header .header-page-locator ul li a:hover {
  color: <?=$websiteBackgroudColor?>;
}
/* ------------------------------------
15.About Team Start Here 
---------------------------------------*/
.home-team-area .total-team {
  margin: auto;
}
.home-team-area .total-team .single-team {
  position: relative;
  margin: 0 15px;
}
.home-team-area .total-team .single-team .team-details {
  transition: all 0.5s ease 0s;
  z-index: 99999;
}
.home-team-area .total-team .single-team .team-details h3 {
  margin-bottom: 5px;
  margin-top: 10px;
}
.home-team-area .total-team .single-team .team-details h3 a {
  display: block;
  font-size: 18px;
  color: #222222;
  transition: all 0.5s ease 0s;
  text-decoration: none;
}
.home-team-area .total-team .single-team .team-details h3 a img {
  width: 100%;
}
.home-team-area .total-team .single-team .team-details h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.home-team-area .total-team .single-team .team-details h3 a:after {
  display: none;
}
.home-team-area .total-team .single-team .team-details p {
  color: <?=$websiteBackgroudColor?>;
  letter-spacing: 3px;
  margin-bottom: 20px;
}
.home-team-area .total-team .owl-controls {
  margin-top: 30px;
}
.home-team-area .total-team .owl-controls .owl-pagination .owl-page.active span {
  border: 1px solid #222222;
}
.home-team-area .total-team .owl-controls .owl-pagination .owl-page span {
  display: block;
  width: 15px;
  height: 8px;
  margin: 5px 7px;
  filter: alpha(opacity=50);
  opacity: 1;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0;
  background: <?=$websiteBackgroudColor?>;
}
/* ------------------------------------
16.Winners Start Here 
---------------------------------------*/
.winners-page-area {
  padding: 100px 0 0;
}
.winners-page-area .top-winners {
  overflow: hidden;
}
.winners-page-area .top-winners .images {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.winners-page-area .top-winners .images:hover h3 a {
  color: <?=$websiteBackgroudColor?>;
}
.winners-page-area .top-winners .images:hover .overley {
  opacity: 1;
  transform: scaleY(1);
}
.winners-page-area .top-winners .images a {
  display: block;
}
.winners-page-area .top-winners .images a img {
  transition: all 0.5s ease 0s;
  width: 100%;
}
.winners-page-area .top-winners .images .overley {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.8);
  top: 0;
  transform: scaleY(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.winners-page-area .top-winners .images .overley .informations {
  margin: 0;
  padding: 0;
  list-style: none;
  position: relative;
  top: 40%;
  transform: rotate(0deg);
  transition: all .9s;
}
.winners-page-area .top-winners .images .overley .informations h3 {
  margin-bottom: 0;
}
.winners-page-area .top-winners .images .overley .informations h3 a {
  color: #ffffff;
  font-weight: 600;
  font-size: 20px;
  margin-bottom: 10px;
}
.winners-page-area .top-winners .images .overley .informations span {
  color: #ffffff;
  margin-bottom: 5px;
  display: block;
}
.winners-page-area .top-winners .winners-informations {
  padding-top: 85px;
}
.winners-page-area .top-winners .winners-informations h3 {
  margin-bottom: 0;
}
.winners-page-area .top-winners .winners-informations h3 a {
  color: #333333;
  margin-bottom: 10px;
  transition: all 0.5s ease 0s;
  display: block;
  font-size: 40px;
}
.winners-page-area .top-winners .winners-informations h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.winners-page-area .top-winners .winners-informations span {
  font-weight: 600;
  font-style: italic;
  font-size: 12px;
  color: #777777;
  margin-bottom: 20px;
  display: block;
}
.winners-page-area .top-winners .skill-content-3 {
  overflow: hidden;
}
.winners-page-area .top-winners .skill .progress .lead {
  color: #444;
  font-size: 16px;
  font-weight: 600;
  left: 0;
  position: absolute;
  top: -35px;
  z-index: 99;
}
.winners-page-area .top-winners .skill .progress {
  background-color: #f0f0f0;
  border-radius: 0;
  box-shadow: none;
  height: 7px;
  margin: 65px 0 80px;
  overflow: visible;
  position: relative;
}
.winners-page-area .top-winners .skill .progress:last-child {
  margin-bottom: 50px;
}
.winners-page-area .top-winners .skill .progress-bar > span {
  background: <?=$websiteBackgroudColor?>;
  float: right;
  font-size: 12px;
  margin-right: 10px;
  margin-top: -43px;
  position: relative;
  padding: 10px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #ffffff;
  width: 45px;
  height: 45px;
  line-height: 28px;
  text-align: center;
  left: 90%;
}
.winners-page-area .top-winners .skill .progress-bar > span:before,
.winners-page-area .top-winners .skill .progress-bar > span:after {
  border: medium solid transparent;
  content: " ";
  height: 0;
  position: absolute;
  top: 100%;
  width: 0;
}
.winners-page-area .top-winners .skill .progress-bar > span:before {
  border-top-color: <?=$websiteBackgroudColor?>;
  border-width: 5px;
  left: 50%;
  margin-left: -5px;
}
.winners-page-area .top-winners .holax-shop h3,
.winners-page-area .top-winners .we-are-good-at h3 {
  font-size: 18px;
  margin-bottom: 25px;
}
.winners-page-area .top-winners .skill .progress:nth-child(1) .progress-bar {
  background: <?=$websiteBackgroudColor?>;
}
.winners-page-area .top-winners .skill .progress:nth-child(2) .progress-bar {
  background: <?=$websiteBackgroudColor?>;
}
.winners-page-area .top-winners .skill .progress:nth-child(3) .progress-bar {
  background: <?=$websiteBackgroudColor?>;
}
.winners-page-area .top-winners .skill .progress:nth-child(4) .progress-bar {
  background: <?=$websiteBackgroudColor?>;
}
.winners-page-area .social-media ul {
  text-align: left;
}
.winners-page-area .social-media ul li {
  display: inline-block;
  margin: 2px;
}
.winners-page-area .social-media ul li a {
  display: block;
  width: 35px;
  height: 35px;
  line-height: 35px;
  color: <?=$websiteBackgroudColor?>;
  border: 1px solid <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
  text-decoration: none;
  text-align: center;
}
.winners-page-area .social-media ul li a:hover {
  background: <?=$websiteBackgroudColor?>;
  border-radius: 50%;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border: 1px solid <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
/* ------------------------------------
17.Related Winners Start Here 
---------------------------------------*/
.related-product-area {
  padding: 30px 0 0;
}
.related-product-area h3 {
  color: #382d44;
  font-size: 24px;
  margin-left: 15px;
  font-family: 'Poppins', sans-serif;
}
.related-product-area .single-product-area {
  margin: 15px;
}
.related-product-area .single-product-store:after {
  background: #e1e1e1 none repeat scroll 0 0;
  content: "";
  height: 2px;
  left: 45%;
  margin: auto;
  position: absolute;
  top: -39px;
  width: 40%;
}
.related-product-area .single-product-store .single-winners {
  position: relative;
  overflow: hidden;
  margin: 0 15px;
}
.related-product-area .single-product-store .single-winners .images {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.related-product-area .single-product-store .single-winners .images:hover h3 a {
  color: <?=$websiteBackgroudColor?>;
}
.related-product-area .single-product-store .single-winners .images:hover .overley {
  opacity: 1;
  transform: scaleY(1);
}
.related-product-area .single-product-store .single-winners .images a {
  display: block;
}
.related-product-area .single-product-store .single-winners .images a img {
  transition: all 0.5s ease 0s;
}
.related-product-area .single-product-store .single-winners .images .overley {
  position: absolute;
  left: 0;
  right: 0;
  text-align: left;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.9);
  top: 0;
  transform: scaleY(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
  padding: 30px;
}
.related-product-area .single-product-store .single-winners .images .overley .winners-details {
  padding: 20% 0;
}
.related-product-area .single-product-store .single-winners .images .overley .winners-details h4 {
  margin-bottom: 10px;
  padding-bottom: 10px;
  color: #ffffff;
  font-size: 18px;
  position: relative;
}
.related-product-area .single-product-store .single-winners .images .overley .winners-details h4:after {
  position: absolute;
  bottom: 0;
  width: 60px;
  height: 2px;
  background: #ffffff;
  left: 0;
  content: "";
}
.related-product-area .single-product-store .single-winners .images .overley .winners-details span {
  margin-bottom: 5px;
  font-size: 14px;
  color: #ffffff;
  font-weight: 600;
}
.related-product-area .single-product-store .single-winners .images .overley .winners-details p {
  margin-bottom: 5px;
  color: #ffffff;
  font-size: 12px;
}
.related-product-area .single-product-store .single-winners .images .overley .winners-details p i {
  color: #ffffff;
  margin-right: 8px;
}
.related-product-area .single-product-store .single-winners .images .overley .winners-details ul {
  margin: 0;
  padding: 0px;
  list-style: none;
  position: relative;
  top: 18%;
  transform: rotate(0deg);
  transition: all .9s;
  text-align: left;
}
.related-product-area .single-product-store .single-winners .images .overley .winners-details ul li {
  display: inline-block;
  margin-bottom: 5px;
  color: #ffffff;
  margin-right: 10px;
}
.related-product-area .single-product-store .single-winners .images .overley .winners-details ul li i {
  margin-right: 5px;
}
.related-product-area .single-product-store .single-winners h3 {
  margin-bottom: 10px;
  margin: 0;
}
.related-product-area .single-product-store .single-winners h3 a {
  color: #333333;
  transition: all 0.5s ease 0s;
  font-size: 18px;
  text-transform: uppercase;
}
.related-product-area .single-product-store .single-winners h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.related-product-area .owl-buttons {
  right: 10px;
  position: absolute;
  top: -60px;
}
.related-product-area .owl-buttons div {
  background: <?=$websiteBackgroudColor?> !important;
  width: 35px;
  height: 35px;
  border-radius: 0 !important;
  opacity: 1!important;
  margin: 2px !important;
}
.related-product-area .owl-buttons div:hover {
  background: #000000!important;
}
.related-product-area .owl-buttons div i {
  font-size: 20px;
  font-weight: 400;
  line-height: 28px;
}
.select-size {
  margin: 10px 0;
  width: 100%;
}
.select-size select {
  width: 200px;
  border: 1px solid #ccc;
}
.winner-page-list {
  padding: 100px 0;
}
.winner-page-list .single-product-area .product-content {
  margin: 20px 0 0;
}
.winner-page-list .single-product-area .product-content h3 {
  margin: 0px;
  font-size: 18px;
  font-family: 'Muli', sans-serif;
}
.winner-page-list .single-product-area .product-content h3 a {
  display: block;
  text-decoration: none;
  color: #000000;
  transition: all 0.5s ease 0s;
}
.winner-page-list .single-product-area .product-content h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.winner-page-list .single-product-area .product-content ul li {
  display: inline-block;
}
.winner-page-list .single-product-area .product-content ul li i {
  font-size: 14px;
  color: #f7c51d;
}
.winner-page-list .single-product-area .product-content p {
  font-weight: bold;
  color: <?=$websiteBackgroudColor?>;
}
.winner-page-list .single-product-area .single-product {
  position: relative;
  overflow: hidden;
}
.winner-page-list .single-product-area .single-product img {
  width: 100%;
  -webkit-transition: all 0.5s ease-out;
  -moz-transition: all 0.5s ease-out;
  -ms-transition: all 0.5s ease-out;
  -o-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
}
.winner-page-list .single-product-area .single-product:hover img {
  transform: scale(1.03);
  width: 100%;
}
.winner-page-list .single-product-area .single-product:hover .shop-overley {
  opacity: 1;
  transform: scaleY(1);
}
.winner-page-list .single-product-area .single-product a {
  display: block;
  position: relative;
  overflow: hidden;
}
.winner-page-list .single-product-area .single-product .shop-overley {
  content: "";
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background: rgba(211, 47, 47, 0.8);
  -webkit-transition: all 0.5s ease-out;
  -moz-transition: all 0.5s ease-out;
  -ms-transition: all 0.5s ease-out;
  -o-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
  opacity: 0;
  overflow: hidden;
  transform: scaleY(0);
  transform-origin: 0 0 1;
}
.winner-page-list .single-product-area .single-product .shop-overley .social-media-area {
  position: absolute;
  margin: auto;
  left: 0;
  right: 0;
  top: 45%;
  bottom: 0;
}
.winner-page-list .single-product-area .single-product .shop-overley .social-media-area ul {
  text-align: center;
}
.winner-page-list .single-product-area .single-product .shop-overley .social-media-area ul li {
  display: inline-block;
  margin: 5px;
  color: #ffffff;
}
.winner-page-list .single-product-area .single-product .shop-overley .social-media-area ul li i {
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  color: #ffffff;
  transition: all 0.5s ease 0s;
  font-weight: 600;
  margin-right: 10px;
}
.winner-page-list .single-product-area .single-product .shop-overley .social-media-area ul li i:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
/* ------------------------------------
18. Pagination Area Start Here 
---------------------------------------*/
.pagination-area {
  padding-top: 42px;
}
.pagination-area ul {
  text-align: center;
}
.pagination-area ul li {
  display: inline-block;
}
.pagination-area ul li.active a {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.pagination-area ul li a {
  display: block;
  width: 40px;
  height: 40px;
  line-height: 40px;
  background: transparent;
  border: 1px solid <?=$websiteBackgroudColor?>;
  color: #000000;
  font-size: 18px;
  text-decoration: none;
  transition: all 0.5s ease 0s;
  text-align: center;
}
.pagination-area ul li a:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
/* ------------------------------------
19.Single Photo Contest Start Here 
---------------------------------------*/
.single-photo-contest-area .about-content h2 {
  color: #382d44;
  font-family: "Roboto", sans-serif;
  font-size: 24px;
  position: relative;
}
.single-photo-contest-area .about-content h2:after {
  background: #e1e1e1 none repeat scroll 0 0;
  content: "";
  height: 2px;
  left: 50%;
  transform: translateX(-50%);
  margin: auto;
  position: absolute;
  top: 12px;
  width: 40%;
}
.single-photo-contest-area .about-content ul.single-photo-slide2 .owl-buttons {
  right: 10px;
  position: absolute;
  top: -60px;
}
.single-photo-contest-area .about-content ul.single-photo-slide2 .owl-buttons div {
  background: <?=$websiteBackgroudColor?> !important;
  width: 35px;
  height: 35px;
  border-radius: 0 !important;
  opacity: 1!important;
  margin: 2px !important;
}
.single-photo-contest-area .about-content ul.single-photo-slide2 .owl-buttons div:hover {
  background: #000000!important;
}
.single-photo-contest-area .about-content ul.single-photo-slide2 .owl-buttons div i {
  font-size: 20px;
  font-weight: 400;
  line-height: 28px;
}
.single-photo-contest-area .about-content ul.home-single-slide .owl-buttons {
  right: 10px;
  position: absolute;
  top: -60px;
}
.single-photo-contest-area .about-content ul.home-single-slide .owl-buttons div {
  background: <?=$websiteBackgroudColor?> !important;
  width: 35px;
  height: 35px;
  border-radius: 0 !important;
  opacity: 1!important;
  margin: 2px !important;
}
.single-photo-contest-area .about-content ul.home-single-slide .owl-buttons div:hover {
  background: #000000!important;
}
.single-photo-contest-area .about-content ul.home-single-slide .owl-buttons div i {
  font-size: 20px;
  font-weight: 400;
  line-height: 28px;
}
.single-photo-contest-area .about-content ul.home-single-slide.variation .countdown-section .CountDownTimer .time_circles {
  left: 0 !important;
}
.single-photo-contest-area .about-content ul.home-single-slide.variation .countdown-section .CountDownTimer .time_circles canvas {
  opacity: 0;
  height: 0 !important;
  width: 0 !important;
}
.single-photo-contest-area .about-content ul.home-single-slide.variation .countdown-section .CountDownTimer .time_circles div {
  max-width: 87px;
  top: 0 !important;
  text-align: center !important;
}
.single-photo-contest-area .about-content ul.home-single-slide.variation .countdown-section .CountDownTimer .time_circles div:nth-child(2) {
  color: <?=$websiteBackgroudColor?>;
}
.single-photo-contest-area .about-content ul.home-single-slide.variation .countdown-section .CountDownTimer .time_circles div:nth-child(3) {
  color: #ad38e2;
}
.single-photo-contest-area .about-content ul.home-single-slide.variation .countdown-section .CountDownTimer .time_circles div:nth-child(4) {
  color: #2cb23b;
}
.single-photo-contest-area .about-content ul.home-single-slide.variation .countdown-section .CountDownTimer .time_circles div:nth-child(5) {
  color: #46ceaa;
}
.single-photo-contest-area .about-content ul.home-single-slide.variation .countdown-section .CountDownTimer .time_circles div span {
  text-align: left !important;
  font-size: 45px !important;
  font-weight: 700;
  margin-bottom: 10px;
}
.single-photo-contest-area .about-content ul.home-single-slide.variation .countdown-section .CountDownTimer .time_circles div h4 {
  text-align: left !important;
  font-size: 15px !important;
}
.single-photo-contest-area .about-content ul.home-single-slide .countdown-section .time_circles {
  max-width: 530px;
}
.single-photo-contest-area .about-content ul.home-single-slide .countdown-section .time_circles > div:nth-child(2) {
  color: <?=$websiteBackgroudColor?>;
}
.single-photo-contest-area .about-content ul.home-single-slide .countdown-section .time_circles > div:nth-child(3) {
  color: #ad38e2;
}
.single-photo-contest-area .about-content ul.home-single-slide .countdown-section .time_circles > div:nth-child(4) {
  color: #2cb23b;
}
.single-photo-contest-area .about-content ul.home-single-slide .countdown-section .time_circles > div:nth-child(5) {
  color: #46ceaa;
}
.single-photo-contest-area .about-content ul.home-single-slide .countdown-section .time_circles > div span {
  font-weight: 300;
  font-size: 30px;
  font-family: 'Roboto', sans-serif;
}
.single-photo-contest-area .about-content ul.home-single-slide .countdown-section .time_circles > div h4 {
  font-size: 15px;
  font-weight: 400;
  text-transform: capitalize;
}
.single-photo-contest-area .about-content ul.home-single-slide .countdown-section.full-section {
  margin-bottom: 20px;
}
.single-photo-contest-area .about-content ul.single-photo-slide .owl-buttons {
  right: 10px;
  position: absolute;
  top: -60px;
}
.single-photo-contest-area .about-content ul.single-photo-slide .owl-buttons div {
  background: <?=$websiteBackgroudColor?> !important;
  width: 35px;
  height: 35px;
  border-radius: 0 !important;
  opacity: 1!important;
  margin: 2px !important;
}
.single-photo-contest-area .about-content ul.single-photo-slide .owl-buttons div:hover {
  background: #000000!important;
}
.single-photo-contest-area .about-content ul.single-photo-slide .owl-buttons div i {
  font-size: 20px;
  font-weight: 400;
  line-height: 28px;
}
.single-photo-contest-area .about-text {
  float: right;
  width: 50%;
  padding: 0 50px;
  position: relative;
}
.single-photo-contest-area .about-text > h3 {
  margin-bottom: 15px;
}
.single-photo-contest-area .about-text > h3 > a {
  display: block;
  color: #333333;
  transition: all 0.5s ease 0s;
}
.single-photo-contest-area .about-text > h3 > a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.single-photo-contest-area .about-text .informatons h4 {
  margin-bottom: 5px;
}
.single-photo-contest-area .about-text .informatons p {
  margin-bottom: 0px;
}
.single-photo-contest-area .about-text p {
  line-height: 28px;
}
.single-photo-contest-area .about-text > a {
  margin-top: 70px;
  display: inline-block;
  border: 1px solid <?=$websiteBackgroudColor?>;
  font-size: 16px;
  color: #ffffff;
  transition: all 0.5s ease 0s;
  background: <?=$websiteBackgroudColor?>;
  border-radius: 30px;
  padding: 8px 18px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
}
.single-photo-contest-area .about-text > a:hover {
  background: transparent;
  box-shadow: none;
  color: <?=$websiteBackgroudColor?>;
}
.single-photo-contest-area .about-image {
  width: 50%;
  float: right;
  position: relative;
  overflow: hidden;
}
.single-photo-contest-area .about-image:hover img {
  transform: scale(1.2);
}
.single-photo-contest-area .about-image:hover .overley {
  opacity: 1;
  bottom: 0;
}
.single-photo-contest-area .about-image img {
  width: 100%;
  transition: all 0.5s ease 0s;
}
.single-photo-contest-area .about-image .overley {
  position: absolute;
  left: 0;
  bottom: -100px;
  background: rgba(211, 47, 47, 0.8);
  height: 70px;
  width: 100%;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.single-photo-contest-area .about-image .overley h4 {
  margin-bottom: 0;
}
.single-photo-contest-area .about-image .overley h4 a {
  display: block;
  color: #ffffff;
  padding: 25px 0 0 25px;
  font-weight: 400;
  transition: all 0.5s ease 0s;
}
.single-photo-contest-area .about-image .overley h4 a:hover {
  color: #dddddd;
}
.portfolio-two .single-portfolio {
  margin: 0px;
}
.home-single-contest .inner {
  background: #fff;
}
.home-single-contest .single-photo-contest-area .about-text {
  float: none;
  width: 100%;
  padding: 20px 0 0;
}
.home-single-contest .single-photo-contest-area .about-image {
  float: none;
  width: 100%;
}
@media screen and (min-width: 768px) {
  .home-single-contest .item {
    margin: 10px 15px;
  }
  .home-single-contest .owl-item:nth-child(3n+1) > .item {
    margin-left: 0;
  }
  .home-single-contest .owl-item:nth-child(3n+3) > .item {
    margin-right: 0;
  }
}
/* ------------------------------------
20.Blog Page Start Here 
---------------------------------------*/
.blog-page-area .single-blog-slide {
  position: relative;
  overflow: hidden;
  width: 100% !important;
}
.blog-page-area .single-blog-slide .images {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.blog-page-area .single-blog-slide .images:hover .overley {
  opacity: 1;
  transform: scale(1);
}
.blog-page-area .single-blog-slide .images a {
  display: block;
}
.blog-page-area .single-blog-slide .images a img {
  width: 100%;
}
.blog-page-area .single-blog-slide .images span {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 60px;
  height: 60px;
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  padding: 2px;
  text-align: center;
  z-index: 99;
}
.blog-page-area .single-blog-slide .images .overley {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.8);
  top: 0;
  transform: scale(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.blog-page-area .single-blog-slide .images .overley ul {
  margin: 0;
  padding: 0;
  list-style: none;
  position: relative;
  top: 45%;
  transform: rotate(0deg);
  transition: all .9s;
}
.blog-page-area .single-blog-slide .images .overley ul li {
  display: inline-block;
  color: #ffffff;
  margin-right: 5px;
}
.blog-page-area .single-blog-slide .images .overley ul li i {
  color: #ffffff;
  margin-right: 10px;
  font-size: 16px;
  width: 45px;
  height: 45px;
  line-height: 45px;
  border: 1px solid #ffffff;
  border-radius: 50%;
}
.blog-page-area .single-blog-slide .blog-informations ul {
  margin: 0 0 10px;
  padding: 0;
  list-style: none;
}
.blog-page-area .single-blog-slide .blog-informations ul li {
  display: inline-block;
  margin-right: 15px;
}
.blog-page-area .single-blog-slide .blog-informations ul li:last-child {
  margin-right: 0;
}
.blog-page-area .single-blog-slide .blog-informations ul li i {
  color: <?=$websiteBackgroudColor?>;
  margin-right: 5px;
}
.blog-page-area .single-blog-slide .blog-informations .blog-details h3 {
  margin-bottom: 20px;
}
.blog-page-area .single-blog-slide .blog-informations .blog-details h3 a {
  color: #333333;
  transition: all 0.5s ease 0s;
  font-size: 18px;
}
.blog-page-area .single-blog-slide .blog-informations .blog-details h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.blog-page-area .single-blog-slide .blog-informations .blog-details p {
  margin-bottom: 15px;
}
.blog-page-area .single-blog-slide .blog-informations .blog-details .read-more {
  display: block;
}
.blog-page-area .single-blog-slide .blog-informations .blog-details .read-more a {
  display: inline-block;
  color: #333333;
  font-size: 16px;
  transition: all 0.5s ease 0s;
  font-weight: 800;
  position: relative;
}
.blog-page-area .single-blog-slide .blog-informations .blog-details .read-more a:after {
  content: "\f101";
  font-family: fontawesome;
  color: <?=$websiteBackgroudColor?>;
  font-weight: 600;
  font-size: 16px;
  position: absolute;
  top: 0;
  right: 0px;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.blog-page-area .single-blog-slide .blog-informations .blog-details .read-more a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.blog-page-area .single-blog-slide .blog-informations .blog-details .read-more a:hover:after {
  right: -30px;
  opacity: 1;
}
.others-photo-contester-area .single-others-contester {
  position: relative;
  overflow: hidden;
  background: #ffffff;
}
.others-photo-contester-area .single-others-contester .images {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.others-photo-contester-area .single-others-contester .images:hover .overley {
  opacity: 1;
  transform: scale(1);
}
.others-photo-contester-area .single-others-contester .images img {
  width: 100%;
}
.others-photo-contester-area .single-others-contester .images span {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 60px;
  height: 60px;
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  padding: 2px;
  text-align: center;
  z-index: 99;
}
.others-photo-contester-area .single-others-contester .images .overley {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.9);
  top: 0;
  transform: scale(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.others-photo-contester-area .single-others-contester .images .overley ul {
  margin: 0;
  padding: 0;
  list-style: none;
  position: relative;
  top: 35%;
  transform: rotate(0deg);
  transition: all .9s;
}
.others-photo-contester-area .single-others-contester .images .overley ul li {
  display: inline-block;
  color: #ffffff;
  margin-right: 5px;
}
.others-photo-contester-area .single-others-contester .images .overley ul li i {
  color: #ffffff;
  margin-right: 5px;
  font-size: 16px;
  width: 45px;
  height: 45px;
  line-height: 45px;
  border: 1px solid #ffffff;
  border-radius: 50%;
}
.others-photo-contester-area .single-others-contester h3 {
  font-size: 16px;
  font-weight: 500;
  color: #000000;
  margin-bottom: 10px;
}
.others-photo-contester-area .single-others-contester ul {
  margin: 0 0 20px;
  padding: 0;
  list-style: none;
}
.others-photo-contester-area .single-others-contester ul li {
  display: inline-block;
  margin-right: 15px;
  font-size: 14px;
}
.others-photo-contester-area .single-others-contester ul li i {
  font-size: 16px;
  color: <?=$websiteBackgroudColor?>;
  font-weight: 600;
  margin: 0 5px 0 2px;
}
.others-photo-contester-area .single-others-contester .some-text {
  margin-bottom: 0;
}
/* ------------------------------------
21.Blog Details Page start here  
---------------------------------------*/
.single-blog-page-area .single-news-page .news-featured-image {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.single-blog-page-area .single-news-page .news-featured-image a {
  display: block;
  position: relative;
  overflow: hidden;
}
.single-blog-page-area .single-news-page .news-featured-image a img {
  width: 100%;
  transition: all 0.5s ease 0s;
}
.single-blog-page-area .single-news-page .news-featured-image a img:hover {
  -ms-transform: scale(1.5);
  /* IE 9 */
  -webkit-transform: scale(1.5);
  /* Safari */
  transform: scale(1.5);
}
.single-blog-page-area .single-news-page .news-featured-image .date-area {
  position: absolute;
  top: 0;
  left: 0;
  background: <?=$websiteBackgroudColor?>;
  width: 55px;
  height: 65px;
  padding: 10px;
  margin: 20px;
}
.single-blog-page-area .single-news-page .news-featured-image .date-area ul {
  text-align: center;
  border: 0px solid #ffffff;
}
.single-blog-page-area .single-news-page .news-featured-image .date-area ul li {
  display: block;
  color: #ffffff;
  font-weight: 600;
}
.single-blog-page-area .single-news-page h3 {
  margin-bottom: 40px;
}
.single-blog-page-area .single-news-page h3 a {
  color: #000000;
  font-size: 20px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 40px;
  text-decoration: none;
}
.single-blog-page-area .single-news-page h3 a:after {
  position: absolute;
  bottom: -20px;
  left: 0;
  content: "";
  background: <?=$websiteBackgroudColor?>;
  width: 60px;
  height: 3px;
}
.single-blog-page-area .single-news-page ul {
  text-align: left;
  margin-bottom: 30px;
  padding-bottom: 15px;
}
.single-blog-page-area .single-news-page ul li {
  display: inline-block;
}
.single-blog-page-area .single-news-page ul li span {
  color: <?=$websiteBackgroudColor?>;
  font-weight: 600;
}
.single-blog-page-area .sidebar-area .single-sidebar .pull-left {
  margin-right: 15px;
}
.single-blog-page-area .single-blog-content {
  padding-bottom: 60px;
  border-bottom: 1px solid #e1e1e1;
}
.single-blog-page-area .single-blog-content blockquote p {
  padding: 10px 20px;
  margin: 0 0 20px;
  font-size: 17.5px;
}
.single-blog-page-area .content-info .blog-content-tag {
  margin-top: 20px;
}
.single-blog-page-area .content-info .blog-content-tag ul li {
  display: inline-block;
  margin-right: 7px;
}
.single-blog-page-area .content-info .blog-content-tag ul li span {
  color: #000000;
  font-size: 18px;
  font-weight: 600;
}
.single-blog-page-area .content-info .blog-content-share-social-icons {
  margin-top: 25px;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul {
  text-align: right;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul li {
  display: inline-block;
  margin-right: 7px;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul li span {
  color: #000000;
  font-size: 18px;
  font-weight: 600;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul li a {
  display: block;
  width: 30px;
  height: 30px;
  line-height: 28px;
  color: <?=$websiteBackgroudColor?>;
  border: 1px solid #c3c3c3;
  transition: all 0.5s ease 0s;
  text-decoration: none;
  text-align: center;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul li a:hover {
  background: <?=$websiteBackgroudColor?>;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  border: 1px solid <?=$websiteBackgroudColor?>;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul li a:hover i {
  color: #ffffff;
}
.single-blog-page-area .author-post {
  margin-top: 30px;
}
.single-blog-page-area .author-post h2 {
  color: #222222;
  font-size: 24px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 40px;
  text-decoration: none;
}
.single-blog-page-area .author-post .single-author-post {
  border: 1px solid #e1e1e1;
  padding: 30px;
}
.single-blog-page-area .author-post .single-author-post .box-grid .pull-left {
  margin-right: 10px;
}
.single-blog-page-area .author-post .single-author-post .box-grid .pull-left a {
  display: block;
}
.single-blog-page-area .author-post .single-author-post .box-grid .pull-left a img {
  width: 100%;
}
.single-blog-page-area .author-post .single-author-post .box-grid .media-body h4.media-heading {
  color: <?=$websiteBackgroudColor?>;
  font-size: 18px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 20px;
}
.single-blog-page-area .author-comment {
  margin-top: 60px;
  border-bottom: 1px solid #e1e1e1;
}
.single-blog-page-area .author-comment h2 {
  color: #222222;
  font-size: 24px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 20px;
  text-decoration: none;
}
.single-blog-page-area .author-comment .single-author-comment {
  padding: 30px;
}
.single-blog-page-area .author-comment .single-author-comment .author-post {
  display: block !important;
}
.single-blog-page-area .author-comment .single-author-comment .author-post .pull-left {
  margin-right: 10px;
}
.single-blog-page-area .author-comment .single-author-comment .author-post .pull-left a {
  display: block;
}
.single-blog-page-area .author-comment .single-author-comment .author-post .pull-left a img {
  width: 100%;
}
.single-blog-page-area .author-comment .single-author-comment .author-post .media-body h4.media-heading {
  color: <?=$websiteBackgroudColor?>;
  font-size: 18px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 5px;
}
.single-blog-page-area .author-comment .single-author-comment .author-post .media-body ul {
  text-align: left;
  margin-bottom: 10px;
}
.single-blog-page-area .author-comment .single-author-comment .author-post .media-body ul li {
  display: inline-block;
}
.single-blog-page-area .author-comment .single-author-comment .author-post .media-body ul li.right {
  float: right;
}
.single-blog-page-area .author-comment .single-author-comment .author-post .media-body ul li.right i {
  color: <?=$websiteBackgroudColor?>;
  margin-right: 5px;
}
.single-blog-page-area .leave-comments-area {
  padding-top: 30px;
}
.single-blog-page-area .leave-comments-area h4 {
  color: #222222;
  font-size: 24px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 40px;
  text-decoration: none;
}
.single-blog-page-area .leave-comments-area fieldset {
  margin-top: 20px;
}
.single-blog-page-area .leave-comments-area fieldset input {
  background: #dddddd none repeat scroll 0 0;
  border-radius: 0px;
  -moz-border-radius: 0px;
  -webkit-border-radius: 0px;
  height: 45px;
  margin: 0 20px 20px 0;
  padding: 20px;
}
.single-blog-page-area .leave-comments-area fieldset input:focus {
  border: 0px;
  box-shadow: none;
}
.single-blog-page-area .leave-comments-area fieldset textarea {
  background: #dddddd none repeat scroll 0 0;
  border-radius: 0;
  margin-right: 20px;
  padding: 20px;
}
.single-blog-page-area .leave-comments-area fieldset textarea:focus {
  border: 0px;
  box-shadow: none;
}
.single-blog-page-area .leave-comments-area fieldset .btn-send {
  background: <?=$websiteBackgroudColor?>;
  border: 0 none;
  color: #ffffff;
  display: block;
  font-size: 15px;
  font-weight: bold;
  padding: 15px 45px;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  text-transform: uppercase;
  transition: all 0.5s ease 0s;
  margin-top: 10px;
  cursor: pointer;
}
.single-blog-page-area .leave-comments-area fieldset .btn-send:hover {
  background: #b52929;
  box-shadow: none;
}
.sidebar-area .single-sidebar {
  margin-bottom: 30px;
}
.sidebar-area .single-sidebar h2 {
  color: #000000;
  font-size: 20px;
  font-weight: 600;
  text-transform: uppercase;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 40px;
}
.sidebar-area .single-sidebar h2:after {
  position: absolute;
  bottom: -20px;
  left: 0;
  content: "";
  background: <?=$websiteBackgroudColor?>;
  width: 60px;
  height: 3px;
}
.sidebar-area .single-sidebar .sidebar-search {
  overflow: hidden;
  position: relative;
}
.sidebar-area .single-sidebar .sidebar-search input {
  border: 1px solid #b52929;
  color: #000000;
  padding: 10px;
  width: 100%;
}
.sidebar-area .single-sidebar .sidebar-search button {
  background: transparent;
  border: medium none;
  color: <?=$websiteBackgroudColor?>;
  padding: 11px;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 999;
  font-size: 20px;
}
.sidebar-area .single-sidebar .sidebar-category ul li {
  border-bottom: 1px dotted <?=$websiteBackgroudColor?>;
  position: relative;
}
.sidebar-area .single-sidebar .sidebar-category ul li a {
  color: #b52929;
  display: block;
  padding: 5px;
  text-decoration: none;
  transition: all 0.3s ease 0s;
}
.sidebar-area .single-sidebar .sidebar-category ul li a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.sidebar-area .single-sidebar .sidebar-category ul li a:before {
  color: <?=$websiteBackgroudColor?>;
  content: "\f105";
  font-family: FontAwesome;
  height: 15px;
  left: -5px;
  position: absolute;
  top: 5px;
  width: 15px;
}
.sidebar-area .single-sidebar .sidebar-recent-post .pull-left {
  margin-right: 15px;
}
.sidebar-area .single-sidebar .sidebar-recent-post .pull-left img {
  transition: all 0.5s ease 0s;
}
.sidebar-area .single-sidebar .sidebar-recent-post .pull-left img:hover {
  opacity: .9;
}
.sidebar-area .single-sidebar .sidebar-recent-post .media-body h4 a {
  color: #000000;
  transition: all 0.5s ease 0s;
  display: block;
  margin-top: 0px;
  font-weight: 600;
  font-size: 20px;
}
.sidebar-area .single-sidebar .sidebar-recent-post .media-body h4 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.sidebar-area .single-sidebar .sidebar-recent-post .media-body .posted-date a {
  color: <?=$websiteBackgroudColor?>;
  font-weight: 600;
  transition: all 0.5s ease 0s;
}
.sidebar-area .single-sidebar .sidebar-recent-post .media-body .posted-date a:hover {
  color: #b52929;
}
.sidebar-area .single-sidebar .popular-tags ul li {
  display: inline-block;
  border: 1px solid #e1e1e1;
  margin: 2px;
}
.sidebar-area .single-sidebar .popular-tags ul li:hover {
  border: 1px solid <?=$websiteBackgroudColor?>;
  background: <?=$websiteBackgroudColor?>;
}
.sidebar-area .single-sidebar .popular-tags ul li:hover a {
  color: #ffffff;
}
.sidebar-area .single-sidebar .popular-tags ul li a {
  padding: 5px 10px;
  text-decoration: none;
  display: block;
  color: #6a6a6a;
}
/* ------------------------------------
22. Contact Us page Start Here 
---------------------------------------*/
.contact-us-page-area .contact-us-page h2 {
  color: #000000;
  font-size: 30px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 40px;
  text-decoration: none;
}
.contact-us-page-area .contact-us-page h2:after {
  position: absolute;
  bottom: -20px;
  left: 0;
  content: "";
  background: <?=$websiteBackgroudColor?>;
  width: 60px;
  height: 3px;
}
.contact-us-page-area .contact-box {
  padding: 30px 0;
}
.contact-us-page-area .contact-box .single-contact-box ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.contact-us-page-area .contact-box .single-contact-box ul li {
  display: block;
  margin-bottom: 10px;
  font-size: 14px;
  position: relative;
  padding-left: 30px;
}
.contact-us-page-area .contact-box .single-contact-box ul li a {
  color: #333333;
  transition: all 0.5s ease 0s;
}
.contact-us-page-area .contact-box .single-contact-box ul li a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.contact-us-page-area .contact-box .single-contact-box ul li span i {
  color: <?=$websiteBackgroudColor?>;
  font-weight: 800;
  font-size: 20px;
  margin-right: 10px;
  position: absolute;
  left: 0;
  top: 5px;
}
.contact-us-page-area .leave-comments-area {
  padding-top: 30px;
}
.contact-us-page-area .leave-comments-area h4 {
  color: #000000;
  font-size: 30px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 40px;
  text-decoration: none;
}
.contact-us-page-area .leave-comments-area h4:after {
  position: absolute;
  bottom: -20px;
  left: 0;
  content: "";
  background: <?=$websiteBackgroudColor?>;
  width: 60px;
  height: 3px;
}
.contact-us-page-area .leave-comments-area fieldset {
  margin-top: 20px;
}
.contact-us-page-area .leave-comments-area fieldset input {
  background: #dddddd none repeat scroll 0 0;
  border-radius: 0px;
  -moz-border-radius: 0px;
  -webkit-border-radius: 0px;
  height: 45px;
  margin: 0 20px 20px 0;
  padding: 20px;
  border-radius: 5px;
}
.contact-us-page-area .leave-comments-area fieldset input:focus {
  border: 0px;
  box-shadow: none;
}
.contact-us-page-area .leave-comments-area fieldset textarea {
  background: #dddddd none repeat scroll 0 0;
  border-radius: 0;
  margin-right: 20px;
  padding: 20px;
  border-radius: 5px;
}
.contact-us-page-area .leave-comments-area fieldset textarea:focus {
  border: 0px;
  box-shadow: none;
}
.contact-us-page-area .leave-comments-area fieldset .btn-send {
  background: <?=$websiteBackgroudColor?>;
  border: 0 none;
  color: #ffffff;
  display: block;
  font-size: 15px;
  font-weight: bold;
  padding: 15px 45px;
  text-transform: uppercase;
  transition: all 0.5s ease 0s;
  margin-top: 10px;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  cursor: pointer;
}
.contact-us-page-area .leave-comments-area fieldset .btn-send:hover {
  background: #b52929;
  box-shadow: none;
}
/* ------------------------------------
23.404 Page Area Start Here 
---------------------------------------*/
.error-page-area {
  text-align: center;
}
.error-page-area .error-page {
  background: <?=$websiteBackgroudColor?>;
  background-position: center center;
  background-size: cover;
  padding: 90px;
  border-radius: 30px;
}
.error-page-area .error-page h1 {
  font-size: 300px;
  color: #ffffff;
  line-height: 300px;
}
.error-page-area .error-page p {
  font-size: 30px;
  color: #ffffff;
}
.error-page-area .error-page-message {
  margin-top: 60px;
}
.error-page-area .error-page-message p {
  font-size: 18px;
  color: #000000;
}
.error-page-area .error-page-message .home-page a {
  display: inline-block;
  text-decoration: none;
  font-size: 18px;
  color: #ffffff;
  background: <?=$websiteBackgroudColor?>;
  padding: 15px 35px;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
}
.error-page-area .error-page-message .home-page a:hover {
  background: #b52929;
  color: #ffffff;
  box-shadow: none;
}
/* ------------------------------------
24.Login and Registration start Here 
---------------------------------------*/
.loginregistration-area .login-area {
  background: #f8f8f8;
  padding: 30px;
  border-radius: 5px;
}
.loginregistration-area .login-area h2 {
  color: #222222;
  font-family: 'Poppins', sans-serif;
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 50px;
  position: relative;
  text-transform: uppercase;
}
.loginregistration-area .login-area h2:after {
  background: <?=$websiteBackgroudColor?>;
  content: "";
  height: 2px;
  left: 0;
  position: absolute;
  top: 50px;
  width: 60px;
}
.loginregistration-area .login-area fieldset {
  margin-top: 20px;
  margin-left: -15px;
}
.loginregistration-area .login-area fieldset label {
  font-size: 16px;
  font-weight: normal;
  margin: 10px 0;
}
.loginregistration-area .login-area fieldset input {
  background: #ffffff;
  height: 45px;
  margin-right: 20px;
  border-radius: 5px;
}
.loginregistration-area .login-area fieldset input:focus {
  border: 0px;
  box-shadow: none;
}
.loginregistration-area .login-area fieldset textarea {
  background: #dddddd none repeat scroll 0 0;
  margin-right: 20px;
  border-radius: 5px;
}
.loginregistration-area .login-area fieldset textarea:focus {
  border: 0px;
  box-shadow: none;
}
.loginregistration-area .login-area fieldset .btn-send {
  background: <?=$websiteBackgroudColor?>;
  border: 0 none;
  color: #ffffff;
  display: block;
  font-size: 18px;
  font-weight: bold;
  padding: 20px 45px;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
  margin-top: 30px;
  width: 100%;
  text-transform: uppercase;
  cursor: pointer;
}
.loginregistration-area .login-area fieldset .btn-send:hover {
  background: #b52929;
  box-shadow: none;
}
.loginregistration-area .login-area .connected-area {
  margin-top: 20px;
}
.loginregistration-area .login-area .connected-area p {
  color: #222222;
  font-size: 18px;
}
.loginregistration-area .login-area .connected-area ul li {
  display: inline-block;
  margin-right: 5px;
  margin-bottom: 20px;
  cursor: pointer;
}
.loginregistration-area .login-area .connected-area ul li img {
  width: 100%;
}
.loginregistration-area .login-area .checkbox label input {
  display: inline-block;
  outline: none;
  height: unset;
  margin: 0;
}
.loginregistration-area .login-area .checkbox p {
  margin: 10px 0 10px 0px;
}
.loginregistration-area .login-area .checkbox p a {
  color: #00aeef;
  font-size: 16px;
  transition: all 0.5s ease 0s;
}
.loginregistration-area .login-area .checkbox p a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.loginregistration-area .registration-area {
  background: #f8f8f8;
  padding: 30px;
  border-radius: 5px;
}
.loginregistration-area .registration-area h2 {
  color: #222222;
  font-family: 'Poppins', sans-serif;
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 50px;
  position: relative;
  text-transform: uppercase;
}
.loginregistration-area .registration-area h2:after {
  background: <?=$websiteBackgroudColor?>;
  content: "";
  height: 2px;
  left: 0;
  position: absolute;
  top: 50px;
  width: 60px;
}
.loginregistration-area .registration-area fieldset {
  margin-top: 20px;
  margin-left: -15px;
}
.loginregistration-area .registration-area fieldset label {
  font-size: 16px;
  font-weight: normal;
  margin: 10px 0;
}
.loginregistration-area .registration-area fieldset input {
  background: #ffffff;
  border-radius: 5px;
  height: 45px;
  margin-right: 20px;
}
.loginregistration-area .registration-area fieldset input:focus {
  border: 0px;
  box-shadow: none;
}
.loginregistration-area .registration-area fieldset textarea {
  background: #dddddd none repeat scroll 0 0;
  border-radius: 5px;
  margin-right: 20px;
}
.loginregistration-area .registration-area fieldset textarea:focus {
  border: 0px;
  box-shadow: none;
}
.loginregistration-area .registration-area fieldset .btn-send {
  background: #000000;
  border: 0 none;
  color: #ffffff;
  display: block;
  font-size: 18px;
  font-weight: bold;
  padding: 20px 45px;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
  margin-top: 30px;
  width: 100%;
  text-transform: uppercase;
  cursor: pointer;
}
.loginregistration-area .registration-area fieldset .btn-send:hover {
  background: <?=$websiteBackgroudColor?>;
  box-shadow: none;
}
/* ------------------------------------
25.Photo Deatils Start Here 
---------------------------------------*/
.photo-details-area .photo-details-slide {
  margin-bottom: 30px;
}
.photo-details-area .photo-details-slide .owl-buttons div {
  border: 1px solid <?=$websiteBackgroudColor?>;
  height: 45px;
  opacity: 1;
  width: 45px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 0px;
  padding: 0;
  margin: 0;
  background: transparent;
}
.photo-details-area .photo-details-slide .owl-buttons div i {
  font-size: 30px;
  line-height: 40px;
  color: <?=$websiteBackgroudColor?>;
}
.photo-details-area .photo-details-slide .owl-buttons div.owl-prev {
  position: absolute;
  left: 5%;
}
.photo-details-area .photo-details-slide .owl-buttons div.owl-next {
  position: absolute;
  right: 5%;
}
.photo-details-area .photo-details {
  background: <?=$websiteBackgroudColor?>;
  margin-bottom: 30px;
}
.photo-details-area .photo-details ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.photo-details-area .photo-details ul li {
  display: inline-block;
  padding: 10px 33px;
  color: #ffffff;
  border-right: 1px solid #ffffff;
}
.photo-details-area .photo-details ul li a {
  padding: 10px;
  border: 1px solid #ffffff;
  display: block;
  color: #fff;
}
.photo-details-area .photo-details ul li:last-child {
  border-right: 0px;
}
.photo-details-area .photo-details ul li i {
  font-weight: 800;
  font-size: 20px;
  margin-right: 20px;
}
.photo-details-area .photo-content p {
  margin-bottom: 30px;
}
.photo-details-area .photo-content ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.photo-details-area .photo-content ul li {
  display: block;
  padding: 0 0 20px 0;
  color: #444444;
}
.photo-details-area .photo-content ul li span {
  color: #000000;
  font-size: 16px;
  font-weight: 600;
}
.photo-details-area .single-blog-page-area {
  padding: 0 !important;
}
.single-blog-page-area .single-news-page .news-featured-image {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.single-blog-page-area .single-news-page .news-featured-image a {
  display: block;
  position: relative;
  overflow: hidden;
}
.single-blog-page-area .single-news-page .news-featured-image a img {
  width: 100%;
  transition: all 0.5s ease 0s;
}
.single-blog-page-area .single-news-page .news-featured-image a img:hover {
  -ms-transform: scale(1.5);
  /* IE 9 */
  -webkit-transform: scale(1.5);
  /* Safari */
  transform: scale(1.5);
}
.single-blog-page-area .single-news-page .news-featured-image .date-area {
  position: absolute;
  top: 0;
  left: 0;
  background: <?=$websiteBackgroudColor?>;
  width: 55px;
  height: 65px;
  padding: 10px;
  margin: 20px;
}
.single-blog-page-area .single-news-page .news-featured-image .date-area ul {
  text-align: center;
  border: 0px solid #ffffff;
}
.single-blog-page-area .single-news-page .news-featured-image .date-area ul li {
  display: block;
  color: #ffffff;
  font-weight: 600;
}
.single-blog-page-area .single-news-page h3 {
  margin-bottom: 40px;
}
.single-blog-page-area .single-news-page h3 a {
  color: #000000;
  font-size: 20px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 40px;
  text-decoration: none;
}
.single-blog-page-area .single-news-page h3 a:after {
  position: absolute;
  bottom: -20px;
  left: 0;
  content: "";
  background: <?=$websiteBackgroudColor?>;
  width: 60px;
  height: 3px;
}
.single-blog-page-area .single-news-page ul {
  text-align: left;
  margin-bottom: 30px;
  padding-bottom: 15px;
}
.single-blog-page-area .single-news-page ul li {
  display: inline-block;
}
.single-blog-page-area .single-news-page ul li span {
  color: <?=$websiteBackgroudColor?>;
  font-weight: 600;
}
.single-blog-page-area .single-blog-content {
  padding-bottom: 60px;
  border-bottom: 1px solid #e1e1e1;
}
.single-blog-page-area .single-blog-content blockquote {
  border-left: 2px solid <?=$websiteBackgroudColor?>;
}
.single-blog-page-area .content-info .blog-content-tag {
  margin-top: 20px;
}
.single-blog-page-area .content-info .blog-content-tag ul li {
  display: inline-block;
  margin-right: 7px;
}
.single-blog-page-area .content-info .blog-content-tag ul li span {
  color: #000000;
  font-size: 18px;
  font-weight: 600;
}
.single-blog-page-area .content-info .blog-content-share-social-icons {
  margin-top: 25px;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul {
  text-align: right;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul li {
  display: inline-block;
  margin-right: 7px;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul li span {
  color: #000000;
  font-size: 18px;
  font-weight: 600;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul li a {
  display: block;
  width: 30px;
  height: 30px;
  line-height: 28px;
  color: <?=$websiteBackgroudColor?>;
  border: 1px solid #c3c3c3;
  transition: all 0.5s ease 0s;
  text-decoration: none;
  text-align: center;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul li a:hover {
  background: <?=$websiteBackgroudColor?>;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  border: 1px solid <?=$websiteBackgroudColor?>;
}
.single-blog-page-area .content-info .blog-content-share-social-icons ul li a:hover i {
  color: #ffffff;
}
.single-blog-page-area .author-post {
  margin-top: 30px;
}
.single-blog-page-area .author-post h2 {
  color: #222222;
  font-size: 24px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 40px;
  text-decoration: none;
}
.single-blog-page-area .author-post .single-author-post {
  border: 1px solid #e1e1e1;
  padding: 30px;
}
.single-blog-page-area .author-post .single-author-post .box-grid .pull-left {
  margin-right: 10px;
}
.single-blog-page-area .author-post .single-author-post .box-grid .pull-left a {
  display: block;
}
.single-blog-page-area .author-post .single-author-post .box-grid .pull-left a img {
  width: 100%;
}
.single-blog-page-area .author-post .single-author-post .box-grid .media-body h4.media-heading {
  color: <?=$websiteBackgroudColor?>;
  font-size: 18px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 20px;
}
.single-blog-page-area .author-post .about-author-post .single-author-post .media .pull-left {
  margin-right: 20px;
}
.single-blog-page-area .author-comment {
  margin-top: 60px;
  border-bottom: 1px solid #e1e1e1;
}
.single-blog-page-area .author-comment h2 {
  color: #222222;
  font-size: 24px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 20px;
  text-decoration: none;
}
.single-blog-page-area .author-comment .single-author-comment {
  padding: 30px;
}
.single-blog-page-area .author-comment .single-author-comment .media .pull-left {
  margin-right: 20px;
}
.single-blog-page-area .author-comment .single-author-comment .media .pull-left a {
  display: block;
}
.single-blog-page-area .author-comment .single-author-comment .media .pull-left a img {
  width: 100%;
}
.single-blog-page-area .author-comment .single-author-comment .media .media-body h4.media-heading {
  color: <?=$websiteBackgroudColor?>;
  font-size: 18px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 5px;
}
.single-blog-page-area .author-comment .single-author-comment .media .media-body ul {
  text-align: left;
  margin-bottom: 10px;
}
.single-blog-page-area .author-comment .single-author-comment .media .media-body ul li {
  display: inline-block;
}
.single-blog-page-area .author-comment .single-author-comment .media .media-body ul li.right {
  float: right;
}
.single-blog-page-area .author-comment .single-author-comment .media .media-body ul li.right i {
  color: <?=$websiteBackgroudColor?>;
  margin-right: 5px;
}
.single-blog-page-area .leave-comments-area {
  padding-top: 30px;
}
.single-blog-page-area .leave-comments-area h4 {
  color: #222222;
  font-size: 24px;
  font-weight: 600;
  position: relative;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 40px;
  text-decoration: none;
}
.single-blog-page-area .leave-comments-area fieldset {
  margin-top: 20px;
}
.single-blog-page-area .leave-comments-area fieldset input {
  background: #dddddd none repeat scroll 0 0;
  border-radius: 0px;
  -moz-border-radius: 0px;
  -webkit-border-radius: 0px;
  height: 45px;
  margin: 0 20px 20px 0;
  padding: 20px;
  border-radius: 5px;
}
.single-blog-page-area .leave-comments-area fieldset input:focus {
  border: 0px;
  box-shadow: none;
}
.single-blog-page-area .leave-comments-area fieldset textarea {
  background: #dddddd none repeat scroll 0 0;
  border-radius: 0;
  margin-right: 20px;
  padding: 20px;
  border-radius: 5px;
}
.single-blog-page-area .leave-comments-area fieldset textarea:focus {
  border: 0px;
  box-shadow: none;
}
.single-blog-page-area .leave-comments-area fieldset .btn-send {
  background: <?=$websiteBackgroudColor?>;
  border: 0 none;
  color: #ffffff;
  display: block;
  font-size: 15px;
  font-weight: bold;
  padding: 15px 45px;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  text-transform: uppercase;
  transition: all 0.5s ease 0s;
  margin-top: 10px;
}
.single-blog-page-area .leave-comments-area fieldset .btn-send:hover {
  background: #b52929;
  box-shadow: none;
}
/* ------------------------------------
26.Multistep Form Start Here 
---------------------------------------*/
.multistep-form {
  overflow: hidden;
}
.multistep-form .active {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.multistep-form fieldset {
  display: none;
  margin: 60px 0 0 0;
  text-align: center;
}
.multistep-form fieldset h2 {
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 20px;
}
.multistep-form fieldset input {
  margin-bottom: 15px;
  width: 50%;
  height: 45px;
  border-radius: 0px;
  border: 1px solid #dddddd;
  padding: 10px;
}
.multistep-form fieldset input:outline {
  border: none;
  box-shadow: none;
}
.multistep-form fieldset input:focus {
  -webkit-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  -moz-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  border: 0px solid <?=$websiteBackgroudColor?>;
}
.multistep-form fieldset input[type="button"] {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  text-transform: uppercase;
  font-size: 16px;
  transition: all 0.5s ease 0s;
  line-height: 20px;
}
.multistep-form fieldset input[type="button"]:hover {
  background: #b52929;
}
.multistep-form fieldset input[type="file"] {
  display: block;
  margin: auto;
  padding: 0px;
}
.multistep-form fieldset select {
  margin-bottom: 15px;
  width: 50%;
  height: 45px;
  border-radius: 0px;
  border: 1px solid #dddddd;
  padding: 10px;
}
.multistep-form fieldset select:outline {
  border: none;
  box-shadow: none;
}
.multistep-form fieldset select:focus {
  -webkit-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  -moz-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  border: 0px solid <?=$websiteBackgroudColor?>;
}
.multistep-form fieldset textarea {
  margin-bottom: 15px;
  width: 50%;
  height: 150px;
  border-radius: 0px;
  border: 1px solid #dddddd;
  padding: 10px;
}
.multistep-form fieldset textarea:outline {
  border: none;
  box-shadow: none;
}
.multistep-form fieldset textarea:focus {
  -webkit-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  -moz-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  border: 0px solid <?=$websiteBackgroudColor?>;
}
.multistep-form fieldset ul#preview {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: left;
  width: 50%;
  display: inline-block;
}
.multistep-form fieldset ul#preview li {
  display: block;
  margin-bottom: 10px;
}
.multistep-form fieldset ul#preview li img {
  width: 100%;
}
.multistep-form fieldset ul#preview li span {
  font-weight: 800;
  color: #000000;
  margin-right: 15px;
}
.multistep-form fieldset .term-and-conditions input {
  width: auto;
  height: auto;
}
.multistep-form #first {
  display: block;
  margin: 60px 0 0 0;
  text-align: center;
}
.multistep-form #first h2 {
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 20px;
}
.multistep-form #first input {
  margin-bottom: 15px;
  width: 50%;
  height: 45px;
  border-radius: 0px;
  border: 1px solid #dddddd;
  padding: 10px;
}
.multistep-form #first input:outline {
  border: none;
  box-shadow: none;
}
.multistep-form #first input:focus {
  -webkit-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  -moz-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  border: 0px solid <?=$websiteBackgroudColor?>;
}
.multistep-form #first input[type="button"] {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  text-transform: uppercase;
  font-size: 16px;
  transition: all 0.5s ease 0s;
  line-height: 20px;
  position: relative;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  border: 1px solid transparent;
  cursor: pointer;
}
.multistep-form #first input[type="button"]:after {
  position: absolute;
  content: "\f105";
  font-family: fontawesome;
  right: 0;
  top: 0;
  color: #ffffff;
  margin-right: 30px;
  font-weight: 600;
}
.multistep-form #first input[type="button"]:hover {
  background: #b52929;
  box-shadow: none;
}
.multistep-form #first select {
  margin-bottom: 15px;
  width: 50%;
  height: 45px;
  border-radius: 0px;
  border: 1px solid #dddddd;
  padding: 10px;
}
.multistep-form #first select:outline {
  border: none;
  box-shadow: none;
}
.multistep-form #first select:focus {
  -webkit-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  -moz-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  border: 0px solid <?=$websiteBackgroudColor?>;
}
.multistep-form #first textarea {
  margin-bottom: 15px;
  width: 50%;
  height: 150px;
  border-radius: 0px;
  border: 1px solid #dddddd;
  padding: 10px;
}
.multistep-form #first textarea:outline {
  border: none;
  box-shadow: none;
}
.multistep-form #first textarea:focus {
  -webkit-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  -moz-box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
  border: 0px solid <?=$websiteBackgroudColor?>;
}
.multistep-form #first ul#preview {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: left;
  width: 50%;
  display: inline-block;
}
.multistep-form #first ul#preview li {
  display: block;
  margin-bottom: 10px;
}
.multistep-form #first ul#preview li span {
  font-weight: 800;
  color: #000000;
  margin-right: 15px;
}
.multistep-form #first .term-and-conditions input {
  width: auto;
  height: auto;
}
.multistep-form ul#progressbar {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: center;
}
.multistep-form ul#progressbar li {
  display: inline-block;
  margin: 0 15px;
  border: 1px solid <?=$websiteBackgroudColor?>;
  padding: 10px 20px;
  transition: all 0.5s ease 0s;
}
.multistep-form ul#progressbar li:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.page-sidebar-area {
  padding-top: 30px;
}
.page-sidebar-area .single-sidebar h3 {
  color: #000000;
  font-size: 20px;
  font-weight: bold;
  font-family: 'Poppins', sans-serif;
  transition: all 0.5s ease 0s;
  position: relative;
  text-transform: uppercase;
  margin-bottom: 45px;
}
.page-sidebar-area .single-sidebar h3:after {
  position: absolute;
  content: "";
  left: 0;
  top: 40px;
  display: block;
  background: <?=$websiteBackgroudColor?>;
  width: 50px;
  height: 3px;
}
.page-sidebar-area .single-sidebar ul {
  margin: 0 0 20px;
  padding: 0;
}
.page-sidebar-area .single-sidebar ul li {
  border-bottom: 1px solid #dddddd;
  margin-bottom: 10px;
  padding-bottom: 10px;
  margin-left: 0px;
  display: block;
}
.page-sidebar-area .single-sidebar ul li a {
  color: #333333;
  transition: all 0.5s ease 0s;
}
.page-sidebar-area .single-sidebar ul li a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.page-sidebar-area .single-sidebar ul li:last-child {
  border: none;
}
.page-sidebar-area .single-sidebar ul li i {
  margin-right: 15px;
  color: <?=$websiteBackgroudColor?>;
  font-weight: 600;
}
.page-sidebar-area .single-sidebar ul li:hover {
  color: <?=$websiteBackgroudColor?>;
}
.page-sidebar-area .single-sidebar ul li span {
  float: right;
}
.home-faq-area {
  padding: 94px 0 95px;
  background: url('images/faq.jpg') no-repeat;
  background-size: cover;
  background-position: center center;
}
.home-faq-area .faq-area h2 {
  font-weight: 800;
  font-size: 30px;
  color: #ffffff;
  position: relative;
  margin-bottom: 60px;
}
.home-faq-area .faq-area h2:after {
  position: absolute;
  bottom: -20px;
  left: 0;
  content: "";
  background: <?=$websiteBackgroudColor?>;
  width: 60px;
  height: 3px;
}
.home-faq-area .faq-area .accordion .card {
  margin-bottom: 5px;
  border: 0px solid transparent;
  border-radius: 4px;
}
.home-faq-area .faq-area .accordion .card .card-header {
  padding: 0;
  border: 0;
}
.home-faq-area .faq-area .accordion .card .card-header h5 {
  margin: 0;
}
.home-faq-area .faq-area .accordion .card .card-header h5.card-title button {
  display: block;
  padding: 16px 10px;
  text-decoration: none;
  font-size: 18px;
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  cursor: pointer;
}
.home-faq-area .faq-area .accordion .card .card-header h5.card-title button.collapsed {
  display: block;
  padding: 16px 10px;
  background: #ffffff;
  text-decoration: none;
  font-size: 18px;
  color: #222222;
  transition: all 0.5s ease 0s;
}
.home-faq-area .faq-area .accordion .card .card-header h5.card-title button.collapsed:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.home-faq-area .faq-area .accordion .card .card-body {
  background: #fff;
  border-bottom-left-radius: 3px;
  border-bottom-right-radius: 3px;
  padding: 15px;
}
.home-faq-area .faq-area .card-header [data-toggle="collapse"]:after {
  font-family: 'fontawesome';
  content: "\f105";
  /* "play" icon */
  float: right;
  color: #ffffff;
  font-size: 18px;
  line-height: 22px;
  /* rotate "play" icon from > (right arrow) to down arrow */
  -webkit-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
  -o-transform: rotate(-90deg);
  transform: rotate(-90deg);
}
.home-faq-area .faq-area .card-header [data-toggle="collapse"].collapsed:after {
  /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
  color: #222222;
}
.home-faq-area .faq-image-area {
  overflow: hidden;
}
.home-faq-area .faq-image-area h2 {
  font-weight: 800;
  font-size: 30px;
  color: #ffffff;
  position: relative;
  margin-bottom: 60px;
}
.home-faq-area .faq-image-area h2:after {
  position: absolute;
  bottom: -20px;
  left: 0;
  content: "";
  background: <?=$websiteBackgroudColor?>;
  width: 60px;
  height: 3px;
}
.home-faq-area .faq-image-area a {
  display: block;
}
.home-faq-area .faq-image-area a img {
  width: 100%;
  transition: all 0.5s ease 0s;
}
.home-faq-area .faq-image-area a img:hover {
  background: rgba(1, 177, 215, 0.5);
}
/* ------------------------------------
27.Home Page About Us area start here 
---------------------------------------*/
.home-about-area .about-content-area h2 {
  font-size: 36px;
  color: #222222;
  font-weight: 600;
  margin-bottom: 40px;
}
.home-about-area .about-content-area h2 span {
  color: <?=$websiteBackgroudColor?>;
}
.home-about-area .about-content-area p {
  padding-right: 20px;
  margin-bottom: 0;
}
.home-about-area .about-content-area .botton-area {
  margin-top: 50px;
}
.home-about-area .about-content-area .botton-area a {
  display: inline-block;
  padding: 12px 30px;
  color: #ffffff;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
  background: <?=$websiteBackgroudColor?>;
}
.home-about-area .about-content-area .botton-area a i {
  margin-left: 10px;
}
.home-about-area .about-content-area .botton-area a:hover {
  background: #b52929;
  box-shadow: none;
}
.home-about-area .about-featured-image {
  text-align: center;
}
.home-about-area .about-featured-image img {
  transition: all 0.5s ease 0s;
  height: 400px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
}
.home-about-area .about-featured-image img:hover {
  box-shadow: none;
}
/* ------------------------------------
28.Testimonial Area Start Here 
---------------------------------------*/
.testimonial {
  background: url('images/testimonial/testimonial-bg.jpg') no-repeat;
  background-size: cover;
}
.testimonial .testimonial-area .single-testimonial {
  padding: 0 200px;
}
.testimonial .testimonial-area .single-testimonial .testimonial-top {
  max-width: 280px;
  margin: 0 auto;
  text-align: center;
}
.testimonial .testimonial-area .single-testimonial .testimonial-top .image {
  position: relative;
  margin-bottom: 20px;
  margin-top: 20px;
}
.testimonial .testimonial-area .single-testimonial .testimonial-top .image:after {
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  color: <?=$websiteBackgroudColor?>;
  height: 2px;
  content: "\f0d7";
  width: 31px;
  font-family: fontawesome;
  top: -30px;
  font-size: 22px;
}
.testimonial .testimonial-area .single-testimonial .testimonial-top .image img {
  width: 90px;
  height: 90px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  border: 1px solid <?=$websiteBackgroudColor?>;
  box-shadow: 0px 0px 1px 1px <?=$websiteBackgroudColor?>;
}
.testimonial .testimonial-area .single-testimonial .testimonial-top .details {
  display: inline-block;
  color: #ffffff;
  text-transform: uppercase;
}
.testimonial .testimonial-area .single-testimonial .testimonial-top .details h3 {
  margin-bottom: 0px;
  font-size: 16px;
}
.testimonial .testimonial-area .single-testimonial .testimonial-top .details p {
  font-size: 14px;
}
.testimonial .testimonial-area .single-testimonial .customer-comment {
  border: 1px solid <?=$websiteBackgroudColor?>;
  border-radius: 30px;
}
.testimonial .testimonial-area .single-testimonial .customer-comment p {
  color: #ffffff;
  padding: 30px;
  margin: 0;
  text-align: center;
}
.testimonial .testimonial-area .owl-controls .owl-pagination .owl-page.active span {
  background: #ffffff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  width: 10px;
  height: 10px;
}
.testimonial .testimonial-area .owl-controls .owl-pagination .owl-page span {
  background: <?=$websiteBackgroudColor?>;
  width: 10px;
  height: 10px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}
/* ------------------------------------
29.home page core services start here 
---------------------------------------*/
.home-page-core-activities-area {
  overflow: hidden;
  background-size: cover;
  background-position: center center;
  height: 620px;
}
.home-page-core-activities-area .home-activities-area {
  background: #000000 none repeat scroll 0 0;
  padding: 60px 103px;
  position: relative;
  overflow: hidden;
}
.home-page-core-activities-area .home-activities-area h2 {
  color: #ffffff;
  font-size: 36px;
  font-weight: 800;
  left: -175px;
  letter-spacing: 0;
  position: absolute;
  text-transform: uppercase;
  top: 47%;
  transform: rotate(270deg);
}
.home-page-core-activities-area .home-activities-area h2:after {
  content: "";
  left: 411px;
  top: 0;
  background: url(img/arrow.png) no-repeat;
  height: 125px;
  width: 116px;
  display: block;
  position: absolute;
  -ms-transform: rotate(-270deg);
  /* IE 9 */
  -webkit-transform: rotate(-270deg);
  /* Safari */
  transform: rotate(-270deg);
  display: none;
}
.home-page-core-activities-area .home-activities-area .single-activities {
  margin-left: 0px;
  margin: 30px 0;
}
.home-page-core-activities-area .home-activities-area .single-activities:hover .media .pull-left a {
  -webkit-transform: rotate(360deg);
  -moz-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  transform: rotate(360deg);
}
.home-page-core-activities-area .home-activities-area .single-activities:hover .media .media-body h4.media-heading a {
  color: <?=$websiteBackgroudColor?>;
}
.home-page-core-activities-area .home-activities-area .single-activities .media .pull-left {
  margin-right: 10px;
}
.home-page-core-activities-area .home-activities-area .single-activities .media .pull-left a {
  width: 70px;
  height: 70px;
  background: <?=$websiteBackgroudColor?>;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  display: block;
  text-align: center;
  font-size: 35px;
  line-height: 70px;
  transition: all 0.5s ease 0s;
}
.home-page-core-activities-area .home-activities-area .single-activities .media .pull-left a i {
  color: #ffffff;
}
.home-page-core-activities-area .home-activities-area .single-activities .media .media-body h4.media-heading a {
  font-size: 20px;
  line-height: 1.5;
  color: #ffffff;
  margin-bottom: 20px;
  display: block;
  transition: all 0.5s ease 0s;
  font-weight: 700;
}
.home-page-core-activities-area .home-activities-area .single-activities .media .media-body h4.media-heading a:hover {
  color: #dddddd;
}
.home-page-core-activities-area .home-activities-area .single-activities .media .media-body p {
  color: #ffffff;
}
.home-page-core-activities-area.single-design .home-activities-area {
  padding: 30px;
}
.rs-services-3 .common {
  background: #ffffff;
  padding: 28px 11px 21px 22px;
  box-shadow: 0 14px 20px rgba(0, 0, 0, 0.05);
  transition: .20s;
  border-radius: 5px;
}
.rs-services-3 .common .col-sm-9 {
  padding-left: 0;
}
.rs-services-3 .common .icon-part {
  font-size: 40px;
  text-align: center;
  color: <?=$websiteBackgroudColor?>;
}
.rs-services-3 .common .text h4 {
  margin: 0 auto;
  margin-bottom: 14px;
  font-weight: 600;
  font-size: 20px;
  color: <?=$websiteBackgroudColor?>;
}
.rs-services-3 .common .text p {
  margin-bottom: 0;
}
.rs-services-3 .common:hover {
  background: <?=$websiteBackgroudColor?>;
}
.rs-services-3 .common:hover .icon-part {
  color: #fff;
}
.rs-services-3 .common:hover h4,
.rs-services-3 .common:hover p {
  color: #fff;
}
.home-shop {
  overflow: hidden;
}
.home-shop .home-ralated {
  padding: 0 !important;
}
.home-shop .home-ralated .single-winners {
  position: relative;
  overflow: hidden;
}
.home-shop .home-ralated .single-winners .images {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.home-shop .home-ralated .single-winners .images:hover h3 a {
  color: <?=$websiteBackgroudColor?>;
}
.home-shop .home-ralated .single-winners .images:hover .overley {
  opacity: 1;
  transform: scaleY(1);
}
.home-shop .home-ralated .single-winners .images a {
  display: block;
}
.home-shop .home-ralated .single-winners .images a img {
  transition: all 0.5s ease 0s;
  width: 100%;
}
.home-shop .home-ralated .single-winners .images .overley {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.9);
  top: 0;
  transform: scaleY(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
  padding: 30px;
}
.home-shop .home-ralated .single-winners .images .overley .winners-details {
  padding: 20% 0;
}
.home-shop .home-ralated .single-winners .images .overley .winners-details h4 {
  margin-bottom: 10px;
  padding-bottom: 10px;
  color: #ffffff;
  font-size: 18px;
  position: relative;
}
.home-shop .home-ralated .single-winners .images .overley .winners-details h4:after {
  display: none;
}
.home-shop .home-ralated .single-winners .images .overley .winners-details .product-info {
  margin: 0;
  padding: 0px;
  list-style: none;
  top: 50%;
  position: absolute;
  transform: translateY(-50%);
  transition: all .9s;
  text-align: center;
  left: 0;
  right: 0;
}
.home-shop .home-ralated .single-winners .images .overley .winners-details .product-info li {
  display: inline-block;
}
.home-shop .home-ralated .single-winners .images .overley .winners-details .product-info li a {
  color: #ffffff;
  text-transform: capitalize;
  text-decoration: none;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border: 1px solid #ffffff;
  text-align: center;
  transition: all 0.5s ease 0s;
}
.home-shop .home-ralated .single-winners .images .overley .winners-details .product-info li a:hover {
  background: #b52929;
  border: 1px solid #b52929;
  color: #ffffff;
}
.home-shop .home-ralated .single-winners .images .overley .winners-details .product-info li a i {
  font-size: 16px;
  color: #ffffff;
  margin: 0;
}
.home-shop .home-ralated .single-winners .images .overley .winners-details p {
  margin-bottom: 5px;
  color: #ffffff;
  font-size: 12px;
}
.home-shop .home-ralated .single-winners .images .overley .winners-details p i {
  color: #ffffff;
  margin-right: 8px;
}
.home-shop .home-ralated .single-winners h3 {
  margin-bottom: 10px !important;
  margin-left: 0;
}
.home-shop .home-ralated .single-winners h3 a {
  color: #333333;
  transition: all 0.5s ease 0s;
  font-size: 18px;
  text-transform: uppercase;
  margin: 0;
}
.home-shop .home-ralated .single-winners h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.home-shop .home-ralated .single-winners .price-details ul {
  margin: 0;
  padding: 0;
  text-align: left;
}
.home-shop .home-ralated .single-winners .price-details ul li {
  display: block;
}
.home-shop .home-ralated .single-winners .price-details ul li:first-child {
  font-weight: 900;
  font-size: 20px;
}
.home-shop .home-ralated .single-winners .price-details ul li:first-child del {
  font-weight: 300;
  margin-right: 5px;
  font-size: 12px;
}
.home-shop .single-shop-area:after {
  background: #e1e1e1 none repeat scroll 0 0;
  content: "";
  height: 2px;
  left: 45%;
  margin: auto;
  position: absolute;
  top: -39px;
  width: 40%;
  display: none;
}
.home-shop .single-shop-area .single-winners {
  position: relative;
  overflow: hidden;
  margin: 0 15px;
}
.home-shop .single-shop-area .single-winners .images {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.home-shop .single-shop-area .single-winners .images:hover h3 a {
  color: <?=$websiteBackgroudColor?>;
}
.home-shop .single-shop-area .single-winners .images:hover .overley {
  opacity: 1;
  transform: scaleY(1);
}
.home-shop .single-shop-area .single-winners .images a {
  display: block;
}
.home-shop .single-shop-area .single-winners .images a img {
  transition: all 0.5s ease 0s;
}
.home-shop .single-shop-area .single-winners .images .overley {
  position: absolute;
  left: 0;
  right: 0;
  text-align: left;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.9);
  top: 0;
  transform: scaleY(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
  padding: 30px;
}
.home-shop .single-shop-area .single-winners .images .overley .winners-details {
  padding: 20% 0;
}
.home-shop .single-shop-area .single-winners .images .overley .winners-details h4 {
  margin-bottom: 10px;
  padding-bottom: 10px;
  color: #ffffff;
  font-size: 18px;
  position: relative;
}
.home-shop .single-shop-area .single-winners .images .overley .winners-details h4:after {
  position: absolute;
  bottom: 0;
  width: 60px;
  height: 2px;
  background: #ffffff;
  left: 0;
  content: "";
}
.home-shop .single-shop-area .single-winners .images .overley .winners-details span {
  margin-bottom: 5px;
  font-size: 14px;
  color: #ffffff;
  font-weight: 600;
}
.home-shop .single-shop-area .single-winners .images .overley .winners-details p {
  margin-bottom: 5px;
  color: #ffffff;
  font-size: 12px;
}
.home-shop .single-shop-area .single-winners .images .overley .winners-details p i {
  color: #ffffff;
  margin-right: 8px;
}
.home-shop .single-shop-area .single-winners .images .overley .winners-details ul {
  margin: 0;
  padding: 0px;
  list-style: none;
  position: relative;
  top: 18%;
  transform: rotate(0deg);
  transition: all .9s;
  text-align: left;
}
.home-shop .single-shop-area .single-winners .images .overley .winners-details ul li {
  display: inline-block;
  margin-bottom: 5px;
  color: #ffffff;
  margin-right: 10px;
}
.home-shop .single-shop-area .single-winners .images .overley .winners-details ul li i {
  margin-right: 5px;
}
.home-shop .single-shop-area .single-winners h3 {
  margin-bottom: 30px;
}
.home-shop .single-shop-area .single-winners h3 a {
  color: #333333;
  transition: all 0.5s ease 0s;
  font-size: 18px;
  text-transform: uppercase;
}
.home-shop .single-shop-area .single-winners h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.home-shop .single-shop-area .owl-buttons .owl-next {
  background: transparent;
  width: 35px;
  height: 35px;
  border-radius: 0;
  opacity: 1;
  margin: 2px;
  right: -40px;
  position: absolute;
  top: 35%;
  border-radius: 50%;
  border: 1px dashed <?=$websiteBackgroudColor?>;
}
.home-shop .single-shop-area .owl-buttons .owl-next:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.home-shop .single-shop-area .owl-buttons .owl-next:hover i {
  color: #ffffff;
}
.home-shop .single-shop-area .owl-buttons .owl-next i {
  font-size: 20px;
  font-weight: 400;
  line-height: 28px;
  color: <?=$websiteBackgroudColor?>;
}
.home-shop .single-shop-area .owl-buttons .owl-prev {
  background: transparent;
  width: 35px;
  height: 35px;
  border-radius: 0;
  opacity: 1;
  margin: 2px;
  left: -40px;
  position: absolute;
  top: 35%;
  border-radius: 50%;
  border: 1px dashed <?=$websiteBackgroudColor?>;
}
.home-shop .single-shop-area .owl-buttons .owl-prev:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.home-shop .single-shop-area .owl-buttons .owl-prev:hover i {
  color: #ffffff;
}
.home-shop .single-shop-area .owl-buttons .owl-prev i {
  font-size: 20px;
  font-weight: 400;
  line-height: 28px;
  color: <?=$websiteBackgroudColor?>;
}
/*-------------------------------------
29.Slider Bottom area start  here 
---------------------------------------*/
.slider-bottom-area {
  overflow: hidden;
}
.slider-bottom-area .slider-bottom h2 {
  font-size: 48px;
  font-weight: 600;
  color: #222222;
  text-align: center;
}
.slider-bottom-area .slider-bottom .total-business .single-business {
  text-align: center;
  margin: 0 15px;
}
.slider-bottom-area .slider-bottom .total-business .single-business:hover i {
  border-radius: 30px;
}
.slider-bottom-area .slider-bottom .total-business .single-business:hover h3 {
  color: #dddddd;
}
.slider-bottom-area .slider-bottom .total-business .single-business:hover .read-more a:after {
  right: -30px;
  opacity: 1;
}
.slider-bottom-area .slider-bottom .total-business .single-business i {
  font-size: 30px;
  color: <?=$websiteBackgroudColor?>;
  margin-bottom: 30px;
  transition: all 0.5s ease 0s;
  width: 60px;
  height: 60px;
  line-height: 60px;
  border: 1px dashed <?=$websiteBackgroudColor?>;
}
.slider-bottom-area .slider-bottom .total-business .single-business i:hover {
  width: 60px;
  height: 60px;
  line-height: 60px;
  border: 1px dashed <?=$websiteBackgroudColor?>;
  border-radius: 30px;
}
.slider-bottom-area .slider-bottom .total-business .single-business h3 {
  margin: 0 0 20px;
}
.slider-bottom-area .slider-bottom .total-business .single-business h3 a {
  font-size: 22px;
  font-weight: 500;
  color: #000000;
  transition: all 0.5s ease 0s;
}
.slider-bottom-area .slider-bottom .total-business .single-business h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.slider-bottom-area .slider-bottom .total-business .single-business .read-more {
  display: block;
}
.slider-bottom-area .slider-bottom .total-business .single-business .read-more a {
  display: inline-block;
  color: #333333;
  font-size: 16px;
  transition: all 0.5s ease 0s;
  font-weight: 500;
  position: relative;
}
.slider-bottom-area .slider-bottom .total-business .single-business .read-more a:after {
  content: "\f101";
  font-family: fontawesome;
  color: <?=$websiteBackgroudColor?>;
  font-weight: 500;
  font-size: 16px;
  position: absolute;
  top: 0;
  right: 0px;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.slider-bottom-area .slider-bottom .total-business .single-business .read-more a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.slider-bottom-area .slider-bottom .total-business .single-business .read-more a:hover:after {
  right: -30px;
  opacity: 1;
}
.slider-bottom-area .slider-bottom .total-business .owl-buttons .owl-prev {
  left: -60px;
  top: 40%;
  position: absolute;
  width: 40px;
  height: 40px;
  line-height: 30px;
  font-size: 25px;
  border: 1px dashed <?=$websiteBackgroudColor?>;
  background: transparent;
  color: #ffffff;
  opacity: 1;
  transition: all 0.5s ease 0s;
}
.slider-bottom-area .slider-bottom .total-business .owl-buttons .owl-prev i {
  color: <?=$websiteBackgroudColor?>;
}
.slider-bottom-area .slider-bottom .total-business .owl-buttons .owl-prev:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.slider-bottom-area .slider-bottom .total-business .owl-buttons .owl-prev:hover i {
  color: #ffffff;
}
.slider-bottom-area .slider-bottom .total-business .owl-buttons .owl-next {
  right: -60px;
  top: 40%;
  position: absolute;
  width: 40px;
  height: 40px;
  line-height: 30px;
  font-size: 25px;
  border: 1px dashed <?=$websiteBackgroudColor?>;
  background: transparent;
  color: #ffffff;
  opacity: 1;
  transition: all 0.5s ease 0s;
}
.slider-bottom-area .slider-bottom .total-business .owl-buttons .owl-next i {
  color: <?=$websiteBackgroudColor?>;
}
.slider-bottom-area .slider-bottom .total-business .owl-buttons .owl-next:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.slider-bottom-area .slider-bottom .total-business .owl-buttons .owl-next:hover i {
  color: #ffffff;
}
.home-two.home-two {
  position: inherit;
}
/*-------------------------------------
31.Home About Start Here 
--------------------------------------*/
.home-about-area {
  background-position: center center;
  background-size: cover;
  background: #f5f5f5;
}
.home-about-area .about-content h3 {
  color: #000000;
  font-weight: 700;
  font-size: 40px;
}
.home-about-area .about-content h3 span {
  color: <?=$websiteBackgroudColor?>;
}
.home-about-area .about-content .about-content-list {
  margin-top: 50px;
}
.home-about-area .about-content .about-content-list .single-list:hover .media .media-body h4.media-heading a {
  color: <?=$websiteBackgroudColor?>;
}
.home-about-area .about-content .about-content-list .single-list .media .pull-left {
  margin-right: 20px;
}
.home-about-area .about-content .about-content-list .single-list .media .pull-left a {
  display: block;
  transition: all 0.5s ease 0s;
  margin-bottom: 20px;
  font-size: 20px;
  color: #ffffff;
  width: 50px;
  height: 50px;
  background: <?=$websiteBackgroudColor?>;
  position: relative;
  text-align: center;
  line-height: 50px;
  box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.4);
  border-radius: 30px;
}
.home-about-area .about-content .about-content-list .single-list .media .pull-left a:hover {
  box-shadow: none;
}
.home-about-area .about-content .about-content-list .single-list .media .media-body h4.media-heading {
  margin-bottom: 10px;
}
.home-about-area .about-content .about-content-list .single-list .media .media-body h4.media-heading a {
  display: block;
  transition: all 0.5s ease 0s;
  font-size: 20px;
  color: #000000;
  font-weight: 500;
}
.home-about-area .about-content .about-content-list .single-list .media .media-body h4.media-heading a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.home-about-area .about-featured-image a {
  display: block;
}
/*------------------------------------
    32.Home Two Slider Bottom Services
---------------------------------------*/
.home-two-services-area {
  background: #000000;
}
.home-two-services-area ul {
  margin: 0;
  padding: 0;
}
.home-two-services-area ul li {
  display: inline-block;
  width: 25%;
  float: left;
  padding: 30px;
}
.home-two-services-area ul li:nth-child(1) {
  background: <?=$websiteBackgroudColor?>;
}
.home-two-services-area ul li:nth-child(2) {
  background: #b52929;
}
.home-two-services-area ul li:nth-child(3) {
  background: <?=$websiteBackgroudColor?>;
}
.home-two-services-area ul li:nth-child(4) {
  background: #b52929;
}
.home-two-services-area ul li .single-services {
  text-align: center;
  margin: 0 15px;
}
.home-two-services-area ul li .single-services:hover i {
  border-radius: 30px;
}
.home-two-services-area ul li .single-services:hover h3 {
  color: #dddddd;
}
.home-two-services-area ul li .single-services:hover .read-more a:after {
  right: -30px;
  opacity: 1;
}
.home-two-services-area ul li .single-services i {
  font-size: 30px;
  color: #ffffff;
  margin-bottom: 10px;
  transition: all 0.5s ease 0s;
  width: 60px;
  height: 60px;
  line-height: 60px;
  border: 1px dashed #ffffff;
}
.home-two-services-area ul li .single-services i:hover {
  width: 60px;
  height: 60px;
  line-height: 60px;
  border: 1px dashed #ececec;
  border-radius: 30px;
}
.home-two-services-area ul li .single-services h3 {
  margin: 0 0 20px;
}
.home-two-services-area ul li .single-services h3 a {
  font-size: 18px;
  font-weight: 600;
  color: #ffffff;
  transition: all 0.5s ease 0s;
}
.home-two-services-area ul li .single-services h3 a:hover {
  color: #dddddd;
}
.home-two-services-area ul li .single-services p {
  color: #ffffff;
}
.home-two-services-area ul li .single-services .read-more {
  display: block;
}
.home-two-services-area ul li .single-services .read-more a {
  display: inline-block;
  color: #ffffff;
  font-size: 16px;
  transition: all 0.5s ease 0s;
  font-weight: 800;
  position: relative;
}
.home-two-services-area ul li .single-services .read-more a:after {
  content: "\f101";
  font-family: fontawesome;
  color: #dddddd;
  font-weight: 600;
  font-size: 16px;
  position: absolute;
  top: 0;
  right: 0px;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.home-two-services-area ul li .single-services .read-more a:hover {
  color: #dddddd;
}
.home-two-services-area ul li .single-services .read-more a:hover:after {
  right: -30px;
  opacity: 1;
}
/*--------------------------------------
    33.Portfolio One Page Start Here 
---------------------------------------*/
.portfolio4-area {
  position: relative;
}
.portfolio4-area .single-portfolio-area {
  position: relative;
  overflow: hidden;
}
.portfolio4-area .single-portfolio-area .portfolio-img {
  position: relative;
  overflow: hidden;
  display: block;
}
.portfolio4-area .single-portfolio-area .portfolio-img img {
  width: 100%;
}
.portfolio4-area .single-portfolio-area .portfolio-img:after {
  position: absolute;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.8);
  content: "";
  top: 0;
  left: 0;
  opacity: 0;
  transform-origin: 0 0 0;
  transition: all 0.5s ease 0s;
}
.portfolio4-area .single-portfolio-area:hover .portfolio-img:after {
  opacity: 1;
}
.portfolio4-area .single-portfolio-area:hover .portfolio2-overley .content h3 a {
  top: 35%;
}
.portfolio4-area .single-portfolio-area:hover .portfolio2-overley .content p {
  bottom: 7%;
}
.portfolio4-area .portfolio2-overley {
  text-align: center;
}
.portfolio4-area .portfolio2-overley .content h3 a {
  color: #ffffff;
  font-size: 18px;
  font-weight: bold;
  left: 0;
  position: absolute;
  right: 0;
  text-transform: uppercase;
  top: -62%;
  transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  /* IE 9 */
  -webkit-transform: translateY(-50%);
  /* Chrome, Safari, Opera */
  transition: all 0.5s ease 0s;
}
.portfolio4-area .portfolio2-overley .content h3 a:after {
  position: absolute;
  content: "";
  width: 60px;
  height: 2px;
  background: #ffffff;
  bottom: -15px;
  left: 0;
  right: 0;
  margin: auto;
}
.portfolio4-area .portfolio2-overley .content p {
  color: #ffffff;
  font-size: 18px;
  font-weight: bold;
  left: 0;
  position: absolute;
  right: 0;
  bottom: -62%;
  transform: translateY(-100%);
  -ms-transform: translateY(-100%);
  /* IE 9 */
  -webkit-transform: translateY(-100%);
  /* Chrome, Safari, Opera */
  transition: all 0.5s ease 0s;
  font-size: 14px;
  padding: 0 15px;
}
/* ------------------------------------
34.Portfolio Two Page Start Here 
---------------------------------------*/
.portfolio3-area {
  background: #F8F8F8;
}
.portfolio3-area .single-portfolio-area {
  position: relative;
  overflow: hidden;
}
.portfolio3-area .single-portfolio-area > .portfolio-img > img {
  width: 100%;
}
.portfolio3-area .single-portfolio-area:hover .overley {
  opacity: 1;
}
.portfolio3-area .single-portfolio-area:hover .overley .content h3:after {
  width: 80px;
}
.portfolio3-area .single-portfolio-area .portfolio-img a {
  display: block;
}
.portfolio3-area .single-portfolio-area .overley {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.5);
  opacity: 0;
  content: "";
  transition: all 0.5s ease 0s;
  transform: translate3d(0px, 0px, 0px);
}
.portfolio3-area .single-portfolio-area .overley .content {
  bottom: 0;
  left: 0;
  margin: auto;
  position: relative;
  right: 0;
  text-align: center;
  top: 50%;
  transform: translateY(-50%);
  z-index: 99;
  transition: all 0.5s ease 0s;
}
.portfolio3-area .single-portfolio-area .overley .content h3 {
  margin-bottom: 22px;
  position: relative;
}
.portfolio3-area .single-portfolio-area .overley .content h3:after {
  background: #ffffff none repeat scroll 0 0;
  bottom: -14px;
  content: "";
  height: 1px;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  width: 0px;
  transition: all 0.5s ease 0s;
}
.portfolio3-area .single-portfolio-area .overley .content h3 a {
  display: block;
  color: #ffffff;
  text-decoration: none;
  font-size: 18px;
}
.portfolio3-area .single-portfolio-area .overley .content p {
  color: #ffffff;
}
/* -------------------------------------
35.Portfolio Details Start Here
---------------------------------------*/
.portfolio-details-area .portfolio-image {
  margin-right: 20px;
}
.portfolio-details-area .portfolio-image img {
  width: 100%;
}
.portfolio-details-area .portfolio-image img:hover {
  opacity: .9;
}
.portfolio-details-area .portfolio-informations h3 {
  color: #000000;
  font-size: 18px;
  font-weight: 600;
  position: relative;
  transition: all 0.5s ease 0s;
}
.portfolio-details-area .portfolio-informations h3:after {
  background: <?=$websiteBackgroudColor?>;
  content: "";
  height: 3px;
  left: 0;
  position: absolute;
  top: 30px;
  width: 60px;
}
.portfolio-details-area .portfolio-informations ul li {
  display: block;
  font-size: 16px;
  margin-bottom: 10px;
}
.portfolio-details-area .portfolio-informations ul li span {
  float: right;
}
.portfolio-details-area .portfolio-informations .visit-project {
  display: inline-block;
  margin: 30px 0 0;
}
.portfolio-details-area .portfolio-informations .visit-project a {
  background: <?=$websiteBackgroudColor?>;
  border: 1px solid <?=$websiteBackgroudColor?>;
  color: #ffffff;
  border-radius: 0px;
  display: block;
  font-size: 16px;
  font-weight: 600;
  padding: 10px 60px;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
}
.portfolio-details-area .portfolio-informations .visit-project a:hover {
  background: #b52929;
  border: 1px solid #b52929;
  -webkit-box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.5);
  -moz-box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.5);
  box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.5);
}
.portfolio-details-area .project-description {
  padding-top: 60px;
}
.portfolio-details-area .project-description h3 {
  color: #000000;
  font-size: 18px;
  font-weight: 600;
  position: relative;
  transition: all 0.5s ease 0s;
  margin-bottom: 35px;
}
.portfolio-details-area .project-description h3:after {
  background: <?=$websiteBackgroudColor?>;
  content: "";
  height: 3px;
  left: 0;
  position: absolute;
  top: 30px;
  width: 60px;
}
.portfolio-details-area .related-project h3 {
  color: #000000;
  font-size: 18px;
  font-weight: 600;
  position: relative;
  transition: all 0.5s ease 0s;
  margin-bottom: 40px;
}
.portfolio-details-area .related-project h3:after {
  background: <?=$websiteBackgroudColor?>;
  content: "";
  height: 3px;
  left: 0;
  position: absolute;
  top: 30px;
  width: 60px;
}
.portfolio-details-area .related-project .single-portfolio {
  position: relative;
  overflow: hidden;
}
.portfolio-details-area .related-project .single-portfolio:hover .overley {
  opacity: 1;
  transform: scale(1);
}
.portfolio-details-area .related-project .single-portfolio > .portfolio-image {
  overflow: hidden;
  position: relative;
  margin: 0;
}
.portfolio-details-area .related-project .single-portfolio > .portfolio-image a {
  display: block;
}
.portfolio-details-area .related-project .single-portfolio > .portfolio-image a img {
  width: 100%;
  min-height: 250px;
}
.portfolio-details-area .related-project .single-portfolio .overley {
  position: absolute;
  content: "";
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  text-align: center;
  height: 100%;
  width: 100%;
  transition: all 0.5s ease 0s;
  opacity: 0;
  transform: scale(0);
  background: rgba(0, 0, 0, 0.8);
}
.portfolio-details-area .related-project .single-portfolio .overley .portfolio-details {
  top: 50%;
  position: relative;
  transform: translateY(-50%);
  text-align: center;
}
.portfolio-details-area .related-project .single-portfolio .overley .portfolio-details h3 {
  margin-bottom: 0px;
}
.portfolio-details-area .related-project .single-portfolio .overley .portfolio-details h3:after {
  display: none;
}
.portfolio-details-area .related-project .single-portfolio .overley .portfolio-details h3 a {
  transition: all 0.5s ease 0s;
  display: block;
  color: #ffffff;
  font-size: 16px;
  font-weight: 600;
}
.portfolio-details-area .related-project .single-portfolio .overley .portfolio-details h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.portfolio-details-area .related-project .single-portfolio .overley .portfolio-details span {
  color: #ffffff;
  margin-bottom: 0;
}
/*--------------------------------------
    36.Shop Page Start Here 
---------------------------------------*/
.shop-page-area .single-details {
  position: relative;
  overflow: hidden;
}
.shop-page-area .single-details .images {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}
.shop-page-area .single-details .images:hover h3 a {
  color: <?=$websiteBackgroudColor?>;
}
.shop-page-area .single-details .images:hover .overley {
  opacity: 1;
  transform: scaleY(1);
}
.shop-page-area .single-details .images a {
  display: block;
}
.shop-page-area .single-details .images a img {
  transition: all 0.3s ease-out;
  width: 100%;
}
.shop-page-area .single-details .images .overley {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.9);
  top: 0;
  transform: scaleY(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
  padding: 30px;
}
.shop-page-area .single-details .images .overley .winners-details {
  padding: 20% 0;
}
.shop-page-area .single-details .images .overley .winners-details h4 {
  margin-bottom: 10px;
  padding-bottom: 10px;
  color: #ffffff;
  font-size: 18px;
  position: relative;
}
.shop-page-area .single-details .images .overley .winners-details h4:after {
  display: none;
}
.shop-page-area .single-details .images .overley .winners-details .product-info {
  margin: 0;
  padding: 0px;
  list-style: none;
  top: 50%;
  position: absolute;
  transform: translateY(-50%);
  transition: all .9s;
  text-align: center;
  left: 0;
  right: 0;
}
.shop-page-area .single-details .images .overley .winners-details .product-info li {
  display: inline-block;
}
.shop-page-area .single-details .images .overley .winners-details .product-info li a {
  color: #ffffff;
  text-transform: capitalize;
  text-decoration: none;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border: 1px solid #ffffff;
  text-align: center;
  transition: all 0.5s ease 0s;
}
.shop-page-area .single-details .images .overley .winners-details .product-info li a:hover {
  background: #b52929;
  border: 1px solid #b52929;
  color: #ffffff;
}
.shop-page-area .single-details .images .overley .winners-details .product-info li a i {
  font-size: 16px;
  color: #ffffff;
  margin: 0;
}
.shop-page-area .single-details .images .overley .winners-details p {
  margin-bottom: 5px;
  color: #ffffff;
  font-size: 12px;
}
.shop-page-area .single-details .images .overley .winners-details p i {
  color: #ffffff;
  margin-right: 8px;
}
.shop-page-area .single-details h3 {
  margin-bottom: 10px !important;
  margin-left: 0;
}
.shop-page-area .single-details h3 a {
  color: #333333;
  transition: all 0.5s ease 0s;
  font-size: 18px;
  text-transform: uppercase;
  margin: 0;
}
.shop-page-area .single-details h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.shop-page-area .single-details .price-details ul {
  margin: 0;
  padding: 0;
  text-align: left;
}
.shop-page-area .single-details .price-details ul li {
  display: block;
}
.shop-page-area .single-details .price-details ul li:first-child {
  font-weight: 900;
  font-size: 20px;
}
.shop-page-area .single-details .price-details ul li:first-child del {
  font-weight: 300;
  margin-right: 5px;
  font-size: 12px;
}
.shop-page-area .tobar-area {
  margin: 0 0 30px;
}
.shop-page-area .tobar-area .view-area p {
  font-size: 14px;
  margin: 0;
}
.shop-page-area .tobar-area .view-area p span {
  font-weight: 800;
}
.shop-page-area .tobar-area .showing-result ul {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: right;
}
.shop-page-area .tobar-area .showing-result ul li {
  display: inline-block;
  font-weight: 600;
  color: #333333;
  height: 25px;
}
.shop-page-area .tobar-area .showing-result ul li .form-group {
  margin: 0;
}
.shop-page-area .tobar-area .showing-result ul li .form-group.seclect-box select.form-control {
  display: inline-block;
  border: 0;
  background: transparent;
  border-radius: 0px;
}
.sidebar-area .widget {
  margin-bottom: 30px;
}
.sidebar-area .widget h2 {
  color: #000000;
  font-size: 20px;
  font-weight: 600;
  text-transform: uppercase;
  position: relative;
  margin-bottom: 40px;
}
.sidebar-area .widget h2:after {
  position: absolute;
  bottom: -20px;
  left: 0;
  content: "";
  background: <?=$websiteBackgroudColor?>;
  width: 60px;
  height: 3px;
}
.sidebar-area .widget .services-tab ul {
  margin: 0;
  padding: 0;
  text-align: left;
  border: 0px;
}
.sidebar-area .widget .services-tab ul.nav.nav-tabs {
  margin: 0;
  padding: 0;
  text-align: left;
  border: 1px solid #e8e8e8;
}
.sidebar-area .widget .services-tab ul.nav.nav-tabs li {
  display: block;
  float: inherit;
  border-top: 1px solid #e8e8e8;
  background: transparent;
  color: #444444;
}
.sidebar-area .widget .services-tab ul.nav.nav-tabs li:first-child {
  border-top: 0px solid #ffffff;
}
.sidebar-area .widget .services-tab ul.nav.nav-tabs li.active {
  background: transparent;
  color: #444444;
}
.sidebar-area .widget .services-tab ul.nav.nav-tabs li.active a {
  background: transparent;
  color: <?=$websiteBackgroudColor?>;
  border: 0px;
}
.sidebar-area .widget .services-tab ul.nav.nav-tabs li a {
  display: block;
  font-size: 16px;
  color: #444444;
  background: transparent;
  border: 0px;
}
.sidebar-area .widget .services-tab ul.nav.nav-tabs li a:hover {
  background: transparent;
  color: <?=$websiteBackgroudColor?>;
  border: 0px;
}
.sidebar-area .widget .recent-project ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.sidebar-area .widget .recent-project ul li {
  display: inline-block;
}
.sidebar-area .widget .recent-project ul li a {
  display: block;
  margin: -2px;
  padding: 0;
  width: 88px;
  height: 88px;
}
.sidebar-area .widget .recent-project ul li a img {
  transition: all 0.5s ease 0s;
}
.sidebar-area .widget .recent-project ul li a img:hover {
  opacity: .9;
  box-shadow: none;
}
.sidebar-area .widget.widget_categories ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.sidebar-area .widget.widget_categories ul li {
  display: block;
  padding-bottom: 10px;
  margin-bottom: 10px;
  border-bottom: 1px solid #ededed;
}
.sidebar-area .widget.widget_categories ul li:last-child {
  border-bottom: 0px;
}
.sidebar-area .widget.widget_categories ul li a {
  display: block;
  text-decoration: none;
  position: relative;
  margin-left: 20px;
  color: #444444;
  font-size: 12px;
  transition: all 0.5s ease 0s;
  text-transform: uppercase;
}
.sidebar-area .widget.widget_categories ul li a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.sidebar-area .widget.widget_categories ul li a span.count {
  float: right;
}
.sidebar-area .widget.widget_categories ul li a:after {
  position: absolute;
  left: -20px;
  top: 0px;
  font-size: 12px;
  font-weight: 300;
  color: <?=$websiteBackgroudColor?>;
  content: "\f105";
  font-family: FontAwesome;
}
.sidebar-area .widget #slider-range {
  margin-bottom: 15px;
}
.sidebar-area .widget .ui-widget-content {
  background: #dddddd none repeat scroll 0 0;
  border: 0 solid #a6c9e2;
  color: #000000;
  height: 4px;
}
.sidebar-area .widget .ui-slider-range.ui-widget-header.ui-corner-all {
  background: #000000 none repeat scroll 0 0;
  border: 0 none;
  box-shadow: none;
  height: 4px;
}
.sidebar-area .widget .ui-state-default,
.sidebar-area .widget .ui-widget-content .ui-state-default,
.sidebar-area .widget .ui-widget-header .ui-state-default {
  background: #000000 none repeat scroll 0 0;
  border: 0 solid #ffffff;
  font-weight: 300;
  margin: 0;
  width: 5px;
}
.sidebar-area .widget .price-area label {
  color: #444444;
  font-weight: 300;
  font-size: 13px;
}
.sidebar-area .widget .price-area input {
  width: 100%;
  text-align: center;
  margin-bottom: 20px;
  border: 0px solid #ffffff;
}
.sidebar-area .widget .price-area a {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  display: block;
  font-size: 14px;
  font-weight: 500;
  padding: 7px 50px;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  text-decoration: none;
  text-transform: uppercase;
  transition: all 0.5s ease 0s;
  text-align: center;
}
.sidebar-area .widget .price-area a:hover {
  background: #b52929;
  box-shadow: none;
}
.sidebar-area .widget .posted-date a {
  color: #444444;
  font-weight: 800;
  transition: all 0.5s ease 0s;
}
.sidebar-area .widget .posted-date a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.sidebar-area .widget .price a {
  color: #444444;
  font-weight: 600;
  transition: all 0.5s ease 0s;
}
.sidebar-area .widget .price a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.sidebar-area .widget .popular-tags ul li {
  display: inline-block;
  border: 1px solid #e1e1e1;
  margin: 2px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
.sidebar-area .widget .popular-tags ul li:hover {
  border: 1px solid <?=$websiteBackgroudColor?>;
  background: <?=$websiteBackgroudColor?>;
}
.sidebar-area .widget .popular-tags ul li:hover a {
  color: #ffffff;
}
.sidebar-area .widget .popular-tags ul li a {
  padding: 5px 10px;
  text-decoration: none;
  display: block;
  color: #6a6a6a;
}
.sidebar-area .widget .search-box {
  height: 45px;
  margin: 0;
  padding: 0;
  transition: all 0.5s ease 0s;
}
.sidebar-area .widget .search-box .search-form input.form-control {
  border-radius: 0;
  line-height: 2px;
  width: 100%;
}
.sidebar-area .widget .search-box.show-box {
  opacity: 1 !important;
}
.single-product-area .tab-content .product-picture a img {
  width: 100%;
  transition: all 0.5s ease 0s;
}
.single-product-area .tab-content .product-picture a img:hover {
  opacity: .7;
}
.single-product-area .single-product-tab {
  margin: 10px 0 0;
  border: 0px;
  overflow: hidden;
}
.single-product-area .single-product-tab:hover .owl-buttons {
  opacity: 1;
}
.single-product-area .single-product-tab .tab-image {
  border: 0px;
  text-align: center;
}
.single-product-area .single-product-tab .tab-image li {
  display: inline-block;
  border: 0;
}
.single-product-area .single-product-tab .tab-image li a {
  display: block;
  margin: 0;
  padding: 0;
}
.single-product-area .single-product-tab .tab-image li a img {
  width: 100%;
}
.single-product-area .single-product-tab .tab-image li a img:hover {
  opacity: .7;
}
.single-product-area .single-product-tab .owl-buttons {
  opacity: 0;
}
.single-product-area .single-product-tab .owl-buttons .owl-prev {
  left: -5px;
  position: absolute;
  top: 28%;
  background: <?=$websiteBackgroudColor?> !important;
  width: 30px;
  height: 30px;
  border-radius: 0 !important;
  opacity: 1!important;
}
.single-product-area .single-product-tab .owl-buttons .owl-prev i {
  font-size: 18px;
  font-weight: 600;
  line-height: 23px;
}
.single-product-area .single-product-tab .owl-buttons .owl-next {
  right: -5px;
  position: absolute;
  top: 28%;
  background: <?=$websiteBackgroudColor?> !important;
  width: 30px;
  height: 30px;
  border-radius: 0 !important;
  opacity: 1!important;
}
.single-product-area .single-product-tab .owl-buttons .owl-next i {
  font-size: 18px;
  font-weight: 600;
  line-height: 23px;
}
.single-product-area #product-1 a {
  display: none;
}
.single-product-area #product-1 a.active {
  display: block;
}
.single-product-area .product-details h3 {
  color: #000000;
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 40px;
  position: relative;
  text-transform: uppercase;
}
.single-product-area .product-details h3:after {
  background: <?=$websiteBackgroudColor?>;
  bottom: -20px;
  content: "";
  height: 3px;
  left: 0;
  position: absolute;
  width: 60px;
}
.single-product-area .product-details .product-rating-area ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.single-product-area .product-details .product-rating-area ul li {
  display: inline-block;
  margin-right: 0;
  color: #444444;
  font-size: 14px;
}
.single-product-area .product-details .product-rating-area ul li i:hover {
  color: #FFCE44;
}
.single-product-area .product-details .product-quantity {
  margin-bottom: 30px;
}
.single-product-area .product-details .price {
  margin-bottom: 30px;
}
.single-product-area .product-details .price span {
  color: #444444;
  font-weight: 600;
}
.single-product-area .product-details .product-cart-area {
  margin-bottom: 30px;
  padding-top: 20px;
}
.single-product-area .product-details .product-cart-area ul {
  margin: 0;
  padding: 0;
  list-style: none;
  display: inline-block;
}
.single-product-area .product-details .product-cart-area ul li {
  display: inline-block;
  margin: 0 3px;
}
.single-product-area .product-details .product-cart-area ul li a {
  background: transparent;
  border: 1px solid #000000;
  color: #000000;
  height: 40px;
  line-height: 40px;
  margin: auto;
  text-align: center;
  transition: all 0.5s ease 0s;
  width: 40px;
  display: block;
}
.single-product-area .product-details .product-cart-area ul li a:hover {
  background: <?=$websiteBackgroudColor?>;
  border: 1px solid <?=$websiteBackgroudColor?>;
  color: #ffffff;
  -webkit-box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.5);
  box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.5);
  -webkit-transform: translate(0, -5px) rotate(0.01deg);
  -o-transform: translate(0, -5px) rotate(0.01deg);
  -ms-transform: translate(0, -5px) rotate(0.01deg);
  transform: translate(0, -5px) rotate(0.01deg);
  -webkit-transition: box-shadow 0.3s ease 0s, transform 0.3s ease 0s;
  -moz-transition: box-shadow 0.3s ease 0s, transform 0.3s ease 0s;
  -o-transition: box-shadow 0.3s ease 0s, transform 0.3s ease 0s;
  transition: box-shadow 0.3s ease 0s, transform 0.3s ease 0s;
}
.single-product-area .add-cart {
  display: inline-block;
  margin-top: 10px;
}
.single-product-area .add-cart a {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
  display: block;
  font-size: 14px;
  font-weight: 500;
  padding: 7px 50px;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  transition: all 0.5s ease 0s;
}
.single-product-area .add-cart a:hover {
  background: #b52929;
}
.product-description ul {
  margin: 0;
  padding: 0;
  text-align: left;
  border: 0px;
}
.product-description ul.nav.nav-tabs {
  margin: 0 0 30px;
  padding: 0;
  text-align: left;
}
.product-description ul.nav.nav-tabs li {
  display: inline-block;
  float: inherit;
  border: 0px;
  background: transparent;
  color: #444444;
}
.product-description ul.nav.nav-tabs li:last-child a:after {
  display: none;
}
.product-description ul.nav.nav-tabs li.active {
  background: transparent;
  color: <?=$websiteBackgroudColor?>;
  border: 0px;
}
.product-description ul.nav.nav-tabs li.active a {
  background: transparent;
  color: <?=$websiteBackgroudColor?>;
  border: 0px;
}
.product-description ul.nav.nav-tabs li a {
  display: block;
  text-align: left;
  font-size: 16px;
  padding: 10px 15px;
  color: #444444;
  background: transparent;
  border: 0px;
}
.product-description ul.nav.nav-tabs li a:hover {
  background: transparent;
  color: <?=$websiteBackgroudColor?>;
  border: 0px;
}
.product-description .tab-content {
  border: 1px solid #ededed;
  padding: 30px;
}
.product-description .tab-content .product-rating-area ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.product-description .tab-content .product-rating-area ul li {
  display: inline-block;
  margin-right: 0;
  color: #444444;
  font-size: 14px;
}
.product-description .tab-content .product-rating-area ul li i:hover {
  color: #FFCE44;
}
.product-description .tab-content .media > .pull-left {
  padding-right: 20px;
  margin-bottom: 20px;
}
.product-description .tab-content .media .media-body span {
  font-size: 25px;
  margin-bottom: 15px;
  display: block;
}
.related-product-area h3 {
  color: #000000;
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 40px;
  position: relative;
}
.related-product-area h3:after {
  background: <?=$websiteBackgroudColor?>;
  bottom: -20px;
  content: "";
  height: 3px;
  left: 0;
  position: absolute;
  width: 60px;
}
.related-product-area .single-product-area {
  margin: 15px;
}
.related-product-area .single-product-store:after {
  background: #e1e1e1 none repeat scroll 0 0;
  content: "";
  height: 2px;
  left: 45%;
  margin: auto;
  position: absolute;
  top: -39px;
  width: 40%;
}
.related-product-area .single-product-store .product-content {
  margin: 20px 0 0;
}
.related-product-area .single-product-store .product-content h3 {
  margin: 0px;
  font-size: 18px;
  font-family: 'Muli', sans-serif;
}
.related-product-area .single-product-store .product-content h3:after {
  display: none;
}
.related-product-area .single-product-store .product-content h3 a {
  display: block;
  text-decoration: none;
  color: #000000;
  transition: all 0.5s ease 0s;
}
.related-product-area .single-product-store .product-content h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.related-product-area .single-product-store .product-content ul li {
  display: inline-block;
}
.related-product-area .single-product-store .product-content ul li i {
  font-size: 14px;
  color: #f7c51d;
}
.related-product-area .single-product-store .product-content p {
  font-weight: bold;
  color: <?=$websiteBackgroudColor?>;
}
.related-product-area .single-product-store .single-product {
  position: relative;
  overflow: hidden;
}
.related-product-area .single-product-store .single-product img {
  width: 100%;
  transition: all 0.3s ease-out;
}
.related-product-area .single-product-store .single-product:hover img {
  transform: scale(1.03);
  width: 100%;
}
.related-product-area .single-product-store .single-product:hover .shop-overley {
  opacity: 1;
  transform: scaleY(1);
}
.related-product-area .single-product-store .single-product a {
  display: block;
  position: relative;
  overflow: hidden;
}
.related-product-area .single-product-store .single-product .shop-overley {
  content: "";
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.8);
  transition: all 0.5s ease 0s;
  opacity: 0;
  overflow: hidden;
  transform: scaleY(0);
  transform-origin: 0 0 1;
}
.related-product-area .single-product-store .single-product .shop-overley .social-media-area {
  position: absolute;
  margin: auto;
  left: 0;
  right: 0;
  top: 40%;
  bottom: 0;
}
.related-product-area .single-product-store .single-product .shop-overley .social-media-area ul {
  text-align: center;
}
.related-product-area .single-product-store .single-product .shop-overley .social-media-area ul li {
  display: inline-block;
  margin: 5px;
}
.related-product-area .single-product-store .single-product .shop-overley .social-media-area ul li a {
  display: block;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  color: #000000;
  background: #ffffff;
  width: 30px;
  height: 30px;
  line-height: 30px;
  transition: all 0.5s ease 0s;
}
.related-product-area .single-product-store .single-product .shop-overley .social-media-area ul li a:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.related-product-area .single-product-store .owl-buttons {
  right: 10px;
  position: absolute;
  top: -60px;
}
.related-product-area .single-product-store .owl-buttons div {
  background: <?=$websiteBackgroudColor?>;
  width: 35px;
  height: 35px;
  border-radius: 0;
  opacity: 1;
  margin: 2px;
}
.related-product-area .single-product-store .owl-buttons div:hover {
  background: #000000;
}
.related-product-area .single-product-store .owl-buttons div i {
  font-size: 20px;
  font-weight: 400;
  line-height: 28px;
}
.single-post .pull-left a img.media-object {
  width: 80px;
}
.single-post .pull-left {
  padding-right: 15px;
}
.single-post.media {
  margin-top: 15px;
}
.single-team .image {
  position: relative;
  overflow: hidden;
}
.single-team .image img {
  width: 100%;
}
.single-team .image:hover .overley {
  opacity: 1;
  transform: scaleY(1);
}
.single-team .image .overley {
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  width: 100%;
  height: 100%;
  background: rgba(211, 47, 47, 0.8);
  top: 0;
  transform: scaleY(0);
  transform-origin: 0 1 0;
  opacity: 0;
  transition: all 0.5s ease 0s;
}
.single-team .image .overley .social-media-icons ul {
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  text-align: center;
  top: 50%;
  transform: translateY(-50%);
  z-index: 99;
  transition: all 0.5s ease 0s;
}
.single-team .image .overley .social-media-icons ul li {
  display: inline-block;
  margin: 2px;
}
.single-team .image .overley .social-media-icons ul li a {
  display: block;
  width: 20px;
  height: 20px;
  line-height: 20px;
  color: #ffffff;
  transition: all 0.5s ease 0s;
  text-decoration: none;
  text-align: center;
}
.single-team .image .overley .social-media-icons ul li a:hover {
  color: #dddddd;
  border-radius: 50%;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
}
.single-team .image .overley .social-media-icons ul li a i {
  text-align: center;
  display: inline-block;
}
.home-page-core-activities-area img {
  width: 100%;
}
/*===========================================
37.About Me Start Here            
===========================================*/
.about-me-area .about-me {
  overflow: hidden;
}
.about-me-area .about-me .images {
  position: relative;
  overflow: hidden;
  background: #CACACA;
}
.about-me-area .about-me .images a {
  display: block;
}
.about-me-area .about-me .images a img {
  transition: all 0.5s ease 0s;
  width: 100%;
}
.about-me-area .about-me .my-infos {
  padding-top: 0px;
}
.about-me-area .about-me .my-infos h3 {
  margin-bottom: 0;
  font-weight: 300;
  font-style: italic;
}
.about-me-area .about-me .my-infos h3 a {
  color: #333333;
  margin-bottom: 10px;
  transition: all 0.5s ease 0s;
  font-size: 40px;
  text-transform: uppercase;
  font-style: normal;
}
.about-me-area .about-me .my-infos h3 a:hover {
  color: <?=$websiteBackgroudColor?>;
}
.about-me-area .about-me .my-infos span {
  font-weight: 600;
  font-style: italic;
  font-size: 16px;
  color: #777777;
  margin-bottom: 20px;
  display: block;
}
.about-me-area .about-me .my-infos blockquote {
  font-size: 15px;
  border-left: 5px solid <?=$websiteBackgroudColor?>;
  padding: 10px 20px;
  margin: 0 0 20px;
}
.about-me-area .about-me .my-infos .portfolio-btn {
  background: <?=$websiteBackgroudColor?>;
  border: 0 none;
  color: #ffffff;
  display: block;
  font-size: 18px;
  font-weight: bold;
  margin-top: 15px;
  padding: 20px 45px;
  border-radius: 30px;
  text-transform: uppercase;
  transition: all 0.5s ease 0s;
  text-align: center;
  border: 2px solid <?=$websiteBackgroudColor?>;
}
.about-me-area .about-me .my-infos .portfolio-btn:hover {
  color: <?=$websiteBackgroudColor?>;
  background: transparent;
}
.about-me-area .about-me .my-infos .hire-btn {
  border: 2px solid <?=$websiteBackgroudColor?>;
  display: block;
  font-size: 18px;
  font-weight: bold;
  margin-top: 15px;
  padding: 20px 45px;
  border-radius: 30px;
  text-transform: uppercase;
  transition: all 0.5s ease 0s;
  text-align: center;
  color: <?=$websiteBackgroudColor?>;
}
.about-me-area .about-me .my-infos .hire-btn:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.about-me-area .about-me .holax-shop h3,
.about-me-area .about-me .we-are-good-at h3 {
  font-size: 18px;
  margin-bottom: 25px;
}
.skill-bar-area {
  background: url('images/about-me/skill-area-bg.jpg') no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
.skill-bar-area .skill-content-3 {
  overflow: hidden;
}
.skill-bar-area .skill-content-3 .skill .progress .lead {
  color: #fff;
  font-size: 16px;
  font-weight: 600;
  left: 0;
  position: absolute;
  top: -35px;
  z-index: 99;
  text-transform: uppercase;
}
.skill-bar-area .skill-content-3 .skill .progress {
  background-color: #f0f0f0;
  border-radius: 0;
  box-shadow: none;
  height: 7px;
  margin: 50px 0 80px;
  overflow: visible;
  position: relative;
}
.skill-bar-area .skill-content-3 .skill .progress:last-child {
  margin-bottom: 0px;
}
.skill-bar-area .skill-content-3 .skill .progress-bar > span {
  background: <?=$websiteBackgroudColor?>;
  width: 44px;
  left: 90%;
  font-size: 12px;
  margin-right: 10px;
  margin-top: -60px;
  position: relative;
  padding: 10px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #ffffff;
}
.skill-bar-area .skill-content-3 .skill .progress-bar > span:before,
.skill-bar-area .skill-content-3 .skill .progress-bar > span:after {
  border: medium solid transparent;
  content: " ";
  height: 0;
  position: absolute;
  top: 100%;
  width: 0;
}
.skill-bar-area .skill-content-3 .skill .progress-bar > span:before {
  border-top-color: <?=$websiteBackgroudColor?>;
  border-width: 5px;
  left: 50%;
  margin-left: -5px;
}
.skill-bar-area .skill-content-3 .skill .progress:nth-child(1) .progress-bar {
  background: <?=$websiteBackgroudColor?>;
}
.skill-bar-area .skill-content-3 .skill .progress:nth-child(2) .progress-bar {
  background: <?=$websiteBackgroudColor?>;
}
.skill-bar-area .skill-content-3 .skill .progress:nth-child(3) .progress-bar {
  background: <?=$websiteBackgroudColor?>;
}
.skill-bar-area .skill-content-3 .skill .progress:nth-child(4) .progress-bar {
  background: <?=$websiteBackgroudColor?>;
}
.skill-bar-area .skill-info {
  padding: 50px;
  color: #fff;
  background: <?=$websiteBackgroudColor?>;
  position: relative;
  margin-right: 60px;
  border-radius: 30px;
}
.skill-bar-area .skill-info:after {
  left: 100%;
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-color: rgba(136, 183, 213, 0);
  border-left-color: <?=$websiteBackgroudColor?>;
  border-width: 50px;
  margin-top: -50px;
}
.skill-bar-area .skill-info h3 {
  font-size: 40px;
  text-transform: uppercase;
  text-align: center;
}
.contact-me-area .call-info {
  margin: 0;
}
.contact-me-area .call-info .contact-box {
  padding: 40px 15px;
  border: 1px solid <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
  text-decoration: none;
  text-align: center;
  overflow: hidden;
  vertical-align: middle;
  border-radius: 30px;
}
.contact-me-area .call-info .contact-box i {
  display: block;
  font-size: 50px;
  color: <?=$websiteBackgroudColor?>;
}
.contact-me-area .call-info .contact-box span {
  margin-top: 15px;
  display: block;
}
.contact-me-area .call-info .contact-box span a {
  color: #333333;
}
.contact-me-area .call-info .contact-box:hover {
  background: <?=$websiteBackgroudColor?>;
  border: 1px solid <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
.contact-me-area .call-info .contact-box:hover i {
  color: #ffffff;
}
.contact-me-area .call-info .contact-box:hover span a {
  color: #ffffff;
}
.follow-me-area h3.follow-title {
  text-align: center;
  text-transform: uppercase;
}
.follow-me-area .social-media ul {
  text-align: center;
}
.follow-me-area .social-media ul li {
  display: inline-block;
  margin: 2px;
}
.follow-me-area .social-media ul li a {
  display: block;
  width: 64px;
  height: 64px;
  line-height: 64px;
  color: <?=$websiteBackgroudColor?>;
  border: 1px solid <?=$websiteBackgroudColor?>;
  transition: all 0.5s ease 0s;
  text-decoration: none;
  text-align: center;
  font-size: 20px;
}
.follow-me-area .social-media ul li a:hover {
  background: <?=$websiteBackgroudColor?>;
  border-radius: 50%;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border: 1px solid <?=$websiteBackgroudColor?>;
  color: #ffffff;
}
/*===========================================
38.Preview Start Here            
===========================================*/
.spinner {
  width: 40px;
  height: 40px;
  position: relative;
  margin: 100px auto;
}
.double-bounce1 {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #333;
  opacity: 0.6;
  position: absolute;
  top: 0;
  left: 0;
  -webkit-animation: sk-bounce 2s infinite ease-in-out;
  animation: sk-bounce 2s infinite ease-in-out;
}
.double-bounce2 {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #333;
  opacity: 0.6;
  position: absolute;
  top: 0;
  left: 0;
  -webkit-animation: sk-bounce 2s infinite ease-in-out;
  animation: sk-bounce 2s infinite ease-in-out;
  -webkit-animation-delay: -1s;
  animation-delay: -1s;
}
@-webkit-keyframes sk-bounce {
  0%,
  100% {
    -webkit-transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1);
  }
}
@keyframes sk-bounce {
  0%,
  100% {
    transform: scale(0);
    -webkit-transform: scale(0);
  }
  50% {
    transform: scale(1);
    -webkit-transform: scale(1);
  }
}
.template-preloader-rapper {
  position: fixed;
  width: 100%;
  height: 100%;
  z-index: 999999;
  background: linear-gradient(99deg, <?=$websiteBackgroudColor?>, #a92b2b, #a92b2b);
  background-size: 600% 600%;
  -webkit-animation: AnimationName 4s ease infinite;
  -moz-animation: AnimationName 4s ease infinite;
  -o-animation: AnimationName 4s ease infinite;
  animation: AnimationName 4s ease infinite;
}
.template-preloader-rapper .spinner {
  position: absolute;
  left: 50%;
  top: 50%;
  margin-left: -20px;
  margin-top: -20px;
  height: 50px;
  width: 50px;
}
.template-preloader-rapper .spinner .double-bounce1 {
  background: #fff;
}
.template-preloader-rapper .spinner .double-bounce2 {
  background: #eee;
}
.waves-effect {
  position: relative;
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  vertical-align: middle;
  z-index: 1;
  transition: 0.3s ease-out;
}
.waves-effect .waves-ripple {
  position: absolute;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  margin-top: -10px;
  margin-left: -10px;
  opacity: 0;
  background: rgba(0, 0, 0, 0.2);
  transition: all 0.7s ease-out;
  transition-property: transform, opacity;
  transform: scale(0);
  pointer-events: none;
}
.waves-effect.waves-light .waves-ripple {
  background-color: rgba(255, 255, 255, 0.45);
}
.waves-effect.waves-red .waves-ripple {
  background-color: rgba(244, 67, 54, 0.7);
}
.waves-effect.waves-yellow .waves-ripple {
  background-color: rgba(255, 235, 59, 0.7);
}
.waves-effect.waves-orange .waves-ripple {
  background-color: #ff9800;
}
.waves-effect.waves-purple .waves-ripple {
  background-color: rgba(156, 39, 176, 0.7);
}
.waves-effect.waves-green .waves-ripple {
  background-color: rgba(76, 175, 80, 0.7);
}
.waves-effect.waves-teal .waves-ripple {
  background-color: rgba(0, 150, 136, 0.7);
}
.waves-effect input[type="button"],
.waves-effect input[type="reset"],
.waves-effect input[type="submit"] {
  border: 0;
  font-style: normal;
  font-size: inherit;
  text-transform: inherit;
  background: none;
}
.waves-effect img {
  position: relative;
  z-index: -1;
}
.waves-notransition {
  transition: none !important;
}
.waves-circle {
  transform: translateZ(0);
  -webkit-mask-image: -webkit-radial-gradient(circle, white 100%, black 100%);
}
.waves-input-wrapper {
  border-radius: 0.2em;
  vertical-align: bottom;
}
.waves-input-wrapper .waves-button-input {
  position: relative;
  top: 0;
  left: 0;
  z-index: 1;
}
.waves-circle {
  text-align: center;
  width: 2.5em;
  height: 2.5em;
  line-height: 2.5em;
  border-radius: 50%;
  -webkit-mask-image: none;
}
.waves-block {
  display: block;
}
/* Firefox Bug: link not triggered */
.waves-effect .waves-ripple {
  z-index: -1;
}
/*....................................
39. Shipping Area Start Here
....................................*/
.shipping-area .button-area ul li a {
  display: block;
  padding: 15px;
  background: #f8f8f8;
  color: #646464;
  font-size: 18px;
}
.shipping-area .button-area ul li.active a {
  background: <?=$websiteBackgroudColor?>;
  color: #fff;
}
.shipping-area .product-list table {
  margin: 0 0 30px;
}
@media screen and (max-width: 767px) {
  .shipping-area .product-list table {
    width: 100%;
    margin: 0px;
  }
}
.shipping-area .product-list table tr {
  border: 1px solid #e7e7e7;
  padding: 25px;
  display: block;
  margin-bottom: -1px;
}
.shipping-area .product-list table tr td {
  padding-right: 52px;
}
@media screen and (max-width: 991px) {
  .shipping-area .product-list table tr td {
    padding-right: 10px;
  }
}
@media screen and (max-width: 767px) {
  .shipping-area .product-list table tr td {
    display: block;
    width: 100%;
    padding: 20px 0px;
  }
}
.shipping-area .product-list table tr td img {
  max-width: 80px;
}
.shipping-area .product-list table tr td img {
  width: 100%;
  display: block;
}
.shipping-area .product-list table tr td .des-pro {
  display: block;
  padding-right: 50px;
  width: 210px;
}
@media screen and (max-width: 991px) {
  .shipping-area .product-list table tr td .des-pro {
    width: auto;
  }
}
.shipping-area .product-list table tr td .des-pro h4 {
  font-weight: normal;
  margin: 0 0 10px;
}
.shipping-area .product-list table tr td .des-pro p {
  color: #646464;
  margin: 0;
}
.shipping-area .product-list table tr td strong {
  font-size: 20px;
  display: block;
  padding-right: 100px;
}
@media screen and (max-width: 991px) {
  .shipping-area .product-list table tr td strong {
    padding-right: 10px;
  }
}
.shipping-area .product-list table tr td .order-pro {
  position: relative;
  display: block;
  margin-right: 100px;
}
.shipping-area .product-list table tr td .order-pro input {
  width: 110px;
  height: 46px;
  box-shadow: none;
  border: 1px solid #ccc;
  text-align: center;
  padding-right: 10px;
  color: #888888;
  font-size: 18px;
}
.order-pro input[type=number]::-webkit-inner-spin-button,
.order-pro input[type=number]::-webkit-outer-spin-button {
  opacity: 1;
}
.shipping-area .product-list table tr td .order-pro div {
  position: absolute;
  top: 12px;
  right: 0;
  z-index: 999;
  cursor: pointer;
}
.shipping-area .product-list table tr td .order-pro div.btn-plus {
  right: 40px;
}
.shipping-area .product-list table tr td .order-pro div.btn-minus {
  right: 20px;
}
.shipping-area .product-list table tr td .prize {
  color: <?=$websiteBackgroudColor?>;
  font-size: 20px;
  font-weight: 700;
  padding-right: 50px;
}
.shipping-area .product-list table tr td i {
  display: block;
  width: 30px;
  height: 30px;
  border: 1px solid #cccccc;
  text-align: center;
  line-height: 28px;
  font-size: 15px;
  cursor: pointer;
  color: #ccc;
}
.shipping-area .product-list table tr td i:hover {
  background: <?=$websiteBackgroudColor?>;
  color: #fff;
}
.shipping-area .product-list .total span {
  font-size: 20px;
  padding-right: 10px;
}
.shipping-area .product-list .total strong {
  font-size: 28px;
  font-weight: 400;
}
.shipping-area .next-step {
  text-align: right;
}
.shipping-area .next-step button {
  padding: 10px 30px;
  border: 1px solid <?=$websiteBackgroudColor?>;
  background: <?=$websiteBackgroudColor?> !important;
  color: #fff;
  text-transform: capitalize;
  font-size: 18px;
  background: transparent;
  margin-top: 25px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  cursor: pointer;
}
.shipping-area .next-step button:hover {
  background: #fff !important;
  color: #000;
  box-shadow: none;
}
.shipping-area .form-area h3 {
  font-weight: 500;
  padding: 0 0 15px;
  padding-left: 0;
  font-size: 22px;
}
.shipping-area .form-area form fieldset {
  margin: 0 0 15px;
}
.shipping-area .form-area form fieldset label {
  display: block;
  width: 100%;
  color: #333333;
  font-weight: 400;
  margin: 0 0 10px;
  font-size: 14px;
}
.shipping-area .form-area form fieldset input {
  display: block;
  width: 100%;
  margin: 0 0 10px;
  height: 40px;
  border-radius: 0;
  padding: 0 15px;
  border: 1px solid #ccc;
}
.shipping-area .form-area form fieldset select {
  display: block;
  width: 100%;
  margin: 0 0 10px;
  height: 40px;
  border-radius: 0;
  padding: 0 15px;
  color: #646464;
  font-size: 13px;
  border: 1px solid #ccc;
}
.shipping-area .order-list h3 {
  font-weight: 500;
  padding: 15px 0;
  font-size: 22px;
}
.shipping-area .order-list table {
  width: 100%;
}
.shipping-area .order-list table tr {
  width: 100%;
  display: block;
}
.shipping-area .order-list table tr th {
  font-weight: bold;
  width: 50%;
}
.shipping-area .order-list table tr td {
  border: 1px solid #dedede;
  padding: 15px 15px;
  font-size: 14px;
  font-weight: normal;
}
.shipping-area .order-list table tr td:first-child {
  width: 400px;
}
@media screen and (max-width: 991px) {
  .shipping-area .order-list table tr td:first-child {
    width: 60%;
    float: left;
  }
}
.shipping-area .order-list table tr td:last-child {
  width: 150px;
  text-align: center;
}
@media screen and (max-width: 991px) {
  .shipping-area .order-list table tr td:last-child {
    width: 40%;
    float: left;
  }
}
.shipping-area .order-list table .row-bold td {
  border: 1px solid #dedede;
  font-weight: 700;
}
.shipping-area .accordion .card {
  border-radius: 0;
  margin: 0;
}
.shipping-area .accordion .card .card-header {
  background: transparent;
}
.shipping-area .accordion .card .card-header .card-title {
  margin-bottom: 0;
}
.shipping-area .accordion .card .card-header .card-title button {
  background: transparent;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  cursor: pointer;
}
.shipping-area .accordion .card .card-header .card-title button .checkbox {
  margin: 0;
  padding: 10px 0;
}
.shipping-area .accordion .card .card-header .card-title button .checkbox label {
  margin: 0 !important;
  padding: 0 !important;
  text-transform: capitalize;
  font-size: 18px;
  font-weight: 700;
}
.shipping-area .accordion .card .card-header .card-title button .checkbox label input[type="checkbox"] {
  display: none;
}
.shipping-area .accordion .card .card-header .card-title button .checkbox label input[type="checkbox"] + .cr > .cr-icon {
  opacity: 1;
  display: block;
  color: <?=$websiteBackgroudColor?>;
  width: 15px;
  height: 15px;
}
.shipping-area .accordion .card .card-header .card-title button .checkbox .cr {
  position: relative;
  display: inline-block;
  background: #cccccc;
  border-radius: 100%;
  float: left;
  margin-top: 0px;
  margin-right: .5em;
  width: 15px;
  height: 15px;
}
.shipping-area .accordion .card .card-header .card-title button.collapsed .checkbox label input[type="checkbox"] + .cr > .cr-icon {
  opacity: 0;
  transition: all 0.3s ease-in;
  display: block;
  padding: 5px;
  color: #2962ff;
}
.shipping-area .accordion .card .card-body {
  padding-left: 40px;
  padding-right: 100px;
  border-bottom: 1px solid #ddd;
}
.coupon-fields .input-text {
  padding: 5px 10px;
  width: 70%;
  margin-right: 10px;
  border-radius: 30px;
  border: 1px solid #dedede;
}
.coupon-fields .apply-coupon {
  background: <?=$websiteBackgroudColor?>;
  border: none;
  color: #fff;
  padding: 6px 20px;
  border: 1px solid <?=$websiteBackgroudColor?>;
  border-radius: 30px;
  box-shadow: 2px 0px 11px -2px <?=$websiteBackgroudColor?>;
  cursor: pointer;
}
.coupon-fields .apply-coupon:hover {
  background: #ffffff !important;
  color: #000;
  box-shadow: none;
}
</style>