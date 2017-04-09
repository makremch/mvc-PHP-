<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pescador Admin</title>

    <!-- Bootstrap framework -->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>bootstrap/css/bootstrap-responsive.min.css" />
    <!-- gebo blue theme-->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>css/blue.css" id="link_theme" />
    <!-- breadcrumbs-->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>js/jBreadcrumbs/css/BreadCrumb.css" />
    <!-- tooltips-->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>js/qtip2/jquery.qtip.min.css" />
    <!-- notifications -->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>js/sticky/sticky.css" />
    <!-- splashy icons -->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>img/splashy/splashy.css" />
    <!-- enhanced select -->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>js/chosen/chosen.css" />
    <!-- colorbox -->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>js/colorbox/colorbox.css" />

    <!-- main styles -->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>css/style.css" />

    <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />-->

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo $request->getWebroot(); ?>favicon.ico" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie.css" />
    <script src="<?php echo $request->getWebroot(); ?>js/ie/html5.js"></script>
    <script src="<?php echo $request->getWebroot(); ?>js/ie/respond.min.js"></script>
    <![endif]-->
<?php //die('dddd'); ?>
    <script>
        //* hide all elements & show preloader
        document.documentElement.className += 'js';
    </script>
    <!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>
<body>
<div id="loading_layer" style="display:none"><img src="<?php echo $request->getWebroot(); ?>img/ajax_loader.gif" alt="" /></div>
<div class="style_switcher">
    <div class="sepH_c">
        <p>Colors:</p>
        <div class="clearfix">
            <a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
            <a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
            <a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
            <a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
            <a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
            <a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
        </div>
    </div>
    <div class="sepH_c">
        <p>Backgrounds:</p>
        <div class="clearfix">
            <span class="style_item jQptrn style_active ptrn_def" title=""></span>
            <span class="ssw_ptrn_a style_item jQptrn" title="ptrn_a"></span>
            <span class="ssw_ptrn_b style_item jQptrn" title="ptrn_b"></span>
            <span class="ssw_ptrn_c style_item jQptrn" title="ptrn_c"></span>
            <span class="ssw_ptrn_d style_item jQptrn" title="ptrn_d"></span>
            <span class="ssw_ptrn_e style_item jQptrn" title="ptrn_e"></span>
        </div>
    </div>
    <div class="sepH_c">
        <p>Layout:</p>
        <div class="clearfix">
            <label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fluid" value="" checked /> Fluid</label>
            <label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed" /> Fixed</label>
        </div>
    </div>
    <div class="sepH_c">
        <p>Sidebar position:</p>
        <div class="clearfix">
            <label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_left" value="" checked /> Left</label>
            <label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right" /> Right</label>
        </div>
    </div>
    <div class="sepH_c">
        <p>Show top menu on:</p>
        <div class="clearfix">
            <label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_click" value="" checked /> Click</label>
            <label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_hover" value="menu_hover" /> Hover</label>
        </div>
    </div>

    <div class="gh_button-group">

        <a href="#" id="resetDefault" class="btn btn-mini">Reset</a>
    </div>

</div>

<div id="maincontainer" class="clearfix">
    <!-- header -->
    <header>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="dashboard.html"><i class="icon-home icon-white"></i> Pescador Admin</a>
                    <ul class="nav user_menu pull-right">
                        <li class="hidden-phone hidden-tablet">
                            <div class="nb_boxes clearfix">
                                <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>

                            </div>
                        </li>


                        <li><a href="login.html">Se déconnecter</a></li>
                    </ul>


                    <a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
                        <span class="icon-align-justify icon-white"></span>
                    </a>
                    <nav>
                        <div class="nav-collapse">
                            <ul class="nav">
                                <li>
                                    <a href="charts.html"><i class="icon-list-alt icon-white"></i> Statistiques </a>

                                </li>
                                <li >
                                    <a href="calendar.html"><i class="icon-th icon-white"></i> calendrier </a>

                                </li>

                                <li>
                                    <a href="admin.html"><i class="icon-file icon-white"></i> Compte </a>

                                </li>
                                <li>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="modal hide fade" id="myMail">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h3>Nouveaux messages</h3>
            </div>
            <div class="modal-body">

                <table class="table table-condensed table-striped" data-rowlink="a">
                    <thead>
                    <tr>
                        <th>Expéditeur</th>
                        <th>Sujet</th>
                        <th>Date</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Declan Pamphlett</td>
                        <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                        <td>23/05/2012</td>

                    </tr>
                    <tr>
                        <td>Erin Church</td>
                        <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                        <td>24/05/2012</td>

                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a href="mailbox.html" class="btn">Allez au mailbox</a>
            </div>
        </div>


    </header>

    <!-- main content -->
    <div id="contentwrapper">
        <div class="main_content">
            <nav>
                <div id="jCrumbs" class="breadCrumb module">
                    <ul>
                        <li>
                            <a href="#"><i class="icon-home"></i></a>
                        </li>

                        <li>
                            Fournisseur
                        </li>
                    </ul>
                </div>
            </nav>

                 <?php echo $main_content; ?>
        </div>
    </div>

</div>
</div>

