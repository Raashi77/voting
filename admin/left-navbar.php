<?php
 $name=explode(' ',$MASTER_DATA['name']);
 $fname=$name[0];
 $lname=$name[1];
 ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="image">
           
               <div id="imgArea" class="pull-left image"> 
                  <div class="profileImage"><?=ucfirst($FNAME[0]).ucfirst($LNAME[0])?></div>
                  
               </div>
         </div>
         <div class="pull-left info">
            <p style="margin-left: 5px; margin-top: 7px;">Master Admin</p>
             <p style="margin-left: 5px;"><?=ucfirst($MASTER_DATA['name']);?></p>
         </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         <li class="header">MAIN NAVIGATION</li>
         <li>
            <a href="dashboard">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
         </li>
         
         
         <li class="treeview">
                <a href="#">
                    <i class="fa fa-rss"></i>
                    <span>Blogs Management </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li>
                        <a href="blog?token=1">
                            <i class="fa fa-circle"></i>Pending Blogs
                        </a>
                    </li>
                    <li>
                        <a href="blog?token=2">
                            <i class="fa fa-circle"></i>Verified Blogs
                        </a>
                    </li>
                    <li>
                        <a href="blog?token=3">
                            <i class="fa fa-circle"></i>Blocked Blogs
                        </a>
                    </li>
                    <li>
                        <a href="blog?token=4">
                            <i class="fa fa-circle"></i>Rejected Blogs
                        </a>
                    </li>
                    <li>
                        <a href="blog?token=5">
                            <i class="fa fa-circle"></i>Archived Blogs
                        </a>
                    </li>
                    <li>
                        <a href="blog_categories">
                            <i class="fa fa-circle"></i>Blog Categories
                        </a>
                    </li>
                </ul>
            </li>

         <li class="treeview">
            <a href="#">
            <i class="fa fa-tasks"></i>
            <span>Contests</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            
            <ul class="treeview-menu">
               <li><a href="contest?token=1"><i class="fa fa-circle-o"></i>All contest</a></li>
               <li><a href="contest?token=2"><i class="fa fa-circle-o"></i>Ongoing</a></li>
               <li><a href="contest?token=3"><i class="fa fa-circle-o"></i>Upcoming </a></li>
               <li><a href="contest?token=4"><i class="fa fa-circle-o"></i>Completed</a></li>
            </ul>
         </li>
         <li class="treeview">
            <a href="#">
            <i class="fa fa-user-plus"></i>
            <span>Users</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            
            <ul class="treeview-menu">
               <li><a href="users?token=1"><i class="fa fa-circle-o"></i>All users</a></li>
               <li><a href="users?token=2"><i class="fa fa-circle-o"></i>Blocked</a></li>
               <li><a href="users?token=3"><i class="fa fa-circle-o"></i>Unblocked </a></li>
            </ul>
         </li>
         <li class="treeview">
            <a href="#">
            <i class="fa fa-users"></i>
            <span>Contest Users</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            
            <ul class="treeview-menu">
               <li><a href="contestusers?token=1"><i class="fa fa-circle-o"></i>All</a></li>
               <li><a href="contestusers?token=2"><i class="fa fa-circle-o"></i>Blocked</a></li>
               <li><a href="contestusers?token=3"><i class="fa fa-circle-o"></i>Unblocked </a></li>
            </ul>
         </li>
         <li>
           <a href="songs">
                <i class="fa fa-music"></i><span>Songs</span>
            </a>
         </li>
         <li>
           <a href="logout">
                <i class="fa fa-sign-out"></i><span>Logout</span>
            </a>
         </li>
      </ul>
   </section>
   <!-- /.sidebar -->
</aside>