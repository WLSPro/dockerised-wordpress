<?php
if (!function_exists('home_improvement_social_sharing')) {

    /**
     *
     * @param String $link Link to share
     * @param String $text the text content to share
     * @param String $title the title to share
     * @param String $tag the wrap html tag
     * @return html
     * @global home_improvement_social_sharing()
     */
    function home_improvement_social_sharing($link, $text, $title, $tag = '')
    {
        $newWindow = 'onclick="return socialOpenWindow(this.href);"';
        $title_without_encode = $title;
        $title = urlencode($title);

        $text = urlencode($text);
        $link = urlencode($link);
        $html = '<ul>';
        //  if (get_field('sharing_facebook')) {
        $shareLink = 'https://www.facebook.com/sharer.php?s=100&amp;t=' . $title . '&amp;u=' . $link;
        if (is_single() && has_post_thumbnail()) {
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src($thumb_id, 'large', true);
            $shareLink .= '&amp;picture=' . $thumb_url[0];
        }
        $html .= ($tag ? '<' . $tag . '>' : '') . '<li><a target="_blank" href="' . esc_url($shareLink) . '" title="' . esc_attr_x('Share on Facebook', 'title', 'home-improvement') . '" ' . $newWindow . '><i class="fab fa-facebook-square"></i></a></li>' . ($tag ? '</' . $tag . '>' : '');
        //  }
        // if (get_field('sharing_twitter')) {
        $shareLink = 'https://twitter.com/share?url=' . $link . '&amp;text=' . $title;
        $html .= ($tag ? '<' . $tag . '>' : '') . '<li><a target="_blank" href="' . esc_url($shareLink) . '" title="' . esc_attr_x('Share on Twitter', 'title', 'home-improvement') . '" ' . $newWindow . '><i class="fab fa-x-twitter"></i></a></li>' . ($tag ? '</' . $tag . '>' : '');
        // }
        //if (get_field('sharing_linkedin')) {
        $shareLink = 'https://www.linkedin.com/shareArticle?mini=true&amp;url=' . $link . '&amp;title=' . $title . '&amp;summary=' . $text;
        $html .= ($tag ? '<' . $tag . '>' : '') . '<li><a target="_blank" href="' . esc_url($shareLink) . '" title="' . esc_attr_x('Share on Linkedin', 'home-improvement', 'home-improvement') . '" ' . $newWindow . '><i class="fab fa-linkedin"></i></span></a></li>' . ($tag ? '</' . $tag . '>' : '');
        //}

        $shareLink = 'mailto:?subject=' . esc_attr($title_without_encode, 'home-improvement') . '&amp;body=Check out this site ' . $link . '&amp;title=' . $title;
        $html .= ($tag ? '<' . $tag . '>' : '') . '<li><a href="' . esc_attr($shareLink) . '" title="' . esc_attr_x('Email', 'title', 'home-improvement') . '" ' . $newWindow . '><i class="fa-solid fa-envelope"></i></a></li>' . ($tag ? '</' . $tag . '>' : '');

        $html .= '</ul>';

?>
        <script>
            window.socialOpenWindow = function(url) {
                let width = 650;
                let height = 380;
                let left = (screen.width / 2) - (width / 2);
                let top = (screen.height / 2) - (height / 2);
                window.open(url, "share", "toolbar=0,status=0,left=" + left + ",top=" + top + ",width=" + width + ",height=" + height);
                return false;
            };
        </script>
<?php
        echo $html;
    }
}
