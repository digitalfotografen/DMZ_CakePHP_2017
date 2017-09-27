<?php
namespace App\Shell;

use Cake\Console\Shell;

/**
 * Score shell command.
 */
class ScoreShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('MyUsers');
        $this->loadModel('Visits');
        $this->loadModel('Scores');
    }

    /**
     * Manage the available sub-commands along with their arguments and help
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();
        // add help for the reset command
        $parser->addSubcommand('reset', [
            'help' => __('Reset game. Clear all scores and delete all visits'),
        ]);
        // add help for the update command
        $parser->addSubcommand('update', [
            'help' => __('Update scores'),
        ]);
        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->out($this->OptionParser->help());
    }


    /**
     * reset() method. resets score and delet all visits for all users
     *
     * @return bool|int|null Success or error code.
     */
    public function reset()
    {
        $this->Visits->deleteAll([]);
        return $this->update();
    }

    /**
     * update() method. update Scores
     * this should be called from a cron script at a few minutes invertal
     *
     * @return bool|int|null Success or error code.
     */
    public function update()
    {
        $users = $this->MyUsers
            ->find()
            ->contain(['Scores', 'Visits']);

        // run as batches of 20 users
        $users->chunk(20)->each(
            function($batch){
                // loop over each user in a batch
                foreach($batch as $user){
                    if (empty($user['score'])){
                        $score = $this->Scores->newEntity(['user_id' => $user['id']]);
                    } else {
                        $score = $this->Scores->get($user['score']['id']);
                    }
                    // Calculate score and save
                    $score->points = count($user['visits']);
                    $score = $this->Scores->save($score);
                    // This message are only displayed when using the -v verbose option
                    $this->verbose(__("User {0} has {1} points", $user['username'], $score->points));
                }
            }
        );

        return true;
    }
}
