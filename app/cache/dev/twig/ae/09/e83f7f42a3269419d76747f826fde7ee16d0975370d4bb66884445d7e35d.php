<?php

/* HPTDefaultBundle:Default:index.html.twig */
class __TwigTemplate_ae09e83f7f42a3269419d76747f826fde7ee16d0975370d4bb66884445d7e35d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("HPTDefaultBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'menu_items' => array($this, 'block_menu_items'),
            'menu_usuario' => array($this, 'block_menu_usuario'),
            'contenido' => array($this, 'block_contenido'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "HPTDefaultBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Salvador Allende";
    }

    // line 5
    public function block_menu_items($context, array $blocks = array())
    {
        // line 6
        echo "    <li class=\"active\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("hpt_default_homepage");
        echo "\">Inicio</a></li>
    <li><a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("hpt_quienes_somos");
        echo "\">Qui&eacute;nes Somos</a></li>
    <li><a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("hpt_servicios");
        echo "\">Servicios</a></li>
    <li><a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("hpt_noticias");
        echo "\">Noticias</a></li>
    <li><a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("hpt_contactanos");
        echo "\">Cont&aacute;ctanos</a></li>
";
    }

    // line 13
    public function block_menu_usuario($context, array $blocks = array())
    {
        // line 14
        echo "        <li>";
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("UsuarioBundle:Default:cajaLogin"), array());
        echo "</li>
    ";
    }

    // line 17
    public function block_contenido($context, array $blocks = array())
    {
        // line 18
        echo "
    <!-- banner -->
    <div class=\"benner\">
        <!-- slider -->
        <!--- img-slider --->
        <div class=\"img-slider\">
            <!----start-slider-script---->
            <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/js/responsiveslides.min.js"), "html", null, true);
        echo "\"></script>
            <script>
                // You can also use \"\$(window).load(function() {\"
                \$(function () {
                    // Slideshow 4
                    \$(\"#slider4\").responsiveSlides({
                        auto: true,
                        pager: true,
                        nav: true,
                        speed: 500,
                        namespace: \"callbacks\",
                        before: function () {
                            \$('.events').append(\"<li>before event fired.</li>\");
                        },
                        after: function () {
                            \$('.events').append(\"<li>after event fired.</li>\");
                        }
                    });
                });
            </script>
            <!----//End-slider-script---->
            <!-- Slideshow 4 -->
            <div  id=\"top\" class=\"callbacks_container\">
                <ul class=\"rslides\" id=\"slider4\">
                    <li>
                        <img class=\"img-responsive\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/images/DSC00493.JPG"), "html", null, true);
        echo "\" alt=\"\">
                        <div class=\"slider-caption\">
                            <a href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("hpt_quienes_somos");
        echo "\"><h2 style=\"color: rgb(42, 129, 254);\">¿A QUE ASPIRAMOS?</h2></a>
                            <p style=\"text-align: justify\">Trabajar por la satisfacción plena de nuestros pacientes y población y por consolidar una adecuada práctica médica que garantice la calidad de nuestros Hospitales.</p>
                            <a class=\"caption-btn\" href=\"";
        // line 54
        echo $this->env->getExtension('routing')->getPath("hpt_quienes_somos");
        echo "\">Leer m&aacute;s</a>
                        </div>
                    </li>
                    <li>
                        <img src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/images/eche.jpg"), "html", null, true);
        echo "\" alt=\"\">
                        <div class=\"slider-caption\">
                            <a href=\"";
        // line 60
        echo $this->env->getExtension('routing')->getPath("hpt_servicios");
        echo "\"><h2 style=\"color: rgb(42, 129, 254);\">DOCENCIA</h2></a>
                            <p style=\"text-align: justify\">Brindamos Docencia Médica Superior y de Licenciatura en Enfermería, así como Docencia Médica Media y pertenecemos a la Facultad del mismo nombre Dr. Salvador Allende.</p>
                            <a class=\"caption-btn\" href=\"";
        // line 62
        echo $this->env->getExtension('routing')->getPath("hpt_servicios");
        echo "\">Leer m&aacute;s</a>
                        </div>
                    </li>
                    <li>
                        <img src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/images/cirugia.png"), "html", null, true);
        echo "\" alt=\"\">
                        <div class=\"slider-caption\">
                            <a href=\"";
        // line 68
        echo $this->env->getExtension('routing')->getPath("hpt_quienes_somos");
        echo "\"><h2 style=\"color: rgb(42, 129, 254);\">&Aacute;REA DE ATRACCI&Oacute;N</h2></a>
                            <p style=\"text-align: justify\">Atendemos una población aproximada de 500 000 habitantes, distribuidos en 12 áreas de Atención Primaria de Salud en Ciudad de La Habana y en 9 Municipios de provincia Habana.</p>
                            <a class=\"caption-btn\" href=\"";
        // line 70
        echo $this->env->getExtension('routing')->getPath("hpt_quienes_somos");
        echo "\">Leer m&aacute;s</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class=\"clearfix\"> </div>
        </div>
        <!-- slider -->
    </div>
    <!-- /banner -->
    <!-- top-grids -->
    <div class=\"top-grids text-center\">
        <div class=\"container\">
            <div class=\"col-md-3\">
                <div class=\"top-grid\" style=\"height: 300px;\">
                    <a href=\"";
        // line 85
        echo $this->env->getExtension('routing')->getPath("servicio_categoria", array("categoria" => "SERVICIOS DE MEDICINA LEGAL"));
        echo "\">
                        <span class=\"t-icon1\" onmouseover=\"this.style.opacity=0.5\"
                          onmouseout=\"this.style.opacity=1\"> </span>
                        <h3>MEDICINA LEGAL</h3>
                    </a>
                    <p>Arreglos faciales por encargo!</p>
                </div>
            </div>
            <div class=\"col-md-3\">
                <div class=\"top-grid\" style=\"height: 300px;\">
                    <a href=\"";
        // line 95
        echo $this->env->getExtension('routing')->getPath("servicio_categoria", array("categoria" => "SERVICIO DE ADMISION"));
        echo "\">
                        <span class=\"t-icon2\" onmouseover=\"this.style.opacity=0.5\"
                              onmouseout=\"this.style.opacity=1\"> </span>
                        <h3>TERAPIA OCUPACIONAL</h3>
                    </a>
                    <p>Realizaci&oacute;n de trabajos manuales, entre otras cosas.</p>
                </div>
            </div>
            <div class=\"col-md-3\">
                <div class=\"top-grid\" style=\"height: 300px;\">
                    <a href=\"";
        // line 105
        echo $this->env->getExtension('routing')->getPath("servicio_categoria", array("categoria" => "TERAPIA OCUPACIONAL"));
        echo "\">
                        <span class=\"t-icon3\" onmouseover=\"this.style.opacity=0.5\"
                              onmouseout=\"this.style.opacity=1\"> </span>
                        <h3>Resumenes médicos</h3>
                    </a>
                    <p>Se realizan resumenes m&eacute;dicos a petici&oacute;n del paciente.</p>
                </div>
            </div>
            <div class=\"col-md-3\">
                <div class=\"top-grid\" style=\"height: 300px;\">
                    <a href=\"";
        // line 115
        echo $this->env->getExtension('routing')->getPath("servicio_categoria", array("categoria" => "SERVICIO DE AMBULANCIA Y AUTOS"));
        echo "\">
                        <span class=\"t-icon4\" onmouseover=\"this.style.opacity=0.5\"
                              onmouseout=\"this.style.opacity=1\"> </span>
                        <h3>AMBULANCIA Y AUTOS</h3>
                    </a>
                    <p>Servicio de transportaci&oacute;n por ambulancia y autos desde diferentes sitios.</p>
                </div>
            </div>
            <div class=\"clearfix\"> </div>
        </div>

    </div>

    <!--FIN Imagen con la explicacion visible en mouseover-->

    <!-- /top-grids -->
    <!-- mid-grids -->
    <div class=\"mid-grids\">
        <div class=\"col-md-6 mid-grid-left\"
             style=\"background: url('";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/hptdefault/images/DSC00029.JPG"), "html", null, true);
        echo "')
                     no-repeat scroll 0 0 / cover rgba(0, 0, 0, 0);\">
        </div>

        <div class=\"col-md-6 mid-grid-right\">
            <a href=\"";
        // line 139
        echo $this->env->getExtension('routing')->getPath("hpt_quienes_somos");
        echo "\"><h2>Qui&eacute;nes somos</h2></a>
            <p style=\"text-align: justify\">
                Hospital Provincial Cl&iacute;nico Quir&uacute;rgico, categor&iacute;a II, de estructura horizontal,
                pabellonal, con 136 000 m&sup2; de \textensión. Cuenta con 40 edificaciones, de ellas 24 salas de
                hospitalización, que atiende a la población del pa&iacute;s.
            </p>
            <p style=\"text-align: justify\">Contamos con:</p>
            <ul>
                <li><p style=\"text-align: justify\">30 Especialidades médicas.</p></li>
                <li><p style=\"text-align: justify\">Equipamiento médico para dar soporte a todas las especialidades.</p></li>
                <li><p style=\"text-align: justify\">Medios diagnósticos de alta tecnología: TAC monocorte, TAC multicorte (Angio TAC).</p></li>
            </ul>
            <p style=\"text-align: justify\">Direcci&oacute;n: 12 e/ 12 y 22 #1299 Municipio, Habana.</p>
            <p style=\"text-align: justify\">Tel&eacute;fonos: 881-23909-321, 213-23213-123</p>
            ";
        // line 154
        echo "            <a class=\"about-btn\" href=\"";
        echo $this->env->getExtension('routing')->getPath("hpt_quienes_somos");
        echo "\">Leer m&aacute;s</a>
        </div>
        <div class=\"clearfix\"> </div>
    </div>
    <!-- /mid-grids -->
    <!-- bottom-grids -->

    <div class=\"bottom-grids\">
        <a href=\"";
        // line 162
        echo $this->env->getExtension('routing')->getPath("hpt_noticias");
        echo "\"><h2>&Uacute;ltimas Noticias</h2></a>

    ";
        // line 165
        echo "
        ";
        // line 167
        echo "            ";
        // line 168
        echo "                ";
        // line 169
        echo "                    ";
        // line 170
        echo "                         ";
        // line 171
        echo "                         ";
        // line 172
        echo "                ";
        // line 173
        echo "                ";
        // line 174
        echo "                    ";
        // line 175
        echo "                    ";
        // line 176
        echo "                ";
        // line 177
        echo "                ";
        // line 178
        echo "            ";
        // line 179
        echo "        ";
        // line 180
        echo "        ";
        // line 181
        echo "            ";
        // line 182
        echo "
                ";
        // line 184
        echo "            ";
        // line 185
        echo "        ";
        // line 186
        echo "
    ";
        // line 188
        echo "        <div class=\"bottom-grid bottom-grid1\">
            <div class=\"container\">
                <div class=\"col-md-3 bottom-grid-left\">
                    <a href=\"";
        // line 191
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noticias_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 0, array(), "array"), "id"))), "html", null, true);
        echo "\">
                        <img src=\"";
        // line 192
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("uploads/images/" . $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 0, array(), "array"), "rutaFoto"))), "html", null, true);
        echo "\" title=\"name\"
                                     onmouseover=\"this.style.opacity=0.5\"
                                     onmouseout=\"this.style.opacity=1\" style=\"height: 130px; width: 100%;\"/></a>
                </div>
                <div class=\"col-md-9 bottom-grid-right\">
                    <p style=\"text-align: justify\">";
        // line 197
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 0, array(), "array"), "texto"), "html", null, true);
        echo "</p>
                    <a class=\"news-btn\" href=\"";
        // line 198
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noticias_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 0, array(), "array"), "id"))), "html", null, true);
        echo "\">Leer m&aacute;s</a>
                </div>
                <div class=\"clearfix\"> </div>
            </div>
        </div>
        <div class=\"bottom-grid bottom-grid2\">
            <div class=\"container\">
                <div class=\"col-md-3 bottom-grid-left\">
                    <a href=\"";
        // line 206
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noticias_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 1, array(), "array"), "id"))), "html", null, true);
        echo "\">
                        <img src=\"";
        // line 207
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("uploads/images/" . $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 1, array(), "array"), "rutaFoto"))), "html", null, true);
        echo "\" title=\"name\"
                                     onmouseover=\"this.style.opacity=0.5\"
                                     onmouseout=\"this.style.opacity=1\" style=\"height: 130px; width: 100%;\"/></a>
                </div>
                <div class=\"col-md-9 bottom-grid-right\">
                    <p style=\"text-align: justify\">";
        // line 212
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 1, array(), "array"), "texto"), "html", null, true);
        echo "</p>
                    <a class=\"news-btn\" href=\"";
        // line 213
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noticias_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 1, array(), "array"), "id"))), "html", null, true);
        echo "\">Leer m&aacute;s</a>
                </div>
                <div class=\"clearfix\"> </div>
            </div>
        </div>
        <div class=\"bottom-grid bottom-grid3\">
            <div class=\"container\">
                <div class=\"col-md-3 bottom-grid-left\">
                    <a href=\"";
        // line 221
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noticias_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 2, array(), "array"), "id"))), "html", null, true);
        echo "\">
                        <img src=\"";
        // line 222
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(("uploads/images/" . $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 2, array(), "array"), "rutaFoto"))), "html", null, true);
        echo "\" title=\"name\"
                                     onmouseover=\"this.style.opacity=0.5\"
                                     onmouseout=\"this.style.opacity=1\" style=\"height: 130px; width: 100%;\"/></a>
                </div>
                <div class=\"col-md-9 bottom-grid-right\">
                    <p style=\"text-align: justify\">";
        // line 227
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 2, array(), "array"), "texto"), "html", null, true);
        echo "</p>
                    <a class=\"news-btn\" href=\"";
        // line 228
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("noticias_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), 2, array(), "array"), "id"))), "html", null, true);
        echo "\">Leer m&aacute;s</a>
                </div>
                <div class=\"clearfix\"> </div>
            </div>
        </div>
        <div class=\"clearfix\"> </div>
        ";
        // line 235
        echo "    </div>

    <!-- /bottom-grids -->
";
    }

    public function getTemplateName()
    {
        return "HPTDefaultBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  405 => 235,  396 => 228,  392 => 227,  384 => 222,  380 => 221,  369 => 213,  365 => 212,  357 => 207,  353 => 206,  342 => 198,  338 => 197,  330 => 192,  326 => 191,  321 => 188,  318 => 186,  316 => 185,  314 => 184,  311 => 182,  309 => 181,  307 => 180,  305 => 179,  303 => 178,  301 => 177,  299 => 176,  297 => 175,  295 => 174,  293 => 173,  291 => 172,  289 => 171,  287 => 170,  285 => 169,  283 => 168,  281 => 167,  278 => 165,  273 => 162,  261 => 154,  244 => 139,  236 => 134,  214 => 115,  201 => 105,  188 => 95,  175 => 85,  157 => 70,  152 => 68,  147 => 66,  140 => 62,  135 => 60,  130 => 58,  123 => 54,  118 => 52,  113 => 50,  85 => 25,  76 => 18,  73 => 17,  66 => 14,  63 => 13,  57 => 10,  53 => 9,  49 => 8,  45 => 7,  40 => 6,  37 => 5,  31 => 3,);
    }
}
