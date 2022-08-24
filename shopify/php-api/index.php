<?php
require_once("inc/functions.php");
$shop = $_GET['shop'];
$token = "shpua_fa6fc894c92a61a8aa0aa5934ccb1d4c";
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP API's</title>
    </head>
<style>
*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

button[aria-selected="false"] {
    background-color: hsl(207, 100%, 100%);
    color: var(--accent-dark);
    outline: 1px solid #0003;
}

button[aria-selected="true"] {
    background: var(--accent-blue);
    color: var(--text-clr);
    font-weight: 600;
}

button[aria-selected="false"]:where(:hover, :focus-visible) {
    outline: 2px solid var(--accent-blue);
    outline-offset: -2px;
}

button[aria-selected="false"]:where(:hover, :focus-visible) .icon__for--tab {
    color: var(--accent-blue);
}

button[aria-selected="false"]:where(:hover, :focus-visible) .text__for--tab {
    color: var(--text-clr);
}

button[aria-selected="false"]:active {
    background-color: hsl(207, 100%, 90%);
    transform: scale(0.95);
}

button[aria-selected="true"] .icon__for--tab {
    color: #fff;
}

.tab__navigation:is(:hover, :focus-visible)
    button[aria-selected="false"]:not(:hover) {
    opacity: 0.8;
    background-color: hsl(207, 10%, 91%);
}

:root {
    --accent-blue: hsl(207, 74%, 61%);
    --accent-dark: hsl(207, 10%, 45%);
    --text-clr: hsl(210, 10%, 30%);

    --space-025: 0.25rem;
    --space-05: 0.5rem;
    --space-075: 0.75rem;
    --space-1: 1rem;
    --space-125: 1.25rem;
    --space-15: 1.5rem;
    --space-2: 2rem;

    --width-max: 50rem;
    --width-min: 22.5rem;
    --fullSize: 100%;
    --fullHeight: 100vh;
    --flex-flow: 38rem;
    --padding--flow: calc(var(--fullSize) - var(--space-2));
}

body {
    display: flex;
    min-block-size: 100vh;
    font-size: 16px;
    font-family: sans-serif;
    background-color: rgb(207, 212, 216);
}

.tabs {
    max-inline-size: min(var(--padding--flow), var(--width-max));
    min-inline-size: var(--width-min);
    margin: auto;
    border-radius: 0.35rem;
    gap: var(--space-1) 0;
    background: hsl(207, 10%, 96%);
    box-shadow: 0 0.5em 0.35em #0003, 0 0.8em 1.4em #0003;
}

.content--flow {
    --sidebar-width: 13rem;
    display: flex;
    flex-wrap: wrap;
    overflow: hidden;
	position:fixed;
	height:500px;
	width: 71%;
}

.sidebar {
    padding: var(--space-05);
    flex: 1 1 var(--sidebar-width);
}

.tab__navigation {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-05);
    height: var(--fullSize);
}

.tab__button {
    display: flex;
    align-items: center;
    height: 3rem;
    flex: auto;
    gap: 0.55rem;
    border: none;
    outline: none;
}

.tab__button > * {
    padding: var(--space-05);
}

.icon__for--tab {
    display: inline-flex;
    height: 2rem;
    margin-inline: var(-space-05);
    aspect-ratio: 1;
    justify-content: center;
    align-items: center;
}

.icon__for--tab > i.fas {
    margin: 0;
    justify-content: flex-start;
    display: inline-flex;
    font-size: 1.125rem;
}

.text__for--tab {
    display: inline-flex;
    flex-grow: 1;
    align-items: center;
    line-height: 1;
    margin-inline: auto;
    font-size: 1rem;
}

@media (max-width: 639px) {
    .sidebar {
        padding: unset;
    }
    .tab__button {
        flex-direction: column;
        border-radius: 0;
        min-height: 3.25rem;
        gap: 0;
    }

    .tab__button > * + * {
        min-height: 1rem;
    }
}

@media (max-width: 560px) {
    .text__for--tab {
        display: none;
    }
    .icon__for--tab {
        margin: auto;
    }
}

