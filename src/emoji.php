<?php
        $allmsg = $bdd ->query('SELECT * FROM T_MESSAGES');

        $emojis_remplace = array [':<',':3',':(',':|',':\'(',':)',';)'];
        $emojis = array ["asset/img/emo_angry.png"];
        
        $msg['message'] = str_replace($emojis_remplace,$emojis,$msg['message']);
   
?>