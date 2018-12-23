'use strict';

let gulp         = require('gulp'),
	rename       = require('gulp-rename'),
	notify       = require('gulp-notify'),
	autoprefixer = require('gulp-autoprefixer'),
	sass         = require('gulp-sass'),
	minify       = require('gulp-minify'),
	uglify       = require('gulp-uglify'),
	plumber      = require('gulp-plumber' );

gulp.task( 'rx-theme-css', () => {
	return gulp.src('./assets/sass/style.scss')
		.pipe(
			plumber( {
				errorHandler: function ( error ) {
					console.log('=================ERROR=================');
					console.log(error.message);
					this.emit( 'end' );
				}
			})
		)
		.pipe(sass( { outputStyle: 'compressed' } ))
		.pipe(autoprefixer({
				browsers: ['last 10 versions'],
				cascade: false
		}))

		.pipe(rename('style.css'))
		.pipe(gulp.dest('./'))
		.pipe(notify('Compile Sass Done!'));
});

gulp.task( 'rx-theme-blog-layout-css', () => {
	return gulp.src('./inc/modules/blog-layouts/assets/scss/blog-layouts-module.scss')
		.pipe(
			plumber( {
				errorHandler: function ( error ) {
					console.log('=================ERROR=================');
					console.log(error.message);
					this.emit( 'end' );
				}
			})
		)
		.pipe(sass( { outputStyle: 'compressed' } ))
		.pipe(autoprefixer({
				browsers: ['last 10 versions'],
				cascade: false
		}))

		.pipe(rename('blog-layouts-module.css'))
		.pipe(gulp.dest('./inc/modules/blog-layouts/assets/css/'))
		.pipe(notify('Compile Blog Layout Sass Done!'));
});

//watch
gulp.task( 'watch', () => {
	gulp.watch( [ './assets/style.scss', './assets/sass/**'], ['rx-theme-css'] );
	gulp.watch( [ './assets/sass/**', './inc/modules/blog-layouts/assets/scss/**'], ['rx-theme-blog-layout-css'] );
});
