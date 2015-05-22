<div class="four columns alpha">  
    <div class="footer-inner first-footer">
        <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
            <?php dynamic_sidebar('first-footer-widget-area'); ?>
        <?php else : ?> 
            <h3>Sitemap </h3>
            <ul>
                <li><a href="#"><span>Default template</span></a></li>
                <li><a href="#">Full-width template </a></li>
                <li><a href="#">Home template </a></li>
                <li><a href="#">Contact template  </a></li>
            </ul>
        <?php endif; ?> 	
    </div>      
</div>
<div class="four columns">
    <div class="footer-inner">        
        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
            <?php dynamic_sidebar('second-footer-widget-area'); ?>			
        <?php else : ?> 
            <h3>Search</h3>
            <?php get_search_form(); ?>
            <p>Theme from the Themes Area. Press the "Activate"
                Navember 2011 Theme from the Themes Area.</p>
        <?php endif; ?>
    </div>        
</div>
<div class="four columns">
    <div class="footer-inner">         
        <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
            <?php dynamic_sidebar('third-footer-widget-area'); ?>
        <?php else : ?>
            <h3>Setting Up Footer</h3>
            <p>Footer is widgetized. To setup the footer, drag the required Widgets </br>in Appearance -> Widgets Tab in the First, Second, Third or Fourth Footer Widget Areas.</p>
        <?php endif; ?>
    </div>        
</div>
<div class="four columns omega">
    <div class="footer-inner last-footer">
        <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
            <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
        <?php else : ?>
            <h3>Contact Us</h3>
            <p>Theme from the Themes Area. Press the "Activate"
                Navember 2011 Theme from the Themes Area. Press the "Activate"
                CategoriesTheme from the Themes Area. Press the "Activate"
                Theme from the Themes Area. Press the "Activate"</p>
        <?php endif; ?>
    </div>
</div>
