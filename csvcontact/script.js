function csvsubmit(){
    var email_adress = document.getElementById("CSVemail").value;
    var surname = document.getElementById("CSVsurname").value;
    var name = document.getElementById("CSVname").value;

    document.getElementById("csvphpexec").contentDocument.write("<?php echo esc_url( admin_url('admin-post.php') ); ?>");
}

