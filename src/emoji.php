<?php
    class emoji()
    {
        $emojis_remplace = array [':<',':3',':(',':|',':\'(',':)',';)'];
        $emojis = array ['../../emojis/emo_angry.png','../../emojis/emo_cat.png','../../emojis/emo_cry.png','../../emojis/emo_cry.png','../../emojis/emo_noreaction.png','../../emojis/emo_sad.png','../../emojis/emo_smile.png','../../emojis/emo_wink.png',];
        
        $msg['message'] = str_replace($emojis_remplace,$emojis,$msg['message']);
    }
?>