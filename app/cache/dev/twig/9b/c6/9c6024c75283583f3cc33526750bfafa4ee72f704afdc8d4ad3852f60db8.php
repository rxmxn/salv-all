<?php

/* HPTDefaultBundle::layout.html.twig */
class __TwigTemplate_9bc69c6024c75283583f3cc33526750bfafa4ee72f704afdc8d4ad3852f60db8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
            'menu' => array($this, 'block_menu'),
            'menu_items' => array($this, 'block_menu_items'),
            'menu_usuario' => array($this, 'block_menu_usuario'),
            'contenido' => array($this, 'block_contenido'),
            'footer' => array($this, 'block_footer'),
            'contactanos_footer' => array($this, 'block_contactanos_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        // line 5
        echo "
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/css/bootstrap.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" />
    ";
        // line 10
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/js/google-code-prettify/prettify.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/css/style.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/css/tabs.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/css/mystyles.css"), "html", null, true);
        echo "\" />

    <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"application/x-javascript\"> addEventListener(\"load\", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/js/bootstrap-tab.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/js/bootstrap-dropdown.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 20
        echo "    ";
        // line 21
        echo "    ";
        // line 22
        echo "    ";
        // line 23
        echo "    ";
        // line 24
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/js/bootstrap-button.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 26
        echo "    ";
        // line 27
        echo "    ";
        // line 28
        echo "    ";
        // line 29
        echo "    ";
        // line 30
        echo "    ";
    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        // line 34
        echo "
        <!-- Navbar
    ================================================== -->
        ";
        // line 38
        echo "            ";
        // line 39
        echo "                ";
        // line 40
        echo "                    ";
        // line 41
        echo "                        ";
        // line 42
        echo "                        ";
        // line 43
        echo "                        ";
        // line 44
        echo "                    ";
        // line 45
        echo "                    ";
        // line 46
        echo "                    ";
        // line 47
        echo "                        ";
        // line 48
        echo "                            ";
        // line 49
        echo "                                ";
        // line 50
        echo "                            ";
        // line 51
        echo "                            ";
        // line 52
        echo "                                ";
        // line 53
        echo "                            ";
        // line 54
        echo "                            ";
        // line 55
        echo "                                ";
        // line 56
        echo "                            ";
        // line 57
        echo "                            ";
        // line 58
        echo "                                ";
        // line 59
        echo "                            ";
        // line 60
        echo "                            ";
        // line 61
        echo "                                ";
        // line 62
        echo "                            ";
        // line 63
        echo "                            ";
        // line 64
        echo "                                ";
        // line 65
        echo "                            ";
        // line 66
        echo "                            ";
        // line 67
        echo "                                ";
        // line 68
        echo "                            ";
        // line 69
        echo "                        ";
        // line 70
        echo "                    ";
        // line 71
        echo "                ";
        // line 72
        echo "            ";
        // line 73
        echo "        ";
        // line 74
        echo "
        ";
        // line 75
        $this->displayBlock('menu', $context, $blocks);
        // line 130
        echo "
        <div style=\"padding-top: 56px;\">
        ";
        // line 132
        $this->displayBlock('contenido', $context, $blocks);
        // line 134
        echo "        </div>
    ";
    }

    // line 75
    public function block_menu($context, array $blocks = array())
    {
        // line 76
        echo "        <!-- container -->
        <!-- header -->
<div class=\"navbar navbar-inverse navbar-fixed-top\">
";
        // line 80
        echo "        <div class=\"navbar-inner\">
        ";
        // line 82
        echo "            <div class=\"container\">
                ";
        // line 84
        echo "                ";
        // line 85
        echo "                ";
        // line 86
        echo "                ";
        // line 87
        echo "                ";
        // line 88
        echo "                <!-- logo -->
                <div class=\"logo\">
                    <a href=\"";
        // line 90
        echo $this->env->getExtension('routing')->getPath("hpt_default_homepage");
        echo "\">
                        <H1 style=\"color: rgb(25,181,254); margin-top: 0; margin-bottom: 0;\">Salvador <span style=\"color: #c0bfbe\">Allende</span></H1>
                        ";
        // line 93
        echo "                    </a>
                </div>

                <!-- logo -->
                <!-- top-nav -->
                <div class=\"top-nav\">
                    <span class=\"menu\"> </span>
                    <div>
                        <ul>
                            ";
        // line 102
        $this->displayBlock('menu_items', $context, $blocks);
        // line 104
        echo "                            <span class=\"dropdown\">
                                ";
        // line 105
        $this->displayBlock('menu_usuario', $context, $blocks);
        // line 107
        echo "                            </span>
                        </ul>
                    </div>
                </div>
                <!-- top-nav -->
                <!-- script-for-nav -->
                <script>
                    \$(document).ready(function(){
                        \$(\"span.menu\").click(function(){
                            \$(\".top-nav ul\").slideToggle(300);
                        });
                    });
                    \$('.dropdown-toggle').dropdown()
                </script>
                <!-- script-for-nav -->
                <div class=\"clearfix\"> </div>
            </div>
        </div>
        ";
        // line 126
        echo "</div>
        <!-- /header -->
        <!-- /container -->
        ";
    }

    // line 102
    public function block_menu_items($context, array $blocks = array())
    {
        // line 103
        echo "                            ";
    }

    // line 105
    public function block_menu_usuario($context, array $blocks = array())
    {
        // line 106
        echo "                                ";
    }

    // line 132
    public function block_contenido($context, array $blocks = array())
    {
        // line 133
        echo "        ";
    }

    // line 138
    public function block_footer($context, array $blocks = array())
    {
        // line 139
        echo "    ";
        $this->displayBlock('contactanos_footer', $context, $blocks);
        // line 154
        echo "    <!-- team-grids-caption -->
    <!-- footer -->
    <div class=\"footer\">
        <div class=\"container\">
            <p class=\"copy-right\">Diseñado por <a href=\"#\">EnterSourceCode</a></p>
        </div>
    </div>
    <!-- /footer -->

";
    }

    // line 139
    public function block_contactanos_footer($context, array $blocks = array())
    {
        // line 140
        echo "        <!-- team-grids-caption -->
        <div class=\"team-grids-caption\">
            <div class=\"container\">
                <div class=\"team-grids-caption-left\">
                    <h4>No dude en contactarnos!</h4>
                    <p>Conozca a nuestros especialistas y disfrute de nuestros servicios.</p>
                </div>
                <div class=\"team-grids-caption-right\">
                    <a class=\"team-btn\" href=\"";
        // line 148
        echo $this->env->getExtension('routing')->getPath("hpt_contactanos");
        echo "\">Cont&aacute;ctanos</a>
                </div>
                <div class=\"clearfix\"> </div>
            </div>
        </div>
    ";
    }

    public function getTemplateName()
    {
        return "HPTDefaultBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  333 => 148,  323 => 140,  320 => 139,  307 => 154,  304 => 139,  301 => 138,  297 => 133,  294 => 132,  290 => 106,  287 => 105,  283 => 103,  280 => 102,  273 => 126,  253 => 107,  251 => 105,  248 => 104,  246 => 102,  235 => 93,  230 => 90,  226 => 88,  224 => 87,  222 => 86,  220 => 85,  218 => 84,  215 => 82,  212 => 80,  207 => 76,  204 => 75,  199 => 134,  197 => 132,  193 => 130,  191 => 75,  188 => 74,  186 => 73,  184 => 72,  182 => 71,  180 => 70,  178 => 69,  176 => 68,  174 => 67,  172 => 66,  170 => 65,  168 => 64,  166 => 63,  164 => 62,  162 => 61,  160 => 60,  158 => 59,  156 => 58,  154 => 57,  152 => 56,  150 => 55,  148 => 54,  146 => 53,  144 => 52,  142 => 51,  140 => 50,  138 => 49,  136 => 48,  134 => 47,  132 => 46,  130 => 45,  128 => 44,  126 => 43,  124 => 42,  122 => 41,  120 => 40,  118 => 39,  116 => 38,  111 => 34,  108 => 33,  104 => 30,  102 => 29,  100 => 28,  98 => 27,  96 => 26,  91 => 24,  89 => 23,  87 => 22,  85 => 21,  83 => 20,  79 => 18,  75 => 17,  70 => 15,  65 => 13,  61 => 12,  57 => 11,  52 => 10,  48 => 8,  44 => 7,  40 => 5,  38 => 4,  35 => 3,);
    }
}
