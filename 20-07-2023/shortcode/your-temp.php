
<?php 
// get value from shortcode
$args = wp_parse_args(
    $args, 
    $attributes
);

echo "<pre>";
print_r($args);
echo $args['fname'];
echo $args['lname'];
echo "</pre>";
$fname = $args['fname'];
$lname = $args['lname'];
?>
<h1><?php echo $fname;?> <?php echo $lname;?></h1>
// In code file end