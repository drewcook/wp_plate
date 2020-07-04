# Theme Building for Wordpress
This is a boilerplate starter theme for Wordpress.  This is meant to help speed up development time on new Wordpress sites.  It uses Gulp.js to perform many tasks including creating the style.css file which is required by Wordpress.

## To Install Node Modules
1. Download or clone the repo
2. Unzip the files
3. Run `npm install` when in the root directory

## To sync up live reloads on file changes
*This command must be run in order to generate the required style.css file.*

Gulp is installed and set up to concatenate and minify javascript, as well as compile the Sass, concatenate and minify.  It is then set to watch changes on any JS, Sass, or PHP files.  On saving these files, BrowserSync will auto-reload the files.  Make sure you are running a local instance on your machine to connect up.

1. Run `gulp`

If you have a different proxy set up on your local server, make sure to correct that in gulpfile.js so BrowserSync can connect properly.  It is set under the `watch` task.  The default proxy for this task is `localhost`.