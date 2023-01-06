<?php
    $anchor = '';

    if ( ! empty( $block['anchor'] ) ) {
        $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
    }

    $class_name = 'block--homeContent';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }
    
    $sectionTitle = get_field( 'title' ) ?: 'Section title here...';
    $subTitle =  get_field( 'sub_title' ) ?: 'Section sub title here...';
    $sectionSecondTitle =  get_field( 'second_title' ) ?: 'Second heading here...';
    $cafles = get_field( 'cafles' ) ?: array(
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
        <h2 class="text-center"><?php echo $sectionSecondTitle; ?></h3>
        <div class="row block--homeContent--row justify-content-center">
        <?php foreach($cafles as $singleCafle){ ?>
            <div class="col-lg-4 col-sm-6 col-12 g-0 mt-4 mt-lg-0">
                <div class="block--homeHero--slider--single">
                    <h3><?php echo $singleCafle['title'] ?></h3>
                    <p><?php echo $singleCafle['sub_title'] ?></p>
                    <?php if( !empty( $singleCafle['icon']['url'] ) ){ ?>
                        <img src="<?php echo $singleCafle['icon']['url'] ?>" alt="<?php echo $sliderCafle['icon']['title'] ?>">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>