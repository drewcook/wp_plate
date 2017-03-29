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
    sass: "src/scss/**/*.scss",
    js: "src/js/**/*.js",
    img: "src/img/*",
    php: "../**/*.php"
};

var dist = {
    js: "assets/js",
    css: "assets/css",
    img: "assets/img",
    min_css: "main.min.css",
    min_js: "main.min.js"
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
        .pipe(concat(dist.min_css))
        .pipe(gulp.dest(dist.css))
        .pipe(minify_css())
        .pipe(gulp.dest(dist.css))
        .pipe(notify({message: 'Styles compiled and minified'}))
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
        .pipe(concat(dist.min_js))
        .pipe(gulp.dest(dist.js))
        .pipe(notify({message: 'Scripts compiled and minified'}))
        .pipe(browserSync.reload({stream: true}));

});


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
        .pipe(notify({message: 'Images optimized and minified'}));

});


// --------------------------------------------------------
// Task: Watch
// Set up BrowserSync and watch for changes on Javascript,
// Sass, PHP, or any new images and reload the browser
// on save
// --------------------------------------------------------

gulp.task('watch', function() {

    browserSync.init({
        proxy: 'localhost'
    });
    gulp.watch(src.js, ['js']);
    gulp.watch(src.sass, ['sass']);
    gulp.watch(src.img, ['img']);
    gulp.watch(src.php).on('change', browserSync.reload);

});


// --------------------------------------------------------
// Task: Default
// Runs all of the tasks with the command 'gulp'
// --------------------------------------------------------

gulp.task('default', ['watch', 'sass', 'js', 'img']);