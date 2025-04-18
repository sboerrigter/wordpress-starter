<?php

namespace Deployer;

require 'recipe/composer.php';

// General settings
set('application', 'application');
set('repository', 'https://github.com/sboerrigter/start.git');

set('git_ssh_command', 'ssh');
set('default_timeout', 3600);

// Defaults
set('branch', 'main');
set('local_url', 'http://www.start.test');

set('identityFile', '~/.ssh/id_rsa');
set('addSshOption', 'UserKnownHostsFile', '/dev/null');
set('addSshOption', 'StrictHostKeyChecking', 'no');
set('addSshOption', 'HostBasedAuthentication', 'no');

set('shared_files', ['.env', 'auth.json', 'web/wp-content/debug.log']);
set('shared_dirs', ['web/wp-content/uploads']);

// Hosts
host('start.bonsjoerd.eu')
  ->set('branch', 'main')
  ->set('hostname', 'server01.bonsjoerd.eu')
  ->set('remote_user', 'start')
  ->set('remote_url', 'https://start.bonsjoerd.eu')
  ->set('deploy_path', '/home/start/htdocs');

// Custom tasks

// Install NPM dependencies, build and upload compiled styles and scripts
task('deploy:build', function () {
  runLocally('npm install');
  runLocally('npm run build');
  upload(
    'web/wp-content/themes/theme/dist/',
    '{{release_path}}/web/wp-content/themes/theme/dist/'
  );
});

// SSH into remote server: dep ssh
task('ssh', function () {
  runLocally('ssh {{remote_user}}@{{hostname}}');
});

// Pull database: dep db:pull
task('db:pull', function () {
  set('ssh_multiplexing', false);

  run('cd {{deploy_path}}/current && wp db export {{deploy_path}}/db.sql');
  download('{{deploy_path}}/db.sql', 'db.sql');
  run('rm -f {{deploy_path}}/db.sql');
  runLocally('wp db import db.sql');
  runLocally('rm -f db.sql');
  runLocally('wp search-replace {{remote_url}} {{local_url}} --all-tables');
});

// Push database: dep db:push
task('db:push', function () {
  $sure = askConfirmation(
    'Are you sure you want to overwite the remote database?',
    false
  );
  if (!$sure) {
    die('Task aborted.');
  }

  runLocally('wp db export db.sql');
  upload('db.sql', '{{deploy_path}}');
  runLocally('rm -f db.sql');
  run('cd {{deploy_path}}/current && wp db import {{deploy_path}}/db.sql');
  run(
    'cd {{deploy_path}}/current && wp search-replace {{local_url}} {{remote_url}} --all-tables'
  );
  run('rm -f {{deploy_path}}/db.sql');
});

// Pull uploads: dep uploads:pull
task('uploads:pull', function () {
  runLocally(
    'rsync -avz -e "ssh" {{remote_user}}@{{hostname}}:{{deploy_path}}/shared/web/wp-content/uploads ./web/wp-content'
  );
});

// Push uploads: dep uploads:push
task('uploads:push', function () {
  runLocally(
    'rsync -avz -e "ssh" ./web/wp-content/uploads {{remote_user}}@{{hostname}}:{{deploy_path}}/shared/web/wp-content'
  );
});

// Purge Varnish
// @todo fix this
// task('purge:varnish', function () {
//   run(
//     'curl -sX BAN -H "X-Ban-Method: exact" -H "X-Ban-Host: {{domain}}" http://localhost/ > /dev/null'
//   );
// });

// Hooks
after('deploy:prepare', 'deploy:build');
// after('deploy', 'purge:varnish');
after('deploy:failed', 'deploy:unlock');
