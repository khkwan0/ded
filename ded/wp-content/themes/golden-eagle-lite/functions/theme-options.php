<?php

add_action('init', 'golden_eagle_option');
if (!function_exists('golden_eagle_option')) {

    function golden_eagle_option() {
        // VARIABLES
        $themename = 'Golden Eagle Lite Theme ';
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = goldeneagle_get_option('of_options');
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }
        //Front page on/off
        $file_rename = array("on" => "On", "off" => "Off");
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_stylesheet_directory_uri() . '/images/';

        $options = array(
            array("name" => "General Settings",
                "type" => "heading"),
            array("name" => "Custom Logo",
                "desc" => "Choose your own logo. Optimal Size: 300px Wide by 90px Height.",
                "id" => "goldeneagle_logo",
                "type" => "upload"),
            array("name" => "Custom Favicon",
                "desc" => "Specify a 16px x 16px image that will represent your website's favicon.",
                "id" => "goldeneagle_favicon",
                "type" => "upload"),
            array("name" => "Enable Custom Front Page",
                "desc" => "Overrides the WordPress <a href='" . admin_url('/options-reading.php') . "'>front page option</a>",
                "id" => "re_nm",
                "std" => "on",
                "type" => "radio",
                "options" => $file_rename),
            //Home Page Slider Setting
            array("name" => "Slider Settings",
                "type" => "heading"),
            //First Slider
            array("name" => "Slider Image1",
                "desc" => "Choose your image for first slider. Optimal size is 950px wide and 480px height.",
                "id" => "goldeneagle_slideimage1",
                "std" => "",
                "type" => "upload"),
            array("name" => "Slide 1 Link",
                "desc" => "Enter yout link url for slide1",
                "id" => "goldeneagle_slidelink1",
                "std" => "",
                "type" => "text"),
            //Second Slider
            array("name" => "Slider Image2",
                "desc" => "Choose your image for second slider. Optimal size is 950px wide and 480px height.",
                "id" => "goldeneagle_slideimage2",
                "std" => "",
                "type" => "upload"),
            array("name" => "Slide 2 Link",
                "desc" => "Enter yout link url for slide2",
                "id" => "goldeneagle_slidelink2",
                "std" => "",
                "type" => "text"),
            //Homepage Feature Area
            array("name" => "Homepage Feature Area",
                "type" => "heading"),
            //Page Heading
            array("name" => "Main Feature Heading",
                "desc" => "Enter your text for Page Heading.",
                "id" => "goldeneagle_page_heading",
                "std" => "",
                "type" => "textarea"),
            //Right Feature Separetor
            array("name" => "Feature Section Starts From Here.",
                "type" => "saperate",
                "class" => "saperator"),
            //Right Feature Area
            array("name" => "Homepage Feature Area First Image",
                "desc" => "Choose your image for homepage feature area first image.",
                "id" => "goldeneagle_featureimg1",
                "std" => "",
                "type" => "upload"),
            array("name" => "First Feature Heading",
                "desc" => "Enter your text for first col heading.",
                "id" => "goldeneagle_firsthead",
                "std" => "",
                "type" => "textarea"),
            array("name" => "First Feature Description",
                "desc" => "Enter your text for first col description.",
                "id" => "goldeneagle_firstdesc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "First Feature Link URL",
                "desc" => "Enter your link url for fourth feature section.",
                "id" => "goldeneagle_link1",
                "std" => "",
                "type" => "text"),
            //Second Feature Separetor
            array("name" => "Second Feature Starts From Here.",
                "type" => "saperate",
                "class" => "saperator"),
            array("name" => "Homepage Feature Area Second Image",
                "desc" => "Choose your image for homepage Feature area second image.",
                "id" => "goldeneagle_featureimg2",
                "std" => "",
                "type" => "upload"),
            array("name" => "Second Feature Heading",
                "desc" => "Enter your text for second col heading.",
                "id" => "goldeneagle_secondhead",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Second Col Description",
                "desc" => "Enter your text for second col description.",
                "id" => "goldeneagle_seconddesc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Second Feature Link URL",
                "desc" => "Enter your link url for fourth feature section.",
                "id" => "goldeneagle_link2",
                "std" => "",
                "type" => "text"),
            //Third Feature Separetor
            array("name" => "Third Feature Starts From Here.",
                "type" => "saperate",
                "class" => "saperator"),
            array("name" => "Homepage Third Feature  Image",
                "desc" => "Choose your image for homepage Feature area third image.",
                "id" => "goldeneagle_featureimg3",
                "std" => "",
                "type" => "upload"),
            array("name" => "Third Feature Heading",
                "desc" => "Enter your text for second col heading.",
                "id" => "goldeneagle_thirdhead",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Third Feature Description",
                "desc" => "Enter your text for Third Feature description.",
                "id" => "goldeneagle_thirddesc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Third Feature Link URL",
                "desc" => "Enter your link url for fourth feature section.",
                "id" => "goldeneagle_link3",
                "std" => "",
                "type" => "text"),
            //Fourth Feature Separetor
            array("name" => "Fourth Feature Starts From Here.",
                "type" => "saperate",
                "class" => "saperator"),
            array("name" => "Homepage Fourth Feature Area",
                "desc" => "Choose your image for homepage Feature Area fourth image. ",
                "id" => "goldeneagle_featureimg4",
                "std" => "",
                "type" => "upload"),
            array("name" => "Fourth Feature  Heading",
                "desc" => "Enter your text for Fourh Feature Area heading.",
                "id" => "goldeneagle_fourthhead",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Fourh Feature Area Description",
                "desc" => "Enter your text for first col description.",
                "id" => "goldeneagle_fourthdesc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Fourth Feature Link URL",
                "desc" => "Enter your link url for fourth feature section.",
                "id" => "goldeneagle_link4",
                "std" => "",
                "type" => "text"),
            //Home Page Bottom Setting
            array("name" => "Home Page Bottom Settings",
                "type" => "heading"),
            array("name" => "Tagline Text",
                "desc" => "Enter your text Tagline Section.",
                "id" => "goldeneagle_tagline_text",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Feature Button Text",
                "desc" => "Enter your link url for feature button section.",
                "id" => "goldeneagle_tagline_button",
                "std" => "",
                "type" => "text"),
            array("name" => "Feature Button Link URL",
                "desc" => "Enter your link url for feature button section.",
                "id" => "goldeneagle_tagline_button_link",
                "std" => "",
                "type" => "text"),
            //Bottom Feature Separetor
            array("name" => "Bottom Feature Start From Here.",
                "type" => "saperate",
                "class" => "saperator"),
            array("name" => "Bottom Left Heading",
                "desc" => "Enter your text bottom left Section.",
                "id" => "goldeneagle_bottomleft_heading",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Bottom Left Text",
                "desc" => "Enter your text bottom left Section.",
                "id" => "goldeneagle_bottomleft_description",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Enter Your Blog Heading",
                "desc" => "Enter your text for blog heading.",
                "id" => "goldeneagle_bottom_blog",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Testimonial Heading",
                "desc" => "Enter your text Testimonial Heading.",
                "id" => "goldeneagle_testimonial",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Testimonial Text",
                "desc" => "Enter your text or code",
                "id" => "goldeneagle_testimonial_text",
                "std" => "",
                "type" => "textarea"),
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
            array("name" => "Styling Options",
                "type" => "heading"),
            array("name" => "Custom CSS",
                "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                "id" => "goldeneagle_customcss",
                "std" => "",
                "type" => "textarea"),
//****=============================================================================****//
//****-------------This code is used for creating social logos options-------------****//					
//****=============================================================================****//
            array("name" => "Social Logos",
                "type" => "heading"),
            array("name" => "Facebook URL",
                "desc" => "Enter your Facebook URL if you have one",
                "id" => "goldeneagle_facebook",
                "std" => "#",
                "type" => "text"),
            array("name" => "Twitter URL",
                "desc" => "Enter your Twitter URL if you have one",
                "id" => "goldeneagle_twitter",
                "std" => "#",
                "type" => "text"),
            array("name" => "RSS Feed URL",
                "desc" => "Enter your RSS Feed URL if you have one",
                "id" => "goldeneagle_rss",
                "std" => "#",
                "type" => "text"),
            array("name" => "Google+ URL",
                "desc" => "Enter your Google+ URL if you have one",
                "id" => "goldeneagle_google",
                "std" => "#",
                "type" => "text"));
        goldeneagle_update_option('of_template', $options);
        goldeneagle_update_option('of_themename', $themename);
        goldeneagle_update_option('of_shortname', $shortname);
    }

}