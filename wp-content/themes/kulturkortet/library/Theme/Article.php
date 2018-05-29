<?php

namespace Kulturkortet;

class Article extends \Kulturkortet\Entity\PostType
{
    public static $postTypeSlug;
    public static $categoryTaxonomySlug;

    public function __construct()
    {
        //Main post type
        self::$postTypeSlug = $this->postType();

        //Taxonomy
        self::$categoryTaxonomySlug = $this->taxonomyCategory();

        //Remove template
        add_filter('Municipio/CustomPostType/ExcludedPostTypes', array($this, 'excludePostType'));
    }

    // Exclude this post type from page template filter.
    public function excludePostType($postTypes)
    {
        $postTypes[] = $this->postType();
        return $postTypes;
    }

    /**
     * Create post type
     * @return string
     */
    public function postType() : string
    {
        // Create posttype
        $postType = new \Kulturkortet\Entity\PostType(
            _x('Articles', 'Post type plural', 'Kulturkortet'),
            _x('Article', 'Post type singular', 'Kulturkortet'),
            'article',
            array(
                'description'          =>   __('Stores articles for kulturkortet.', 'Kulturkortet'),
                'menu_icon'            =>   'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMzY4LjA0MSAzNjguMDQxIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzNjguMDQxIDM2OC4wNDE7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPjxnPjxwYXRoIGQ9Ik0xMTMuMTczLDE2My45NjdjMTYuODU0LDM3LjE5NCw1Mi45MzcsNTMuMzg0LDcwLjg0Nyw1My4zODRjMTEuNzc2LDAsMzEuNDA5LTcuMDA1LDQ4LjI2Ny0yMi4zNzIgICBjLTYuMTY0LDAuNDMtMTIuNzUyLDAuNjQ4LTE5Ljc5MiwwLjY0OGMtMS42NTIsMC0zLjM4NS0wLjAxNS01LjIzNy0wLjA0NGMtMy41NDksMi43MzMtNy45NDUsNC4yNzQtMTIuNTA3LDQuMjc0aC0xNSAgIGMtMTEuMzA0LDAtMjAuNS05LjE5Ni0yMC41LTIwLjVjMC0xMS4zMDQsOS4xOTYtMjAuNSwyMC41LTIwLjVoMTVjNS40MTksMCwxMC40ODcsMi4xMTIsMTQuMjQ2LDUuNzU1ICAgYzEuMjQ5LDAuMDE0LDIuNDgsMC4wMiwzLjY4OCwwLjAyYzE5LjM2NCwwLDMyLjEyNS0xLjc3Niw0MC40NzMtMy45MThjLTEuMDgzLTIuNjM1LTEuNjczLTUuNTE4LTEuNjczLTguNTI4di01MS45NzcgICBjMC01LjQwNywyLjAwNy0xMC41OSw1LjQ3Ny0xNC41OTRjLTEuODUyLTE0LjQxNS01LjIxMy0yNS40Mi0xMC4yMjktMzMuNTM4Yy0xMC4zMzYtMTYuNzI5LTMwLjI2NC0yNC41Mi02Mi43MTMtMjQuNTIgICBjLTI2LjkxOSwwLTQ1LjUwOCw1LjU4OC01Ni44MjgsMTcuMDgzYy04Ljc3NSw4LjkxMS0xMy44NiwyMS42MjYtMTYuMjM3LDQwLjgyOWMzLjU0OCw0LjAxOSw1LjYsOS4yNTUsNS42LDE0Ljc0djUxLjk3NyAgIEMxMTYuNTU2LDE1Ni41MTEsMTE1LjMxMywxNjAuNTQ3LDExMy4xNzMsMTYzLjk2N3oiIGZpbGw9IiNGRkZGRkYiLz48cGF0aCBkPSJNNzYuMjkyLDE2NC40NTdoMTcuOTk0YzYuNzc0LDAsMTIuMjctNS40OTQsMTIuMjctMTIuMjcxdi01MS45NzdjMC00LjUyOC0yLjQ1OS04LjQ3My02LjEwNy0xMC41OTkgICBjNC4wMTgtNDIuNTYxLDIwLjQ0Mi03Mi4wNTQsODMuNTcyLTcyLjA1NGMzNi4yNTMsMCw1OC44ODQsOS4zLDcxLjIyLDI5LjI2NWM3LjE3OCwxMS42MTgsMTAuNjMxLDI2LjYyNCwxMi4yNDQsNDIuODUzICAgYy0zLjU5LDIuMTQxLTYsNi4wNTEtNiwxMC41MzR2NTEuOTc3YzAsNS44NDMsNC4wODgsMTAuNzIyLDkuNTU3LDExLjk1OWMtNy45MzIsNS4xODgtMjQuMzU0LDEwLjQ4Ny01OC4zNTcsMTAuNDg3ICAgYy0yLjc1NCwwLTUuNjI1LTAuMDM1LTguNjE1LTAuMTA3Yy0xLjc1LTMuMzY1LTUuMjYyLTUuNjY4LTkuMzE4LTUuNjY4aC0xNC45OTljLTUuNzk4LDAtMTAuNSw0LjcwMS0xMC41LDEwLjUgICBjMCw1Ljc5OSw0LjcwMiwxMC41LDEwLjUsMTAuNWgxNC45OTljMy41MDQsMCw2LjYtMS43MjMsOC41MDYtNC4zNmMzLjE1OCwwLjA4LDYuMjUsMC4xMyw5LjIzOCwwLjEzICAgYzM4LjMyOC0wLjAwMSw2Mi42OTMtNi41NDMsNzIuNTYxLTE5LjUyM2MwLjQyLTAuNTUyLDAuODAzLTEuMTAyLDEuMTUyLTEuNjQ2aDUuNTQzYzYuNzc1LDAsMTIuMjctNS40OTQsMTIuMjctMTIuMjcxdi01MS45NzcgICBjMC02Ljc3Ni01LjQ5NC0xMi4yNy0xMi4yNy0xMi4yN2gtNi43NjhjLTEuOTA0LTE5LjYwOC02LjEyNS0zNi4zLTE0LjgwNy01MC4zNDhDMjU0LjU0OSwxMi4yOTYsMjI2LjM2NSwwLDE4NC4wMiwwICAgYy00Mi4zNDgsMC03MC41MjksMTIuMjk2LTg2LjE1OCwzNy41OTJjLTguNjgxLDE0LjA0OC0xMi45LDMwLjczOC0xNC44MDUsNTAuMzQ4aC02Ljc2NmMtNi43NzcsMC0xMi4yNzEsNS40OTMtMTIuMjcxLDEyLjI3ICAgdjUxLjk3N0M2NC4wMiwxNTguOTYzLDY5LjUxNSwxNjQuNDU3LDc2LjI5MiwxNjQuNDU3eiIgZmlsbD0iI0ZGRkZGRiIvPjxwYXRoIGQ9Ik0zMzIuMzY4LDMxNy4yOTljLTQuMDgtMjUuMzY3LTEyLjQ3OS01OC4wNDMtMjkuMzI0LTY5LjY1M2MtMTEuNDg2LTcuOTIxLTUxLjU4Ni0yOS4zNDYtNjguNzA5LTM4LjQ5NGwtMC4zNi0wLjE5MiAgIGMtMS45Ni0xLjA0Ny00LjM1MS0wLjgzNy02LjA5OCwwLjUzNGMtOC45ODMsNy4wNTEtMTguODE3LDExLjgwMS0yOS4yMjgsMTQuMTE4Yy0xLjg0LDAuNDA5LTMuMzUxLDEuNzE4LTQuMDIsMy40OGwtMTAuNjA5LDI3Ljk2MSAgIGwtMTAuNjA5LTI3Ljk2MWMtMC42NjktMS43NjMtMi4xOC0zLjA3MS00LjAyLTMuNDhjLTEwLjQxMS0yLjMxNy0yMC4yNDctNy4wNjctMjkuMjMxLTE0LjExOCAgIGMtMS43NDYtMS4zNzItNC4xMzgtMS41ODItNi4wOTctMC41MzRjLTE2LjkzMiw5LjA0Ni01Ny41NTEsMzAuOTIxLTY5LjAxOSwzOC42NTJjLTE5LjM5OSwxMy4wNjktMjcuODcxLDYwLjM0NC0yOS4zNzIsNjkuNjg4ICAgYy0wLjE0OSwwLjkyNy0wLjA2MywxLjg3NSwwLjI1LDIuNzU5YzAuNjk0LDEuOTYsMTguNDg4LDQ3Ljk4MywxNDguMDk3LDQ3Ljk4M2MxMjkuNjA3LDAsMTQ3LjQwMy00Ni4wMjMsMTQ4LjA5OC00Ny45ODIgICBDMzMyLjQzMSwzMTkuMTc0LDMzMi41MTcsMzE4LjIyNSwzMzIuMzY4LDMxNy4yOTl6IE0yNzIuMDIsMjg4LjE2OWgtNTEuMzM0di0xMC44MTFoNTEuMzM0VjI4OC4xNjl6IiBmaWxsPSIjRkZGRkZGIi8+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjwvc3ZnPg==',
                'public'               =>   true,
                'publicly_queriable'   =>   true,
                'show_ui'              =>   true,
                'show_in_nav_menus'    =>   true,
                'has_archive'          =>   true,
                'rewrite'              =>   array(
                    'slug'       =>   __('article', 'Kulturkortet'),
                    'with_front' =>   false
                ),
                'hierarchical'          =>  true,
                'exclude_from_search'   =>  true,
                'taxonomies'            =>  array(),
                'supports'              =>  array('title', 'revisions', 'editor','comments', 'page-attributes')
            )
        );

        //Category in list
        $postType->addTableColumn(
            'category',
            __('Categories', 'Kulturkortet'),
            true,
            function ($column, $postId) {
                $i = 0;
                $categories = get_the_terms($postId, self::$categoryTaxonomySlug);

                if (empty($categories)) {
                    echo __("Uncategorized", 'Kulturkortet');
                } else {
                    foreach ((array)$categories as $category) {
                        echo isset($category->name) ? $category->name : '';
                    }
                }
            }
        );

        return $postType->slug;
    }

    /**
     * Create category taxonomy
     * @return string
     */
    public function taxonomyCategory() : string
    {
        //Register new taxonomy
        $categories = new Entity\Taxonomy(
            __('Categories', 'Kulturkortet'),
            __('Category', 'Kulturkortet'),
            'article-category',
            array('article'),
            array(
                'hierarchical' => true
            )
        );

        //Add filter
        new Entity\Filter(
            'article-category',
            'article'
        );

        //Return taxonomy slug
        return $categories->slug;
    }
}
