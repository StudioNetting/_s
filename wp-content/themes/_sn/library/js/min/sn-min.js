jQuery(document).ready(function(t){t(".menu-toggle").click(function(){t(".responsive-menu").slideToggle(500)}),t(".menu-toggle").on("click",function(){var e=t(this).attr("aria-controls");"true"===t(this).attr("aria-expanded")?t(this).attr("aria-expanded","false"):(t(".menu-toggle").each(function(){t(this).attr("aria-expanded","false")}),t(this).attr("aria-expanded","true"))})});