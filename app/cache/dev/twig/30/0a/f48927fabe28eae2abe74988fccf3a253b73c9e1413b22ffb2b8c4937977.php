<?php

/* ::base.html.twig */
class __TwigTemplate_300af48927fabe28eae2abe74988fccf3a253b73c9e1413b22ffb2b8c4937977 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        ";
        // line 7
        $this->displayBlock('head', $context, $blocks);
        // line 8
        echo "
        ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo "        ";
        // line 11
        echo "    </head>
    <body data-spy=\"scroll\" data-target=\".bs-docs-sidebar\">
        ";
        // line 13
        $this->displayBlock('body', $context, $blocks);
        // line 14
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 15
        echo "    </body>
    <footer>
        ";
        // line 17
        $this->displayBlock('footer', $context, $blocks);
        // line 18
        echo "    </footer>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Salvador Allende";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
    }

    // line 14
    public function block_javascripts($context, array $blocks = array())
    {
    }

    // line 17
    public function block_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  82 => 13,  77 => 9,  72 => 7,  60 => 18,  58 => 17,  54 => 15,  51 => 14,  43 => 10,  41 => 9,  36 => 7,  25 => 1,  329 => 147,  319 => 139,  300 => 138,  290 => 131,  286 => 105,  279 => 102,  276 => 101,  269 => 125,  249 => 106,  247 => 104,  242 => 101,  231 => 92,  226 => 89,  222 => 87,  220 => 86,  218 => 85,  216 => 84,  211 => 81,  208 => 79,  203 => 75,  200 => 74,  195 => 133,  193 => 131,  189 => 129,  187 => 74,  184 => 73,  182 => 72,  180 => 71,  178 => 70,  176 => 69,  174 => 68,  172 => 67,  170 => 66,  168 => 65,  166 => 64,  164 => 63,  162 => 62,  160 => 61,  158 => 60,  156 => 59,  154 => 58,  150 => 56,  148 => 55,  146 => 54,  144 => 53,  142 => 52,  138 => 50,  136 => 49,  134 => 48,  132 => 47,  128 => 45,  126 => 44,  124 => 43,  122 => 42,  120 => 41,  116 => 39,  114 => 38,  112 => 37,  107 => 33,  104 => 32,  100 => 29,  98 => 28,  96 => 27,  94 => 26,  92 => 17,  87 => 14,  83 => 21,  81 => 20,  79 => 19,  75 => 17,  71 => 16,  61 => 12,  52 => 10,  48 => 8,  44 => 7,  38 => 8,  35 => 3,  405 => 235,  396 => 228,  392 => 227,  384 => 222,  380 => 221,  369 => 213,  365 => 212,  357 => 207,  353 => 206,  342 => 198,  338 => 197,  330 => 192,  326 => 191,  321 => 188,  318 => 186,  316 => 138,  314 => 184,  311 => 182,  309 => 181,  307 => 180,  305 => 179,  303 => 153,  301 => 177,  299 => 176,  297 => 137,  295 => 174,  293 => 132,  291 => 172,  289 => 171,  287 => 170,  285 => 169,  283 => 104,  281 => 167,  278 => 165,  273 => 162,  261 => 154,  244 => 103,  236 => 134,  214 => 83,  201 => 105,  188 => 95,  175 => 85,  157 => 70,  152 => 57,  147 => 66,  140 => 51,  135 => 60,  130 => 46,  123 => 54,  118 => 40,  113 => 50,  85 => 22,  76 => 18,  73 => 17,  66 => 5,  63 => 13,  57 => 11,  53 => 9,  49 => 13,  45 => 11,  40 => 5,  37 => 5,  31 => 5,);
    }
}
