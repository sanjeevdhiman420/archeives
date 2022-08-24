  <?php 
  /*
   Template Name:register
   */
   get_header();
   ?>
       <div class="container">
         <h2 class="tag_h2 text-center">register form</h2>
       </div>
       <form class="form-group" method="post">
          <form method='post'>
            <input type="hidden" value="register" name="action">
            <div class="text-center">
            <label class="labels">Name</label>
            <input type="text" name="name" class='form-control'></div><br>
            <div class="text-center">
            <label class="labels">Email Address:</label>
            <input type="email" name="email" class='form-control'></div><br>
            <div class="text-center">
            <label class="labels">Password: </label>
            <input type="password" name="password" class='form-control'></div><br>
            <div class="text-center">
            <label class="labels"> Confirm Password:</label>
            <input type="password" name="cPass" class='form-control'></div><br>
            <div class="text-center">
            <label for="role">Select Role</label><br>
            <select name="Role" id="role">
              <option value="" selected>Select role</option>
              <option value="admin">admin</option>
              <option value="editor">editor</option>
              <option value="user">user</option><br>
            </select><br>
            <input type="submit" class="btn btn-danger" name="submit" value='submit'>
         </form>
         already have an account?
         <a href='http://localhost/wordpress/wordpress/'>Login here</a></div>
        <?php get_footer(); ?>
