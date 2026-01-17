<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

/**
 * AddUser command.
 */
class AddUserCommand extends Command
{
    /**
     * The name of this command.
     *
     * @var string
     */
    protected string $name = 'add_user';

    /**
     * Get the default command name.
     *
     * @return string
     */
    public static function defaultName(): string
    {
        return 'add_user';
    }

    /**
     * Get the command description.
     *
     * @return string
     */
    public static function getDescription(): string
    {
        return 'Command description here.';
    }

    /**
     * Hook method for defining this command's option parser.
     *
     * @link https://book.cakephp.org/5/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser->addArgument('username', [
            'help' => 'Name of the user to add.',
            'required' => true,
        ]);
        
        $parser->addArgument('password', [
            'help' => 'Password of the user to add.',
            'required' => true,
        ]);

        return parent::buildOptionParser($parser)
            ->setDescription(static::getDescription());
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return int|null|void The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $username = $args->getArgument('username');
        $password = $args->getArgument('password');

        $usersTable = $this->getTableLocator()->get('Users');
        $user = $usersTable->newEmptyEntity();
        $user = $usersTable->patchEntity($user, [
            'username' => $username,
            'password' => $password,
        ]);

        if ($usersTable->save($user)) {
            $io->out('User "' . $username . '" has been created successfully.');
        } else {
            $io->err('Failed to create user. Errors:');
            foreach ($user->getErrors() as $field => $errors) {
                foreach ($errors as $error) {
                    $io->err("- {$field}: {$error}");
                }
            }
            return 1; // Indicate failure
        }
    }
}
