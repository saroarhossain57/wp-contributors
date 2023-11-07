<?php
namespace WPContributors\Admin;

class MetaBox {

    public function __construct()
    {
        global $pagenow;

        if ($pagenow && ($pagenow === 'post.php' || $pagenow === 'post-new.php')) {
            add_action( 'add_meta_boxes', [$this, 'add_metabox']);
            add_action( 'save_post', [$this, 'save_metabox'], 10, 2 );
        }
    }

    public function add_metabox(){
        add_meta_box(
			'wpc_meta_box',
			__( 'Contributors', 'wp-contributors' ),
			array( $this, 'render_metabox' ),
			'post',
			'advanced',
			'default'
		);
    }

    public function render_metabox(){
        echo "Hello";
    }

    public function save_metabox( $post_id, $post ){

    }

}