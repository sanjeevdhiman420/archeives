<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();

?>
<style>
.edit-post-div {
    width: 80%;
    margin-left: 13%;
}
input.btn.search-post {
    width: 78%;
    height: 8%;
    padding: 0 0 0px 0px;
}
nav#header {
    margin-top: -58px;
}
</style>


<div class=" edit-post-div">
    <div class="dash-row">
        <div class="categories-div">

            <h3>Tags</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div>

                <h4>Add New Tag</h4>

            </div>
            <div>

                <form>
                    <div class="form-fields">
                        <div> <label class="category-label">Name</label></div>
                        <div> <input type="text" class="form-control"></div>
                        <div> <span class="span-text-category">The name is how it appears on your site.</span></div>
                    </div>
                    <div class="form-fields">
                        <div> <label class="category-label">Slug</label></div>
                        <div> <input type="text" class="form-control"></div>
                        <div> <span class="span-text-category">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span></div>
                    </div>
                    <!-- <div class="form-fields">
                        <div> <label class="category-label">Parent Category</label></div>
                        <div> <select class="category-options">
                                <option>None</option>
                                <option>Uncategorized</option>
                            </select></div>
                        <div> <span class="span-text-category">Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</span></div>
                    </div> -->
                    <div class="form-fields">
                        <div> <label class="category-label">Description</label></div>
                        <div> <textarea class="textarea-form-fields"></textarea></div>

                        <div> <span class="span-text-category">The description is not prominent by default; however, some themes may show it.</span></div>
                    </div>
                    <input type="submit" class="btn btn-primary submit-input" value="Add New Tag">

                </form>
            </div>
        </div>
        <div class="col-lg-8">

            <div class="row post-type-row">
                <div class="col-lg-9 post-type-div ">



                </div>
                <div class="col-lg-3">
                    <div class="filter-post-div">
                        <div class="filter-input-div">
                            <input type="search" class="form-control">
                        </div>
                        <div>
                            <input type="submit" value="submit" name="submit" class="btn search-post">
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="action-div">
                        <div class="option-div col-md-3">
                            <div class="option-div-child">
                                <select class="options-style">
                                    <option>Bulk Action</option>
                                    <option>Edit</option>
                                    <option>Move to Trash</option>
                                </select>
                            </div>
                            <div>
                                <input type="submit" class="btn search-post" value="Apply">
                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <table class="table edit-post-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class=""></th>
                                <th class="title-th">Name</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Count</th>

                            </tr>
                        </thead>
                        <tbody class="tbody-area">
                            <tr>
                                <td></td>
                                <td>Uncategorized</td>
                                <td>__</td>
                                <td>MOhit walia</td>
                                <td>1</td>

                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th><input type="checkbox" class=""></th>
                                <th class="title-th">Name</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Count</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
            <div class="row">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="action-divs">
                            <div class="option-div col-md-3">
                                <div class="option-div-child">
                                    <select class="options-style">
                                        <option>Bulk Action</option>
                                        <option>Edit</option>
                                        <option>Move to Trash</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="submit" class="btn search-post" value="Apply">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div class="row span-row">
                <div class="span-div">
                    <span>
                        Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the default category Uncategorized. The default category cannot be deleted.

                    </span>
                </div>
                <div>
                    <span>
                        Categories can be selectively converted to tags using the category to tag converter.
                    </span>

                </div>
            </div>
        </div>
    </div>




</div>