<!-- sidebar -->
<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<div class="sidebar">

    <div class="antiScroll">
        <div class="antiscroll-inner">
            <div class="antiscroll-content">

                <div class="sidebar_inner">
                    <!--<form action="index.php?uid=1&amp;page=search_page" class="input-append" method="post" >
                        <input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
                    </form>-->
                    </br>
                    <center><h3>Bienvenue !</h3></center>
                    </br>
                    <div id="side_accordion" class="accordion">

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-user"></i> Gestion utilisateurs
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseOne">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="tables.html">Consulter liste utilisateur</a></li>
                                        <li><a href="cher_user.html">Chercher utilisateur</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Livraisons
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseTwo">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="liste_liv.html">Consulter liste livraisons</a></li>
                                        <li><a href="cher_com.html">Chercher livraison</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-leaf"></i> Produits
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseThree">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="liste_prod.html">Consulter liste produits</a></li>
                                        <li><a href="ajout_prod.html">Ajouter produit</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-cog"></i> Marketing
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseFour">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo $request->getWebroot(); ?>promotions/afficherAll">Consulter liste promotions</a></li>
                                        <li><a href="<?php echo $request->getWebroot(); ?>promotions/ajout">Ajouter promotion</a></li>
                                        <li><a href="<?php echo $request->getWebroot(); ?>event/ajout">Ajouter Event</a></li>
                                        <li><a href="<?php echo $request->getWebroot(); ?>event/afficherAllEvent">Consulter liste Event</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseLong" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-folder-close"></i> R&eacute;clamations
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseLong">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">


                                        <li><a href="liste_rec.html">Consulter liste réclamations</a></li>
                                        <li><a href="cher_rec.html">Rechercher réclamation</a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapse10" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Fournisseur
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapse10">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="AjouterFournisseur.html">Ajouter Fournisseur</a></li>
                                        <!-- <li><a href="ModifierSupprimer.html">Modifier Fournisseur</a></li>
                                         <li><a href="SupprimerFournisseur.html">Supprimer Fournisseur</a></li>-->
                                        <li><a href="listeDocuments.php">Afficher Fournisseur</a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                    <i class="icon-th"></i> Calculatrice
                                </a>
                            </div>
                            <div class="accordion-body collapse in" id="collapse7">
                                <div class="accordion-inner">
                                    <form name="Calc" id="calc">
                                        <div class="formSep control-group input-append">
                                            <input type="text" style="width:142px" name="Input" /><button type="button" class="btn" name="clear" value="c" onclick="Calc.Input.value = ''"><i class="icon-remove"></i></button>
                                        </div>
                                        <div class="control-group">
                                            <input type="button" class="btn btn-large" name="seven" value="7" onclick="Calc.Input.value += '7'" />
                                            <input type="button" class="btn btn-large" name="eight" value="8" onclick="Calc.Input.value += '8'" />
                                            <input type="button" class="btn btn-large" name="nine" value="9" onclick="Calc.Input.value += '9'" />
                                            <input type="button" class="btn btn-large" name="div" value="/" onclick="Calc.Input.value += ' / '">
                                        </div>
                                        <div class="control-group">
                                            <input type="button" class="btn btn-large" name="four" value="4" onclick="Calc.Input.value += '4'" />
                                            <input type="button" class="btn btn-large" name="five" value="5" onclick="Calc.Input.value += '5'" />
                                            <input type="button" class="btn btn-large" name="six" value="6" onclick="Calc.Input.value += '6'" />
                                            <input type="button" class="btn btn-large" name="times" value="x" onclick="Calc.Input.value += ' * '" />
                                        </div>
                                        <div class="control-group">
                                            <input type="button" class="btn btn-large" name="one" value="1" onclick="Calc.Input.value += '1'" />
                                            <input type="button" class="btn btn-large" name="two" value="2" onclick="Calc.Input.value += '2'" />
                                            <input type="button" class="btn btn-large" name="three" value="3" onclick="Calc.Input.value += '3'" />
                                            <input type="button" class="btn btn-large" name="minus" value="-" onclick="Calc.Input.value += ' - '" />
                                        </div>
                                        <div class="formSep control-group">
                                            <input type="button" class="btn btn-large" name="dot" value="." onclick="Calc.Input.value += '.'" />
                                            <input type="button" class="btn btn-large" name="zero" value="0" onclick="Calc.Input.value += '0'" />
                                            <input type="button" class="btn btn-large" name="DoIt" value="=" onclick="Calc.Input.value = Math.round( eval(Calc.Input.value) * 1000)/1000" />
                                            <input type="button" class="btn btn-large" name="plus" value="+" onclick="Calc.Input.value += ' + '" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>

    </div>

    <script src="<?php echo $request->getWebroot(); ?>js/jquery.min.js"></script>
    <!-- smart resize event -->
    <script src="<?php echo $request->getWebroot(); ?>js/jquery.debouncedresize.min.js"></script>
    <!-- hidden elements width/height -->
    <script src="<?php echo $request->getWebroot(); ?>js/jquery.actual.min.js"></script>
    <!-- js cookie plugin -->
    <script src="<?php echo $request->getWebroot(); ?>js/jquery.cookie.min.js"></script>
    <!-- main bootstrap js -->
    <script src="<?php echo $request->getWebroot(); ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- tooltips -->
    <script src="<?php echo $request->getWebroot(); ?>js/qtip2/jquery.qtip.min.js"></script>
    <!-- jBreadcrumbs -->
    <script src="<?php echo $request->getWebroot(); ?>js/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
    <!-- fix for ios orientation change -->
    <script src="<?php echo $request->getWebroot(); ?>js/ios-orientationchange-fix.js"></script>
    <!-- scrollbar -->
    <script src="<?php echo $request->getWebroot(); ?>js/antiscroll/antiscroll.js"></script>
    <script src="<?php echo $request->getWebroot(); ?>js/antiscroll/jquery-mousewheel.js"></script>
    <!-- lightbox -->
    <script src="<?php echo $request->getWebroot(); ?>js/colorbox/jquery.colorbox.min.js"></script>
    <!-- common functions -->
    <script src="<?php echo $request->getWebroot(); ?>js/gebo_common.js"></script>

    <!-- bootstrap plugins -->
    <script src="<?php echo $request->getWebroot(); ?>js/bootstrap.plugins.min.js"></script>
    <!-- autosize textareas -->
    <script src="<?php echo $request->getWebroot(); ?>js/forms/jquery.autosize.min.js"></script>
    <!-- enhanced select -->
    <script src="<?php echo $request->getWebroot(); ?>js/chosen/chosen.jquery.min.js"></script>
    <!-- user profile functions -->
    <script src="<?php echo $request->getWebroot(); ?>js/gebo_user_profile.js"></script>

    <script>
        $(document).ready(function() {
            //* show all elements & remove preloader
            setTimeout('$("html").removeClass("js")',1000);
        });
    </script>

</div>
</body>
</html>
