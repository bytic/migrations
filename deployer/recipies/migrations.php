<?php

namespace Deployer;

/*** SCHEDULER PUBLISH***/
desc('Run migrations');
task('bytic:migrations:migrate', function () {
    cd('{{release_path}}');

    $bytic = get('bin/bytic');
    $byticCmd = "$bytic migrations:migrate";

    run($byticCmd);

    cd('{{deploy_path}}');
});
