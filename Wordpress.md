# Setting up Wordpress

0. Install Wordpress (preferably via a VirtualHost so the content can start at /)
   0. Set the site title to "Web UI Framework API Documentation"
0. Copy grunt-wordpress.php from [grunt-wordpress](https://github.com/scottgonzalez/grunt-wordpress) to wp-content/plugins
0. Copy wp/upload-filters.php to wp-content/plugins
0. Copy wp/theme to wp-content/themes/web-ui-fw-api-docs
0. Log into wordpress as the admin user
  0. Go to Plugins -> Installed Plugins and activate "Grunt WordPress XML-RPC extensions" and "XML-RPC upload filter additions for Web UI Framework API Docs"
  0. Go to Settings -> General and empty the "Tagline" text field. Make sure to save changes.
  0. Go to Settings -> Permalinks and choose "Post name". Make sure to save changes.
  0. Go to Appearance -> Themes and choose "Web UI Framework API Docs"
     0. Click "Customize"
	 0. On the customization screen, click "Widgets: Primary Sidebar" and remove everything except the "Categories" widget.
	     0. Open the "Categories" widget
		    0. Make sure "Show Hierarchy" is checked
			0. Set the title to a single space character
	     0. Click "Save & Publish"
0. Edit config.json in the repo root and specify the Web site name, admin user name, and admin password.
0. Run grunt wordpress-deploy to upload the API entries to the site.
0. Log into wordpress as the admin user
  0. Go to Settings -> Reading and choose "A static page" for "Front page displays". Then choose "Web UI Framework API Documentation" for "Front page". Make sure to save changes.
