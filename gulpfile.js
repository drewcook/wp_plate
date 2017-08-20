// --------------------------------------------------------
// Modules
// Require all node modules defined in package.json
// --------------------------------------------------------

var gulp        = require("gulp"),
    sass        = require("gulp-sass"),
    concat      = require("gulp-concat"),
    watch       = require("gulp-watch"),
    plumber     = require("gulp-plumber"),
    minify_css  = require("gulp-clean-css"),
    uglify      = require("gulp-uglify"),
    notify      = require("gulp-notify"),
    prefix      = require("gulp-autoprefixer"),
    minify_img  = require("gulp-imagemin"),
    jshint      = require("gulp-jshint"),
    pngquant    = require("imagemin-pngquant"),
    browserSync = require("browser-sync");


// --------------------------------------------------------
// Settings
// Setting up source paths and distribution paths
// --------------------------------------------------------

var src = {
    img: "src/img/*",
    js: "src/js/**/*.js",
    sass: "src/scss/**/*.scss",
    css: "src/css/*.css",
    php: "../**/*.php",
};

var dist = {
    img: "assets/img",
    js: "assets/js",
    css: "./",
};


// --------------------------------------------------------
// Error Handler
// This is created to display any syntax errors in the
// console while saving files gulp is watching
// --------------------------------------------------------

var onError = function(err) {
    console.log(err);
    this.emit('end');
};


// --------------------------------------------------------
// Task: Images
// Run all added images through optmization tools
// --------------------------------------------------------

gulp.task('img', function() {

    return gulp.src(src.img)
        .pipe(minify_img({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(dist.img))
        .pipe(notify({message: 'Images optimized and minified.'}));

});


// --------------------------------------------------------
// Task: Sass
// Compile the Sass, prefix the CSS, concatenate and minify
// all files
// --------------------------------------------------------

gulp.task('sass', function() {

    return gulp.src(src.sass)
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(sass())
        .pipe(prefix('last 4 versions'))
        .pipe(concat('theme_styles.min.css'))
        .pipe(minify_css())
        .pipe(gulp.dest('src/css/'))
        .pipe(notify({message: 'Sass compiled and minified'}))
        .pipe(browserSync.reload({stream: true}));

});


// --------------------------------------------------------
// Task: CSS
// Combine minified compiled sass with style.css
// --------------------------------------------------------

gulp.task('css', ['sass'], function() {

    return gulp.src(src.css)
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(concat('style.css'))
        .pipe(gulp.dest(dist.css))
        .pipe(notify({message: 'CSS combined'}))
        .pipe(browserSync.reload({stream: true}));

});


// --------------------------------------------------------
// Task: JS
// Minify and concatenate all Javascript
// --------------------------------------------------------

gulp.task('js', function() {

    return gulp.src(src.js)
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(uglify())
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest(dist.js))
        .pipe(notify({message: 'Scripts compiled and minified.'}))
        .pipe(browserSync.reload({stream: true}));

});


// --------------------------------------------------------
// Task: Watch
// Set up BrowserSync and watch for changes on Javascript,
// Sass, PHP, or any new images and reload the browser
// on save
// --------------------------------------------------------

gulp.task('watch', ['css'], function() {

    browserSync.init({
        proxy: 'localhost'
    });
    gulp.watch(src.img, ['img']);
    gulp.watch(src.sass, ['css']);
    gulp.watch(src.js, ['js']);
    gulp.watch(src.php).on('change', browserSync.reload);

});


// --------------------------------------------------------
// Task: Default
// Runs all of the tasks with the command 'gulp'
// --------------------------------------------------------

gulp.task('default', ['img', 'css', 'js', 'watch']);