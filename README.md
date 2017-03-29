# wp_plate
This is a boilerplate starter theme for Wordpress.

## To Install Node Modules
Download or clone the repo
Unzip the files
Run `cd wp_plate`
Run `npm install`

## To sync up live reloads on file changes
Gulp is installed and set up to concatenate and minify javascript, as well as compile the Sass, concatenate and minify.  It is then set to watch changes on any JS, Sass, or PHP files.  On saving these files, BrowserSync will auto-reload the files.  Make sure you are running a local instance on your machine to connect up.

Run `gulp`
