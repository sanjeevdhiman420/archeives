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
                    <h2>Post
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
                    <option value="Edit">Edit</option>
                    <option value="Move">Move To Trash</option>

                </select> <span>
                    <input type="submit" class="button button-prinary" value="Apply">

                    <select action="Action" role="Action">
                        <option value="All-dates">All dates</option>
                        <option value="Current">January 2021</option>
                       
                    </select>

                    <select action="Action" role="Action">
                        <option value="All-cate">All categories</option>
                        <option value="uncate">uncategorized</option>
                       
                    </select>
                    <input type="submit" class="button button-prinary" value="Apply">
                </span>
            </form>
            <table class="wp-list">
                <thead>
                    <tr id="head">
                        <td id="cb" class="manage-column "><input id="cb-select-all-1" type="checkbox"></td>
                        <th scope="col" id="title" class="Title"><a href="#"><span>Title</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="Author" class=" Author">Auhtor</th>
                        <th scope="col" id="Categories" class="Categories"><a href="#"><span>Categories</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="Tags" class=" tags">Tags</th>
                        <th scope="col" id="Comments" class=" tags"><i class="fas fa-comment-alt"></i></th>

                        <th scope="col" id="Dates" class=" Dates">Dates</th>
                    </tr>
                </thead>

                <tbody id="the-list">

                    <tr id="user-1">
                        <th scope="row" class="check-column"><input type="checkbox" name="users[]" id="user_1" class="administrator" value="1"></th>
                        <td class="username" data-colname="Username"> <strong><a href=""><?php echo $_SESSION['email']; ?></a></strong><br>
                            <div class="row-actions"><span class="edit"><a href="#">Edit</a> | </span><span class="view"><a href="#" aria-label="Quick edit">Quick edit</a></span> |<span class="Trash"><a href="#">Trash</a> | </span><span class="View"><a href="#">View</a> | </span></div>
                        </td>
                        <td class="column-name" >Mohit Walia</td>
                        <td class="email column-email" data-colname="Email"><a href="#">Uncategorized</a></td>
                        <td class="role column-role" data-colname="Role">—</td>
                        <td class="role column-role" data-colname="cmnt"><i class="fas fa-comment"></i></td>

                        <td class="posts column-posts num" data-colname="Posts"><a href="#" class="edit"><span aria-hidden="true"></span><span class="screen-reader-text"><?php echo date('Y'); ?></span></a></td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr id="foot">
                    <td id="cb" class="manage-column "><input id="cb-select-all-1" type="checkbox"></td>
                    <th scope="col" id="title" class="Title"><a href="#"><span>Title</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="Author" class=" Author">Auhtor</th>
                        <th scope="col" id="Categories" class="Categories"><a href="#"><span>Categories</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="Tags" class=" tags">Tags</th>
                        <th scope="col" id="Comments" class=" tags"><i class="fas fa-comment-alt"></i></th>

                        <th scope="col" id="Dates" class=" Dates">Dates</th></tr>
                </tfoot>

            </table>
            <form method="get">
                <select action="role" role="role">
                    <option value="Bulk action">Bulk action</option>
                    <option value="delete">Delete</option>
                    <option value="Movetotrash ">Move to Trash</option>

                </select> <span>
                    <input type="submit" class="button button-prinary" value="Apply">

            </form>

            <div class="footertext">
                <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                        <p style='float: right;'>Version 5.6</p>
                    </i></p>

            </div>
        </div>
    </div>
</div>