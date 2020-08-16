<?php
    $activex =  strtolower($this->params['controller']);
    $tab = 1;
    switch ($activex) {
        case 'news':
        case 'events':
        case 'catenews':
        case 'abouts':
            $tab = 1; break;
        case 'products':
        case 'catalogs':
            $tab = 2;break;
        case 'sliders':
        case 'videos':
        case 'galleries':
        case 'partners':
        case 'images':
            $tab = 3;break;
        case 'users':
        case 'groups':
        case 'aros':
        case 'acos':
            $tab = 4; break;
        case 'contents':
        case 'menus':
        case 'menuitems':
        case 'infos':
            $tab = 5; break;
        default:
            $tab = 1; break;

    }
?>
<script type="text/javascript">var tabx = <?php echo $tab-1;?></script>