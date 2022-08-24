<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>

<style>
    a.page-title-action {
        border: solid 1px #337ab7;
        font-size: 14px;
        padding: 2px 5px 3px 5px;
    }

    .subsubsub {
        list-style: none;
        margin: 8px 0 0;
        padding: 0;
        font-size: 13px;
        float: left;
        color: #666;
    }

    .administrator {
        margin-top: -19%;
        margin-left: 47%;
    }

    form {
        padding: 37px 6px 3px 0px;
    }

    input.button.button-prinary {
        background: #007cba;
        border: #007cba;
        color: white;
    }

    table {
    background-color: white;
    border: solid 1px #ccd0d4;
   
}
thead{
    border: solid 1px #ccd0d4;

}
tfoot{
    border: solid 1px #ccd0d4;

}

tr#user-1 {
    background: #f9f9f9;
}

table.wp-list {
    width: 70em;
    line-height: 3em;
    margin-top: 2%;
}
.footertext {
    margin-top: 14em;
    width: 83em;
}

</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <span>
                    <h2>Users
                        <a href="#" class="page-title-action">Add New</a>
                </span>
            </div>

            <ul class="subsubsub">
                <li class="all"><a href="users.php" class="current" aria-current="page">All <span class="count">(1)</span></a> |</li>
                <li class="administrator"><a href="users.php?role=administrator">Administrator(1)</a></li>
            </ul>
            <form method="get">
                <select action="role" role="role">
                    <option value="Bulk action">Bulk action</option>
                    <option value="delete">Delete</option>
                </select> <span>
                    <input type="submit" class="button button-prinary" value="Apply">

                    <select action="Action" role="Action">
                        <option value="change role to">change Role To...</option>
                        <option value="Subscriber">subscriber</option>
                        <option value=" Contributer">Contributer</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Administrator">Administrator</option>
                    </select>
                    <input type="submit" class="button button-prinary" value="Apply">
                </span>
            </form>
            <table class="wp-list">
                <thead>
                    <tr id="head">
                        <td id="cb" class="manage-column "><input id="cb-select-all-1" type="checkbox"></td>
                        <th scope="col" id="username" class="column-username"><a href="#"><span>Username</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="name" class=" column-name">Name</th>
                        <th scope="col" id="email" class="column-email sorted asc"><a href="#"><span>Email</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="role" class=" column-role">Role</th>
                        <th scope="col" id="posts" class=" column-posts num">Posts</th>
                    </tr>
                </thead>

                <tbody id="the-list">

                    <tr id="user-1">
                        <th scope="row" class="check-column"><input type="checkbox" name="users[]" id="user_1" class="administrator" value="1"></th>
                        <td class="username" data-colname="Username"><img alt="" src="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=32&amp;d=mm&amp;r=g" srcset="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32" loading="lazy"> <strong><a href=""><?php echo $_SESSION['username']; ?></a></strong><br>
                            <div class="row-actions"><span class="edit"><a href="#">Edit</a> | </span><span class="view"><a href="#" aria-label="View posts by Mohit Walia">View</a></span></div>
                        </td>
                        <td class="column-name" >Mohit Walia</td>
                        <td class="email column-email" data-colname="Email"><a href="#"><?php echo $_SESSION['email']; ?></a></td>
                        <td class="role column-role" data-colname="Role">Administrator</td>
                        <td class="posts column-posts num" data-colname="Posts"><a href="#" class="edit"><span aria-hidden="true">1</span><span class="screen-reader-text">1 post by this author</span></a></td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr id="foot">
                    <td id="cb" class="manage-column "><input id="cb-select-all-1" type="checkbox"></td>
                        <th scope="col" id="username" class="column-username"><a href="#"><span>Username</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="name" class=" column-name">Name</th>
                        <th scope="col" id="email" class="column-email sorted asc"><a href="#"><span>Email</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="role" class=" column-role">Role</th>
                        <th scope="col" id="posts" class=" column-posts num">Posts</th>
                    </tr>
                </tfoot>

            </table>
            <form method="get">
                <select action="role" role="role">
                    <option value="Bulk action">Bulk action</option>
                    <option value="delete">Delete</option>
                </select> <span>
                    <input type="submit" class="button button-prinary" value="Apply">

                    <select action="Action" role="Action">
                        <option value="change role to">change Role To...</option>
                        <option value="Subscriber">subscriber</option>
                        <option value=" Contributer">Contributer</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Administrator">Administrator</option>
                    </select>
                    <input type="submit" class="button button-prinary" value="Apply">
                </span>
            </form>

            <div class="footertext">
                <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                        <p style='float: right;'>Version 5.6</p>
                    </i></p>

            </div>
        </div>
    </div>
</div>