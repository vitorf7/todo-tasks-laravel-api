// --------------------------------------------------------------------
// Plugins
// --------------------------------------------------------------------
var gulp        = require("gulp"),
    sass        = require("gulp-sass"),
    concat      = require("gulp-concat"),
    watch       = require("gulp-watch"),
    plumber     = require("gulp-plumber"),
    minify_css  = require("gulp-minify-css"),
    uglify      = require("gulp-uglify"),
    sourcemaps  = require("gulp-sourcemaps"),
    notify      = require("gulp-notify"),
    prefix      = require("gulp-autoprefixer" ),
    livereload  = require("gulp-livereload" ),
    gutil       = require("gulp-util");


// --------------------------------------------------------------------
// Error Handler
// --------------------------------------------------------------------
var onError = function(err) {
    console.log(err);
    this.emit('end');
};


// --------------------------------------------------------------------
// Task: Bootstrap SASS
// --------------------------------------------------------------------
gulp.task('bootstrap-sass', function() {

    return gulp.src('resources/assets/sass/bootstrap/app.scss')
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(prefix('last 2 versions'))
        .pipe(concat('app.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/assets/css/'))
        .pipe(notify({
            "title": "Bootstrap SASS",
            "message": "Bootstrap SASS has been successfully compiled!"
        }))
        .pipe(livereload());
});

// --------------------------------------------------------------------
// Task: Style SASS
// --------------------------------------------------------------------
gulp.task('style-sass', function() {

    return gulp.src('resources/assets/sass/style.scss')
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(prefix('last 2 versions'))
        .pipe(concat('style.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/assets/css/'))
        .pipe(notify({
            "title": "Style SASS",
            "message": "Your SASS Styles have been compiled"
        }))
        .pipe(livereload());
});


// --------------------------------------------------------------------
// Task: Vendor JS
// --------------------------------------------------------------------
gulp.task('vendor-js', function() {

    var jquery_js = function() {
        return gulp.src('resources/vendor/bower_components/jquery/dist/jquery.js')
            .pipe(plumber({
                errorHandler: onError
            }))
            .pipe(sourcemaps.init())
            .pipe(concat('jquery.js'))
            .pipe(gutil.env.type === 'production' ? uglify() : gutil.noop())
            .pipe(sourcemaps.write())
            .pipe(gulp.dest('public/assets/js/'))
            .pipe(notify({
                "title": "jQuery Compilation",
                "message": "Your jQuery has been compiled"
            }))
            .pipe(livereload());
    };

    var bootstrap_js = function() {
        return gulp.src('resources/vendor/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js')
            .pipe(plumber({
                errorHandler: onError
            }))
            .pipe(sourcemaps.init())
            .pipe(concat('bootstrap.js'))
            .pipe(gutil.env.type === 'production' ? uglify() : gutil.noop())
            .pipe(sourcemaps.write())
            .pipe(gulp.dest('public/assets/js/'))
            .pipe(notify({
                "title": "Boostrap JS Compilation",
                "message": "Your Bootstrap JS has been compiled"
            }))
            .pipe(livereload());
    };

    return jquery_js().on('end', bootstrap_js);

});

// --------------------------------------------------------------------
// Task: jQuery
// --------------------------------------------------------------------
gulp.task('build-js', function() {

    return gulp.src('resources/assets/js/**/*.js')
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(sourcemaps.init())
        .pipe(concat('scripts.js'))
        .pipe(gutil.env.type === 'production' ? uglify() : gutil.noop())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/assets/js/'))
        .pipe(notify({
            "title": "JS Scripts Compilation",
            "message": "Your JS Scripts have been compiled"
        }))
        .pipe(livereload());

});


// --------------------------------------------------------------------
// Task: Watch
// --------------------------------------------------------------------
gulp.task('watch', function() {
    livereload.listen();
    gulp.watch([
        'resources/vendor/bower_components/jquery/dist/jquery.js',
        'resources/vendor/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js'
    ], ['vendor-js']);
    gulp.watch('resources/assets/js/**/*.js', ['build-js']);
    gulp.watch('resources/assets/sass/bootstrap/app.scss', ['boostrap-sass']);
    gulp.watch('resources/assets/sass/style.scss', ['style-sass']);
});


// --------------------------------------------------------------------
// Task: Default
// --------------------------------------------------------------------
gulp.task('default', ['bootstrap-sass', 'style-sass', 'vendor-js', 'build-js', 'watch']);
