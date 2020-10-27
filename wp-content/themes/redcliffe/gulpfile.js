var gulp = require('gulp'),
    watch = require('gulp-watch'),
    // pug = require('gulp-pug'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    rigger = require('gulp-rigger'),
    uglify = require('gulp-uglify'),
    jsmin = require('gulp-jsmin'),
    util = require('gulp-util'),
    autoprefixer = require('gulp-autoprefixer'),
    cssmin = require('gulp-cssmin'),
    rename = require('gulp-rename'),
    ftp = require('gulp-ftp');
    // historyApiFallback = require('connect-history-api-fallback');

// var browserSync = require('browser-sync').create();
// var reload = browserSync.reload;

var path = {
    build: {
        pug: 'dist/',
        js: 'assets/js/',
        css: 'assets/css/',
        img: 'assets/img/',
        fonts: 'assets/fonts/'
    },
    src: {
        js: 'src/js/*.js',
        style: 'src/style/style.scss',
        pug: 'src/templates/*.pug',
        img: 'src/img/**/*.*',
        fonts: 'src/fonts/**/*.*'
    },
    watch: {
        pug: 'src/**/*.pug',
        js: 'src/js/**/*.js',
        style: 'src/style/**/*.scss',
        img: 'src/img/**/*.*',
        fonts: 'src/fonts/**/*.*'
    }
};

gulp.task('js', function () {
    return gulp.src(path.src.js)
        .pipe(rigger())
        .pipe(gulp.dest(path.build.js))
        .pipe(ftp({
            host: 'ftp.case-digital.com',
            user: 'webdev@case-digital.info',
            pass: 'uVmP.^P9Jp74',
            remotePath: '/wp-content/themes/redcliffe/assets/js'
        }))
});
gulp.task('js-min', function () {
    return gulp.src(path.src.js)
        .pipe(rigger())
        .pipe(uglify()).on('error', util.log)
        .pipe(jsmin())
        .pipe(gulp.dest(path.build.js))
        .pipe(ftp({
            host: 'ftp.case-digital.com',
            user: 'webdev@case-digital.info',
            pass: 'uVmP.^P9Jp74',
            remotePath: '/wp-content/themes/redcliffe/assets/js'
        }))
});

gulp.task('styles', function () {
    return gulp.src(path.src.style)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(rename('style.css'))
        .pipe(gulp.dest(path.build.css))
        .pipe(ftp({
            host: 'ftp.case-digital.com',
            user: 'webdev@case-digital.info',
            pass: 'uVmP.^P9Jp74',
            remotePath: '/wp-content/themes/redcliffe/assets/css'
        }))
});
gulp.task('styles-min', function () {
    return gulp.src(path.src.style)
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['> 0.001%'],
            cascade: false
        }))
        .pipe(cssmin())
        .pipe(rename('style.css'))
        .pipe(gulp.dest(path.build.css))
        .pipe(ftp({
            host: 'ftp.case-digital.com',
            user: 'webdev@case-digital.info',
            pass: 'uVmP.^P9Jp74',
            remotePath: '/wp-content/themes/redcliffe/assets/css'
        }))
});

gulp.task('images', function() {
    gulp.src(path.src.img)
        .pipe(gulp.dest(path.build.img))
        /*.pipe(imagemin({ //Сожмем их
         progressive: true,
         svgoPlugins: [{removeViewBox: false}],
         use: [pngquant()],
         interlaced: true
         }))*/
        // .pipe(reload({ stream:true }));
});
gulp.task('fonts', function () {
    gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts))
        // .pipe(reload({ stream:true }));
});


gulp.task('watch-styles', function () {
    watch([path.watch.style], function(event, cb) {
        gulp.start('styles');
    });
});
gulp.task('dev-watch', ['dev'], function () {
    // browserSync.init({
    //     server: {
    //         baseDir: "./dist",
    //         middleware: [historyApiFallback({})]
    //     },
    //     port: 3000
    // });
    // watch([path.watch.pug], function(event, cb) {
    //     gulp.start('templates');
    // });
    watch([path.watch.style], function(event, cb) {
        gulp.start('styles');
    });
    watch([path.watch.js], function(event, cb) {
        gulp.start('js');
    });
    // watch([path.watch.img], function(event, cb) {
    //     gulp.start('images');
    // });
});
gulp.task('prod-watch', ['prod'], function () {
    // browserSync.init({
    //     server: {
    //         baseDir: "./dist",
    //         middleware: [historyApiFallback({})]
    //     },
    //     port: 3000
    // });
    // watch([path.watch.pug], function(event, cb) {
    //     gulp.start('templates');
    // });
    watch([path.watch.style], function(event, cb) {
        gulp.start('styles-min');
    });
    watch([path.watch.js], function(event, cb) {
        gulp.start('js-min');
    });
    // watch([path.watch.img], function(event, cb) {
    //     gulp.start('images');
    // });
});
gulp.task('dev', [ 'styles', 'js']);
gulp.task('prod', [ 'styles-min', 'js']);


gulp.task('default', ['dev-watch']);