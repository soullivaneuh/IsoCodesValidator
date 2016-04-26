## Reporting bugs

If you happen to find a bug, we kindly request you to report it. You may report it using Github by following these 3 points:

  * Check if the bug is not already reported and/or fixed!
  * A clear title to resume the issue
  * A description of the workflow needed to reproduce the bug,

> _NOTE:_ Don’t hesitate giving as much information as you can (OS, PHP/Symfony/Silex version, extensions...)

**BE AWARE**: If you found a bug provided by IsoCodes core, please submit an issue directly on the concerned repository: https://github.com/ronanguilloux/IsoCodes

## Pull requests

I will be glad to review your code changes propositions! :-)

But please, read the following before.

### Coding style

This project follows [PSR-1](http://www.php-fig.org/psr/psr-1/), [PSR-2](http://www.php-fig.org/psr/psr-2/)
and [Symfony Coding Standards](http://symfony.com/doc/current/contributing/code/standards.html) for coding style,
[PSR-4](http://www.php-fig.org/psr/psr-4/) for autoloading.

Please [install PHP Coding Standard Fixer](http://cs.sensiolabs.org/#installation)
and run this command before committing your modifications:

```bash
php-cs-fixer fix --verbose
```

### Writing a Pull Request

Before writing a PR, you have to check on what branch your changes should be based:

 * For patches, bugfixes, typo and minor improvements, choose the most recent stable branch: `2.x`
 * For new features and major improvements, choose the `master` branch.

Be aware that pull requests with BC breaks could be not accepted or reported for next major release.

If you are not sure of what to do, don't hesitate to open an issue about your PR project.

### Sending a Pull Request

When you send a PR, just make sure that:

 * You add valid test cases (for new features).
 * Tests are green.
 * The related documentation is up-to-date.
 * You make the PR on the same branch you based your changes on. If you see commits
 that you did not make in your PR, you're doing it wrong.
 * Also don't forget to add a comment when you update a PR with a ping to the maintainer (``@username``), so he/she will get a notification.
