<?php
    class emoji()
    {
        $emojis_remplace = array [':<',':3',':(',':|',':\'(',':)',';)'];
        $emojis = array ['../src/assets/img/emo_angry.png','../src/assets/img/emo_cat.png','../src/assets/img/emo_cry.png','../src/assets/img/emo_cry.png','../src/assets/img/emo_noreaction.png','../src/assets/img/emo_sad.png','../src/assets/img/emo_smile.png','../src/assets/img/emo_wink.png',];
        
        $msg['message'] = str_replace($emojis_remplace,$emojis,$msg['message']);
    }
?>