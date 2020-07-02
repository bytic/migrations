<?php

namespace Deployer;

require 'recipe/phinx.php';

/*** SCHEDULER PUBLISH***/
desc('Run migrations');
task('bytic:migrations:migrate', 'phinx:migrate');
