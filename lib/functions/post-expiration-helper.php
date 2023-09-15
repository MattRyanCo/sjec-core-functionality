<?php
/**
 * Post Expiration Helper
 *
 * This file contains any functions realted to programmatically helping 
 * the Post Expirator / PublishPress Future plugin. 
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/MattRyanCo/sjec-core-functionality
 * @author       Matt Ryan
 */


 if (defined('PUBLISHPRESS_FUTURE_LOADED')) {
    /**
     * Expiration types:
     *
     *  - draft
     *  - delete
     *  - trash
     *  - private
     *  - stick
     *  - unstick
     *  - category
     *  - category-add
     *  - category-remove
     *
     *  For "category", add additional attributes:
     *   'category' => $categoryId,
     *   'categoryTaxonomy' => $taxonomyName
     */
    $options   = [
        'expireType' => 'category-add',
        'id'         => $postId,
		'category'	 => 'stop-display',
    ];
    $postId    = 16272;
    $timestamp = date('U', strtotime('2024-09-15 10:00:00'));
    do_action(
        'publishpressfuture_schedule_expiration',
        $postId,
        $timestamp,
        $options
    );
}