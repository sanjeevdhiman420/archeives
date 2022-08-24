<?php
session_start();
require_once __DIR__.'/../bootstrap/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add new post</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <style>
        .new-post-header {
            width: 100%;
            display: block;
            /* position: fixed;
            overflow: ; */
            z-index: 99999;
            color: #1e1e1e;
            font-size: 14px;
        }
        .new-post-toolbar {
            display: block;
            background: aliceblue;
            padding: 5px;
        }
        .wp-logo-img {
            background: #222;
            border: none;
        }
        .add-button {
            border-radius: 0;
            background: #007cba;
            color: #f1f1f1;
        }
        .pencil {
            border: none;
            background: #fff;
            padding-left: 11px;
            padding-right: 27px;
        }
        .left-arrow {
            border: none;
            background: #fff;
            padding-left: 11px;
            padding-right: 27px;
        }
        .right-arrow {
            border: none;
            background: #fff;
            padding-left: 11px;
            padding-right: 27px;
        }
        .detail {
            border: none;
            opacity: 0.5;
            background: #fff;
            padding-left: 11px;
            padding-right: 27px;
        }
        .outline {
            border: none;
            opacity: 0.5;
            background: #fff;
            padding-left: 11px;
            padding-right: 27px;
        }
        .post-main-section {
            /* background: red; */
            width: 100%;
            display: block;
        }
        #add-new-block {
            width: 21%;
            display: none;
            background: white;
            position: absolute;
            z-index: 999;
        }
        .search-btn {
            width: 100%;
            padding: 10px;
        }
        input[type="search"] {
            width: 100%;
            padding: 16px 48px 16px 16px;
            border: none;
            background: #f0f0f0;
            display: block;
            height: 50px;
            border-radius: 3px;
            box-shadow: 0 0 0 transparent;
        }
        .search-btnsvg {
            margin: 12px;
            padding: 21px;
        }
        .block-items {
            background: #f1f1f1;
            color: #444;
            line-height: 1.5rem;
            padding: 0px;
            display: block;
            align-items: 13px;
            /* align-items: center; */
            font-size: 13px;
            width: 100%;
            border: 1px solid;
            padding: 2px;
        }
        button.block-btn {
            display: flex;
            justify-content: center;
            padding: 32px;
            float: left;
            border: none;
            position: relative;
        }
        h4.block-heading {
            padding: 16px 2px 8px;
            font-size: 12px;
            color: #1e1e1e;
            cursor: pointer;
            position: absolute;
        }
        button.btn.browse-btn {
            background: #222;
            width: 100%;
        }
        /* 
         working area 
         */
        .post-working-area {
            height: 750px;
            width: 100%;
            background: #d1e4dd;
            overflow: auto;
            position: relative;
        }
        .post-main-section {
            /* background: red; */
            width: 100%;
            display: block;
            padding: 0px;
            margin-left: -13px;
        }
        #add-title {
            border: 0px;
            background: #d1e4dd;
            width: 100%;
            margin: 0px;
            height: auto;
            overflow: hidden;
            overflow-wrap: break-word;
            resize: none;
            border-style: none;
            outline: none;
            margin-top: 51px;
            font-size: 60px;
            font-weight: 700;
            padding: 0 0 0 8px;
            text-align: center;
        }
        .start-writing {
            border: 0px;
            overflow: hidden;
            resize: none;
            color: black;
            background: #d1e4dd;
            outline: none;
            width: 87%;
            text-align: center;
            font-size: 18px;
            margin-top: 41px;
        }
        right-side-navbar {
            display: block;
            width: 100%;
            padding: 8px;
            /* border: none; */
        }
        .documnet {
            display: block;
            float: left;
            width: 50%;
            padding-top: 6px;
        }
        .button {
            width: 50%;
            float: right;
            padding-top: 6px;
        }
        .documnet-btn {
            border: none;
            padding: 9px 5px 5px 4px;
            font-size: 13px;
            font-weight: 800;
            background: white;
        }
        .block-btns {
            border: none;
            padding: 9px 5px 5px 15px;
            font-size: 13px;
            font-weight: 800;
            background: white;
        }
        button#btnAdd {
            display: flex;
            text-align: center;
            background: black;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 6px 12px;
            float: right;
            margin-right: 79px;
        }
        .status-visibility {
            display: block;
            font-size: 17px;
        }
        .all-btn {
            position: relative;
            padding: 7px;
            outline: none;
            width: 100%;
            font-weight: 500;
            text-align: left;
            color: #1e1e1e;
            border: none;
            box-shadow: none;
            transition: background .1s ease-in-out;
            height: auto;
            background: white;
        }
        span.svg-images {
            float: right;
        }
        .document-list {
            width: 100%;
            display: block;
        }
        .doc-visivility {
            width: 50%;
            font-weight: 400;
            padding: 10px;
        }
        button.list-btn {
            border: none;
            padding: 10px;
            background: white;
            color: deepskyblue;
        }
        button.list-btn:hover {
            border: 1px solid;
            box-shadow: 1px 2px 2px 0px;
            z-index: 999;
            /* width: 18%; */
        }
        .post-formet {
            align-items: center;
            box-sizing: border-box;
            padding: 5px;
            border-radius: 4px;
            background: rgb(255, 255, 255);
            /* width: 100%; */
        }
        .check-text {
            font-weight: 400;
            padding: 5px 2px 8px 18px;
        }
        .checkboxes {
            margin-top: 11px;
            margin-left: 15px;
        }
        .parmalink {
            display: block;
            font-size: 17px;
        }
        .view-post {
            font-size: 14px;
            margin-bottom: 1.5rem;
            padding: 4px;
        }
        #parmalink-list {
            margin: 10px;
        }
        .categories {
            display: block;
            font-size: 17px;
        }
        .tag {
            display: block;
            font-size: 17px;
        }
        #newTag {
            font-weight: 400;
            padding: 5px 2px 8px 18px;
        }
        input#tag {
            padding: 7px 5px 5px 0px;
            margin-left: 19px;
        }
        .featured-image {
            display: block;
            font-size: 17px;
        }
        .set-image {
            width: 91%;
            height: 68px;
            margin-top: 13px;
            border: none;
            margin-left: 13px;
        }
        .excerpt {
            display: block;
            font-size: 17px;
        }
        textarea.excerpt-textarea {
            width: 100%;
            padding: 6px 8px;
            height: 61px;
            color: red;
            border: 1px solid rgb(117, 117, 117);
            border-radius: 4px;
            box-shadow: transparent 0px 0px 0px;
        }
        .label-excerpt {
            font-weight: 400;
            padding: 5px 2px 8px 18px;
        }
    </style>
