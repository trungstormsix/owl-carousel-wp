owl Carosel - oCoder
===============

Welcome to oCoder owl Carosel plugin. This plugin is build base on [Herbert] (http://getherbert.com/) and [owl carousel](https://github.com/OwlFonk/OwlCarousel).

### 1.Getting Started
+ Clone plugin
+ Install [composer] (https://getcomposer.org/) or learn how to use composer
+ Run composer install in the plugin folder to get library 
```code
...\plugin\owlCarousel>composer install
```
at this version, the herbert framework do not match with wordpress 4.5.2 so, please do the following code:
Change the colation in ...\plugin\owlCarousel\vendor\getherbert\framework\Herbert\Framework\Providers\HerbertServiceProvider.php
```code
	'collation' => DB_COLLATE ?: 'utf8mb4_general_ci',
```
(using utf8mb4_general_ci if DB_CHARSET is using utf8mb4)
### 2. Active plugin in wordpress admin
### 3. Test front page
go to the url: 
```urls
http://yourhost/carousel
http://yourhost/carousel/$id
http://yourhost/carousel-controller
http://yourhost/carousel-controller/$id

```
### 4. Using shortcode
add this shortcode to any post or page to show carousel: 
```code
[oCoder-owl-carousel carousel_id="your_id"]
[oCoder-owl-carousel-controller carousel_id="your_id"]
```


