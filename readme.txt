=== Trove ===
Contributors: paulhagon
Tags: trove
Requires at least: 3.3.2
Tested up to: 4.2.2
Stable tag: 1.0
License: GPLv2+
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Plugin to allow reproduction of OCR'd text from digitised newspapers in Trove, a service of the National Library of Australia, in your blog.


== Description ==

This plugin uses the [Trove API](http://trove.nla.gov.au/general/api) to embed OCR'd text from digitised newspapers in [Trove](http://trove.nla.gov.au/) in your blog. 



== Installation ==
1. Download and extract the trove.zip file.
2. Upload the `trove` directory to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress



= Shortcode =
Place the shortcode [trove newspaper=ID] in your blog post or page where you would like the text from the newspaper to appear.
The ID can be found from the URL of the article eg: to reproduce content from the article [http://trove.nla.gov.au/ndp/del/article/25225607](http://trove.nla.gov.au/ndp/del/article/25225607) you would use the following shortcode [trove newspaper=25225607].



== Frequently Asked Questions ==

= What is Trove? =
[Trove](http://trove.nla.gov.au/) is a search service from the National Library of Australia that searches collections from libraries, museums and galleries in Australia. One of it's highlights is digitised newspaper collections. The text has been OCR'd and is fully searchable. The public can correct any errors in the OCR'd text.

= How do i find the ID of the article I wish to use? =
You can find the ID from the URL. To reproduce the content from the article at [http://trove.nla.gov.au/ndp/del/article/25225607](http://trove.nla.gov.au/ndp/del/article/25225607) you would use the following shortcode [trove newspaper=25225607]

= What if the text is incorrect =
You can correct the text at Trove and the corrected text will appear on your site.

= I don't like the look =
The plugin includes a generic stylesheet. You can add your own CSS selectors to your theme to override the default styles.


== Screenshots ==
1. Example of adding a shortcode to your blog post or page.


== Changelog ==

= 1.0.0 =
* Initial release.


== Upgrade Notice ==

= 1.0.0 =
* Initial release.