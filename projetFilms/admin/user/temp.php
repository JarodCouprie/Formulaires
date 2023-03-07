<?php

//echo password_hash("labombe", PASSWORD_DEFAULT);

$mdp = "$2y$10$5WhREunUNIQ4BS4geBSoAuN3hnc1QD7vk2iQzDUNx2RbN1O8lVGMq";

if (password_verify("labombe", $mdp)){
    echo "Acces granted";
}else{
    echo "Acces denied";
};


?>