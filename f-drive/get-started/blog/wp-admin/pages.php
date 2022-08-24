<?php
require_once __DIR__ . '/../bootstrap/app.php';
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

    li.Published {
        margin-top: -14%;
        margin-left: 48px;
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

    table {
        border-collapse: collapse;
        width: 80em;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .footertext {
        margin-top: 18%;
    }
</style>
</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <span>
                    <h2>pages
                        <a href="add-new.php" class="page-title-action">Add New</a>

                </span>
            </div>

            <ul class="subsubsub">
                <li class="all"><a href="users.php" class="current" aria-current="page">All <span class="count">(2s)</span></a> |</li>
                <li class="Published"><a href="#">Published(0)</a></li>


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


            </head>

            <table>
                <tr>
                    <td id="cb" class="manage-column "><input id="cb-select-all-1" type="checkbox"></td>


                    <th><a href="">Title</a></th>
                    <th>Author</th>
                    <th><a href=""></a><i class="fas fa-comment"></i></th>
                    <th><a href="">Date</a></th>

                </tr>
                <tr>
                    <td id="cb" class="manage-column "><input id="cb-select-all-1" type="checkbox"></td>

                    <td><a>Privacy Policy</a> — Draft, Privacy Policy Page</td>
                    <td>Mohit Walia</td>
                    <td>—</td>
                    <td>Last modified on <br><?php
                                                echo  date("h:i:sa,Y,M,D");
                                                ?></td>
                </tr>
                <tr>
                    <td id="cb" class="manage-column "><input id="cb-select-all-1" type="checkbox"></td>
                    <td><a>Sample page</a></td>
                    <td>Mohit Walia</td>
                    <td>—</td>
                    <td>Last modified on <br><?php
                                                echo  date("h:i:sa,Y,M,D");
                                                ?></td>
                </tr>
                <tr>
                    <td id="cb" class="manage-column "><input id="cb-select-all-1" type="checkbox"></td>


                    <th><a href="">Title</a></th>
                    <th>Author</th>
                    <th><a href=""></a><i class="fas fa-comment"></i></th>
                    <th><a href="">Date</a></th>


                </tr>
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