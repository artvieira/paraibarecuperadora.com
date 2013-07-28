<?php 
	$construcao = true;

	if ($construcao) {
?>

<article style="text-align: center;">
<h1>Em construção...</h1>
</article>

<?php
	
	} else {
?>

<style>
    #slides {
      display: none
    }

    #slides .slidesjs-navigation {
      margin-top:3px;
    }

    #slides .slidesjs-previous {
      margin-right: 5px;
      float: left;
    }

    #slides .slidesjs-next {
      margin-right: 5px;
      float: left;
    }

    .slidesjs-pagination {
      margin: 6px 0 0;
      float: right;
      list-style: none;
    }

    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    .slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(/img/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    #slides a:link,
    #slides a:visited {
      color: #333
    }

    #slides a:hover,
    #slides a:active {
      color: #9e2020
    }

    .navbar {
      overflow: hidden
    }
</style>

<section class="container">
	<section id="slides">
		<img src="/images/slides/img1.jpg" width="570px" height="450px" alt="Slide 1"/>
		<img src="/images/slides/img2.jpg" width="570px" height="450px" alt="Slide 2"/>
		<img src="/images/slides/img3.png" width="570px" height="450px" alt="Slide 3"/>
		
		<a href="#" class="slidesjs-previous slidesjs-navigation"><img src="/images/prev.png"></a>
		<a href="#" class="slidesjs-next slidesjs-navigation"><img src="/images/next.png"></a>
	</section>
</section>


<section>
	<h1>Clientes</h1>

	<p>LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO 
	LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO 
	LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO 
	LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO 
	LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO LOGO </p>
</section>
<?php 
}
?>