.content__area {
    display: flex;
    flex-grow: 999;
    min-height: 20rem;
    justify-content: start;
    flex-basis: calc((var(--flex-flow) - var(--fullSize)) * 999);
    position: relative;
}

.tab__content {
    display: flex;
    flex: 1;
    justify-content: center;
    margin-inline: auto;
    padding: var(--space-05);
}

.span-tag {
    position: relative;
    right: 0;
    top: 0;
    line-height: 1;
    color: var(--accent-dark);
    opacity: 0.2;
    font-size: clamp(4rem, (-1.97rem + 20.78vw), 7rem);
    font-weight: 900;
}

.title {
    line-height: 1.6;
    padding-block-start: var(--space-1);
    color: var(--accent-blue);
    text-align: center;
    font-size: 2rem;
    text-transform: capitalize;
}

.text {
    max-width: 45ch;
    text-align: center;
    margin-inline: var(--space-1);
    color: var(--text-clr);
    font-size: 1.125rem;
}
//product page overflow:scroll
.products {
    overflow: scroll;
    height: 500px;
}
</style>
<body>
<div>
<article class="tabs content--flow">
 <aside class="sidebar">
	<h2>Dashboard</h2>
        <nav role="tablist" class="tab__navigation">
            <button role="tab" aria-selected="true" class="tab__button" id="1">
                <span class="icon__for--tab">
                    <i class="fas fa-home"></i>
                </span>
                <span class="text__for--tab">Products</span>
            </button>
            <button role="tab" aria-selected="false" class="tab__button" id="2">
                <span class="icon__for--tab">
                    <i class="fas fa-user"></i>
                </span>
                <span class="text__for--tab">Orders</span>
            </button>
            <button role="tab" aria-selected="false" class="tab__button" id="3">
                <span class="icon__for--tab">
                    <i class="fas fa-cogs"></i>
                </span>
                <span class="text__for--tab">Notifications</span>
            </button>
         </nav>
    </aside>
    <main class="content__area">
        <div class="tab__content">
		 <div class="product_main">
          <?php
require_once("products.php");
?>
</div>
			 <div role="tabpanel" aria-labelledby="2" hidden>
                <h1 class="title">Orders</h1>
                <span class="span-tag">Orders List:</span>

                <p class="text">
                          <?php
require_once("orders.php");
?>
                </p>
            </div>
  
            <div role="tabpanel" aria-labelledby="3" hidden>
     <h1 class="title">Deleted Products</h1>
                <span class="span-tag">ID Wise :</span>
 <p class="text">   	
 <h4>Related products</h4>   
				<a href="https://dev.eworkbridge.com/php-api/webhooks_delete.php">recent deleted products</a><br>
<a href="https://dev.eworkbridge.com/php-api/webhooks_create.php">recent created products</a><br>
<a href="https://dev.eworkbridge.com/php-api/webhooks_update.php">recent updated products</a>
 </p>
  <p class="text">   	
 <h4>Related orders</h4>   
				<a href="https://dev.eworkbridge.com/php-api/webhooks_order_delete.php">recent deleted orders</a><br>
<a href="https://dev.eworkbridge.com/php-api/webhooks_order_create.php">recent created orders</a><br>
<a href="https://dev.eworkbridge.com/php-api/webhooks_order_update.php">recent updated orders</a>
 </p>
 </div>
	  </div>
    </main>
</article>
</div>
<script>
//window.setInterval(()=>{ console.log('reload');}, 30000);
</script>
</body>
<script>
const buttons = document.querySelectorAll('[role="tab"]');
const tabPanel = Array.from(document.querySelectorAll('[role="tabpanel"]'));

function hideTabContent(e) {
    tabPanel.forEach((panels) => {
        panels.hidden = true;
    });
    buttons.forEach((tab) => {
        tab.setAttribute("aria-selected", false);
    });
    e.currentTarget.setAttribute("aria-selected", true);

    const { id } = event.currentTarget;
    const tabPanels = tabPanel.find(
        (tabContent) => tabContent.getAttribute("aria-labelledby") === id
    );
    tabPanels.hidden = false;
}
buttons.forEach((button) => button.addEventListener("click", hideTabContent));
</script>

</html>