<?php

    /**
        * Add theme support
    */
    function psd2css_setup(){
        //ADD TITLE TAG
        add_theme_support( 'title-tag' );

        //ENABLE POST THUMBNAIL
        add_theme_support( 'post-thumbnails' );

        //REGISTER MENU
        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Primary', 'psd2css' ),
            )
        );

        //ADD SUPPORT FOR CUSOTOM LOGO
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 40,
                'width'       => 160,
            )
        );
    }
    add_action( 'after_setup_theme', 'psd2css_setup' );
    
    /**
        * Enqueue scripts and styles.
    */
    wp_enqueue_style( 'psd2css-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'psd2css-swiper', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css' );
    wp_enqueue_style( 'psd2css-style', get_template_directory_uri().'/assets/css/app.css' );

    wp_enqueue_script( 'swiper-js','https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js' );
    /**
        * Add SVG support
     */
    add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
        $filetype = wp_check_filetype( $filename, $mimes );
        return [
            'ext'             => $filetype['ext'],
            'type'            => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];
    }, 10, 4 );
    function cc_mime_types( $mimes ){
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
    add_filter( 'upload_mimes', 'cc_mime_types' );

    /**
        * Register blocks
     */
    function register_acf_psd2css_blocks() {
        register_block_type( __DIR__ . '/blocks/hero-slider' );
        register_block_type( __DIR__ . '/blocks/home-content' );
    }
    add_action( 'init', 'register_acf_psd2css_blocks' );


    /**
        * Generate block ID
    */
    function generateBlockId($length = 6) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }