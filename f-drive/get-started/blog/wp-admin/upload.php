<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>

<style>
a.page-title-action {
    border: solid 1px black;
    color: white;
    background: #337ab7;
    font-size: 15px;
    padding: 3px 3px 3px 3px;
}

input.search-box {
    margin-left: 55em;
}
table#option {
    margin-top: 3%;
    background: #fff;

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

</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <span>
                    <h2>Media Library
                        <a href="#" class="page-title-action">Add New</a>
                </span>
            </div>
            <table id="option">
<tr>
    <td><form method="get">
                <select action="role" role="role">
                    <option value="All Media Items">All Media Items</option>
                    <option value="Unattached">Unattached</option>
                    <option value="Mine">Mine</option>

                </select> <span >
                    <input type="submit" class="button button-prinary" value="Filter">
                    <input type="serach" class="search-box">
                    <input type="submit" class="button button-prinary" value="search">

</td>
</tr>

            </table>

            <table>
                <tr>
                    <td id="cb" class="manage-column "><input id="cb-select-all-1" type="checkbox"></td>


                    <th><a href="">File </a></th>
                    <th>Author</th>
                    <th>Upload-To</th>

                    <th><a href=""></a><i class="fas fa-comment"></i></th>
                    <th><a href="">Date</a></th>

                </tr>
              
                <tr>
                    <td>No record founds</td>
                    <td></td>
                    <td></td>
                    <td></td>
                <td></td>
                </tr>
                <tr>
                    <td id="cb" class="manage-column "><input id="cb-select-all-1" type="checkbox"></td>


                    <th><a href="">File </a></th>
                    <th>Author</th>
                    <th>Upload-To</th>

                    <th><a href=""></a><i class="fas fa-comment"></i></th>
                    <th><a href="">Date</a></th>

                </tr>
            </table>

        