 <?php
    session_start();
    error_reporting(0);
    require_once __DIR__.'/../bootstrap/app.php';
    if (isset($_SESSION['email'])) {
        require_once file_header();
        require_once file_slider(); ?>

        <style>
        
        .container {
    border: solid 1px #ccd0d4;
    margin-left: -1%;
    background: white;
}

input.btn {
    width: 61px;
    height: 27px;
    padding: 0 0 0 0;
    background: whitesmoke;
    color: #007cba;
    border: solid 1px;
}
        </style>
     <div class="dashborad">
         <div class="row dash-row">
             <div class="col-lg-6">
                 <div class="heading">
                     <h2>Dashboard</h2>
                 </div>
             </div>
             <div class="col-lg-3">

                 <div class="opption_button_div">
                     <button class="btn_option">Screen Options</button>
                 </div>

             </div>
             <div class="col-lg-3">
                 <div class="opption_button2">
                     <button class="btn_option2">help</button>
                 </div>
             </div>

         </div>

         <div class="container">
             <div class="dismiss">
                 <a>Dismiss</a>
             </div>
             <div>
                 <p class="welcome_tag">Welcome to wordpress!</p>
             </div>

             <div>
                 <p class="welcome_discription">We’ve assembled some links to get you started:</p>
             </div>

             <div class="containers">
                 <div class="row">
                     <div class="col-lg-4">
                         <div>
                             <h3 class="welcome_h3_tag">Get started</h3>
                         </div>
                         <div class="customize_div">
                             <div><a class="btn" href="">Customize Your Site </a></div>


                         </div>

                     </div>
                     <div class="col-lg-4">
                         <div>
                             <h3 class="welcome_h3_tag">Next Pages </h3>
                         </div>

                         <div class="dash-link"><a class="" href="">Write your first blog post </a></div>
                         <div class="dash-link"><a class="" href="">Add an About page </a></div>
                         <div class="dash-link"><a class="" href="">Set up your homepage </a></div>
                         <div class="dash-link"><a class="" href=""> View your site</a></div>
                     </div>
                     <div class="col-lg-4">
                         <h3 class="welcome_h3_tag">More Action</h3>
                         <div class="dash-link"><a class="" href="">Manage widgets </a></div>
                         <div class="dash-link"><a class="" href="">Manage menus </a></div>
                         <div class="dash-link"><a class="" href=""> Turn comments on or off</a></div>
                         <div class="dash-link"><a class="" href="">Learn more about getting started
                             </a></div>
                     </div>
                 </div>
             </div>




         </div>
         <div class="containers">



             <div class="row">
                 <div class="col-lg-6 row_section">

                     <!--  -->

                     <!--  -->
                     <div class="div1">
                         <div class="health_div">

                             <h4>Site Health Status</h4>
                             <!-- <button class="card-link" data-toggle="collapse" href="#collapseOne"></button> -->
                         </div>
                         <div id="collapseOne" class="collapse show" data-parent="#accordion">
                             <div class="card-body">
                                 <div>
                                     <div><svg>
                                             <circle cx="50" cy="50" r="10" stroke="green" stroke-width="1" fill="#ffffff" />
                                         </svg>
                                         <h5 class="svg_heading">Good</h5>
                                     </div>


                                 </div>
                                 <div class="health_div2">
                                     <p>Your site’s health is looking good, but there are still some things you can do to improve its performance and security.</p>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="div2">

                         <div class="health_div">
                             <h4>At a Glance</h4>
                         </div>
                         <div class="row">
                             <div class="col-md-6 glance-ancr">
                                 <a class="" href="">post</a>
                             </div>
                             <div class="col-md-6 glance-ancr">
                                 <a class="" href="">page </a>
                             </div>
                             <div class="col-md-6 glance-ancr">
                                 <a class="" href="">comment</a>
                             </div>
                         </div>
                     </div>
                     <div class="div2">
                         <div class="health_div">
                             <h4>Activity</h4>
                         </div>
                         <div class="activity_div">

                             <p>Recently Published</p>

                             <div>
                                 <div class="row">
                                     <div class="col-md-3">
                                         <p><?php echo date("l jS \of F Y h:i:s A").'<br>'; ?></p>
                                     </div>
                                     <div class="col-md-4"><a>Hello World!</a></div>
                                 </div>

                             </div>
                         </div>
                         <div class="comments_div">
                             <div>
                                 <p class="comments-heading">Recent Comments</p>
                             </div>
                             <div class="comment-1">
                                 <div class="messege">
                                     <ul class="comment-ul">
                                         <li><img src="../images/d7a973c7dab26985da5f961be7b74480.png"></li>
                                         <li>From A WordPress Commenter on Hello world!Hi, this is a comment. To get started with moderating, editing, and deleting comments, please visit the Comments screen in…</li>
                                     </ul>

                                 </div>

                             </div>
                             <div class="down-sub-section">
                                 <ul class="sub-ul">
                                     <li class="sub-li"><a>All(1)</a></li>
                                     <li class="sub-li"><a>Mine(0)</a></li>
                                     <li class="sub-li"><a>Pending(0)</a></li>
                                     <li class="sub-li"><a>Approved(0)</a></li>
                                     <li class="sub-li"><a>Spam(0)</a></li>
                                     <li class="sub-li"><a>Trash(0)</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>

                 </div>
                 <div class="col-lg-6 row_section2">
                     <div class="div1">
                         <div class="health_div">

                             <h4>WordPress Event And News </h4>
                         </div>
                         <div class="event-div">
                             <p>Enter your closest city to find nearby events. </p>
                         </div>
                         <div class="event-div">
                             <div class="row">
                                 <form>
                                     <div class="col-md-1 event-city"><label>City:</label></div>
                                     <div class="col-md-6 event-input "><input type="text" class="form-control"></div>
                                     <div class="col-md-2  event-submit"><input type="submit" class="btn  event-btn"></div>
                                     <div class="col-md-2 event-cancel"><a href="">Cancel</a></div>
                                 </form>

                             </div>

                         </div>
                         <div class="event-links"><a href="">Introducing Learn WordPress</a></div>
                         <div class="event-links"><a href="">Matt: State of the Word 2020</a></div>
                         <div class="event-links"><a>WPTavern: Google to Migrate Structured Data Testing Tool to New Domain after Backlash from Deprecation Announcement</a></div>
                         <div class="event-links"><a>WPTavern: Learn WordPress Launches Trac Introductory Workshop</a></div>

                     </div>
                     <div class="div2">
                         <div class="health_div">
                             <h4>Quick Draft</h4>

                         </div>
                         <div class="form-div">
                             <form method="post">
                                 <label>Title</label>
                                 <input class="form-control" name="title" type="text" required>
                                 <label>Content</label>
                                 <textarea name="writing" id="" cols="15" class="form-control text-area" rows="10"></textarea>

                                 <input type="hidden" name="action" value="add-new">
        <input type="submit" name="add-new" class="btn " value="Submit">

                             </form>
                           
                         </div>
                     </div>

                 </div>
             </div>
         </div>

     </div>
 <?php
    } else {
        header('location:../wp-login.php');
    }
