# WP Standard Handles

Standard handles for `wp_enqueue_script()`, `wp_enqueue_style()` and `add_image_size()`

## Styles and Scripts

Plugin and theme authors are told they should prefix all of the handles when enqueuing scripts and styles. There are libraries that both plugins and themes may load. So to stop these files being loaded multiple times I have started a standard that we can all use.

`wp_enqueue_style( $handle, $src, $deps, $ver, $media );`
`wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );`

I have started with a few. I am not sure how the Google Web Fonts should be best labelled as there are so many variations.

### Font Awsome
```php
wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.2.0', 'all' );
wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . '/css/font-awesome.min.css', array(), '4.2.0', 'all' );
```

### FitVids
```php
wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1.1', true );
wp_enqueue_script( 'jquery-fitvids', plugin_dir_url( __FILE__ ) . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1.1', true );
```

### FluidVids
```php
wp_enqueue_script( 'fluidvids', get_template_directory_uri() . '/js/fluidvids.min.js', array(), '2.4.1', true );
wp_enqueue_script( 'fluidvids', plugin_dir_url( __FILE__ ) . '/js/fluidvids.min.js', array(), '2.4.1', true );
```

### Google Web Fonts
I have created a bit more advanced version in functions.php
```php
wp_enqueue_style( 'google-font-archivo-narrow', '//fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic&subset=latin,latin-ext', array(), '2014-12-20', 'all' );
```

### enquire.js
```php
wp_enqueue_script( 'enquire.js', get_template_directory_uri() . '/js/enquire.min.js', array(), '2.1.2', true );
wp_enqueue_script( 'enquire.js', plugin_dir_url( __FILE__ ) . '/js/enquire.min.js', array(), '2.1.2', true );
```

### picturefill
```php
wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/js/picturefill.min.js', array(), '2.2.0', true );
wp_enqueue_script( 'picturefill', plugin_dir_url( __FILE__ ) . '/js/picturefill.min.js', array(), '2.2.0', true );
```

### Superfish
```php
wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/superfish.min.js', array( 'jquery' ), '1.7.5', true );
wp_enqueue_script( 'jquery-superfish', plugin_dir_url( __FILE__ ) . '/js/superfish.min.js', array( 'jquery' ), '1.7.5', true );

wp_enqueue_style( 'jquery-superfish', get_template_directory_uri() . '/css/superfish.css', array(), '1.7.5', 'all' );
wp_enqueue_style( 'jquery-superfish', plugin_dir_url( __FILE__ ) . '/css/superfish.css', array(), '1.7.5', 'all' );

wp_enqueue_style( 'jquery-superfish-vertical', get_template_directory_uri() . '/css/superfish-vertical.css', array(), '1.7.5', 'all' );
wp_enqueue_style( 'jquery-superfish-vertical', plugin_dir_url( __FILE__ ) . '/css/superfish-vertical.css', array(), '1.7.5', 'all' );
```

### mustache.js
```php
wp_enqueue_script( 'mustache.js', get_template_directory_uri() . '/js/mustache.min.js', array(), '2.0.0', true );
wp_enqueue_script( 'mustache.js', plugin_dir_url( __FILE__ ) . '/js/mustache.min.js', array(), '2.0.0', true );
```

## Image sizes
Image sizes handles have the same problem as the styles and scripts. Themes and plugins use handles that describe where the images are used. The problem with that is if the handles is defined twice the second definition is used. The recommendation for this reason has been always to prefix the handles. The problem with that is that the handles are saved to the database when the image size is generated. So when you switch from theme you would need to regenerate all of the images even if both themes used the same image dimensions.

By defining a naming standard the plugins and themes can work better with each other. The handles should be named after the dimensions and crop setting. Here are some examples.

```php
add_image_size( $name, $width, $height, $crop );
add_image_size( '900x0', 900, 0, false );
add_image_size( '910x460-crop', 910, 460, true );
add_image_size( '920x470-left-top', 920, 470, array( 'left', 'top' ) );
add_image_size( '930x0-right-center', 930, 0, array( 'right', 'center' ) );
add_image_size( '9999x480-center-bottom', 9999, 480, array( 'center', 'bottom' ) );
```

## Contribution
I welcome contributions from other people. Feel free to create a PR or open an issue.

## Licence
This is licenced under GPLv2
