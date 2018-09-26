	{*<div class="menubarWrap">
		<div class="wrapper">
			<ul class="menubarUl">
				<li><a href="{$SITE_BASEURL}">{$LANG.menu_home}</a></li>
				<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurant_innerpage.php?browse=all{else}restaurants/all{/if}">{$LANG.menu_restaurants}</a></li>
				<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}restaurant_innerpage.php?browse=offers{else}restaurants/offers{/if}">{$LANG.menu_offers}</a></li>
				<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}faq.php{else}faq{/if}">{$LANG.menu_faq}</a></li>
				{section name="how" loop=$howContentList}
					<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}staticPage.php?contentpage={$howContentList[how].content_seourl}{else}p/{$howContentList[how].content_seourl}{/if}">{$howContentList[how].content_title|ucfirst|stripslashes}</a></li>
				{/section}
				<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'N' or $FB_DOMAIN_NAME eq 'fb' or $FB_DOMAIN_NAME eq 'facebook'}contactUs.php{else}contact-us{/if}">{$LANG.menu_contact}</a></li>
			</ul>
		</div>
	</div>	*}

<br>

<div class="row">
	{*<div class="col-md-12" style="height: 30px; width: 1000px;">
		<img style="max-width: 100%; max-height: 100%;" class="" src="theme/default/images/Reticula.png">
		

	</div> *}
	<div class="col-md-12 carlos">
		

	</div> 


</div>


<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button> 
    {*<a class="navbar-brand" href="#">Logotipo</a>*}
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">¿Quienes somos?</a></li>
      <li><a href="#">Noticias</a></li>
      <li><a href="#">Tiendas</a></li>
      <li><a href="#">Promociones</a></li>
      <li><a href="#">Menú</a></li>
      <li><a href="#">Franquicias</a></li>
      <li><a href="#">Contáctanos</a></li>
      <li><a href="#">Empleo</a></li>
      {*<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Menú #1 <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Acción #1</a></li>
          <li><a href="#">Acción #2</a></li>
          <li><a href="#">Acción #3</a></li>
          <li class="divider"></li>
          <li><a href="#">Acción #4</a></li>
          <li class="divider"></li>
          <li><a href="#">Acción #5</a></li>
        </ul>
      </li> *}
    </ul>
 
    {*<form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">Enviar</button>
    </form> *}
 
    {*<ul class="nav navbar-nav navbar-right">
      <li><a href="#">Enlace #3</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Menú #2 <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Acción #1</a></li>
          <li><a href="#">Acción #2</a></li>
          <li><a href="#">Acción #3</a></li>
          <li class="divider"></li>
          <li><a href="#">Acción #4</a></li>
        </ul>
      </li>
    </ul> *}
  </div>
</nav>