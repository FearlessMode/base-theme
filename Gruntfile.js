module.exports = function(grunt){
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    jshint: {
      all: ['_dev/js/*.js']
    },
    csslint: {
      all: ['css/*.css']
    },
    cssmin: {
      build: {
        files: [{
          expand: true,
          src: ['css/*.css'],
          dest: '',
          ext: '.min.css'
        }]
      }
    },
    uglify: {
      build: {
        files: [{
          expand: true,
          cwd: '_dev/js',
          src: ['*.js'],
          dest: 'js/',
          ext: '.min.js'
        }]
      }
    },
    compass: {
      build: {
        options: {
          sassDir: '_dev/css/sass/',
          cssDir: 'css/',
          require: 'susy',
          environment: 'development'
        }
      }
    },
    imagemin: {
      build: {
        files: [{
          expand: true,
          cwd: '_dev/assets/',
          src: ['*.{png,jpg,gif}'],
          dest: 'assets/'
        }]
      }
    },
    copy: {
      build: {
        files: [
          {
            expand: true,
            cwd: '_dev/css/fonts/',
            src: ['**'],
            dest: 'css/fonts/'
          },
          {
            expand: true,
            cwd: '_dev/js/libs/',
            src: ['**'],
            dest: 'js/libs/'
          },
          {
            expand: true,
            cwd: '_dev/js/polyfills/',
            src: ['**'],
            dest: 'js/polyfills/'
          },
          {
            expand: true,
            cwd: '_dev/inc/',
            src: ['**'],
            dest: 'inc/'
          },
          {
            expand: true,
            cwd: '_dev/inc/libs/',
            src: ['**/*'],
            dest: 'inc/libs/'
          },
          {
            expand: true,
            cwd: '_dev/templates/',
            src: ['**'],
            dest: 'templates/'
          },
          {
            expand: true,
            cwd: '_dev/',
            src: ['*.php'],
            dest: ''
          }
        ]
      }
    },
    clean: {
      build: {
        src: ['css/*.min.css']
      }
    },
    watch: {
      scripts: {
        files: ['_dev/**/*'],
        tasks: ['jshint', 'uglify', 'compass', 'clean', 'cssmin', 'imagemin', 'copy'],
        options: {
          spawn: false
        }
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-csslint');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-clean');

  grunt.registerTask('default', ['jshint', 'uglify', 'compass', 'clean', 'cssmin', 'imagemin', 'copy', 'watch']);
};