</head>
<body>
    <div class="new-post-header">
        <div class="new-post-toolbar">
            <div class="row">
                <div class="col-md-8">
                <form method="post">

                    <button class="wp-logo-img">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" xmlns="http://www.w3.org/2000/svg" viewBox="-2 -2 24 24" role="img" aria-hidden="true" focusable="false">
                            <path d="M20 10c0-5.51-4.49-10-10-10C4.48 0 0 4.49 0 10c0 5.52 4.48 10 10 10 5.51 0 10-4.48 10-10zM7.78 15.37L4.37 6.22c.55-.02 1.17-.08 1.17-.08.5-.06.44-1.13-.06-1.11 0 0-1.45.11-2.37.11-.18 0-.37 0-.58-.01C4.12 2.69 6.87 1.11 10 1.11c2.33 0 4.45.87 6.05 2.34-.68-.11-1.65.39-1.65 1.58 0 .74.45 1.36.9 2.1.35.61.55 1.36.55 2.46 0 1.49-1.4 5-1.4 5l-3.03-8.37c.54-.02.82-.17.82-.17.5-.05.44-1.25-.06-1.22 0 0-1.44.12-2.38.12-.87 0-2.33-.12-2.33-.12-.5-.03-.56 1.2-.06 1.22l.92.08 1.26 3.41zM17.41 10c.24-.64.74-1.87.43-4.25.7 1.29 1.05 2.71 1.05 4.25 0 3.29-1.73 6.24-4.4 7.78.97-2.59 1.94-5.2 2.92-7.78zM6.1 18.09C3.12 16.65 1.11 13.53 1.11 10c0-1.3.23-2.48.72-3.59C3.25 10.3 4.67 14.2 6.1 18.09zm4.03-6.63l2.58 6.98c-.86.29-1.76.45-2.71.45-.79 0-1.57-.11-2.29-.33.81-2.38 1.62-4.74 2.42-7.1z" fill="#FFFFFF"></path>
                        </svg>
                    </button>
                    <button class="add-button" id="add_button" onclick="showAddMenu()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus font-svg" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </button>
                    <button class="pencil">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="back-arrow" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                        </svg>
                    </button>
                    <button class="left-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="back-arrow" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z" />
                        </svg>
                    </button>
                    <button class="right-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="back-arrow" fill="currentColor" class="bi bi-arrow-90deg-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.854 4.854a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 4H3.5A2.5 2.5 0 0 0 1 6.5v8a.5.5 0 0 0 1 0v-8A1.5 1.5 0 0 1 3.5 5h9.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4z" />
                        </svg>
                    </button>
                    <button class="detail">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" class="back-arrow" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                    </button>
                    <button class="outline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="back-arrow" fill="currentColor" class="bi bi-list-nested" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </button>
                </div>
                <div class="col-md-4">
                    <div class="right-toolbar">
                        <button type="button" class="btn">draft</button>
                        <button type="button" class="btn">preview</button>
                        <input type="hidden" name="action" value="add-new">
        <input type="submit" name="add-new" class="btn btn-primary" value="Publish">
                        <button class="btn setting"><i class="fas fa-cog setting-font"></i></button>
                        <button class=" menu-icon"><i class="fas fa-ellipsis-v"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-main-section">
            <div class="add-block" id="add-new-block">
                <div class="search-btn">
                    <input type="search" name="search" placeholder="search for a block">
                    <div class="search-svg">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" role="img" aria-hidden="true" focusable="false">
                            <path d="M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path>
                        </svg>
                    </div>
                </div>
                <div class="block-items">
                    <!-- <div class="col-md-4"> -->
                    <button class="block-btn">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false">
                            <path d="M18.3 4H9.9v-.1l-.9.2c-2.3.4-4 2.4-4 4.8s1.7 4.4 4 4.8l.7.1V20h1.5V5.5h2.9V20h1.5V5.5h2.7V4z" fill="#1E1E1E"></path>
                        </svg>
                        <h4 class="block-heading">Paragraph</h4>
                    </button>
                    <button class="block-btn">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false">
                            class="block-heading"
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 4.5h14c.3 0 .5.2.5.5v8.4l-3-2.9c-.3-.3-.8-.3-1 0L11.9 14 9 12c-.3-.2-.6-.2-.8 0l-3.6 2.6V5c-.1-.3.1-.5.4-.5zm14 15H5c-.3 0-.5-.2-.5-.5v-2.4l4.1-3 3 1.9c.3.2.7.2.9-.1L16 12l3.5 3.4V19c0 .3-.2.5-.5.5z" fill="#1E1E1E"></path>
                        </svg>
                        <h4 class="block-heading">Images</h4>
                    </button>
                    <button class="block-btn">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false">
                            <path d="M6.2 5.2v13.4l5.8-4.8 5.8 4.8V5.2z" fill="#1E1E1E"></path>
                        </svg>
                        <h4 class="block-heading">Heading</h4>
                    </button>
                    <button class="block-btn">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false">
                            <path d="M20.2 8v11c0 .7-.6 1.2-1.2 1.2H6v1.5h13c1.5 0 2.7-1.2 2.7-2.8V8h-1.5zM18 16.4V4.6c0-.9-.7-1.6-1.6-1.6H4.6C3.7 3 3 3.7 3 4.6v11.8c0 .9.7 1.6 1.6 1.6h11.8c.9 0 1.6-.7 1.6-1.6zM4.5 4.6c0-.1.1-.1.1-.1h11.8c.1 0 .1.1.1.1V12l-2.3-1.7c-.3-.2-.6-.2-.9 0l-2.9 2.1L8 11.3c-.2-.1-.5-.1-.7 0l-2.9 1.5V4.6zm0 11.8v-1.8l3.2-1.7 2.4 1.2c.2.1.5.1.8-.1l2.8-2 2.8 2v2.5c0 .1-.1.1-.1.1H4.6c0-.1-.1-.2-.1-.2z" fill="#1E1E1E"></path>
                        </svg>
                        <h4 class="block-heading">Gallary</h4>
                    </button>
                    <button class="block-btn">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false">
                            <path d="M4 4v1.5h16V4H4zm8 8.5h8V11h-8v1.5zM4 20h16v-1.5H4V20zm4-8c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2z" fill="#1E1E1E"></path>
                        </svg>
                        <h4 class="block-heading">List</h4>
                    </button>
                    <button class="block-btn">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false">
                            <path d="M13 6v6h5.2v4c0 .8-.2 1.4-.5 1.7-.6.6-1.6.6-2.5.5h-.3v1.5h.5c1 0 2.3-.1 3.3-1 .6-.6 1-1.6 1-2.8V6H13zm-9 6h5.2v4c0 .8-.2 1.4-.5 1.7-.6.6-1.6.6-2.5.5h-.3v1.5h.5c1 0 2.3-.1 3.3-1 .6-.6 1-1.6 1-2.8V6H4v6z" fill="#1E1E1E"></path>
                        </svg>
                        <h4 class="block-heading">Quote</h4>
                    </button>
                  
                    <div class="browse-button">
                        <button class="btn browse-btn">browse all</button>
                      
                    </div>
                </div>
            </div>
            <div class="post-content-area">
                <div class="post-content">
                    <div class="col-md-10">
                        <div class="post-working-area">
                            <div class="heading-part">
                            <form method="POST">

                                <textarea class="title" id="add-title" name="title"  onclick="btnhide()" placeholder="Add title" rows="1"></textarea>
                            </div>
                            <div class="text-part">
                                <textarea class="start-writing" id="start-writing" name="writing" onclick="btnAdd()" oninput="btnhide()" placeholder="start-writing or typing /to choose a block" rows="1"></textarea>
                            </div>
                           
                            <div class="addBolck">
                                <button class="add-blocl-btn" id="btnAdd" onclick="showAddMenu()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus font-svg" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-section">
                <div class="col-md-2">
                    <div class="right-side-navbar">
                        <div class="documnet">
                            <button class="documnet-btn" onclick="showDocument()">Documnet</button>
                        </div>
                        <div class="button">
                            <button class="block-btns">block</button>
                        </div>
                        <!--  for close button -->
                        <!-- <div class="close-button">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M13 11.9l3.3-3.4-1.1-1-3.2 3.3-3.2-3.3-1.1 1 3.3 3.4-3.5 3.6 1 1L12 13l3.5 3.5 1-1z" fill="#1E1E1E"></path></svg>
                        </div> -->
                        <div class="document-section" id="section-document">
                            <div class="status-visibility">
                                <button class="all-btn" onclick="hideStatusVisibility()">
                                    <span class="svg-images">
                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="components-panel__arrow" role="img" aria-hidden="true" focusable="false">
                                            <path d="M17.5 11.6L12 16l-5.5-4.4.9-1.2L12 14l4.5-3.6 1 1.2z" fill="#1E1E1E"></path>
                                        </svg>
                                    </span>
                                    Status and Visibility
                                </button>
                            </div>
                            <div class="document-list" id="list-type1">
                                <label for="visibility" class="doc-visivility">Visibility</label>
                                <button class="list-btn">public</button>
                                <label for="visibility" class="doc-visivility">Piblish</label>
                                <button class="list-btn">immediately</button>
                                <label for="visibility" class="doc-visivility">Post Formet</label>
                                <select class="post-formet">
                                    <option value="aside">Aside</option>
                                    <option value="gallery">Gallery</option>
                                    <option value="link">Link</option>
                                    <option value="image">Image</option>
                                    <option value="quote">Quote</option>
                                    <option value="standard">Standard</option>
                                    <option value="status">Status</option>
                                    <option value="video">Video</option>
                                    <option value="audio">Audio</option>
                                    <option value="chat">Chat</option>
                                </select>
                                <div class="checkboxes">
                                    <input type="checkbox" name="stickToTop">
                                    <label class="check-text">Stick to the top of the block</label>
                                </div>
                                <div class="checkboxes">
                                    <input type="checkbox" name="pandig-review">
                                    <label class="check-text">Panding Review</label>
                                </div>
                            </div>
                            <div class="parmalink">
                                <button class="all-btn" onclick="hideParmalink()">
                                    <span class="svg-images">
                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="components-panel__arrow" role="img" aria-hidden="true" focusable="false">
                                            <path d="M17.5 11.6L12 16l-5.5-4.4.9-1.2L12 14l4.5-3.6 1 1.2z" fill="#1E1E1E"></path>
                                        </svg>
                                    </span>
                                    parmalink
                                </button>
                                <div class="parmalink-list" id="parmalink-list">
                                    <h4 class="view-post">View Post</h3>
                                        <div class="parmalink">
                                            <a href="#">http:/wordpress.org</a>
                                        </div>
                                </div>
                            </div>
                            <div class="categories">
                                <button class="all-btn" onclick="hideCategories()">
                                    <span class="svg-images">
                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="components-panel__arrow" role="img" aria-hidden="true" focusable="false">
                                            <path d="M17.5 11.6L12 16l-5.5-4.4.9-1.2L12 14l4.5-3.6 1 1.2z" fill="#1E1E1E"></path>
                                        </svg>
                                    </span>
                                    categories
                                </button>
                                <div class="checkboxes" id="checkboxe">
                                    <input type="checkbox" name="uncategorized">
                                    <label class="check-text">Uncategorized</label><br>
                                    <a href="#">add new categories</a>
                                </div>
                            </div>
                            <div class="tag">
                                <button class="all-btn" onclick="hideTage()">
                                    <span class="svg-images">
                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="components-panel__arrow" role="img" aria-hidden="true" focusable="false">
                                            <path d="M17.5 11.6L12 16l-5.5-4.4.9-1.2L12 14l4.5-3.6 1 1.2z" fill="#1E1E1E"></path>
                                        </svg>
                                    </span>
                                    Tags
                                </button>
                                <div class="add-new-tag" id="add-new-tag">
                                    <label for="new-tag" id="newTag">add new tag</label>
                                    <input type="text" name="add-tag" id="tag">
                                </div>
                            </div>
                            <div class="featured-image">
                                <button class="all-btn" onclick="hideImage()">
                                    <span class="svg-images">
                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="components-panel__arrow" role="img" aria-hidden="true" focusable="false">
                                            <path d="M17.5 11.6L12 16l-5.5-4.4.9-1.2L12 14l4.5-3.6 1 1.2z" fill="#1E1E1E"></path>
                                        </svg>
                                    </span>
                                    featured Image
                                </button>
                                <div class="set-featured-image" id="setfeatured">
                                    <button class="set-image">Set Featured Image</button>
                                    <div class="drop-zone"></div>
                                </div>
                            </div>
                            <div class="excerpt">
                                <button class="all-btn" onclick="hideExcerpt()">
                                    <span class="svg-images">
                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="components-panel__arrow" role="img" aria-hidden="true" focusable="false">
                                            <path d="M17.5 11.6L12 16l-5.5-4.4.9-1.2L12 14l4.5-3.6 1 1.2z" fill="#1E1E1E"></path>
                                        </svg>
                                    </span>
                                    Excerpt
                                </button>
                                <div class="tArea" id="exerptArea">
                                    <label for="excerpt" class="label-excerpt">write an excerpt(optional)</label>
                                    <textarea class="excerpt-textarea" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- post-main-secion close here -->
                    </div>
                    <!-- new-post-header close here -->
                </div>
                <script>
                    function showAddMenu() {
                        let addButton = document.getElementById('add-new-block');
                        if (addButton.style.display === 'none') {
                            addButton.style.cssText = "display:block";
                        } else {
                            addButton.style.display = 'none'
                        }
                    }
                    function showAddBlock() {
                        let show = document.getElementById('add-new-block');
                        show.style.vivibility = "visible";
                    }
                    function btnAdd() {
                        document.getElementById('btnAdd').style.display = "flex";
                        // if (button.style.display === 'none') {
                        //     button.style.cssText = "display:block";
                        // } else {
                        //     button.style.display = 'none'
                        // }
                    }
                    function btnhide() {
                        document.getElementById('btnAdd').style.display = "none";
                    }
                    function hideStatusVisibility() {
                        let status = document.getElementById('list-type1');
                        if (status.style.display === "none") {
                            status.style.display = "block";
                        } else {
                            status.style.display = "none";
                        }
                    }
                    function hideParmalink() {
                        let status = document.getElementById('parmalink-list');
                        if (status.style.display === "none") {
                            status.style.display = "block";
                        } else {
                            status.style.display = "none";
                        }
                    }
                    function hideCategories() {
                        let status = document.getElementById('checkboxe');
                        if (status.style.display === "none") {
                            status.style.display = "block";
                        } else {
                            status.style.display = "none";
                        }
                    }
                    function hideTage() {
                        let status = document.getElementById('add-new-tag');
                        if (status.style.display === "none") {
                            status.style.display = "block";
                        } else {
                            status.style.display = "none";
                        }
                    }
                    function hideImage() {
                        let status = document.getElementById('setfeatured');
                        if (status.style.display === "none") {
                            status.style.display = "block";
                        } else {
                            status.style.display = "none";
                        }
                    }
                    function hideExcerpt() {
                        let status = document.getElementById('exerptArea');
                        if (status.style.display === "none") {
                            status.style.display = "block";
                        } else {
                            status.style.display = "none";
                        }
                    }
                    function showDocument() {
                        let status = document.getElementById('section-document');
                        if (status.style.display === "none") {
                            status.style.display = "block";
                        } else {
                            status.style.display = "none";
                        }
                    }
                </script>
</body>
</html>