module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        files: {
            vendor: [
                'resources/js/vendor/leaflet/*.js',
                'resources/js/vendor/fancybox/*.js',
                'resources/js/vendor/slick/*.js'
            ],
            app: [
                'resources/js/cookiebar.js',
                'resources/js/map.js',
                'resources/js/app.js'
            ],
            foundation: [
                'node_modules/jquery/dist/jquery.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.core.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.util.box.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.util.imageLoader.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.util.keyboard.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.util.mediaQuery.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.util.motion.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.util.nest.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.util.timer.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.util.timerAndImageLoader.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.util.touch.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.util.triggers.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.zf.responsiveAccordionTabs.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.abide.js',
                'node_modules/foundation-sites/dist/js/plugins/foundation.accordion.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.accordionMenu.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.drilldown.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.dropdown.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.dropdownMenu.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.equalizer.js'
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.interchange.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.magellan.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.offcanvas.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.orbit.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.responsiveAccordionTabs.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.responsiveMenu.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.responsiveToggle.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.reveal.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.slider.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.smoothScroll.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.sticky.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.tabs.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.toggler.js',
                // 'node_modules/foundation-sites/dist/js/plugins/foundation.tooltip.js',
            ]
        },
        sass: {
            options: {
                includePaths: [
                    'node_modules/foundation-sites/scss',
                    'resources/scss'
                ]
            },
            dist: {
                files: {
                    'resources/dist/app.min.css': 'resources/scss/app.scss'
                }
            }
        },
        sasslint: {
            options: {
                configFile: '.sass-lint.yml',
                files: {
                    ignore: [
                        'resources/scss/abstract/_foundation-settings.scss',
                        'resources/scss/base/_fonts.scss',
                        'resources/scss/vendor/*.scss'
                    ]
                }
            },
            target: [
                'resources/scss/*/*.scss'
            ]
        },
        postcss: {
            options: {
                processors: [
                    require('autoprefixer')({
                        browsers: ['> 1%', 'last 2 versions', 'ie >= 9', 'Safari > 7']
                    })
                ]
            },
            dist: {
                src: 'resources/dist/*.css'
            }
        },
        concat: {
            dist: {
                files: {
                    'resources/dist/app.min.js': [
                        'resources/js/foundation.min.js',
                        '<%= files.vendor %>',
                        '<%= files.app %>'
                    ]
                }
            },
            foundation: {
                files: {
                    'resources/js/foundation.min.js': '<%= files.foundation %>'
                }
            },
            publish: {
                files: {
                    'resources/dist/app.min.css': 'resources/dist/app.min.css',
                    'resources/dist/app.min.js': 'resources/dist/app.min.js'
                }
            }
        },
        babel: {
            options: {
                sourceMap: false,
                presets: ['env']
            },
            dist: {
                files: {
                    'resources/js/foundation.min.js': 'resources/js/foundation.min.js'
                }
            }
        },
        uglify: {
            options: {
                preserveComments: false
            },
            dist: {
                files: {
                    'resources/dist/app.min.js': 'resources/dist/app.min.js'
                }
            }
        },
        clean: ['resources/js/foundation.min.js'],
        watch: {
            gruntfile: {
                options: {
                    reload: true
                },
                files: ['Gruntfile.js'],
                tasks: ['sass:dist', 'sasslint', 'postcss', 'concat:foundation', 'concat:dist']
            },
            sass: {
                files: ['resources/scss/*.scss', 'resources/scss/*/*.scss'],
                tasks: ['sass:dist', 'sasslint', 'postcss']
            },
            concat: {
                files: ['<%= files.app %>'],
                tasks: ['concat:foundation', 'concat:dist', 'clean']
            }
        }
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-sass-lint');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-babel');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('build', ['sass:dist', 'sasslint', 'postcss', 'concat:foundation', 'babel', 'concat:dist', 'clean']);
    grunt.registerTask('publish', ['build', 'uglify', 'concat:publish']);
    grunt.registerTask('default', ['watch']);
};

