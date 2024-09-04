<?php

if (config(app()->getLocale())=='ar'){
    return [
        'ar'=> 'العربية '  ,
        'en'=> 'الانجليزية' ,
    ];
}else{
    return [
        'ar'=> 'Arabic '  ,
        'en'=> 'English' ,
    ];
}

