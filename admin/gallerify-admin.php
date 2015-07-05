<?php
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);

header('Content-type: text/css');
header('Cache-control: must-revalidate');

if (!get_option("gallerify_accent")){
    $gallerify_admin_accent =  "#00b0ff";
} 
else{
    
    $gallerify_admin_accent = get_option("gallerify_accent");
}

if ( 1 == get_option('gallerify_change_accent_admin')) {
    $gallerify_accent_color = $gallerify_admin_accent;
} 
else{
    $gallerify_accent_color = "#00b0ff";
}

?>
.gallerify-header {
    background-color: <?php echo $gallerify_accent_color; ?>;
    color: #fff;
}
.gallerify-wrap .input-field {
  margin-top: 2rem !important;
  margin-bottom: 1rem;
}
.gallerify-header h4 {
    opacity: 0.7;
}

.gallerify-container {
    background-color: #fff;
}

.gallerify-container p {
    margin-top: 0px;
}

.gallerify-wrap h2.header {
    border-radius: 2px;
    padding: 15px;
    font-size: 20px;
    background-color: <?php echo $gallerify_accent_color; ?>;
    color: #fff;
}

[type="checkbox"].filled-in:checked+label:after {
    border: 2px solid <?php echo $gallerify_accent_color; ?> !important;
    background-color: <?php echo $gallerify_accent_color; ?> !important;
}

.gallerify-wrap .btn:hover,
.gallerify-wrap .btn-large:hover,
.gallerify-wrap .btn,
.gallerify-wrap .btn-large {
    background-color: <?php echo $gallerify_accent_color; ?> !important;
}


.gallerify-plugin-details p{
    font-size: 20px;
}

.gallerify-wrap .collection{
      font-size: 17px;
}

.gallerify-wrap .header span{
    float:right;
    opacity: 0.5;
}

.gallerify-wrap .header a{
    color: #fff;
}

.gallerify-wrap .header a:hover{
    color: #ecf0f1;
}