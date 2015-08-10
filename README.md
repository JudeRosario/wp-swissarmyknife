# WordPress Swiss Army Knife

A collection of mu plugins that have served me well over the years. You can take these, modify the code slightly and put 
it to use on your own sites. 


### What are `mu-plugins`

A must-use plugin (also called a ‘mu-plugin’) is a plugin that will always be activated by default, 
without you needing to do it yourself. To activate a mu-plugin, you just have to upload it in the right directory, 
and WordPress will automatically know that this plugin must be used. Moreover, a mu-plugin cannot be deactivated: 
it will always be executed, unless it is uninstalled.

For more info see [this](http://www.sitepoint.com/wordpress-mu-plugins)

### Installing `mu-plugins`

The Must Use plugins are installed in a separate folder called `mu-plugins` under the `wp-content` folder.
This folder is not created by default and must be created manually so make sure you give it correct permission 
(CHMOD 0755 for most common use cases). 

For a step by step install process for begineers see [this](http://premium.wpmudev.org/manuals/wpmu-manual-2/using-mu-plugins/)

##### Advanced
You can change the default folder name by defining `WPMU_PLUGIN_DIR` and `WPMU_PLUGIN_URL` in your `wp-config.php` file.

