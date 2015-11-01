'use strict';

var gulp = require('gulp'),
	watch = require('gulp-watch'),
	prefixer = require('gulp-autoprefixer'),
	uglify = require('gulp-uglify'),
	less = require('gulp-less'),
	sourcemaps = require('gulp-sourcemaps'),
	rigger = require('gulp-rigger'),
	cssmin = require('gulp-minify-css'),
	imagemin = require('gulp-imagemin'),
	pngquant = require('imagemin-pngquant'),
	// rimraf = require('rimraf'),
	clean = require('gulp-clean'),
	browserSync = require('browser-sync'),
	svgSprite = require('gulp-svg-sprite'),
	reload = browserSync.reload,
	plumber = require('gulp-plumber'),

	path = {
		build: { //Тут мы укажем куда складывать готовые после сборки файлы
			html: 'build/',
			js: 'build/js/',
			css: 'build/css/',
			img: 'build/img/',
			sSvg: 'build/',
			fonts: 'build/fonts/'
		},
		src: { //Пути откуда брать исходники
			html: 'src/*.html', //Синтаксис src/*.html говорит gulp что мы хотим взять все файлы с расширением .html
			js: 'src/js/main.js',//В стилях и скриптах нам понадобятся только main файлы
			style: 'src/style/style.less',
			img: 'src/img/**/*.*', //Синтаксис img/**/*.* означает - взять все файлы всех расширений из папки и из вложенных каталогов
			sSvg: 'src/img/sprite-svg/*.svg',
			fonts: 'src/fonts/**/*.*'
		},
		watch: { //Тут мы укажем, за изменением каких файлов мы хотим наблюдать
			html: 'src/**/*.html',
			js: 'src/js/**/*.js',
			style: 'src/style/**/*.less',
			img: 'src/img/**/*.*',
			svg: 'src/img/sprite-svg/*.svg',
			fonts: 'src/fonts/**/*.*'
		},
		clean: './build/*'
	};

gulp.task('html:build', function () {
	gulp.src(path.src.html) //Выберем файлы по нужному пути
		.pipe(plumber())
		.pipe(rigger()) //Прогоним через rigger
		.pipe(gulp.dest(path.build.html)) //Выплюнем их в папку build
		.pipe(reload({stream: true})); //И перезагрузим наш сервер для обновлений
});

gulp.task('js:build', function () {
	gulp.src(path.src.js) //Найдем наш main файл
		.pipe(plumber())
		.pipe(rigger()) //Прогоним через rigger
		.pipe(sourcemaps.init()) //Инициализируем sourcemap
		.pipe(uglify()) //Сожмем наш js
		.pipe(sourcemaps.write()) //Пропишем карты
		.pipe(gulp.dest(path.build.js)) //Выплюнем готовый файл в build
		.pipe(reload({stream: true})); //И перезагрузим сервер
});

gulp.task('style:build', function () {
	gulp.src(path.src.style) //Выберем наш style.less
		.pipe(plumber())
		.pipe(sourcemaps.init()) //То же самое что и с js
		.pipe(less()) //Скомпилируем
		.pipe(prefixer({browsers: ['> 2%', 'ie >= 9', 'last 2 versions']})) //Добавим вендорные префиксы
		.pipe(cssmin()) //Сожмем
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(path.build.css)) //И в build
		.pipe(reload({stream: true}));
});

gulp.task('img:build', function () {
	gulp.src(path.src.img) //Выберем наши картинки
		.pipe(plumber())
		.pipe(imagemin({ //Сожмем их
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()],
			interlaced: true
		}))
		.pipe(gulp.dest(path.build.img)) //И бросим в build
		.pipe(reload({stream: true}));
});

gulp.task('svg:build', function () {
	gulp.src(path.src.sSvg)
		.pipe(plumber())
		.pipe(svgSprite({
			log : 'info',
			mode : {
				css : {
					render : {
						less: {
							dest : '../style/_sprite.less'
						}
					},
					sprite : '../img/svg-sprite.svg',
					prefix : '.%s()',
					dimensions : '%s',
					layout : 'vertical'
				}
			}
		}))
		.pipe(gulp.dest('src/'))
		.pipe(reload({stream: true}))
});

gulp.task('fonts:build', function() {
	gulp.src(path.src.fonts)
		.pipe(plumber())
		.pipe(gulp.dest(path.build.fonts))
});

gulp.task('build', [
	'clean',
	'svg:build',
	'html:build',
	'js:build',
	'style:build',
	'fonts:build',
	'img:build'
]);

gulp.task('webserver', function () {
	browserSync({
		server: {
			baseDir: './build'
		},
		// tunnel: true,
		host: 'localhost',
		port: 9000,
		logPrefix: 'Frontend_Devil'
	});
});

gulp.task('clean', function () {
	return gulp.src(path.clean, {read: false})
		.pipe(clean());
});

gulp.task('svg:clean', function () {
	return gulp.src('src/img/*.svg', {read: false})
		.pipe(clean());
});

gulp.task('watch', function(){
	watch([path.watch.html], function(event, cb) {
		gulp.start('html:build');
	});
	watch([path.watch.svg], function(event, cb) {
		gulp.start('svg:clean');
		gulp.start('svg:build');
	});
	watch([path.watch.style], function(event, cb) {
		gulp.start('style:build');
	});
	watch([path.watch.js], function(event, cb) {
		gulp.start('js:build');
	});
	watch([path.watch.img], function(event, cb) {
		gulp.start('img:build');
	});
	watch([path.watch.fonts], function(event, cb) {
		gulp.start('fonts:build');
	});
});

gulp.task('default', ['build', 'webserver', 'watch']);