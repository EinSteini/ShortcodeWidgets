<div id="maindiv">
    <form action="" method="post" >
    <?php wp_nonce_field('csv_submit','csv_nonce'); ?>
    <input type="hidden" name="action" value="csv_submit">