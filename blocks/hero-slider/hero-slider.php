<?php
    $blockID = generateBlockId();

    $anchor = '';
    if ( ! empty( $block['anchor'] ) ) {
        $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
    }

    $class_name = 'block--homeHero';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }

    $sectionTitle = get_field( 'title' ) ?: 'Section title here...';
    $subTitle =  get_field( 'sub_title' ) ?: 'Section sub title here...';
    $sliderCafles = get_field( 'slides' ) ?: array(
        0=>array(
            "title"     =>  "Heading",
            "sub_title" =>  "Your desired sub title or description",
            "icon"      =>  array(
                "ID"        =>  23,
                "title"     =>  "logo-wordpress",
                "url"       =>  wp_get_upload_dir()['baseurl']."/2023/01/logo-wordpress.svg"
            )
        ),
        1=>array(
            "title"     =>  "Heading",
            "sub_title" =>  "Your desired sub title or description"
        ),
        2=>array(
            "title"     =>  "Heading",
            "sub_title" =>  "Your desired sub title or description"
        )
    );
?>
<section <?php echo $anchor; ?> class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container">
        <h1 class="text-center"><?php echo $sectionTitle; ?></h1>
        <p class="text-center font--size--20"><?php echo $subTitle; ?></p>
        <div class="row block--homeHero--slider align-items-center <?php if( count($sliderCafles) > 3){ ?>justify-content-between<?php }else{ ?>justify-content-center<?php } ?> flex-sm-nowrap">
            <div class="col-auto block--homeHero--slider--control g-0 order-2 order-sm-1 mt-2 mt-sm-0">
                <div class="left" onclick="<?php echo $blockID; ?>.slidePrev()"></div>
            </div>
            <div class="col-sm-11 col-12 order-1 order-sm-2">
                <div class="swiper <?php echo $blockID; ?>">
                    <div class="swiper-wrapper">
                        <?php foreach($sliderCafles as $sliderCafle){ ?>
                            <div class="swiper-slide">
                                <div class="block--homeHero--slider--single">
                                    <h3><?php echo $sliderCafle['title'] ?></h3>
                                    <p><?php echo $sliderCafle['sub_title'] ?></p>
                                    <?php if( !empty( $sliderCafle['icon']['url'] ) ){ ?>
                                        <img src="<?php echo $sliderCafle['icon']['url'] ?>" alt="<?php echo $sliderCafle['icon']['title'] ?>">
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-auto block--homeHero--slider--control g-0 order-3 mt-2 mt-sm-0">
                <div class="right" onclick="<?php echo $blockID; ?>.slideNext()"></div>
            </div>
        </div>
    </div>
</section>
<script>
    var <?php echo $blockID; ?> = new Swiper(".<?php echo $blockID; ?>", {
        slidesPerView: 1,
        breakpoints: {
          640: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 3,
          }
        },
        loop: true
    });
</script>
<?php wp_reset_query( ); wp_reset_postdata( ); ?>