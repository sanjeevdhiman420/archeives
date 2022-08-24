<style>
   div#dashboard {
      background: #0073aa;
   }

   .dropdown-profile {
    font-size: 18px;
    padding: 6px 0 0 17px;
}
</style>

<div class="sidenav" id="sideNavs">
   <div id="sidesscolor">
      <div class="sidenav-main-div sidebarhovers" id="dashboard">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-tachometer-alt "></i>
         </div>
         <div class="sidenav-text-div col-md-4">
            <a class="sidebar-a-tag" id="text1" href="./index.php">Dashboard</a>
         </div>
         <div class="col-md-6">
            <ul class="sidebar-ul " id="dropdown1">
               <a href="./index.php">
                  <li class="sidebar-li">Home</li>
               </a>
               <a href="./update-core.php">
                  <li class="sidebar-li">Updates</li>
               </a>
            </ul>
         </div>
      </div>
      <div class="sidenav-main-div sidebarhovers ">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-thumbtack"></i>
         </div>
         <div class="sidenav-text-div col-md-4">
            <a class="sidebar-a-tag" id="text2" href="./edit.php">Post</a>
         </div>
         <div class="col-md-6">
            <ul class="sidebar-ul " id="dropdown2">
               <a href="./edit.php">
                  <li>All Posts</li>
               </a>
               <a href="./add-new.php">
                  <li>Add New</li>
               </a>
               <a href="./categories.php">
                  <li>categories</li>
               </a>
               <a href="./tags.php">
                  <li>Tags</li>
               </a>
            </ul>
         </div>
      </div>
      <div class="sidenav-main-div sidebarhovers">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-music"></i>
         </div>
         <div class="sidenav-text-div col-md-4">
            <a class="sidebar-a-tag" id="text3" href="./upload.php">Media </a>
         </div>
         <div class="col-md-6">
            <ul class="sidebar-ul " id="dropdown3">
               <a href="./upload.php">
                  <li>Library</li>
               </a>
               <a href="./media-new.php">
                  <li>Add New</li>
               </a>
            </ul>
         </div>
      </div>
      <div class="sidenav-main-div sidebarhovers">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-file"></i>
         </div>
         <div class="sidenav-text-div col-md-4">
            <a class="sidebar-a-tag" id="text4" href="./pages.php">Pages</a>
         </div>
         <div class="col-md-6">
            <ul class="sidebar-ul" id="dropd">
               <a href="./pages.php">
                  <li>All Pages</li>
               </a>
               <a href="./add-new.php">
                  <li>Add New</li>
               </a>
            </ul>
         </div>
      </div>
      <div class="sidenav-main-div sidebarhovers">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-comment-dots"></i>
         </div>
         <div class="sidenav-text-div col-md-4">
            <a class="sidebar-a-tag" id="text5" href="./edit-comment.php">Comments</a>
         </div>
         <div class="col-md-6">
            <!-- <ul class="sidebar-ul " id="dropdown1">
            </ul> -->
         </div>
      </div>
      <div class="sidenav-main-div sidebarhovers">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-paint-brush"></i>
         </div>
         <div class="sidenav-text-div col-md-4">
            <a class="sidebar-a-tag" id="text6" href="">Appearance</a>
         </div>
         <div class="col-md-6">
            <ul class="sidebar-ul " id="dropdown4">
               <a>
                  <li>Themes</li>
               </a>
               <a>
                  <li>Customize</li>
               </a>
               <a>
                  <li>Widgets</li>
               </a>
               <a>
                  <li>Menus</li>
               </a>
               <a>
                  <li>Background</li>
               </a>
               <a>
                  <li>Theme Editor</li>
               </a>
            </ul>
         </div>
      </div>
      <div class="sidenav-main-div sidebarhovers">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-plug"></i>
         </div>
         <div class="sidenav-text-div col-md-4">
            <a class="sidebar-a-tag" id="text7" href="../wp-admin/plugins.php">Plugin</a>
         </div>
         <div class="col-md-6">
            <ul class="sidebar-ul " id="dropdown5">
               <a>
                  <li><a href="../wp-admin/plugins.php">Installed Plugins</a></li>
               </a>
               <a>
                  <li>Add New</li>
               </a>
               <a>
                  <li><a href="../wp-admin/Plugin-editor.php">plugin Editor</a></li>
               </a>
            </ul>
         </div>
      </div>
      <div class="sidenav-main-div sidebarhovers">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-user "></i>
         </div>
         <div class="sidenav-text-div col-md-4">
            <a class="sidebar-a-tag" id="text8" href="./users.php">Users</a>
         </div>
         <div class="col-md-6">
            <ul class="sidebar-ul " id="dropdown6">
               <a href="./users.php">
                  <li>All user</li>
               </a>
               <a href="./user-new.php">
                  <li>Add user</li>
               </a>
               <a href="./edit-profile.php">
                  <li>profile</li>
               </a>
            </ul>
         </div>
      </div>
      <div class="sidenav-main-div sidebarhovers">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-wrench"></i>
         </div>
         <div class="sidenav-text-div col-md-4">
            <a class="sidebar-a-tag" id="text9" href="../wp-admin/tools.php">Tools</a>
         </div>
         <div class="col-md-6">
            <ul class="sidebar-ul " id="dropdown7">
               <a>
                  <li><a href="../wp-admin/tools.php">Available Tools</a></li>
               </a>
               <a>
                  <li><a href="../wp-admin/import.php">Import</a></li>
               </a>
               <a>
                  <li><a href="../wp-admin/export.php">export</a></li>
               </a>
               <a>
                  <li><a href="../wp-admin/site-health.php">Site health</a> </li>
               </a>
               <a>
                  <li><a href="../wp-admin/export-personal-data.php">Export Personal Data</a></li>
               </a>
               <a>
                  <li><a href="../wp-admin/erase-personal-data.php">Erase Personal Data </a></li>
               </a>
            </ul>
         </div>
      </div>
      <div class="sidenav-main-div sidebarhovers">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-cog"></i>
         </div>
         <div class="sidenav-text-div col-md-4">
            <a class="sidebar-a-tag" id="text0" href="../wp-admin/option-general.php">Settings</a>
         </div>
         <div class="col-md-6" id="setting">
            <ul class="sidebar-ul " id="dropdown8">
               <a>
                  <li><a href="../wp-admin/option-general.php">General</a></li>
               </a>
               <a>
                  <li><a href="../wp-admin/option-writing.php">Writing</a></li>
               </a>
               <a>
                  <li><a href="../wp-admin/option-reading.php">Reading</a></li>
               </a>
               <a>
                  <li><a href="../wp-admin/option-discussion.php">Discussion</a></li>
               </a>
               <a>
                  <li><a href="../wp-admin/option-media.php">Media</a></li>
               </a>
               <a>
                  <li><a href="../wp-admin/option-permalinks.php">Permalinks</a></li>
               </a>
               <a>
                  <li><a href="../wp-admin/option-privacy.php">Privacy</a></li>
               </a>
            </ul>
         </div>
      </div>
      <div class="sidenav-main-div sidebarhovers">
         <div class="sidenav-icon-div col-md-2">
            <i class="fas fa-chevron-circle-left" onclick="collape()" ondblclick="rearrange()"></i>
         </div>
         <div class="sidenav-text-div">
            <a class="sidebar-a-tag collaps-tag" id="texts" href="" toggle="collape()">Collapse menu</a>
         </div>
      </div>
   </div>
</div>

<script type='text/javascript'>
   function collape() {
      document.getElementById('sideNavs').style.width = "50px";
      document.getElementById('text1').style.visibility = "hidden";
      document.getElementById('text2').style.visibility = "hidden";

      document.getElementById('text3').style.visibility = "hidden";
      document.getElementById('text4').style.visibility = "hidden";
      document.getElementById('text5').style.visibility = "hidden";
      document.getElementById('text6').style.visibility = "hidden";
      document.getElementById('text7').style.visibility = "hidden";
      document.getElementById('text8').style.visibility = "hidden";
      document.getElementById('text9').style.visibility = "hidden";
      document.getElementById('text0').style.visibility = "hidden";
      document.getElementById('texts').style.visibility = "hidden";
      document.getElementById('dropdown1').style.marginLeft = "0px";
      document.getElementById('dropdown2').style.marginLeft = "0px";
      document.getElementById('dropdown3').style.marginLeft = "0px";
      document.getElementById('dropdown4').style.marginLeft = "0px";
      document.getElementById('dropdown5').style.marginLeft = "0px";
      document.getElementById('dropdown6').style.marginLeft = "0px";
      document.getElementById('dropdown7').style.marginLeft = "0px";
      document.getElementById('dropdown8').style.marginLeft = "0px";
      document.getElementById('dropd').style.marginLeft = "0px";



   }

   function rearrange() {
      document.getElementById('sideNavs').style.width = "160px";
      document.getElementById('text1').style.visibility = "visible";
      document.getElementById('text2').style.visibility = "visible";

      document.getElementById('text3').style.visibility = "visible";
      document.getElementById('text4').style.visibility = "visible";
      document.getElementById('text5').style.visibility = "visible";
      document.getElementById('text6').style.visibility = "visible";
      document.getElementById('text7').style.visibility = "visible";
      document.getElementById('text8').style.visibility = "visible";
      document.getElementById('text9').style.visibility = "visible";
      document.getElementById('text0').style.visibility = "visible";
      document.getElementById('texts').style.visibility = "visible";
      document.getElementById('dropdown1').style.marginLeft = "64px";
      document.getElementById('dropdown2').style.marginLeft = "64px";
      document.getElementById('dropdown3').style.marginLeft = "64px";
      document.getElementById('dropdown4').style.marginLeft = "64px";
      document.getElementById('dropdown5').style.marginLeft = "64px";
      document.getElementById('dropdown6').style.marginLeft = "64px";
      document.getElementById('dropdown7').style.marginLeft = "64px";
      document.getElementById('dropdown8').style.marginLeft = "64px";
      document.getElementById('dropd').style.marginLeft = "64px";


   }
</script>