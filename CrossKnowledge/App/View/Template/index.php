
<!DOCTYPE html>
<html>
<head>

<title>Usuário | Listagem</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
$styles = [
    "Public/library/adminto/css/bootstrap.min.css",
    "Public/library/adminto/css/core.css",
    "Public/library/adminto/css/components.css",
    "Public/library/adminto/css/icons.css",
    "Public/library/adminto/css/pages.css",
    "Public/library/adminto/css/menu.css",
    "Public/library/datatables/dataTables.bootstrap.css",
    "Public/library/spell/css/Bootstrap.fix.css",
    "Public/library/adminto/css/responsive.css",
    "Public/library/faloading/jquery.faloading.css"
    
];
foreach($styles as $style)
    echo sprintf('<link type="text/css" rel="stylesheet" href="%s" media="all" />', BASE_URL . $style) . PHP_EOL;

$scripts = [

    "Public/library/adminto/js/modernizr.min.js",
    "Public/library/adminto/js/jquery.min.js",
    "Public/library/adminto/js/bootstrap.min.js",
    "Public/library/bootstrap/bootbox.min.js",
    "Public/library/adminto/js/detect.js",
    "Public/library/slimScroll/jquery.slimscroll.min.js",
    "Public/library/adminto/js/fastclick.js",
    "Public/library/adminto/js/jquery.slimscroll.js",
    "Public/library/adminto/js/jquery.blockUI.js",
    "Public/library/adminto/js/waves.js",
    "Public/library/adminto/js/wow.min.js",
    "Public/library/adminto/js/jquery.nicescroll.js",
    "Public/library/adminto/js/jquery.scrollTo.min.js",
    "Public/library/adminto/js/jquery.core.js",
    "Public/library/adminto/js/jquery.app.js",
    "Public/library/datatables/jquery.dataTables.js",
    "Public/library/datatables/dataTables.bootstrap.min.js",
    "Public/library/spell/js/HTML.js",
    "Public/library/spell/js/DataTable.js",
    "Public/library/spell/js/UIV.js",
    "Public/library/spell/js/Validator.js",
    "Public/library/faloading/jquery.faloading.js",
    "Public/library/input-mask/jquery.inputmask.bundle.js",
    "Public/application/initializer.js",
    "Public/application/getAddress.js",
    "Public/application/registro/index.js",
    
];

foreach($scripts as $script)
    echo sprintf('<script type="text/javascript" src="%s"></script>', BASE_URL . $script) . PHP_EOL;
?>

<script type="application/json" property="uiv">

{
    "mvc": {
        "route": {
            "root": "\/",
            "urs": {}
        }
    }
}
</script>

</head>
<body>
    <div class="container">
    <?php echo $GLOBALS['view']['container']; ?>
    </div>
</body>
</html>
    