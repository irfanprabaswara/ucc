<?php

function _base_url($_path) {return SITE_PATH.$_path;}
function _complete_url($_path) {return SITE_DOMAIN._base_url($_path);}

