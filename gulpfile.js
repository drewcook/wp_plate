// --------------------------------------------------------
// Modules
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
// --------------------------------------------------------

var onError = function(err) {
    console.log(err);
    this.emit('end');
};

// --------------------------------------------------------
// Task: Sass
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
        // .pipe(sourcemaps.init())
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest(dist.css))
        .pipe(notify({message: 'Styles compiled and minified'}))
        .pipe(browserSync.reload({stream: true}));

});


// --------------------------------------------------------
// Task: JS
// --------------------------------------------------------

gulp.task('js', function() {

    return gulp.src(src.js)
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(uglify())
        .pipe(concat(dist.min_js))
        // .pipe(sourcemaps.init())
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest(dist.js))
        .pipe(notify({message: 'Scripts compiled and minified'}))
        .pipe(browserSync.reload({stream: true}));

});


// --------------------------------------------------------
// Task: Images
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
// --------------------------------------------------------

gulp.task('watch', function() {

    browserSync.init({
        proxy: 'localhost'
        //server: './dist'
    });
    gulp.watch(src.js, ['js']);
    gulp.watch(src.sass, ['sass']);
    gulp.watch(src.img, ['img']);
    gulp.watch(src.php).on('change', browserSync.reload);

});


// --------------------------------------------------------
// Task: Default
// --------------------------------------------------------

gulp.task('default', ['watch', 'sass', 'js', 'img']);